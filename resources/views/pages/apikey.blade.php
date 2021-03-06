@extends('layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-sm-12">
                    <div class="white-box" style="min-height: 350px">
                        <h3 class="text-center">API Credentials</h3>

                        <form class="form-material">
                            <div class="form-group col-md-offset-3 col-md-6 text-center">
                                <label for="">Api User</label>
                                <input type="text" class="text-center form-control" value="{{$user->apiuser}}" readonly>
                            </div>
                            <div class="form-group col-sm-12 text-center">
                                <label for="">Api Key</label>
                                <input type="text" class="text-center form-control" value="{{$token->api_key}}" readonly>
                            </div>
                            <div class="form-group col-md-offset-3 col-md-6 text-center">
                                <label for="" class="">Merchant ID</label>
                                <input type="text" class="text-center form-control" value="{{$user->merchant_id}}" readonly>
                            </div>
                            <div class="form-group col-md-offset-3 col-md-6 text-center">
                                <label for="" class="">Pass Code</label>
                                <input type="text" class="text-center form-control" value="{{ substr($user->pass_code, 0, 32) ?? 'not set'}}" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection