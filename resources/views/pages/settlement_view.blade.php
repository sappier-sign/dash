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
                                        <caption style="caption-side: top; font-weight: bold; font-size: 1.8rem;" align="bottom">SETTLEMENTS SUMMARY  FOR {{ $date->toFormattedDateString() }}</caption>
                                        <tr style="text-align: center">
                                            <th width="250"> R-SWITCH </th>
                                            <th width="150">NO. OF TRANSACTIONS</th>
                                            <th>TOTAL AMOUNT</th>
                                            <th>CHARGES</th>
                                            <th>NET AMOUNT</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($switches as $switch)
                                        <tr style="text-align: right">
                                            <td style="text-align: left">
                                                <img src="{{ asset($switch['image']) }}" style="width: 50px; height: 30px" alt="card Symbol">
                                                <b>{{ $switch['name'] }}</b>
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="white-box">
                        <div class="row row-in">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="table-responsive">
                                    <!-- 2nd Table added -->

                                    <table class="table table-condensed table-hover table-striped">
                                        <thead>
                                        <caption style="caption-side: top; font-weight: bold; font-size: 1.8rem;" align="bottom">SETTLEMENT DETAILS</caption>
                                        <tr>
                                            <th width="250">R-SWITCH</th>
                                            <th>NO. TRANSACTIONS</th>
                                            <th>TYPE</th>
                                            <th>TOTAL AMOUNT</th>
                                            <th>NET AMOUNT</th>
                                            {{--<th> TOTAL NUMBER <br />--}}
                                                {{--OF ITEMS</th>--}}
                                            {{--<th> NET SALES</th>--}}
                                            {{--<th> AVERAGE TICKET</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($details as $detail)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($detail['image']) }}" style="width: 50px; height: 30px" alt="card Symbol">
                                                    <b>{{ $detail['name'] }}</b>
                                                </td>
                                                <td>{{ $detail['volume'] }}</td>
                                                <td>{{ $detail['type'] }}</td>
                                                <td>{{ $detail['amount'] }}</td>
                                                <td>{{ $detail['net_amount'] }}</td>
                                            </tr>
                                        @endforeach
                                        {{--<tr>--}}
                                            {{--<td> <img src="{{asset('img/paymentlogos/Visa_Debit_SVG_logo.jpg')}}" style="width: 50px; height: 30px" alt="card Symbol"/>MASTERCARD</td>--}}
                                            {{--<td align="right">955</td>--}}
                                            {{--<td align="right">$ 29,494.22</td>--}}
                                            {{--<td align="right">35</td>--}}
                                            {{--<td align="right">0.0</td>--}}
                                            {{--<td align="right">976</td>--}}
                                            {{--<td align="right">$ 29,406.2</td>--}}
                                            {{--<td align="right">$ 30.73</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td colspan=""> <img src="{{asset('img/paymentlogos/ame.png')}}" style="width: 50px; height: 30px" alt="card Symbol"/> VISA</td>--}}
                                            {{--<td align="right">625</td>--}}
                                            {{--<td align="right">$ 20,940.13</td>--}}
                                            {{--<td align="right">35</td>--}}
                                            {{--<td align="right">0.0</td>--}}
                                            {{--<td align="right">976</td>--}}
                                            {{--<td align="right">$ 29,406.2</td>--}}
                                            {{--<td align="right">$ 30.73</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td><img src="{{asset('img/paymentlogos/MasterCard-Logo.jpg')}}" style="width: 50px; height: 30px" alt="card Symbol"/> DISCOVER</td>--}}
                                            {{--<td align="right">54</td>--}}
                                            {{--<td align="right">$1,807.27</td>--}}
                                            {{--<td align="right">&nbsp;</td>--}}
                                            {{--<td align="right">0.0</td>--}}
                                            {{--<td align="right">976</td>--}}
                                            {{--<td align="right">$ 29,406.2</td>--}}
                                            {{--<td align="right">$ 30.73</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td><img src="{{asset('img/paymentlogos/MasterCard-Logo.jpg')}}" style="width: 50px; height: 30px" alt="card Symbol"/> AMERICAN EXPRESS</td>--}}
                                            {{--<td align="right">625</td>--}}
                                            {{--<td align="right">$142,040.19</td>--}}
                                            {{--<td align="right">&nbsp;</td>--}}
                                            {{--<td align="right">0.0</td>--}}
                                            {{--<td align="right">976</td>--}}
                                            {{--<td align="right">$ 29,406.2</td>--}}
                                            {{--<td align="right">$ 30.73</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td> <img src="{{asset('img/paymentlogos/MasterCard-Logo.jpg')}}" style="width: 50px; height: 30px" alt="card Symbol"/> JCB</td>--}}
                                            {{--<td align="right">625</td>--}}
                                            {{--<td align="right">$142,040.19</td>--}}
                                            {{--<td align="right">&nbsp;</td>--}}
                                            {{--<td align="right">0.0</td>--}}
                                            {{--<td align="right">976</td>--}}
                                            {{--<td align="right">$ 29,406.2</td>--}}
                                            {{--<td align="right">$ 30.73</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td><img src="{{asset('img/paymentlogos/MasterCard-Logo.jpg')}}" style="width: 50px; height: 30px" alt="card Symbol"/> DEBIT</td>--}}
                                            {{--<td align="right">625</td>--}}
                                            {{--<td align="right">$142,040.19</td>--}}
                                            {{--<td align="right">&nbsp;</td>--}}
                                            {{--<td align="right">0.0</td>--}}
                                            {{--<td align="right">976</td>--}}
                                            {{--<td align="right">$ 29,406.2</td>--}}
                                            {{--<td align="right">$ 30.73</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td><strong>Totals</strong></td>--}}
                                            {{--<td align="right">625</td>--}}
                                            {{--<td align="right">$142,040.19</td>--}}
                                            {{--<td align="right">&nbsp;</td>--}}
                                            {{--<td align="right">0.0</td>--}}
                                            {{--<td align="right">976</td>--}}
                                            {{--<td align="right">$ 29,406.2</td>--}}
                                            {{--<td align="right">$ 30.73</td>--}}
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