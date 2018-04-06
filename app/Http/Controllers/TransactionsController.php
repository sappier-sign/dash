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
        return view('pages.settlement_view')->withUser(Auth::user())
            ->withSettlements($settlement);
    }

    public function getReport(Request $request)
    {
        $transactionController = new TransactionsController();
        return $transactionController->reportsView($request->date);
	}

	public function getSettlement(Request $request)
    {
        $settlement = Settlement::all();
        Log::info('All settlement');
        Log::debug($settlement);
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
