@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">添加用户</div>
				<div class="panel-body">
					{{ Form::open(array('action' => 'UserController@postSave', 'method' => 'post', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('username', '用户名', array('class' => 'control-label')) }}
								{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder' => '用户名')) }}
							</div>
							<div class="form-group">
								{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
								{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) }}
							</div>
							<div class="form-group">
								{{ Form::label('department', '部门', array('class' => 'control-label')) }}
								{{ Form::select('department', $departments, Input::old('department'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('group', '所属组', array('class' => 'control-label')) }}
								{{ Form::select('group', $groups, Input::old('group'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('activated', '启用标志', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('activated', '1', true) }}&nbsp;启用
								</label>
								<label class="radio-inline">
									{{ Form::radio('activated', '0') }}&nbsp;禁用
								</label>
							</div>
							{{ Form::button('添加', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop