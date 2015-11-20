<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="采集广西师范大学二级学院本科教学状态数据">
    <meta name="keywords" content="采集数据,本科教学,教学状态数据">
    <meta name="author" content="Fu Rongxin,符荣鑫">
	<title>广西师范大学教师评学系统 - {{ $title }}</title>
	{{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-theme.min.css') }}
    {{ HTML::style('font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('css/sb-admin.css') }}
    {{ HTML::style('css/style.css') }}

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      {{ HTML::script('js/html5shiv.js') }}
      {{ HTML::script('js/respond.min.js') }}
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
                        <h3 class="panel-title">{{ $title }}</h3>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('flash_error'))
                            <div id="flash_error" class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ Session::get('flash_error') }}
                            </div>
                        @endif
                        {{ Form::open(array('route' => 'login', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal')) }}
                            <fieldset>
                                <div class="form-group">
                                    {{ Form::label('username', '用户名', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => '用户名', 'autofocus' => 'autofocus')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('password', '密码', array('class' => 'col-md-3 control-label')) }}
                                    <div class="col-md-9">
                                        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => '密码')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-4">
                                        {{ Form::button('登录', array('type' => 'submit', 'class' =>'btn btn-success btn-block')) }}
                                    </div>
                                </div>
                            </fieldset>
                        {{ Form::close() }}
                    </div>
                    <div class="panel-footer">
                        &copy; {{ (date('Y') == '2015') ? '2015' : '2015 - ' . date('Y') }} {{ HTML::link('http://www.dean.gxnu.edu.cn', '广西师范大学教务处') }}.保留所有权利.
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Load JS here for greater good -->
    {{ HTML::script('js/jquery-1.11.0.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/jquery.placeholder.js') }}
    {{ HTML::script('js/plugins/metisMenu/jquery.metisMenu.js') }}
    {{ HTML::script('js/sb-admin.js') }}
</body>
</html>