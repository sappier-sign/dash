<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function filterAll(Request $request)
    {
        $data = [];
        $dates = explode(' - ', $request->date);

        $data['start'] = $start = $dates[0];
        $data['end'] = $end = $dates[1];
        $data['status'] = $request->status;
        $data['r_switch'] = $request->r_switch;
        $data['processing_code'] = $request->processing_code;
        $data['terminal_id'] = $request->terminal_id;

        $transactions = $this->calculateTransactions(Transaction::compositeSearch($data));
        $user = Auth::user();

        $download_link = "/reports/download/$start/$end/$request->status/$request->r_switch/$request->processing_code/$request->terminal_id";
        return view('pages.report_view', compact('user', 'transactions', 'start' , 'end', 'download_link'));
    }

    private function calculateTransactions($transactions)
    {
        $_transactions = [];
        $mtn_count = $airtel_count = $visa_count = $tigo_count = $gh_link_count = $mastercard_count = $vodafone_count = $successful_count = $failed_count = $mtn_amount = $failed_amount = $successful_amount = $airtel_amount = $visa_amount = $tigo_amount = $gh_link_amount = $mastercard_amount = $total_amount = $vodafone_amount = 0;

        foreach ($transactions as $transaction) {

            array_push($_transactions, [
                'fld_043'     =>  $transaction->fld_043,
                'fld_041'     =>  $transaction->fld_041,
                'fld_011'     =>  $transaction->fld_011,
                'fld_037'     =>  $transaction->fld_037,
                'fld_057'     =>  $transaction->fld_057,
                'fld_002'     =>  $transaction->fld_002,
                'fld_003'     =>  $transaction->fld_003,
                'fld_004'     =>  $transaction->fld_004,
                'fld_012'     =>  $transaction->fld_012,
                'fld_039'     =>  $transaction->fld_039
            ]);

            $total_amount+= (float) Transaction::toFixed($transaction->fld_004);

            if ($transaction->fld_039 === '000') {

                $successful_count++;
                $successful_amount+= (float) Transaction::toFixed($transaction->fld_004);

                if ($transaction->fld_057 === 'MTN'){
                    $mtn_count++;
                    $mtn_amount += Transaction::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'ATL') {
                    $airtel_count++;
                    $airtel_amount+= Transaction::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'TGO') {
                    $tigo_count++;
                    $tigo_amount+= Transaction::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'VIS') {
                    $visa_count++;
                    $visa_amount+= Transaction::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'MAS') {
                    $mastercard_count++;
                    $mastercard_amount+= Transaction::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'GHL') {
                    $gh_link_count++;
                    $gh_link_amount+= Transaction::toFixed($transaction->fld_004);
                } elseif ($transaction->fld_057 === 'VDF') {
                    $vodafone_count++;
                    $vodafone_amount+= Transaction::toFixed($transaction->fld_004);
                }

            } else {
                $failed_count++;
                $failed_amount+= Transaction::toFixed($transaction->fld_004);
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

    public function downloadFilterReport($start, $end, $status, $r_switch, $processing_code, $terminal_id)
    {
        $data = [];
        $data['start'] = $start;
        $data['end'] = $end;
        $data['status'] = $status;
        $data['r_switch'] = $r_switch;
        $data['processing_code'] = $processing_code;
        $data['terminal_id'] = $terminal_id;

        $transactions = Transaction::compositeSearch($data);

        return Transaction::downloadReport($transactions);
    }
}
