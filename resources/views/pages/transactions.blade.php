@extends('layouts.master')
@section('content')


    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- <div class="white-box"> -->
                    <div class="table-responsive col-md-12 white-box">
                        <div class="col-sm-12 col-md-8 col-lg-8 white-box">
                            <h3>Transactions</h3>
                        </div>

                        <div class='col-md-4'>
                            <form class="form-horizontal row" method="post" action="{{url('transactions/filter')}}">
                                {{csrf_field()}}
                                <div class="col-sm-12">
                                    <div class="col-sm-12 col-md-6">
                                        <select name="parameter" id="" class="form-control" required>
                                            <option value="" disabled selected>Select parameter</option>
                                            <option value="fld_037">fld_037</option>
                                            <option value="fld_057">fld_057</option>
                                            <option value="fld_002">fld_002</option>
                                            <option value="fld_012">fld_012</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class='input-group date' id='datetimepicker6'>
                                            <input type='text' name="value" placeholder="search" class="form-control" required>
                                            <span class="input-group-addon">
                    <button type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <table class="table table-striped table-bordered table-responsive nowrap">
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
                                @if(count($transactions) === 0)
                                    <tr role="row">
                                        <td colspan="8" class="text-center">No Transactions found!</td>
                                    </tr>
                                @else
                                    @foreach($transactions as $transaction)
                                        <tr role="row" class="">
                                            <td class="text-center">{{$transaction['fld_011']}}</td>
                                            <td class="text-center">{{$transaction['fld_037']}}</td>
                                            <td class="text-center">{{$transaction['fld_057']}}</td>
                                            <td class="text-center">{{$transaction['fld_002']}}</td>
                                            <td class="text-center">{{$transaction['fld_003']}}</td>
                                            <td class="text-right">{{$transaction['fld_004']}}</td>
                                            <td class="text-center">{{$transaction['fld_012']}}</td>
                                            @if ($transaction['fld_039'] === '000')
                                                <td class="text-center"><label for=""
                                                                               class="label label-success">success</label>
                                                </td>
                                            @elseif ($transaction['fld_039'] === '101')
                                                <td class="text-center"><label for=""
                                                                               class="label label-warning">pending</label>
                                                </td>
                                            @else
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
                        {{$transactions->links()}}
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection