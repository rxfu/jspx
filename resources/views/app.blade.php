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
	{{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-select.css') }}
    {{ HTML::style('css/bootstrap-theme.min.css') }}
    {{ HTML::style('font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('css/plugins/dataTables/dataTables.bootstrap.css') }}
    {{ HTML::style('css/plugins/morris/morris-0.4.3.min.css') }}
    {{ HTML::style('css/plugins/timeline/timeline.css') }}
    {{ HTML::style('css/sb-admin.css') }}
    {{ HTML::style('css/style.css') }}

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      {{ HTML::script('js/html5shiv.js') }}
      {{ HTML::script('js/respond.min.js') }}
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
                    <a href="{{ URL::route('home') }}" class="navbar-brand">广西师范大学教师评学系统</a>
                </div>

                <ul class="nav navbar-top-links navbar-right">
                    <li>欢迎 {{ Auth::user()->department->name }} {{ Auth::user()->username }} 老师使用系统！</li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user fa-fw"></i>
                            <span>{{ Auth::user()->username }}</span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ URL::route('user.profile') }}"><i class="fa fa-user fa-fw"></i> 个人资料</a></li>
                            <li><a href="{{ URL::route('user.change') }}"><i class="fa fa-gear fa-fw"></i> 修改密码</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ URL::route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> 登出</a></li>
                        </ul>
                    </li>
                </ul>

                <nav class="navbar-default navbar-static-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul id="side-menu" class="nav">
                            <li>
                                <a href="{{ URL::route('home') }}"><i class="fa fa-dashboard fa-fw"></i> 概况</a>
                            </li>
                            @if (Auth::user()->groups[0]->permissions->contains('index.statistics'))
                                <li>
                                    <a href="#"><i class="fa fa-database fa-fw"></i> 评分统计<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @foreach ($indexdatas as $indexdata)
                                            <li>
                                                <a href="{{ URL::route('index.statistics', $indexdata->year) }}">{{ $indexdata->year - 1 . '~' . $indexdata->year }}学年度统计表</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->groups[0]->permissions->contains('category.list') || Auth::user()->groups[0]->permissions->contains('index.list') || Auth::user()->groups[0]->permissions->contains('index.monitor'))
                                <li>
                                    <a href="#"><i class="fa fa-table fa-fw"></i> 评分管理<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if (Auth::user()->groups[0]->permissions->contains('category.list'))
                                            <li>
                                                <a href="{{ URL::route('category.list') }}">评分指标管理</a>
                                            </li>
                                        @endif
                                        @if (Auth::user()->groups[0]->permissions->contains('index.list'))
                                            <li>
                                                <a href="{{ URL::route('index.list') }}">评分标准管理</a>
                                            </li>
                                        @endif
                                        @if (Auth::user()->groups[0]->permissions->contains('index.monitor'))
                                            <li>
                                                <a href="{{ URL::route('index.monitor') }}">评分监控</a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->groups[0]->permissions->contains('user.new') || Auth::user()->groups[0]->permissions->contains('user.list') || Auth::user()->groups[0]->permissions->contains('user.change'))
                                <li>
                                    <a href="#"><i class="fa fa-user fa-fw"></i> 用户管理<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if (Auth::user()->groups[0]->permissions->contains('user.new'))
                                            <li>
                                                <a href="{{ URL::route('user.new') }}">添加用户</a>
                                            </li>
                                        @endif
                                        @if (Auth::user()->groups[0]->permissions->contains('user.list'))
                                            <li>
                                                <a href="{{ URL::route('user.list') }}">用户列表</a>
                                            </li>
                                        @endif
                                        @if (Auth::user()->groups[0]->permissions->contains('user.change'))
                                            <li>
                                                <a href="{{ URL::route('user.change') }}">修改密码</a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->groups[0]->permissions->contains('group.new') || Auth::user()->groups[0]->permissions->contains('group.list'))
                                <li>
                                    <a href="#"><i class="fa fa-users fa-fw"></i> 组管理<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if (Auth::user()->groups[0]->permissions->contains('group.new'))
                                            <li>
                                                <a href="{{ URL::route('group.new') }}">添加组</a>
                                            </li>
                                        @endif
                                        @if (Auth::user()->groups[0]->permissions->contains('group.list'))
                                            <li>
                                                <a href="{{ URL::route('group.list') }}">组列表</a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->groups[0]->permissions->contains('permission.new') || Auth::user()->groups[0]->permissions->contains('permission.list'))
                                <li>
                                    <a href="#"><i class="fa fa-lock fa-fw"></i> 权限管理<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if (Auth::user()->groups[0]->permissions->contains('permission.new'))
                                            <li>
                                                <a href="{{ URL::route('permission.new') }}">添加权限</a>
                                            </li>
                                        @endif
                                        @if (Auth::user()->groups[0]->permissions->contains('permission.list'))
                                            <li>
                                                <a href="{{ URL::route('permission.list') }}">权限列表</a>
                                            </li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if (Auth::user()->groups[0]->permissions->contains('setting.edit') || Auth::user()->groups[0]->permissions->contains('system.edit'))
                                <li>
                                    <a href="#"><i class="fa fa-wrench fa-fw"></i> 系统管理<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if (Auth::user()->groups[0]->permissions->contains('setting.edit'))
                                            <li>
                                                <a href="{{ URL::route('setting.edit') }}">采集设置</a>
                                            </li>
                                        @endif
                                        @if (Auth::user()->groups[0]->permissions->contains('system.edit'))
                                            <li>
                                                <a href="{{ URL::route('system.edit') }}">系统设置</a>
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
            @if (Session::has('flash_error'))
                <div id="flash_error" class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_error') }}
                </div>
            @endif
            @if (Session::has('flash_success'))
                <div id="flash_success" class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_success') }}
                </div>
            @endif
            @if (Session::has('flash_notice'))
                <div id="flash_notice" class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('flash_notice') }}
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
      		&copy; {{ (date('Y') == '2015') ? '2015' : '2015 - ' . date('Y') }} {{ HTML::link('http://www.dean.gxnu.edu.cn', '广西师范大学教务处') }}.保留所有权利.
    	</footer>
    </div>
	<!-- Load JS here for greater good -->
    {{ HTML::script('js/jquery-1.11.0.min.js') }}
    {{ HTML::script('js/jquery-ui-1.10.4.custom.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/bootstrap-paginator.js') }}
    {{ HTML::script('js/bootstrap-select.js') }}
    {{ HTML::script('js/bootstrap-switch.js') }}
    {{ HTML::script('js/bootstrap-typeahead.js') }}
    {{ HTML::script('js/jquery.placeholder.js') }}
    {{ HTML::script('js/jquery.stacktable.js') }}
    {{ HTML::script('js/plugins/metisMenu/jquery.metisMenu.js') }}
    {{ HTML::script('js/plugins/dataTables/jquery.dataTables.js') }}
    {{ HTML::script('js/plugins/dataTables/dataTables.bootstrap.js') }}
    {{ HTML::script('js/plugins/morris/raphael-2.1.0.min.js') }}
    {{ HTML::script('js/plugins/morris/morris.js') }}
    {{ HTML::script('js/sb-admin.js') }}
    {{ HTML::script('js/main.js') }}
</body>
</html>