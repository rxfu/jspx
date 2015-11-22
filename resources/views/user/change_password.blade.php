@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">修改用户 {{ Auth::user()->username }} 密码</div>
				<div class="panel-body">
					{{ Form::open(array('action' => 'UserController@postChangePassword', 'method' => 'put', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('password_old', '旧密码', array('class' => 'control-label')) }}
								{{ Form::password('password_old', array('class' => 'form-control', 'placeholder' => '旧密码')) }}
							</div>
							<div class="form-group">
								{{ Form::label('password', '新密码', array('class' => 'control-label')) }}
								{{ Form::password('password', array('class' => 'form-control', 'placeholder' => '新密码')) }}
							</div>
							<div class="form-group">
								{{ Form::label('password_confirmation', '确认密码', array('class' => 'control-label')) }}
								{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => '确认密码')) }}
							</div>
							{{ Form::button('修改密码', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop