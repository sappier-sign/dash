<div class="navbar-default sidebar nicescroll" role="navigation" style="margin-top: 20px">
    <div class="sidebar-nav navbar-collapse ">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i> </button>
                            </span>
                </div>
            </li>
            <li>
                <a href="{{url('dashboard')}}" class="waves-effect"><i class="fa fa-desktop"></i> Dashboard</a>
            </li>
            {{--<li>--}}
                {{--<a href="settlement.html" class="waves-effect"><i class="ti-loop fa-fw"></i> Settlement</a>--}}
            {{--</li>--}}
            <li>
                <a href="{{url('transactions')}}" class="waves-effect"><i class="fa fa-credit-card"></i> Transactions</a>
            </li>
            <li>
                <a href="{{url('credentials')}}" class="waves-effect"><i class="fa fa-ticket"></i> My Api Credentials</a>
            </li>
            <li>
                <a href="{{url('password/change')}}" class="waves-effect"><i class="fa fa-key"></i> Change Password</a>
            </li>
            @if($user['role'] === 'master')
            <li>
                <a href="{{url('merchants')}}" class="waves-effect"><i class="fa fa-users"></i> Merchants</a>
            </li>
            @endif
            <li>
                <a href="{{url('reports')}}" class="waves-effect"><i class="fa fa-book"></i> Reports</a>
            </li>
            <li>
                <a href="{{url('terminals')}}" class="waves-effect"><i class="fa fa-tablet"></i> Terminals</a>
            </li>
            <li id="docs-tab">
                <a href="#docs" class="waves-effect" data-toggle="collapse" aria-expanded="false" id="main-docs"><i class="fa fa-file-text-o"></i> Documentations</a>
                <ul class="collapse nav" id="docs" style="margin-left: 1.3rem">
                    <li>
                        <a href="{{url('documentations/api')}}" class="waves-effect"><i class="fa fa-cog"></i> API Docs</a>
                    </li>
                    <li>
                        <a href="{{ url('documentations/checkout') }}" class="waves-effect"><i class="fa fa-shopping-cart"></i> Checkout Docs</a>
                    </li>
                </ul>
                {{--<a href="{{url('documentations')}}" class="waves-effect"><i class="fa fa-file-text-o"></i> Documentation</a>--}}
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>