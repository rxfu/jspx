<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="采集广西师范大学二级学院本科教学状态数据">
    <meta name="keywords" content="采集数据,本科教学,教学状态数据">
    <meta name="author" content="Fu Rongxin,符荣鑫">
	<title>广西师范大学教师评学系统 - 登录</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sb-admin.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 website-name">
                {{ HTML::image('images/logo_gxnu.png', 'Logo', array('width' => '450')) }}
                <h1>广西师范大学教师评学系统</h1>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">登录</h3>
                    </div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>注意：</strong>输入有问题！
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="login" name="login" method="POST" action="{{ url('/auth/login') }}" role="form" class="form-horizontal">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">用户名</label>
                                    <div class="col-md-9">
                                        <input type="text" name="username" id="username" class="form-control" placeholder="用户名" value="{{ old('username') }}" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">密码</label>
                                    <div class="col-md-9">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="密码">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-4">
                                        <input type="submit" value="登录" class="btn btn-success btn-block">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="panel-footer">
                        &copy; {{ (date('Y') == '2015') ? '2015' : '2015 - ' . date('Y') }} <a href="http://www.dean.gxnu.edu.cn" title="广西师范大学教务处">广西师范大学教务处</a>.保留所有权利.
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Load JS here for greater good -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/sb-admin.js"></script>
</body>
</html>