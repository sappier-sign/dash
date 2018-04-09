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
                    <span class="hide-menu ">
                                            <a href="" target="_blank"
                                               class="btn btn-info btn-block btn-rounded waves-effect waves-light">Download</a>
                                        </span>
                </div>

            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="row row-in">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-condensed table-hover table-striped">
                                    <thead>
                                    <caption style="caption-side: top; font-weight: bold; font-size: 1.8rem;" align="bottom">TRANSACTIONS SUMMARY</caption>
                                    <tr>
                                        <th col width="250"> R-SWITCH </th>
                                        <th>NO. OF TRANSACTIONS</th>
                                        <th>TOTAL AMOUNT</th>
                                        <th>CHARGES</th>
                                        <th>NET AMOUNT</th>
                                        {{--<th> TOTAL NUMBER OF ITEMS</th>--}}
                                        {{--<th> NET SALES</th>--}}
                                        {{--<th> AVERAGE TICKET</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($switches as $switch)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($switch['image']) }}" style="width: 50px; height: 30px" alt="card Symbol">
                                            {{ $switch['name'] }}
                                        </td>
                                        <td>
                                            {{ $switch['transaction_count'] }}
                                        </td>
                                        <td>
                                            {{ $switch['transaction_amount'] }}
                                        </td>
                                        <td>
                                            {{ $switch['charges'] }}
                                        </td>
                                        <td>
                                            {{ $switch['net_amount'] }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{--<tr>--}}
                                        {{--<td> <img src="{{asset('img/paymentlogos/Visa_Debit_SVG_logo.jpg')}}" style="width: 50px; height: 30px" alt="card Symbol"/>  Visa</td>--}}
                                        {{--<td>Anna</td>--}}
                                        {{--<td>Pitt</td>--}}
                                        {{--<td>35</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>USA</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>USA</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td colspan=""> <img src="{{asset('img/paymentlogos/ame.png')}}" style="width: 50px; height: 30px" alt="card Symbol"/> Amarican Express</td>--}}
                                        {{--<td>Anna</td>--}}
                                        {{--<td>Pitt</td>--}}
                                        {{--<td>35</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>USA</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>USA</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                        {{--<td> <img src="{{asset('img/paymentlogos/MasterCard-Logo.jpg')}}" style="width: 50px; height: 30px" alt="card Symbol"/>  Master</td>--}}
                                        {{--<td>Anna</td>--}}
                                        {{--<td>Pitt</td>--}}
                                        {{--<td>35</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>USA</td>--}}
                                        {{--<td>New York</td>--}}
                                        {{--<td>USA</td>--}}
                                    {{--</tr>--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection