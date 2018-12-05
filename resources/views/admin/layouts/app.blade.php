<!doctype html>
<html lang="zh-cn">
<head>
    <title>@yield('title')-后台管理</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('static/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/font-awesome.min.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('static/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('static/css/color_skins.css')}}">

</head>
<body class="theme-blue">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{asset('/static/images/thumbnail.png')}}" width="48" height="48" alt="Mplify"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay" style="display: none;"></div>

<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-brand">
                <a href="{{route('admin.index')}}">
                    <img src="{{asset('/static/images/logo-icon.svg')}}" alt="Mplify Logo" class="img-responsive logo">
                    <span class="name">LOGO</span>
                </a>
            </div>

            <div class="navbar-right">
                <ul class="list-unstyled clearfix mb-0">
                    <li>
                        <div class="navbar-btn btn-toggle-show">
                            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                        </div>
                        <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i class="fa fa-bars"></i></a>
                    </li>

                    <li>
                        <div id="navbar-menu">
                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="{{route('index')}}" class="mega_menu icon-menu" title="访问前台"><i class="icon-globe"></i></a>
                                </li>
                                <li>
                                    <a href="#" class="create_new icon-menu" title="清除缓存"><i class="icon-refresh"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                        <i class="icon-bell"></i>
                                        <span class="notification-dot"></span>
                                    </a>
                                    <ul class="dropdown-menu animated bounceIn notifications">
                                        <li class="header"><strong>最近5条通知</strong></li>
                                        @foreach(Auth::user()->notifications()->paginate(5) as $notification)
                                        <li>
                                            <a href="javascript:void(0);">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="icon-info text-primary"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text">
                                                            <strong>{{ $notification->data['user_name'] }}</strong> 评论了 {{ $notification->data['topic_title'] }}
                                                        </p>
                                                        <span class="timestamp">{{ $notification->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                        <li class="footer"><a href="javascript:void(0);" class="more">查看全部通知</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                        <img class="rounded-circle" src="{{ Auth::user()->avatar }}" width="30" alt="">
                                    </a>
                                    <div class="dropdown-menu animated flipInY user-profile">
                                        <div class="d-flex p-3 align-items-center">
                                            <div class="drop-left m-r-10">
                                                <img src="{{ Auth::user()->avatar }}" class="rounded" width="50" alt="">
                                            </div>
                                            <div class="drop-right">
                                                <h4>{{ Auth::user()->name }}</h4>
                                                <p class="user-name">{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                        <div class="m-t-10 p-3 drop-list">
                                            <ul class="list-unstyled">
                                                <li><a href="#"><i class="icon-user"></i>个人资料</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#"><i class="icon-power"></i>注销登录</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="leftsidebar" class="sidebar">
        <div class="sidebar-scroll">
            <nav id="leftsidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="heading">主页</li>
                    <li><a href="{{route('admin.index')}}"><i class="icon-home"></i><span>控制台</span></a></li>
                    <li class="heading">内容</li>
                    <li><a href="{{route('admin.topics.index')}}"><i class="icon-list"></i><span>帖子</span></a></li>
                    <li><a href="{{route('admin.replies.index')}}"><i class="icon-speech"></i><span>回复</span></a></li>
                    <li class="heading">用户</li>
                    <li><a href="{{route('admin.users.index')}}"><i class="icon-users"></i><span>用户</span></a></li>
                    <li><a href="{{route('admin.roles.index')}}"><i class="icon-magic-wand"></i><span>角色</span></a></li>
                    <li><a href="{{route('admin.permissions.index')}}"><i class="icon-lock"></i><span>权限</span></a></li>
                    <li class="heading">系统</li>
                    <li><a href="#"><i class="icon-settings"></i><span>设置</span></a></li>
                </ul>
            </nav>
        </div>
    </div>




    <div id="main-content">
        @section('body')
        @show
    </div>

</div>

<!-- Javascript -->
<script src="{{asset('static/js/libscripts.bundle.js')}}"></script>
<script src="{{asset('static/js/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('static/js/mainscripts.bundle.js')}}"></script>
<script src="{{asset('static/js/morrisscripts.bundle.js')}}"></script>
</body>
</html>
