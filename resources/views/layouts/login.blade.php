<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TheTeller API</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    {{--<link rel='stylesheet prefetch' href='{{asset('css/gubja.css')}}'>--}}
    {{--<link rel='stylesheet prefetch' href='{{asset('css/yaozl.css')}}'>--}}
    <link rel="stylesheet" href='{{asset('css/login.css')}}'>
    <!-- Latest compiled and minified CSS -->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}

</head>

<body style="background-color: #0277bd">
<div class="container">
    <div id="login" class="signin-card col-lg-offset-4 col-lg-4 col-sm-12"
         style="background-color: #eceff1; margin-top: 50px">
        <div class="logo-image text-center">
            <img src="{{asset('img/theteller-logo-small.png')}}" alt="Logo" title="Logo" width="138">
        </div>
        <h1 class="display1 text-center">Login</h1>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <form action="{{ url('login') }}" method="post" class="" role="form">
            {{ csrf_field() }}
            <div id="" class="form-group">
                <input id="username" class="form-control text-center" name="email" placeholder="email" type="text"
                       size="18" alt="email" value="{{old('email')}}"
                       style="background-color: transparent; box-shadow: none" required/>
            </div>
            <div id="form-login-password" class="form-group" style="margin-top: -10px">
                <input id="passwd" class="form-control text-center"
                       style="background-color: transparent; box-shadow: none" placeholder="password" name="password"
                       type="password" size="18" alt="password"
                       required>
            </div>
            <div style="margin-top: -10px">
                <button class="btn btn-block btn-info ripple-effect" type="submit" name="Submit" alt="sign in">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='{{asset('js/gubja.js')}}'></script>
<script src='{{asset('js/yaozl.js')}}'></script>
<script src='{{asset('js/index.js')}}'></script>

</body>
</html>
