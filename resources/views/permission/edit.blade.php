@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">编辑权限 {{ $permission->identify }} 信息</div>
				<div class="panel-body">
					{{ Form::open(array('action' => array('PermissionController@postUpdate', $permission->id), 'method' => 'put', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('name', '权限名称', array('class' => 'control-label')) }}
								{{ Form::text('name', $permission->name, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('description', '权限描述', array('class' => 'control-label')) }}
								{{ Form::textarea('description', strip_tags($permission->description), array('class' => 'form-control')) }}
							</div>
							{{ Form::button('更新', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop