@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">编辑组 {{ $group->name }} 信息</div>
				<div class="panel-body">
					{{ Form::open(array('action' => array('GroupController@postUpdate', $group->id), 'method' => 'put', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('description', '组描述', array('class' => 'control-label')) }}
								{{ Form::text('description', strip_tags($group->description), array('class' => 'form-control')) }}
							</div>
							{{ Form::button('更新', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop