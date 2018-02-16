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
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="row row-in">
                            <div class="col-lg-4 col-sm-6">
                                <div class="col-in text-center">
                                    <h5 class="text-warning">Total Transactions Today</h5>
                                    <h4><b>GH₵ {{$transactions['total_amount']}}</b></h4>
                                    <h3 class="counter">{{$transactions['total_count']}}</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="col-in text-center b-r-none">
                                    <h5 class="text-success">Successful Transactions</h5>
                                    <h4><b>GH₵ {{$transactions['successful_amount']}}</b></h4>
                                    <h3 class="counter">{{$transactions['successful_count']}}</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="col-in text-center">
                                    <h5 class="text-danger">Failed Transactions</h5>
                                    <h4><b>GH₵ {{$transactions['failed_amount']}}</b></h4>
                                    <h3 class="counter">{{$transactions['failed_count']}}</h3>
                                </div>
                            </div>
                            {{--<div class="col-lg-3 col-sm-6">--}}
                                {{--<div class="col-in text-center b-0">--}}
                                    {{--<h5 class="text-info">Total Transactions</h5>--}}
                                    {{--<h4><b>GH₵ {{$transactions['all_amount']}}</b></h4>--}}
                                    {{--<h3 class="counter">922,231</h3>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>

                        <!-- <div id="bar-example"></div> -->
                        <div id="morris-area-chart"></div>
                    </div>

                </div>

                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="row row-in">
                            <div class="col-lg-2 col-sm-4">
                                <div class="col-in text-center b-0">
                                    <img src="{{asset('img/paymentlogos/Mtnmoney.png')}}" width="90">
                                    <h5><b>GH₵ {{$transactions['mtn_amount']}}</b></h5>
                                    <h4 class="counter">{{$transactions['mtn_count']}}</h4>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="col-in text-center b-0">
                                    <img src="{{asset('img/paymentlogos/airtel-money-logo.png')}}" width="90">
                                    <h5><b>GH₵ {{$transactions['airtel_amount']}}</b></h5>
                                    <h4 class="counter">{{$transactions['airtel_count']}}</h4>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="col-in text-center b-0">
                                    <img src="{{asset('img/paymentlogos/Tigocash.jpg')}}" width="90">
                                    <h5><b>GH₵ {{$transactions['tigo_amount']}}</b></h5>
                                    <h4 class="counter">{{$transactions['tigo_count']}}</h4>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="col-in text-center b-0">
                                    <img src="{{asset('img/paymentlogos/vodafone-cash-ghana.png')}}" width="90">
                                    <h5><b>GH₵ {{$transactions['vodafone_amount']}}</b></h5>
                                    <h4 class="counter">{{$transactions['vodafone_count']}}</h4>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="col-in text-center b-0">
                                    <img src="{{asset('img/paymentlogos/Visa_Debit_SVG_logo.jpg')}}" width="90">
                                    <h5><b>GH₵ {{$transactions['visa_amount']}}</b></h5>
                                    <h4 class="counter">{{$transactions['visa_count']}}</h4>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-4">
                                <div class="col-in text-center b-0">
                                    <img src="{{asset('img/paymentlogos/MasterCard-Logo.jpg')}}" width="90">
                                    <h5><b>GH₵ {{$transactions['mastercard_amount']}}</b></h5>
                                    <h4 class="counter">{{$transactions['mastercard_count']}}</h4>
                                </div>
                            </div>
                            {{--<div class="col-lg-2 col-sm-4">--}}
                                {{--<div class="col-in text-center b-0">--}}
                                    {{--<img src="{{asset('img/paymentlogos/tela.jpg')}}" width="90">--}}
                                    {{--<h5><b>GH₵ 595</b></h5>--}}
                                    {{--<h4 class="counter">54</h4>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-2 col-sm-4">--}}
                                {{--<div class="col-in text-center b-0">--}}
                                    {{--<img src="{{asset('img/paymentlogos/bankdirect.jpg')}}" width="90">--}}
                                    {{--<h5><b>GH₵ 595</b></h5>--}}
                                    {{--<h4 class="counter">54</h4>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-2 col-sm-4">--}}
                                {{--<div class="col-in text-center b-0">--}}
                                    {{--<img src="{{asset('img/paymentlogos/ghlink.jpg')}}" width="90">--}}
                                    {{--<h5><b>GH₵ 595</b></h5>--}}
                                    {{--<h4 class="counter">4</h4>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>

            </div>
            <!-- row -->
            <div class="row">
                {{--<div class="col-md-4 col-xs-12 col-sm-12">--}}
                    {{--<div class="white-box">--}}
                        {{--<h3>Merchant Health</h3>--}}
                        {{--<div id="piechart" style="height: 493px;"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-sm-12">
                    <div class="white-box col-sm-12">
                        <h3>Most Resent Transactions</h3>
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th title="System Trace Audit Number" class="text-center">fld_011</th>
                                    <th title="Reference" class="text-center">fld_037</th>
                                    <th title="Wallet Name" class="text-center">fld_057</th>
                                    <th title="Wallet Number" class="text-center">fld_002</th>
                                    <th title="Transaction Type" class="text-center">fld_003</th>
                                    <th title="Transaction Amount" class="text-center">fld_004</th>
                                    <th title="Transaction Date" class="text-center">fld_012</th>
                                    <th title="Transaction Status" class="text-center">fld_039</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($transactions))
                                @if($transactions['total_count'] == 0)
                                    <tr role="row">
                                        <td colspan="8" class="text-center">No Transactions found!</td>
                                    </tr>
                                @else
                                    @foreach($transactions['transactions'] as $transaction)
                                        <tr role="row" class="">
                                            <td class="text-center">{{$transaction['STAN']}}</td>
                                            <td class="text-center">{{$transaction['TranId']}}</td>
                                            <td class="text-center">{{$transaction['Platform']}}</td>
                                            <td class="text-center">{{$transaction['Acc_Number']}}</td>
                                            <td class="text-center">{{$transaction['TranType']}}</td>
                                            <td class="text-right">{{$transaction['Amount']}}</td>
                                            <td class="text-center">{{$transaction['TransDate']}}</td>
                                            @if ($transaction['Status'] === '000')
                                                <td class="text-center"><label for=""
                                                                               class="label label-success">successful</label>
                                                </td>
                                            @elseif ($transaction['Status'] === '101' || $transaction['Status'] === 'vbv required')
                                                <td class="text-center"><label for=""
                                                                               class="label label-warning">pending</label>
                                                </td>
                                            @elseif ($transaction['Status'] === '100')
                                                <td class="text-center"><label for=""
                                                                               class="label label-danger">failed</label>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            @endif
                            </tbody>
                            <tfoot>
                                <tr role="row">
                                    <th title="System Trace Audit Number" class="text-center">fld_011</th>
                                    <th title="Reference" class="text-center">fld_037</th>
                                    <th title="Wallet Name" class="text-center">fld_057</th>
                                    <th title="Wallet Number" class="text-center">fld_002</th>
                                    <th title="Transaction Type" class="text-center">fld_003</th>
                                    <th title="Transaction Amount" class="text-center">fld_004</th>
                                    <th title="Transaction Date" class="text-center">fld_012</th>
                                    <th title="Transaction Status" class="text-center">fld_039</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    {{--<div class="content-wrapper">--}}
        {{--<!-- Content Header (Page header) -->--}}
        {{--<section class="content-header">--}}
            {{--<h1>--}}
                {{--{{$user->company}}--}}
            {{--</h1>--}}
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>--}}
            {{--</ol>--}}
        {{--</section>--}}
        {{--<!-- Main content -->--}}
        {{--<section class="content">--}}

            {{--<!-- Your Page Content Here -->--}}
            {{--<!-- Small boxes (Stat box) -->--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-3 col-xs-6">--}}
                    {{--<!-- small box -->--}}
                    {{--<div class="small-box bg-yellow">--}}
                        {{--<div class="inner">--}}
                            {{--<h3>{{$transactions['count']}}</h3>--}}
                            {{--<p>Transactions</p>--}}
                        {{--</div>--}}
                        {{--<div class="icon">--}}
                            {{--<i class="ion ion-ios-calendar-outline"></i>--}}
                        {{--</div>--}}
                        {{--<a href="#" class="small-box-footer" data-toggle="modal" data-target="#dashmodal1">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                    {{--</div>--}}
                    {{--<!-- Modal -->--}}
                    {{--<div id="dashmodal1" class="modal fade" role="dialog">--}}
                        {{--<div class="modal-dialog modal-lg">--}}

                            {{--<!-- Modal content-->--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                    {{--<h4 class="modal-title">Modal Header</h4>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    {{--<p>Some text in the modal.</p>--}}
                                {{--</div>--}}
                                {{--<div class="modal-footer">--}}
                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- ./col -->--}}
                {{--<div class="col-lg-3 col-xs-6">--}}
                    {{--<!-- small box -->--}}
                    {{--<div class="small-box bg-light-blue">--}}
                        {{--<div class="inner">--}}
                            {{--<h3>{{$transactions['amount']}}<!--<sup style="font-size: 20px">%</sup>--></h3>@php unset($transactions['amount']) @endphp--}}
                            {{--<p>Amount</p>--}}
                        {{--</div>--}}
                        {{--<div class="icon">--}}
                            {{--<i class="ion ion-arrow-up-b"></i>--}}
                        {{--</div>--}}
                        {{--<a href="#" class="small-box-footer" data-toggle="modal" data-target="#dashmodal2">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                    {{--</div>--}}
                    {{--<!-- Modal -->--}}
                    {{--<div id="dashmodal2" class="modal fade" role="dialog">--}}
                        {{--<div class="modal-dialog modal-lg">--}}

                            {{--<!-- Modal content-->--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                    {{--<h4 class="modal-title">Modal Header</h4>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    {{--<p>Some text in the modal.</p>--}}
                                {{--</div>--}}
                                {{--<div class="modal-footer">--}}
                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- ./col -->--}}
                {{--<div class="col-lg-3 col-xs-6">--}}
                    {{--<!-- small box -->--}}
                    {{--<div class="small-box bg-green">--}}
                        {{--<div class="inner">--}}
                            {{--<h3>{{$transactions['success']}}</h3>@php unset($transactions['success']); @endphp--}}
                            {{--<p>Successful</p>--}}
                        {{--</div>--}}
                        {{--<div class="icon">--}}
                            {{--<i class="ion ion-arrow-down-b"></i>--}}
                        {{--</div>--}}
                        {{--<a href="#" class="small-box-footer" data-toggle="modal" data-target="#dashmodal3">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                    {{--</div>--}}
                    {{--<!-- Modal -->--}}
                    {{--<div id="dashmodal3" class="modal fade" role="dialog">--}}
                        {{--<div class="modal-dialog modal-lg">--}}

                            {{--<!-- Modal content-->--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                    {{--<h4 class="modal-title">Modal Header</h4>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    {{--<p>Some text in the modal.</p>--}}
                                {{--</div>--}}
                                {{--<div class="modal-footer">--}}
                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- ./col -->--}}
                {{--<div class="col-lg-3 col-xs-6">--}}
                    {{--<!-- small box -->--}}
                    {{--<div class="small-box bg-red">--}}
                        {{--<div class="inner">--}}
                            {{--<h3>{{$transactions['failed']}}</h3>@php unset($transactions['failed']); @endphp--}}
                            {{--<p>Failed</p>--}}
                        {{--</div>--}}
                        {{--<div class="icon">--}}
                            {{--<i class="ion ion-ios-time-outline"></i>--}}
                        {{--</div>--}}
                        {{--<a href="#" class="small-box-footer" data-toggle="modal" data-target="#dashmodal4">More info <i class="fa fa-arrow-circle-right"></i></a>--}}
                    {{--</div>--}}
                    {{--<!-- Modal -->--}}
                    {{--<div id="dashmodal4" class="modal fade" role="dialog">--}}
                        {{--<div class="modal-dialog modal-lg">--}}

                            {{--<!-- Modal content-->--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                    {{--<h4 class="modal-title">Modal Header</h4>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                    {{--<p>Some text in the modal.</p>--}}
                                {{--</div>--}}
                                {{--<div class="modal-footer">--}}
                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- ./col -->--}}
            {{--</div>--}}

            {{--<div class="row">--}}
                {{--<div class="col-xs-12">--}}
                    {{--<div class="box">--}}
                        {{--<div class="box-header">--}}
                            {{--<h3 class="box-title">Transactions</h3>--}}
                        {{--</div>--}}
                        {{--<!-- /.box-header -->--}}
                        {{--<div class="box-body">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-12">--}}
                                    {{--<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">--}}
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
                                            {{--@if($transactions['count'] == 0)--}}
                                                {{--<tr role="row">--}}
                                                    {{--<td colspan="8" class="text-center">No Transactions found!</td>--}}
                                                {{--</tr>--}}
                                                {{--@else--}}
                                                    {{--@foreach($transactions as $transaction)--}}
                                                        {{--<tr role="row" class="">--}}
                                                            {{--<td>{{$transaction['fld_011']}}</td>--}}
                                                            {{--<td>{{$transaction['fld_037']}}</td>--}}
                                                            {{--<td class="text-center">{{$transaction['fld_057']}}</td>--}}
                                                            {{--<td>{{$transaction['fld_002']}}</td>--}}
                                                            {{--<td class="text-center">{{$transaction['fld_003']}}</td>--}}
                                                            {{--<td class="text-right">{{$transaction['fld_004']}}</td>--}}
                                                            {{--<td class="text-center">{{$transaction['fld_012']}}</td>--}}
                                                            {{--<td class="text-center">{{$transaction['fld_039']}}</td>--}}
                                                        {{--</tr>--}}
                                                    {{--@endforeach--}}
                                            {{--@endif--}}
                                        {{--@endif--}}
                                        {{--</tbody>--}}
                                        {{--<tfoot>--}}
                                        {{--<tr>--}}
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
                        {{--<!-- /.box-body -->--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</section>--}}
        {{--<!-- /.content -->--}}
    {{--</div>--}}
@endsection