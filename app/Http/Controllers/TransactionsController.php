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
        return view('pages.reports', ['user' => Auth::user()]);
	}

    public function reportsView($date_range)
    {
        $range = explode(' - ', $date_range);
        $transactionController = new TransactionsController();
        $transactions = $transactionController->fetchTransactions($range[0], $range[1]);
        return view('pages.report_view', ['user' => Auth::user(), 'transactions' => $transactions]);
	}

	public function settlementView($settlement = [])
    {
        /*Log::info('Settlements are: ');
        Log::debug($settlement);*/
        $switches = [array('name'=>'MTN','image'=>'img/paymentlogos/mtn.png','fname' => 'MTN'),
            array('name'=>'VDF','image'=>'img/paymentlogos/vodafone.png','fname' => 'Vodafone'),
            array('name'=>'ATL','image'=>'img/paymentlogos/airtel.png','fname' => 'Airtel'),
            array('name'=>'TGO','image'=>'img/paymentlogos/tigo.png','fname' => 'Tigo'),
            array('name'=>'VIS','image'=>'img/paymentlogos/visa.png','fname' => 'Visa'),
            array('name'=>'MAS','image'=>'img/paymentlogos/mastercard.png','fname' => 'Mastercard')
        ];

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

        $switches = ['MTN','VDF','ATL','TGO','VIS','MAS'];

        Log::debug($totals);

        //count the volume of transaction per r-switch
        foreach($settlement as $item) {
            //Log::debug($item);
            //Log::debug($item->RSWITCH);
            if($item->RSWITCH=='VDF'){
                Log::debug($item);
            }
            if(in_array($item->RSWITCH,$switches)) {
                Log::info('Found in R-Switch');
                Log::debug($item->id.' '.$item->RSWITCH);
                $totals[$item->RSWITCH]['count']++;
                $totals[$item->RSWITCH]['transaction_count'] += $item->TOTVOL;
                $totals[$item->RSWITCH]['transaction_amount'] +=(double) $item->TOTVAL;
                $totals[$item->RSWITCH]['charges'] +=(double) $item->CHARGES;
                $totals[$item->RSWITCH]['net_amount'] +=(double) $item->NET;
                //Log::debug($totals[$item->RSWITCH]);
            }
        }

        //Log::debug($totals);
        //Log::info("Transaction count");
        //Log::info(count($settlement));

        return view('pages.settlement_view')->withUser(Auth::user())
            ->withSettlements($settlement)->withSwitches($totals);
    }

    public function getReport(Request $request)
    {
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

        /*$settlement = Settlement::whereDate('datecreated',$date->toDateString().' 00:00:00')->get();*/
        $settlement = Settlement::whereDate('setldate',$date->toDateString())->where('merchid',Auth::user()->merchant_id)->get();

        return (new TransactionsController())->settlementView($settlement);
    }

    public function fetchTransactions($start, $end)
    {
        $initial    =   Carbon::parse($start)->toDateString();
        $finish     =   Carbon::parse($end)->toDateString();
        return Transaction::fetchTransactions($initial, $finish);
	}

    public function filterTransactionsByValue($parameter, $value)
    {
        if (Auth::user()->role <> 'master') {
            $transactions = Transaction::where('fld_042', Auth::user()->merchant_id)->where($parameter, 'LIKE', "%$value%")->latest('fld_012')->paginate(20);
        } else {
            $transactions = Transaction::where($parameter, 'LIKE', "%$value%")->latest('fld_012')->paginate(20);
        }

        return view('pages.transactions', ['user' => Auth::user(), 'transactions' => $transactions]);
	}

    public function getTransactionsCountByMonths()
    {
        return Transaction::getTransactionsCountByMonth();
	}
}
