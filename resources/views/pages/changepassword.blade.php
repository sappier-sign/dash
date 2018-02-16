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
                        <h3 class="text-center">Change Password</h3>
                        @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                        <form class="form-horizontal form-material" action="" method="post">
                            {{csrf_field()}}

                            <div class="form-group has-feedback {{($errors->has('old-password'))? 'has-error' : ''}}">
                                <label class="col-md-12">Old Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="old-password" placeholder="old password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group has-feedback {{($errors->has('password'))? 'has-error' : ''}}">
                                <label class="col-md-12">New Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password" placeholder="new password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group has-feedback {{($errors->has('password-retype'))? 'has-error' : ''}}">
                                <label class="col-md-12">Confirm Password</label>
                                <div class="col-md-12">
                                    <input type="password" name="password-retype" placeholder="confirm new password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input class="btn btn-info" type="submit" value="Change Password">
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