<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
	protected $primaryKey = 'msg_003';
	protected $table = 'ttm_transactions';
	const UPDATED_AT = null;
	public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'fld_042', 'merchant_id');
	}

    Public static function getTodaysTransactions(){
    	$amount = $failed = $success = $failed_amount = $total_amount = 0;
    	if (Auth::user()->role <> 'master'){
            $transactions = Transaction::whereDate('fld_012', Carbon::now()
                ->toDateString())
                ->where('fld_042', Auth::user()->merchant_id)
                ->latest('fld_012')
                ->with('user')
                ->get();
        } else {
            $transactions = Transaction::whereDate('fld_012', Carbon::now()
                ->toDateString())
                ->latest('fld_012')
                ->with('user')
                ->get();
        }

    	return self::sortForSourceOfFunds($transactions);
	}

	public static function getAllTransactions(){
        ini_set('max_execution_time', 120);
        $transactions = [];
        if (Auth::user()->role <> 'master') {
            $transactions = Transaction::where('fld_042', Auth::user()->merchant_id)->with('user')->latest('fld_012')->paginate(20);
        } else {
            $transactions = Transaction::latest('fld_012')->with('user')->limit(10)->paginate(20);
        }
    	return view('pages.transactions', ['user' => Auth::user(), 'transactions' => $transactions]);
	}

	public static function testTransaction(Request $request){
		$headers = [
			'Content-Type: application/json'
		];
		$body = json_encode([
			'action'    => $request->action,
			'mode'      => $request->mode,
			'amount'    => $request->amount,
			'id'        => $request->id,
			'desc'      => $request->description,
			'number'    => $request->number,
			'cvv'       => $request->cvv,
			'expMonth'  => $request->month,
			'expYear'   => $request->year,
			'recipient' => $request->recipient,
			'network'   => $request->network,
			'credit_amount' => $request->credit,
			'ref'       => $request->reference,
			'url'       => ''
		]);

		$token = Token::getToken();

		$curl = curl_init('https://api.theteller.net/test/index.php');
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_USERPWD, $token->user_name.":".$token->api_key);

		if (curl_error($curl)){
			return curl_error($curl);
		} else {
			return curl_exec($curl);
		}
	}

    public static function padPan()
    {
        Transaction::where('msg_006', 'visa')->orderBy('msg_018')->chunk(10, function ($transactions){
            foreach ($transactions as $transaction) {
                $transaction->msg_007 = substr($transaction->msg_007, 0, 4).'********'.substr($transaction->msg_007, -4);
                $transaction->msg_012 = '****';
                $transaction->save();
            }
        });
    }

    public static function updateStatus()
    {
        Transaction::where('msg_016', 'approved')->orderBy('msg_018')->chunk(100, function ($transactions){
            foreach ($transactions as $transaction) {
                $transaction->msg_016 = '000';
                $transaction->save();
            }
        });
    }

    public static function fetchTransactions($initial, $finish)
    {
        $mtn_count = $airtel_count = $visa_count = $tigo_count = $gh_link_count = $mastercard_count = $vodafone_count = $successful_count = $failed_count = $mtn_amount = $failed_amount = $successful_amount = $airtel_amount = $visa_amount = $tigo_amount = $gh_link_amount = $mastercard_amount = $total_amount = $vodafone_amount = 0;
        $isDateRange = Carbon::parse($finish)->diffInDays(Carbon::parse($initial));
        if (Auth::user()->role <> 'master'){
            if ($isDateRange){
                $transactions   =   Transaction::whereBetween('fld_012', [$initial, Carbon::parse($finish)->addDay(1)])->with('user')->where('fld_042', Auth::user()->merchant_id)->get();
            } else {
                $transactions   =   Transaction::whereDate('fld_012', $initial)->where('fld_042', Auth::user()->merchant_id)->with('user')->get();
            }
        } else {
            if ($isDateRange){
                $transactions   =   Transaction::whereBetween('fld_012', [$initial, Carbon::parse($finish)->addDay(1)])->with('user')->get();
            } else {
                $transactions   =   Transaction::whereDate('fld_012', $initial)->with('user')->get();
            }
        }

        $_transactions = [];
        foreach ($transactions as $transaction) {
            array_push($_transactions, [
                'fld_011'     =>  $transaction->fld_011,
                'fld_037'     =>  $transaction->fld_037,
                'fld_057'     =>  $transaction->fld_057,
                'fld_002'     =>  $transaction->fld_002,
                'fld_003'     =>  $transaction->fld_003,
                'fld_004'     =>  $transaction->fld_004,
                'fld_012'     =>  $transaction->fld_012,
                'fld_039'     =>  $transaction->fld_039
            ]);

            $total_amount+= (float) self::toFixed($transaction->fld_004);

            if ($transaction->fld_039 === '000') {

                $successful_count++;
                $successful_amount+= (float) self::toFixed($transaction->fld_004);

                if ($transaction->fld_057 === 'MTN'){
                    $mtn_count++;
                    $mtn_amount += self::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'ATL') {
                    $airtel_count++;
                    $airtel_amount+= self::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'TGO') {
                    $tigo_count++;
                    $tigo_amount+= self::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'VIS') {
                    $visa_count++;
                    $visa_amount+= self::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'MAS') {
                    $mastercard_count++;
                    $mastercard_amount+= self::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'GHL') {
                    $gh_link_count++;
                    $gh_link_amount+= self::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'VDF') {
                    $vodafone_count++;
                    $vodafone_amount+= self::toFixed($transaction->fld_004);
                }

            } else {
                $failed_count++;
                $failed_amount+= self::toFixed($transaction->fld_004);
            }

        }
        return [
            'total_count'         =>  count($transactions),
            'total_amount'        =>  number_format($total_amount,2),
            'mtn_count'           =>  $mtn_count,
            'mtn_amount'          =>  number_format($mtn_amount, 2),
            'airtel_count'        =>  $airtel_count,
            'airtel_amount'       =>  number_format($airtel_amount, 2),
            'tigo_count'          =>  $tigo_count,
            'tigo_amount'         =>  number_format($tigo_amount, 2),
            'visa_count'          =>  $visa_count,
            'visa_amount'         =>  number_format($visa_amount, 2),
            'mastercard_count'    =>  $mastercard_count,
            'mastercard_amount'   =>  number_format($mastercard_amount, 2),
            'vodafone_count'      =>  $vodafone_count,
            'vodafone_amount'     =>  number_format($vodafone_amount, 2),
            'gh_link_count'       =>  $gh_link_count,
            'gh_link_amount'      =>  number_format($gh_link_amount, 2),
            'successful_count'    =>  $successful_count,
            'successful_amount'   =>  number_format($successful_amount, 2),
            'failed_count'        =>  $failed_count,
            'failed_amount'       =>  number_format($failed_amount, 2),
            'transactions'        =>  $transactions
        ];
    }

    public static function getTransactionsCountByMonth()
    {
        $transactions = [];
        $year   = Date('Y');
        $month  = Date('m');

        for ($i = 1; $i <= $month; $i++){
            $this_month = self::fetchTransactionCountByMonth($year, $i);
            $_i = str_pad($i, 2, '0', STR_PAD_LEFT);
            array_push($transactions, [
                'month' => "$year-$_i",
                'Successful' => $this_month[0],
                'Failed' => $this_month[1],
                'Total' => (int)$this_month[0] + (int)$this_month[1]
            ]);
        }
        return $transactions;
    }

    public static function fetchTransactionCountByMonth($year, $month)
    {
        $successes  =   Transaction::whereYear('fld_012', $year)->whereMonth('fld_012', $month)->where('fld_039', '000')->count();
        $failures   =   Transaction::whereYear('fld_012', $year)->whereMonth('fld_012', $month)->where('fld_039', '<>', '000')->count();
        return [$successes, $failures];
    }

    public static function toFixed($minor_units)
    {
        if (strlen($minor_units) < 12){
            return $minor_units;
        }
        $int = (int) $minor_units;
        $float = number_format( (float) ($int / 100), 2);
        return $float;
    }

    public static function sortForSourceOfFunds($transactions)
    {
        $mtn_count = $airtel_count = $visa_count = $tigo_count = $gh_link_count = $mastercard_count = $vodafone_count = $successful_count = $failed_count = $mtn_amount = $failed_amount = $successful_amount = $airtel_amount = $visa_amount = $tigo_amount = $gh_link_amount = $mastercard_amount = $total_amount = $vodafone_amount = 0;
        $_transactions = [];

        foreach ($transactions as $transaction) {

            array_push($_transactions, [
                'STAN'          =>  $transaction->fld_011,
                'TranId'        =>  $transaction->fld_037,
                'Platform'      =>  $transaction->fld_057,
                'Acc_Number'    =>  $transaction->fld_002,
                'TranType'      =>  $transaction->fld_003,
                'Amount'        =>  $transaction->fld_004,
                'TransDate'     =>  $transaction->fld_012,
                'Status'        =>  $transaction->fld_039,
                'user_acc'      =>  $transaction->user->acc_number
            ]);

            $total_amount+= (float) self::toFixed($transaction->fld_004);

            if ($transaction->fld_039 === '000') {

                $successful_count++;
                $successful_amount+= (float) self::toFixed($transaction->fld_004);

                if ($transaction->fld_057 === 'MTN'){
                    $mtn_count++;
                    $mtn_amount += (float) self::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'ATL') {
                    $airtel_count++;
                    $airtel_amount+= (float) self::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'TGO') {
                    $tigo_count++;
                    $tigo_amount+= (float) self::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'VIS') {
                    $visa_count++;
                    $visa_amount+= (float) self::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'MAS') {
                    $mastercard_count++;
                    $mastercard_amount+= (float) self::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'GHL') {
                    $gh_link_count++;
                    $gh_link_amount+= (float) self::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'VDF') {
                    $vodafone_count++;
                    $vodafone_amount+= (float) self::toFixed($transaction->fld_004);
                }

            } else {
                $failed_count++;
                $failed_amount+= (float) self::toFixed($transaction->fld_004);
            }

        }
        return [
            'total_count'         =>  count($transactions),
            'total_amount'        =>  number_format($total_amount,2),
            'mtn_count'           =>  $mtn_count,
            'mtn_amount'          =>  number_format($mtn_amount, 2),
            'airtel_count'        =>  $airtel_count,
            'airtel_amount'       =>  number_format($airtel_amount, 2),
            'tigo_count'          =>  $tigo_count,
            'tigo_amount'         =>  number_format($tigo_amount, 2),
            'visa_count'          =>  $visa_count,
            'visa_amount'         =>  number_format($visa_amount, 2),
            'mastercard_count'    =>  $mastercard_count,
            'mastercard_amount'   =>  number_format($mastercard_amount, 2),
            'vodafone_count'      =>  $vodafone_count,
            'vodafone_amount'     =>  number_format($vodafone_amount, 2),
            'gh_link_count'       =>  $gh_link_count,
            'gh_link_amount'      =>  number_format($gh_link_amount, 2),
            'successful_count'    =>  $successful_count,
            'successful_amount'   =>  number_format($successful_amount, 2),
            'failed_count'        =>  $failed_count,
            'failed_amount'       =>  number_format($failed_amount, 2),
            'transactions'        =>  array_slice($_transactions, 0, 10)
        ];
    }

    public static function handleFetchTransactions($transactions, $results)
    {

        foreach ($transactions as $transaction) {

        }
    }
}
