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
                        </div>
                    </div>
                </div>

            </div>
            <!-- row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box col-sm-12">
                        <h3>Most Recent Transactions</h3>
                        <table id="example1" class="table table-bordered table-striped dataTable" role="grid"
                               aria-describedby="example1_info">
                            <thead>
                            <tr role="row">
                                @if( $user->role === 'master' )
                                    <th title="Merchant" class="text-center">Merchant</th>

                                @endif
                                @if( $user->terminals->count())
                                    <th title="Terminals" class="text-center">Terminal Id</th>
                                @endif

                                @if( $user->terminals->count())
                                    <th title="Terminals" class="text-center">Terminal Id</th>
                                @endif

                                <th title="System Trace Audit Number" class="text-center">Stan</th>
                                <th title="Reference" class="text-center">Transaction Id</th>
                                <th title="Wallet Name" class="text-center">R Switch</th>
                                <th title="Wallet Number" class="text-center">Wallet Number</th>
                                <th title="Transaction Type" class="text-center">Process Code</th>
                                <th title="Transaction Amount" class="text-center">Amount</th>
                                <th title="Transaction Date" class="text-center">Date</th>
                                <th title="Transaction Status" class="text-center">Status</th>
                                <th title="Transaction Reason" class="text-center">Reason</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($transactions))
                                @if($transactions['total_count'] == 0)
                                    <tr role="row">
                                        <td colspan="9" class="text-center">No Transactions found!</td>
                                    </tr>
                                @else
                                    @foreach($transactions['transactions'] as $transaction)
                                        <tr role="row" class="">
                                            @if( $user->role === 'master' )
                                                <td class="text-center">{{$transaction['Merchant']}}</td>
                                            @endif
                                            @if( $user->terminals->count() )
                                                <td class="text-center">{{ $transaction['Terminal'] ?? __('n/a')}}</td>
                                            @endif
                                            <td class="text-center">{{$transaction['STAN']}}</td>
                                            <td class="text-center">{{$transaction['TranId']}}</td>
                                            <td class="text-center">{{$transaction['Platform']}}</td>
                                            <td class="text-center">
                                                @if($transaction['TranType'] === '404000' && $transaction['user_acc'])
                                                    {{ $transaction['user_acc'] }}
                                                @else
                                                    {{ $transaction['Acc_Number'] }}
                                                @endif
                                            </td>
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
                                                <td>{{$transaction['Reason']}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endif
                            </tbody>
                            <tfoot>
                            <tr role="row">
                                @if( $user->role === 'master' )
                                    <th title="Merchant" class="text-center">Merchant</th>
                                @endif
                                @if( $user->terminals->count())
                                    <th title="Terminals" class="text-center">Terminal Id</th>
                                @endif
                                <th title="System Trace Audit Number" class="text-center">Stan</th>
                                <th title="Reference" class="text-center">Transaction Id</th>
                                <th title="Wallet Name" class="text-center">R Switch</th>
                                <th title="Wallet Number" class="text-center">Wallet Number</th>
                                <th title="Transaction Type" class="text-center">Process Code</th>
                                <th title="Transaction Amount" class="text-center">Amount</th>
                                <th title="Transaction Date" class="text-center">Date</th>
                                <th title="Transaction Status" class="text-center">Status</th>
                                <th title="Transaction Reason" class="text-center">Reason</th>
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
@endsection