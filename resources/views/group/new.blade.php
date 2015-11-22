@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">添加组</div>
				<div class="panel-body">
					{{ Form::open(array('action' => 'GroupController@postSave', 'method' => 'post', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('name', '组名称', array('class' => 'control-label')) }}
								{{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => '组名称')) }}
							</div>							
							<div class="form-group">
								{{ Form::label('description', '组描述', array('class' => 'control-label')) }}
								{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control', 'placeholder' => '组描述')) }}
							</div>	
							{{ Form::button('添加', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop