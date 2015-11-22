@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">编辑用户 {{ $user->username }} 个人资料</div>
				<div class="panel-body">
					{{ Form::open(array('action' => array('UserController@postUpdate', $user->id), 'method' => 'put', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('department', '所在部门', array('class' => 'control-label')) }}
								{{ Form::select('department', $departments, $user->department_id, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
								{{ Form::text('email', $user->email, array('class' => 'form-control', 'placeholder' => 'Email')) }}
							</div>
							<div class="form-group">
								{{ Form::label('group', '所属组', array('class' => 'control-label')) }}
								{{ Form::select('group', $groups, $user->groups[0]->id, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('activated', '启用标志', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('activated', '1', (($user->activated == 1) ? true : false)) }}&nbsp;启用
								</label>
								<label class="radio-inline">
									{{ Form::radio('activated', '0', (($user->activated == 0) ? true : false)) }}&nbsp;禁用
								</label>
							</div>
							{{ Form::button('更新', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop