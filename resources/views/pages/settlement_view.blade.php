@extends('layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-12">
                    <!-- <h4 class="page-title">Welcome to My Admin</h4>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                    </ol> -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="row row-in">
                        <div class="col-lg-6 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-condensed table-hover table-striped">
                                    <thead>
                                    <caption style="caption-side: top;" align="bottom"> CARD TYPE SUMMARY</caption>
                                    <tr>
                                        <th col width="250"> CARD TYPE </th>
                                        <th>  NUMBER OF SALES</th>
                                        <th> SALES</th>
                                        <th> NUMBER OF CREDIT</th>
                                        <th>CREDIT</th>
                                        <th> TOTAL NUMBER OF ITEMS</th>
                                        <th> NET SALES</th>
                                        <th> AVERAGE TICKET</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td> <img src="{{asset('img/paymentlogos/Visa_Debit_SVG_logo.jpg')}}" style="width: 50px; height: 30px" alt="card Symbol"/>  Visa</td>
                                        <td>Anna</td>
                                        <td>Pitt</td>
                                        <td>35</td>
                                        <td>New York</td>
                                        <td>USA</td>
                                        <td>New York</td>
                                        <td>USA</td>
                                    </tr>
                                    <tr>
                                        <td colspan=""> <img src="{{asset('img/paymentlogos/ame.png')}}" style="width: 50px; height: 30px" alt="card Symbol"/> Amarican Express</td>
                                        <td>Anna</td>
                                        <td>Pitt</td>
                                        <td>35</td>
                                        <td>New York</td>
                                        <td>USA</td>
                                        <td>New York</td>
                                        <td>USA</td>
                                    </tr>
                                    <tr>
                                        <td> <img src="{{asset('img/paymentlogos/MasterCard-Logo.jpg')}}" style="width: 50px; height: 30px" alt="card Symbol"/>  Master</td>
                                        <td>Anna</td>
                                        <td>Pitt</td>
                                        <td>35</td>
                                        <td>New York</td>
                                        <td>USA</td>
                                        <td>New York</td>
                                        <td>USA</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--<!-- /.row -->--}}
            {{--<div class="row">--}}
                {{--<div class="center p-20 col-md-2 pull-right">--}}
                    {{--<input type="hidden" name="date_range" value="{{ session('date_range') ?? '' }}">--}}
                    {{--<span class="hide-menu ">--}}
                                            {{--<a href="#" target="_blank"--}}
                                               {{--class="btn btn-info btn-block btn-rounded waves-effect waves-light">Download</a>--}}
                                        {{--</span>--}}
                {{--</div>--}}
                {{--<div class="col-md-12 col-lg-12 col-sm-12">--}}
                    {{--<div class="white-box">--}}
                        {{--<div class="row row-in">--}}
                            {{--<div class="col-lg-6 col-sm-12">--}}
                                {{--<div class="">--}}
                                    {{--<h4 class="underline">--}}
                                        {{--<b>Merchant Details</b>--}}
                                    {{--</h4>--}}
                                    {{--<h5>--}}
                                        {{--<b>Merchant Name:</b> {{$user['company']}}</h5>--}}
                                    {{--<h5>--}}
                                        {{--<b>Merchant ID:</b> {{$user['merchant_id']}}</h5>--}}

                                    {{--<!-- <h5><b>Location</b> Accra, Ghana</h5> -->--}}
                                    {{--<!-- <h3 class="counter">552,123</h3> -->--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-6 col-sm-12">--}}
                                {{--<div class="">--}}
                                    {{--<h4 class="">--}}
                                        {{--<b>Address</b>--}}
                                    {{--</h4>--}}
                                    {{--<h5> {{$user['address']}}</h5>--}}
                                    {{--<h5>--}}
                                        {{--<b>Date:</b> 17th September 2017 - 17th October 2017</h5>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- row -->--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-4 col-xs-12 col-sm-12">--}}
                {{--<div class="white-box">--}}
                {{--<!-- <h3>Merchant Health</h3> -->--}}
                {{--<div id="piechart" style="height: 493px;"></div>--}}

                {{--</div>--}}
                {{--</div>--}}

                {{--</div>--}}

            {{--</div>--}}
            {{--<div class="col-md-12 col-xs-12 col-sm-12">--}}
                {{--<div class="white-box">--}}
                    {{--<h3>Transactions</h3>--}}

                    {{--<div class="row">--}}
                        {{--<div class="col-lg-4 col-sm-4">--}}
                            {{--<div class="col-in text-center b-0">--}}
                                {{--<img src="{{asset('img/paymentlogos/Mtnmoney.png')}}" width="90">--}}
                                {{--<h5>--}}
                                    {{--<b>GH₵ {{$transactions['mtn_amount']}}</b>--}}
                                {{--</h5>--}}
                                {{--<h4 class="counter">{{$transactions['mtn_count']}}</h4>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-4 col-sm-4">--}}
                            {{--<div class="col-in text-center b-0">--}}
                                {{--<img src="{{asset('img/paymentlogos/airtel-money-logo.png')}}" width="90">--}}
                                {{--<h5>--}}
                                    {{--<b>GH₵ {{$transactions['airtel_amount']}}</b>--}}
                                {{--</h5>--}}
                                {{--<h4 class="counter">{{$transactions['airtel_count']}}</h4>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-4 col-sm-4">--}}
                            {{--<div class="col-in text-center b-0">--}}
                                {{--<img src="{{asset('img/paymentlogos/Tigocash.jpg')}}" width="90">--}}
                                {{--<h5>--}}
                                    {{--<b>GH₵ {{$transactions['tigo_amount']}}</b>--}}
                                {{--</h5>--}}
                                {{--<h4 class="counter">{{$transactions['tigo_count']}}</h4>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-4 col-sm-4">--}}
                            {{--<div class="col-in text-center b-0">--}}
                                {{--<img src="{{asset('img/paymentlogos/vodafone-cash-ghana.png')}}" width="90">--}}
                                {{--<h5>--}}
                                    {{--<b>GH₵ {{$transactions['vodafone_amount']}}</b>--}}
                                {{--</h5>--}}
                                {{--<h4 class="counter">{{$transactions['vodafone_count']}}</h4>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-4 col-sm-4">--}}
                            {{--<div class="col-in text-center b-0">--}}
                                {{--<img src="{{asset('img/paymentlogos/Visa_Debit_SVG_logo.jpg')}}" width="90">--}}
                                {{--<h5>--}}
                                    {{--<b>GH₵ {{$transactions['visa_amount']}}</b>--}}
                                {{--</h5>--}}
                                {{--<h4 class="counter">{{$transactions['visa_count']}}</h4>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-4 col-sm-4">--}}
                            {{--<div class="col-in text-center b-0">--}}
                                {{--<img src="{{asset('img/paymentlogos/MasterCard-Logo.jpg')}}" width="90">--}}
                                {{--<h5>--}}
                                    {{--<b>GH₵ {{$transactions['mastercard_amount']}}</b>--}}
                                {{--</h5>--}}
                                {{--<h4 class="counter">{{$transactions['mastercard_count']}}</h4>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-4 col-sm-4">--}}
                        {{--<div class="col-in text-center b-0">--}}
                        {{--<img src="{{asset('img/paymentlogos/Tela.jpg')}}" width="90">--}}
                        {{--<h5>--}}
                        {{--<b>GH₵ 95</b>--}}
                        {{--</h5>--}}
                        {{--<h4 class="counter">3</h4>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-4 col-sm-4">--}}
                        {{--<div class="col-in text-center b-0">--}}
                        {{--<img src="{{asset('img/paymentlogos/Bankdirect.jpg')}}" width="90">--}}
                        {{--<h5>--}}
                        {{--<b>GH₵ 595</b>--}}
                        {{--</h5>--}}
                        {{--<h4 class="counter">5</h4>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-4 col-sm-4">--}}
                        {{--<div class="col-in text-center b-0">--}}
                        {{--<img src="{{asset('img/paymentlogos/ghlink.jpg')}}" width="90">--}}
                        {{--<h5>--}}
                        {{--<b>GH₵ 595</b>--}}
                        {{--</h5>--}}
                        {{--<h4 class="counter">5</h4>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-md-12 col-xs-12 col-sm-12">--}}
                    {{--<div class="white-box">--}}
                        {{--<h3>Transactions</h3>--}}
                        {{--<table id="example"--}}
                               {{--class="table table-striped table-bordered dataTable sorting_asc dt-responsive nowrap">--}}
                            {{--<thead>--}}
                            {{--<tr role="row">--}}
                                {{--<th title="System Trace Audit Number" class="text-center">fld_011</th>--}}
                                {{--<th title="Reference" class="text-center">fld_037</th>--}}
                                {{--<th title="Wallet Name" class="text-center">fld_057</th>--}}
                                {{--<th title="Wallet Number" class="text-center">fld_002</th>--}}
                                {{--<th title="Transaction Type" class="text-center">fld_003</th>--}}
                                {{--<th title="Transaction Amount" class="text-center">fld_004</th>--}}
                                {{--<th title="Transaction Date" class="text-center">fld_012</th>--}}
                                {{--<th title="Transaction Status" class="text-center">fld_039</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@if(isset($transactions))--}}
                                {{--@if(count($transactions) === 0)--}}
                                    {{--<tr role="row">--}}
                                        {{--<td colspan="8" class="text-center">No Transactions found!</td>--}}
                                    {{--</tr>--}}
                                {{--@else--}}
                                    {{--@foreach($transactions['transactions'] as $transaction)--}}
                                        {{--<tr role="row" class="">--}}
                                            {{--<td class="text-center">{{$transaction['fld_011']}}</td>--}}
                                            {{--<td class="text-center">{{$transaction['fld_037']}}</td>--}}
                                            {{--<td class="text-center">{{$transaction['fld_057']}}</td>--}}
                                            {{--<td class="text-center">--}}
                                                {{--@if($transaction['fld_003'] === '404000')--}}
                                                    {{--{{ $transaction['user']['acc_number'] }}--}}
                                                {{--@else--}}
                                                    {{--{{ $transaction['fld_002'] }}--}}
                                                {{--@endif--}}
                                            {{--</td>--}}
                                            {{--<td class="text-center">{{$transaction['fld_003']}}</td>--}}
                                            {{--<td class="text-right">{{$transaction['fld_004']}}</td>--}}
                                            {{--<td class="text-center">{{$transaction['fld_012']}}</td>--}}
                                            {{--@if ($transaction['fld_039'] === '000')--}}
                                                {{--<td class="text-center"><label for=""--}}
                                                                               {{--class="label label-success">success</label>--}}
                                                {{--</td>--}}
                                            {{--@elseif ($transaction['fld_039'] === '101')--}}
                                                {{--<td class="text-center"><label for=""--}}
                                                                               {{--class="label label-warning">pending</label>--}}
                                                {{--</td>--}}
                                            {{--@else--}}
                                                {{--<td class="text-center"><label for=""--}}
                                                                               {{--class="label label-danger">failed</label>--}}
                                                {{--</td>--}}
                                            {{--@endif--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                            {{--@endif--}}
                            {{--</tbody>--}}
                            {{--<tfoot>--}}
                            {{--<tr role="row">--}}
                                {{--<th title="System Trace Audit Number" class="text-center">fld_011</th>--}}
                                {{--<th title="Reference" class="text-center">fld_037</th>--}}
                                {{--<th title="Wallet Name" class="text-center">fld_057</th>--}}
                                {{--<th title="Wallet Number" class="text-center">fld_002</th>--}}
                                {{--<th title="Transaction Type" class="text-center">fld_003</th>--}}
                                {{--<th title="Transaction Amount" class="text-center">fld_004</th>--}}
                                {{--<th title="Transaction Date" class="text-center">fld_012</th>--}}
                                {{--<th title="Transaction Status" class="text-center">fld_039</th>--}}
                            {{--</tr>--}}
                            {{--</tfoot>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
@endsection