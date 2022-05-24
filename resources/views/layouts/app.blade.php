<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Shrewsbury Cup - Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    @stack('css')
</head>

<body class="loading" data-layout-color="dark" data-leftbar-theme="dark" data-layout-mode="fluid"
      data-rightbar-onstart="true">
<div class="wrapper">
    <div class="leftside-menu">
        <a href="{{route('dashboard')}}" class="logo text-center logo-light">
            <span>
                <img src="{{asset('assets/images/logo-170.png')}}">
            </span>
        </a>
        <div class="h-100" id="leftside-menu-container" data-simplebar>
            <ul class="side-nav">
                <li class="side-nav-item ">
                    <a href="{{route('dashboard')}}" class="side-nav-link ">
                        <i class="uil-calender"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="side-nav-item ">
                    <a href="{{route('shop.index')}}" class="side-nav-link ">
                        <i class="uil-calender"></i>
                        <span>Shops</span>
                    </a>
                </li>
                <li class="side-nav-item ">
                    <a href="{{route('item.index')}}" class="side-nav-link ">
                        <i class="uil-calender"></i>
                        <span>Master Items</span>
                    </a>
                </li>
                <li class="side-nav-item ">
                    <a href="{{route('shop.item.index')}}" class="side-nav-link ">
                        <i class="uil-calender"></i>
                        <span>Shop Items</span>
                    </a>
                </li>

                <li class="side-nav-item ">
                    <a href="{{route('cupboard.index')}}" class="side-nav-link ">
                        <i class="uil-calender"></i>
                        <span>Cupboards</span>
                    </a>
                </li>
                <li class="side-nav-item ">
                    <a href="{{route('cupboard.history.index')}}" class="side-nav-link ">
                        <i class="uil-calender"></i>
                        <span>Cupboard History</span>
                    </a>
                </li>
                <li class="side-nav-item ">
                    <a href="{{route('user.index')}}" class="side-nav-link">
                        <i class="uil-calender"></i>
                        <span>Users</span>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="content-page">
        <div class="content">
            <div class="navbar-custom">
                <ul class="list-unstyled topbar-menu float-end mb-0">
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                           role="button" aria-haspopup="false"
                           aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user-image"
                                             class="rounded-circle">
                                    </span>
                                    <span>
                                        <span
                                            class="account-user-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                        <span
                                            class="account-position">{{getRoleName(\Illuminate\Support\Facades\Auth::user())}}</span>
                                    </span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>
                            <a href="{{route('change.password')}}" class="dropdown-item notify-item">
                                <i class="mdi mdi-key me-1"></i>
                                Change Password</a>
                            <form id="logout-form" method="POST" action="{{route('logout')}}" >
                                @csrf
                            </form>
                            <a href="javascript:void(0);" onclick="
                                event.preventDefault();
                                document.getElementById('logout-form').submit();
                            " class="dropdown-item notify-item">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>

                </ul>
                <button class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu"></i>
                </button>

            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">@yield('header-text')</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @section('content')@show
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © {{getenv('CUSTOM_SITE_NAME')}}
                    </div>
                </div>
            </div>
        </footer>

    </div>

</div>

<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('script')
</body>
</html>
@include('sweetalert::alert')
