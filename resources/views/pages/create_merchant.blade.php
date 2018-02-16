@extends('layouts.master')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-xs-12">
                <div class="white-box">
                    <h3>New Merchant</h3>
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        </div>
                    @endif
                    <form class="form-horizontal form-material" method="post" action="">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="text" placeholder="Company Name" name="company" class="form-control form-control-line" value="{{old('company')}}"> </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Email" name="api-email" class="form-control form-control-line" value="{{old('company')}}"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <input type="tel" placeholder="Telephone" name="telephone" class="form-control form-control-line" value="{{old('telephone')}}"> </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Address" name="address" class="form-control form-control-line" value="{{old('address')}}"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12">
                                <label for="actions">Actions:</label>
                                <select class="form-control" id="actions" name="actions[]" multiple size="2">
                                    <option value="" disabled selected hidden>Select Account Type</option>
                                    <option value="purchase">Purchase</option>
                                    <option value="transfer">Funds Transfer</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-info">Create Merchant</button>
                            </div>
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