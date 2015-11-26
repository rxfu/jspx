<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="采集广西师范大学教师评学数据">
    <meta name="keywords" content="采集数据,本科教学,教师评学">
    <meta name="author" content="Fu Rongxin,符荣鑫">
	<title>广西师范大学教师评学系统 - {{ $title }}</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/morris/morris-0.4.3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/timeline/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="{{ asset('js/html5shiv.js') }}"></script>
      <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">
    	<header>
    		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom:0">
                <div class="navbar-header">
        			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
        				<span class="sr-only">Toggle navigation</span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        				<span class="icon-bar"></span>
        			</button>
                    <a href="{{ url('/') }}" class="navbar-brand">广西师范大学教师评学系统</a>
                </div>

                <ul class="nav navbar-top-links navbar-right">
                    <li>欢迎{{ $user->department->mc . $user->username }}老师使用系统！</li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user fa-fw"></i>
                            <span>{{ $user->username }}</span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ url('user/profile') }}"><i class="fa fa-user fa-fw"></i> 个人资料</a></li>
                            <li><a href="{{ url('user/change-password') }}"><i class="fa fa-gear fa-fw"></i> 修改密码</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('auth/logout') }}"><i class="fa fa-sign-out fa-fw"></i> 登出</a></li>
                        </ul>
                    </li>
                </ul>

                <nav class="navbar-default navbar-static-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul id="side-menu" class="nav">
                            <li>
                                <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> 概况</a>
                            </li>
                            @if ($user->groups[0]->permissions->contains('user.add') || $user->groups[0]->permissions->contains('user.list') || $user->groups[0]->permissions->contains('user.change'))
                                <li>
                                    <a href="#"><i class="fa fa-user fa-fw"></i> 用户管理<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if ($user->groups[0]->permissions->contains('user.add'))
                                            <li>
                                                <a href="{{ url('user/add') }}">添加用户</a>
                                            </li>
                                        @endif
                                        @if ($user->groups[0]->permissions->contains('user.list'))
                                            <li>
                                                <a href="{{ url('user/list') }}">用户列表</a>
                                            </li>
                                        @endif
                                        @if ($user->groups[0]->permissions->contains('user.change'))
                                            <li>
                                                <a href="{{ url('user/change') }}">修改密码</a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if ($user->groups[0]->permissions->contains('group.add') || $user->groups[0]->permissions->contains('group.list'))
                                <li>
                                    <a href="#"><i class="fa fa-users fa-fw"></i> 组管理<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if ($user->groups[0]->permissions->contains('group.add'))
                                            <li>
                                                <a href="{{ url('group/add') }}">添加组</a>
                                            </li>
                                        @endif
                                        @if ($user->groups[0]->permissions->contains('group.list'))
                                            <li>
                                                <a href="{{ url('group/list') }}">组列表</a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
            </nav>
    	</header>

        <div id="page-wrapper">
            @if (session('status'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session('status') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>注意：</strong>出错啦！
                    <<ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ $title }}</h1>
                </div>
            </div>
            @yield('content')
        </div>

    	<footer class="footer">
      		&copy; {{ (date('Y') == '2015') ? '2015' : '2015 - ' . date('Y') }} <a href="http://www.dean.gxnu.edu.cn" title="广西师范大学教务处">广西师范大学教务处</a>.保留所有权利.
    	</footer>
    </div>
	<!-- Load JS here for greater good -->
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui-1.10.4.custom.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-paginator.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('js/bootstrap-switch.js') }}"></script>
    <script src="{{ asset('js/bootstrap-typeahead.js') }}"></script>
    <script src="{{ asset('js/jquery.placeholder.js') }}"></script>
    <script src="{{ asset('js/jquery.stacktable.js') }}"></script>
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/plugins/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ asset('js/plugins/morris/morris.js') }}"></script>
    <script src="{{ asset('js/sb-admin.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>