<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)"
           data-toggle="collapse" data-target=".navbar-collapse">
            <i class="ti-menu"></i>
        </a>
        <div class="top-left-part">
            <a class="logo" href="{{url('/')}}">
                <i>
                    <img style="width:20%;" src="{{asset('img/theteller-logo-Head-small.png')}}">
                </i>
                <span class="hidden-xs"><img style="width:40%;"
                                             src="{{asset('img/theteller-logo-text-small.png')}}"></span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left hidden-xs">
            <li>
                <a href="javascript:void(0)" class="open-close hidden-xs hidden-lg waves-effect waves-light">
                    <i class="ti-arrow-circle-left ti-menu"></i>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
                <p class="profile-pic" style="margin-top: 5px">
                    {{--<img src="{{asset('img/users/KofiAboagye.png')}}" alt="user-img"--}}
                    {{--width="36" class="img-circle">--}}
                    <b class="hidden-xs text-danger">Float Balance: GHC 100,000.00</b></p>
            </li>
            <li>
                <p class="profile-pic" style="margin-top: 5px">
                    {{--<img src="{{asset('img/users/KofiAboagye.png')}}" alt="user-img"--}}
                    {{--width="36" class="img-circle">--}}
                    <b class="hidden-xs">{{$user['company']}}</b></p>
            </li>
            <li>
                <form id="logout-form" method="post" action="{{route('logout')}}" style="margin-top: 13px">
                    {{csrf_field()}}
                    <button onclick="getElementById('logout-form').submit()" class="btn btn-danger" title="Log Out"><i
                                class="fa fa-power-off"></i></button>
                </form>
            </li>
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>