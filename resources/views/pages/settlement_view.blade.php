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
            <!-- row -->
            <div class="row">
                <div class="center p-20 col-md-2 pull-right">
                    <input type="hidden" name="date_range" value="{{ session('date_range') ?? '' }}">
                    <span class="hide-menu " style="display: none">
                                            <a href="" target="_blank"
                                               class="btn btn-info btn-block btn-rounded waves-effect waves-light">Download</a>
                                        </span>
                </div>

                    
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box" style="text-align: center">
                        <span style="caption-side: top; font-weight: bolder; font-size: 2rem; ">SETTLEMENTS REPORT SUMMARY  FOR {{ $date->toFormattedDateString() }}</span>
                        <div class="bluebox" style="margin-top:2rem;">
                            <div class="col-lg-3 col-md-3">
                                Volume
                                <span style="font-size: 2.5rem; color: #444; display: block;">{{ $totalTransfer['volume'] + $totalPayment['volume'] }}</span>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                Amount
                                <span style="font-size: 2.5rem; color: #444; display: block;">GHS {{ $totalTransfer['amount'] + $totalPayment['amount'] }}</span>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                Charges
                                <span style="font-size: 2.5rem; color: #444; display: block;">GHS {{ $totalTransfer['charge'] + $totalPayment['charge'] }}</span>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                Net
                                <span style="font-size: 2.5rem; color: #444; display: block;">GHS {{ $totalTransfer['net'] + $totalPayment['net'] }}</span>
                            </div>
                        </div>
                        <div class="row row-in">
                            <div class="col-lg-6 col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-hover table-striped">
                                        <thead>
                                        <caption style="caption-side: top; font-weight: bold; font-size: 2rem; padding-top:2rem;" align="bottom">Purchase</caption>
                                        <tr style="text-align: center; text-transform: uppercase">
                                            <th width="100"> R-SWITCH </th>
                                            <th width="100">Volume</th>
                                            <th>AMOUNT</th>
                                            <th>CHARGES</th>
                                            <th>NET</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($payments as $detail)
                                            @if(strtolower($detail['type'])=='payment')
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset($detail['image']) }}" style="width: 50px; height: 30px" alt="card Symbol">
                                                        <b style="display: block;">{{ $detail['name'] }}</b>
                                                    </td>
                                                    <td style="text-align: center">{{ $detail['volume'] }}</td>
                                                    {{--<td>{{ $detail['type'] }}</td>--}}
                                                    <td style="text-align: center">{{ $detail['amount'] }}</td>
                                                    <td style="text-align: center">{{ $detail['charges'] }}</td>
                                                    <td style="text-align: center">{{ $detail['net_amount'] }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr style="text-align: ; font-size: 1.36rem; font-weight: 700;">
                                            <td>
                                                <span style="">Totals</span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"> {{ $totalPayment['volume'] }}</span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"> {{ $totalPayment['amount'] }}</span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"> {{ $totalPayment['charge'] }}</span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;">{{ $totalPayment['net'] }}</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-hover table-striped">
                                        <thead>
                                        <caption style="caption-side: top; font-weight: bold; font-size: 2rem; padding-top:2rem;" align="bottom">Transfer</caption>
                                        <tr style="text-align: center; text-transform: uppercase">
                                            <th width="100"> R-SWITCH </th>
                                            <th width="100">Volume</th>
                                            <th>AMOUNT</th>
                                            <th>CHARGES</th>
                                            <th>NET</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transfers as $detail)
                                            @if(strtolower($detail['type'])=='transfer')
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset($detail['image']) }}" style="width: 50px; height: 30px" alt="card Symbol">
                                                        <b style="display: block;">{{ $detail['name'] }}</b>
                                                    </td>
                                                    <td style="text-align: center">{{ $detail['volume'] }}</td>
                                                    <td style="text-align: center">{{ $detail['amount'] }}</td>
                                                    <td style="text-align: center">{{ $detail['charges'] }}</td>
                                                    <td style="text-align: center">{{ $detail['net_amount'] }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        <tr style="text-align: center; font-size: 1.36rem; font-weight: 700;">
                                            <td>
                                                <span style="">Totals</span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"> {{ $totalTransfer['volume'] }}</span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"> {{ $totalTransfer['amount'] }}</span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;"> {{ $totalTransfer['charge'] }}</span>
                                            </td>
                                            <td style="">
                                                <span style="margin-left: 1.1rem !important; display: block;">{{ $totalTransfer['net'] }}</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12">--}}
                                {{--<div class="table-responsive">--}}
                                    {{--<table class="table table-condensed table-hover table-striped">--}}
                                        {{--<thead>--}}
                                        {{--<caption style="caption-side: top; font-weight: bold; font-size: 1.8rem;" align="bottom">SETTLEMENTS SUMMARY  FOR {{ $date->toFormattedDateString() }}</caption>--}}
                                        {{--<tr style="text-align: center">--}}
                                            {{--<th width="200"> R-SWITCH </th>--}}
                                            {{--<th width="200">NO. OF TRANSACTIONS</th>--}}
                                            {{--<th>TOTAL AMOUNT</th>--}}
                                          {{--<th>CHARGES</th>--}}
                                            {{--<th>NET AMOUNT</th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--@foreach($switches as $switch)--}}
                                        {{--<tr style="text-align: center">--}}
                                            {{--<td style="text-align: left">--}}
                                                {{--<img src="{{ asset($switch['image']) }}" style="width: 50px; height: 30px" alt="card Symbol">--}}
                                                {{--<b>{{ $switch['name'] }}</b>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<span style="margin-left: 2rem !important; display: block;">{{ $switch['transaction_count'] }}</span>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--{{ $switch['transaction_amount'] }}--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--{{ $switch['charges'] }}--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--{{ $switch['net_amount'] }}--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--@endforeach--}}
                                        {{--<tr style="text-align: left; font-size: 1.8rem; font-weight: 700;">--}}
                                            {{--<td>--}}
                                                {{--<span style="">Totals</span>--}}
                                            {{--</td>--}}
                                            {{--<td></td>--}}
                                            {{--<td style="text-align: left" colspan="2">--}}

                                            {{--</td>--}}
                                            {{--<td style="">--}}
                                                {{--<span style="margin-left: 4.7rem !important; display: block;"> {{ $totalCharge }}</span>--}}
                                            {{--</td>--}}
                                            {{--<td style="">--}}
                                                {{--<span style="margin-left: 4.4rem !important; display: block;">{{ $totalNet }}</span>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>

                {{--<div class="col-md-12 col-lg-12 col-sm-12">--}}
                    {{--<div class="white-box">--}}
                        {{--<div class="row row-in">--}}
                            {{--<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12">--}}
                                {{--<div class="table-responsive">--}}
                                    {{--<!-- 2nd Table added -->--}}

                                    {{--<table class="table table-condensed table-hover table-striped">--}}
                                        {{--<thead>--}}
                                        {{--<caption style="caption-side: top; font-weight: bold; font-size: 1.8rem;" align="bottom">SETTLEMENT DETAILS</caption>--}}
                                        {{--<tr>--}}
                                            {{--<th width="200">R-SWITCH</th>--}}
                                            {{--<th>NO. OF TRANSACTIONS</th>--}}
                                            {{--<th>TYPE</th>--}}
                                            {{--<th>TOTAL AMOUNT</th>--}}
                                            {{--<th>NET AMOUNT</th>--}}
                                        {{--</tr>--}}
                                        {{--</thead>--}}
                                        {{--<tbody>--}}
                                        {{--@foreach($details as $detail)--}}
                                            {{--<tr>--}}
                                                {{--<td>--}}
                                                    {{--<img src="{{ asset($detail['image']) }}" style="width: 50px; height: 30px" alt="card Symbol">--}}
                                                    {{--<b>{{ $detail['name'] }}</b>--}}
                                                {{--</td>--}}
                                                {{--<td style="text-align: center">{{ $detail['volume'] }}</td>--}}
                                                {{--<td>{{ $detail['type'] }}</td>--}}
                                                {{--<td style="text-align: center">{{ $detail['amount'] }}</td>--}}
                                                {{--<td style="text-align: center">{{ $detail['net_amount'] }}</td>--}}
                                            {{--</tr>--}}
                                        {{--@endforeach--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>
        </div>
    </div>

@endsection
@push('styles')
    <style>
        .bluebox {
            width: 100%;
            color: #fefefe;
            background-color: #03a9f4;
            height: 9rem;
            text-align: center;
            padding: 1rem;
            font-weight: 700;
        }
    </style>
@endpush