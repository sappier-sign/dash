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
                            <h3>Terminals</h3>
                        </div>

                        <table class="table table-striped table-bordered table-responsive">
                            <thead>
                            <tr role="row">
                                <th title="System Trace Audit Number" class="text-center">Terminal ID</th>
                                <th title="Reference" class="text-center">IMEI</th>
                                <th title="Wallet Name" class="text-center">Signed Up</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($terminals))
                                @if(count($terminals) === 0)
                                    <tr role="row">
                                        <td colspan="8" class="text-center">No Terminals found!</td>
                                    </tr>
                                @else
                                    @foreach($terminals as $terminal)
                                        <tr role="row" class="">
                                            <td class="text-center">{{$terminal['t_id']}}</td>
                                            <td class="text-center">{{($terminal['imei'])? $terminal['imei'] : 'N/A'}}</td>
                                            @if ($terminal['signed_up'] == '1')
                                                <td class="text-center"><label for=""
                                                                               class="label label-success">success</label>
                                                </td>
                                            @else
                                                <td class="text-center"><label for=""
                                                                               class="label label-warning">pending</label>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            @endif
                            </tbody>
                            <tfoot>
                            <tr role="row">
                                <th title="System Trace Audit Number" class="text-center">Terminal ID</th>
                                <th title="Reference" class="text-center">IMEI</th>
                                <th title="Wallet Name" class="text-center">Signed Up</th>
                            </tr>
                            </tfoot>
                        </table>
                        {{$terminals->links()}}
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection