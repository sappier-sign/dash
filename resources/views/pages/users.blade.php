@extends('layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3>Merchants <span class="hide-menu col-md-2 pull-right"><a href="{{url('merchants/create')}}" class="btn btn-info btn-block btn-rounded waves-effect waves-light">Add Merchant</a></span></h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                <tr role="row">
                                    <th>Company Name</th>
                                    <th>API User</th>
                                    <th class="">Merchant ID</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($merchants))
                                    @if(count($merchants) === 0)
                                        <tr role="row">
                                            <td colspan="7" class="text-center">No Users Found!</td>
                                        </tr>
                                    @else
                                        @foreach($merchants as $merchant)
                                            <tr role="row" class="">
                                                <td>{{$merchant['company']}}</td>
                                                <td>{{$merchant['apiuser']}}</td>
                                                <td>{{$merchant['merchant_id']}}</td>
                                                <td>{{$merchant['email']}}</td>
                                                <td>{{$merchant['contact']}}</td>
                                                <td>{{$merchant['address']}}</td>
                                                <td>
                                                    @if($merchant['api_user']->status === 1)
                                                        Active
                                                    @else
                                                        Suspended
                                                    @endif
                                                </td>
                                                {{--<td>--}}
                                                    {{--<select name="actions" id="" class="form-control">--}}
                                                        {{--<option value="">select action</option>--}}
                                                        {{--<option value="suspend">Suspend</option>--}}
                                                        {{--<option value="reset">Reset Password</option>--}}
                                                    {{--</select>--}}
                                                {{--</td>--}}
                                            </tr>
                                        @endforeach
                                    @endif
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Company Name</th>
                                    <th>API User</th>
                                    <th>Merchant ID</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    {{--<th>Actions</th>--}}
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection