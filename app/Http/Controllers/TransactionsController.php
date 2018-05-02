<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestTransaction;
use App\Transaction;
use App\Settlement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class TransactionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function getAllTransactions(){
    	return Transaction::getAllTransactions();
	}

	public function testTransaction(TestTransaction $request){
    	return Transaction::testTransaction($request);
	}

    public function reports()
    {
        $user = Auth::user();

        if ($user->role <> 'master') {
            $r_switches         = Transaction::distinct('fld_057')->where('fld_042', $user->merchant_id)->orderBy('fld_057', 'asc')->get(['fld_057']);
            $processing_codes   = Transaction::distinct('fld_003')->where('fld_042', $user->merchant_id)->orderBy('fld_003', 'asc')->get(['fld_003']);
            $terminals          = Transaction::distinct('fld_041')->where('fld_042', $user->merchant_id)->orderBy('fld_041', 'asc')->get(['fld_041']);
        } else {
            $r_switches         = Transaction::distinct('fld_057')->orderBy('fld_057', 'asc')->get(['fld_057']);
            $processing_codes   = Transaction::distinct('fld_003')->orderBy('fld_003', 'asc')->get(['fld_003']);
            $terminals          = Transaction::distinct('fld_041')->orderBy('fld_041', 'asc')->get(['fld_041']);
        }
        
        return view('pages.reports', compact('user', 'r_switches', 'processing_codes', 'terminals', 'statuses'));
	}

    public function reportsView($date_range)
    {
        $range = explode(' - ', $date_range);
        $transactionController = new TransactionsController();
        $transactions = $transactionController->fetchTransactions($range[0], $range[1]);
        return view('pages.report_view', ['user' => Auth::user(), 'transactions' => $transactions, 'start' => $range[0], 'end' => $range[1]]);
	}

	public function settlementView($date)
    {
        $settlement = [];
        if($date) {
            Log::info('Date has been set');
            $date = explode('-',$date);
            $date = Carbon::createFromDate($date[0],$date[1],$date[2]);

            $settlement = Settlement::whereDate('setldate',$date->toDateString())->where('merchid',Auth::user()->merchant_id)->get();
        }

        $switches = [array('name'=>'MTN','image'=>'img/paymentlogos/mtn.png','fname' => 'MTN'),
            array('name'=>'VDF','image'=>'img/paymentlogos/vodafone.jpg','fname' => 'Vodafone'),
            array('name'=>'ATL','image'=>'img/paymentlogos/airtel2.png','fname' => 'Airtel'),
            array('name'=>'TGO','image'=>'img/paymentlogos/tigo2.png','fname' => 'Tigo'),
            array('name'=>'VIS','image'=>'img/paymentlogos/visa.jpg','fname' => 'Visa'),
            array('name'=>'MAS','image'=>'img/paymentlogos/mastercard.png','fname' => 'Mastercard')
        ];

        $theSwitches = $switches;

        $totals = [];
        foreach($switches as $switch) {
            $totals[$switch['name']] = [];
            $totals[$switch['name']]['count'] = 0;
            $totals[$switch['name']]['image'] = $switch['image'];
            $totals[$switch['name']]['name'] = $switch['fname'];
            $totals[$switch['name']]['transaction_count'] = 0;
            $totals[$switch['name']]['transaction_amount'] = 0;
            $totals[$switch['name']]['charges'] = 0;
            $totals[$switch['name']]['net_amount'] = 0;
        }


        $details = [];

        foreach($switches as $switch) {
            foreach($settlement as $key=>$item) {
                //Log::info('Settlement with Switch');
                //Log::debug($switch['name'].' '.$item->RSWITCH);
                if ($switch['name'] == $item->RSWITCH) {
                    $details[$key] = [];
                    $details[$key]['name'] = $switch['fname'];
                    $details[$key]['image'] = $switch['image'];
                    $details[$key]['type'] = ucfirst($item->TRANSTYPE);
                    $details[$key]['volume'] = $item->TOTVOL;
                    $details[$key]['amount'] = $item->TOTVAL;
                    $details[$key]['net_amount'] = $item->NET;
                    //Log::info('The key is ');
                    //Log::debug($key);
                }
            }
        }

        Log::info('Details are');
        Log::debug($details);

        $switches = ['MTN','VDF','ATL','TGO','VIS','MAS'];

        //Log::debug($totals);

        //count the volume of transaction per r-switch
        foreach($settlement as $item) {
            if($item->RSWITCH=='VDF'){
                //Log::debug($item);
            }
            if(in_array($item->RSWITCH,$switches)) {
                //Log::info('Found in R-Switch');
                //Log::debug($item->id.' '.$item->RSWITCH);
                $totals[$item->RSWITCH]['count']++;
                $totals[$item->RSWITCH]['transaction_count'] += $item->TOTVOL;
                $totals[$item->RSWITCH]['transaction_amount'] +=(double) $item->TOTVAL;
                $totals[$item->RSWITCH]['charges'] +=(double) $item->CHARGES;
                $totals[$item->RSWITCH]['net_amount'] +=(double) $item->NET;
            }
        }
        Log::info('DATE Format is '.gettype($date));
        Log::debug($date);

        //calculate the total charge
        $totalCharge = 0; $totalNet = 0;
        foreach($settlement as $item) {
            $totalCharge += $item->CHARGES;
            $totalNet += $item->NET;
        }

        //calculate the total net

        //only payments
        $payments = []; $transfers = [];
        foreach($theSwitches as $key => $switch) {
            Log::info("Switch name ".$switch['name']." and count is ".$key);
            $payments[$key] = [];
            $transfers[$key] = [];

            //payments
            $payments[$key]['name'] = $switch['fname'];
            $payments[$key]['image'] = $switch['image'];
            $payments[$key]['rswitch'] = $switch['name'];
            $payments[$key]['volume'] = 0;
            $payments[$key]['amount'] = 0;
            $payments[$key]['net_amount'] = 0;
            $payments[$key]['charges'] = 0;
            $payments[$key]['type'] = 'payment';

            //transfers
            $transfers[$key]['name'] = $switch['fname'];
            $transfers[$key]['image'] = $switch['image'];
            $transfers[$key]['rswitch'] = $switch['name'];
            $transfers[$key]['volume'] = 0;
            $transfers[$key]['amount'] = 0;
            $transfers[$key]['net_amount'] = 0;
            $transfers[$key]['charges'] = 0;
            $transfers[$key]['type'] = 'transfer';
        }
        Log::info("\n\nRight Before Populating Them\n\n");
        Log::info(" Payments"); Log::debug($payments);
        Log::info(" Transfers"); Log::debug($transfers);
        $totalPayment = [];
        $totalPayment['net'] = 0;
        $totalPayment['charge'] = 0;
        $totalPayment['amount'] = 0;
        $totalPayment['volume'] = 0;

        $totalTransfer = [];
        $totalTransfer['net'] = 0;
        $totalTransfer['charge'] = 0;
        $totalTransfer['amount'] = 0;
        $totalTransfer['volume'] = 0;

        foreach($settlement as $transaction) {
            Log::info('The transaction: ');
            Log::debug($transaction);
            if(strtolower($transaction->TRANSTYPE)=='payment') {
                foreach($payments as $key=>$payment) {
                    //find the rswitch
                    if($transaction->RSWITCH==$payment['rswitch']) {
                        Log::info('PAYMENT: '.$transaction->RSWITCH.' = '.$payment['rswitch']);
                        $payments[$key]['volume'] += $transaction->TOTVOL;
                        $payments[$key]['amount'] += $transaction->TOTVAL;
                        $payments[$key]['net_amount'] += $transaction->NET;
                        $payments[$key]['charges'] += $transaction->CHARGES;

                        $totalPayment['net'] += $transaction->NET;
                        $totalPayment['charge'] += $transaction->CHARGES;
                        $totalPayment['amount'] += $transaction->TOTVAL;
                        $totalPayment['volume'] += $transaction->TOTVOL;
                    }
                }
            }elseif(strtolower($transaction->TRANSTYPE)=='transfer') {
                foreach($transfers as $key => $transfer) {
                    //find the rswitch
                    if($transaction->RSWITCH==$transfer['rswitch']) {
                        Log::info('TRANSFER: '.$transaction->RSWITCH.' = '.$transfer['rswitch']);
                        $transfers[$key]['volume'] += $transaction->TOTVOL;
                        $transfers[$key]['amount'] += $transaction->TOTVAL;
                        $transfers[$key]['net_amount'] += $transaction->NET;
                        $transfers[$key]['charges'] += $transaction->CHARGES;

                        $totalTransfer['net'] += $transaction->NET;
                        $totalTransfer['charge'] += $transaction->CHARGES;
                        $totalTransfer['amount'] += $transaction->TOTVAL;
                        $totalTransfer['volume'] += $transaction->TOTVOL;
                    }
                }
            }
        }
        Log::info("\n\nRight After Populating Them\n\n");
        Log::info(" Payments"); Log::debug($payments);
        Log::info(" Transfers"); Log::debug($transfers);


        return view('pages.settlement_view')->withUser(Auth::user())
            ->withSettlements($settlement)->withSwitches($totals)
            ->withDate($date)->withDetails($details)
            ->with('totalCharge',$totalCharge)
            ->with('totalNet',$totalNet)
            ->with('payments', $payments)
            ->with('transfers', $transfers)
            ->with('totalPayment',$totalPayment)
            ->with('totalTransfer',$totalTransfer);
    }

    public function getReport(Request $request)
    {
        return $request->all();
        return Transaction::compositeSearch($request);
        $transactionController = new TransactionsController();
        return $transactionController->reportsView($request->date);
	}

	public function getSettlement(Request $request)
    {
        $this->validate($request,[
            'date' => 'bail|max:10'
        ]);

        Log::info('The request params : ');
        Log::debug($request->all());
        $date = explode('/',$request->date);
        $date = Carbon::createFromDate($date[2],$date[0],$date[1]);
        Log::debug($date->toDateString().' 00:00:00');

        //return (new TransactionsController())->settlementView($settlement);
        return redirect()->route('settlement',['date'=>$date->toDateString()]);
    }

    public function fetchTransactions($start, $end)
    {
        $initial    =   Carbon::parse($start)->toDateString();
        $finish     =   Carbon::parse($end)->toDateString();
        return Transaction::fetchTransactions($initial, $finish);
	}

    public function filterTransactionsByValue($parameter, $value)
    {
        if ($parameter === 'fld_039'){
            if ($value === 'success') {
                $value = '000';
            } elseif ($value === 'failed') {
                $value = '100';
            } elseif ($value === 'pending') {
                $value = '101';
            }

            if (Auth::user()->role <> 'master') {
                $transactions = Transaction::where('fld_042', Auth::user()->merchant_id)->where($parameter, $value)->latest('fld_012')->paginate(20);
            } else {
                $transactions = Transaction::where($parameter, $value)->latest('fld_012')->paginate(20);
            }
        } else {
            if (Auth::user()->role <> 'master') {
                $transactions = Transaction::where('fld_042', Auth::user()->merchant_id)->where($parameter, 'LIKE', "%$value%")->latest('fld_012')->paginate(20);
            } else {
                $transactions = Transaction::where($parameter, 'LIKE', "%$value%")->latest('fld_012')->paginate(20);
            }
        }

        return view('pages.transactions', ['user' => Auth::user(), 'transactions' => $transactions]);
	}

    public function getTransactionsCountByMonths()
    {
        return Transaction::getTransactionsCountByMonth();
	}

    public function downloadReport($start, $end)
    {
        return Transaction::downloadReport($start, $end);
	}
}
