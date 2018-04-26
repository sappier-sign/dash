<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestTransaction;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getReport(Request $request)
    {
        return $request->all();
        return Transaction::compositeSearch($request);
        $transactionController = new TransactionsController();
        return $transactionController->reportsView($request->date);
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
