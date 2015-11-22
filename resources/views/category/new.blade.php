@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">添加一级指标</div>
				<div class="panel-body">
					{{ Form::open(array('action' => 'CategoryController@postSave', 'method' => 'post', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('seq', '指标序号', array('class' => 'control-label')) }}
								{{ Form::text('seq', Input::old('seq'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('name', '指标名称', array('class' => 'control-label')) }}
								{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('description', '指标说明', array('class' => 'control-label')) }}
								{{ Form::textarea('description', Input::old('descrption'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('order', '指标排序', array('class' => 'control-label')) }}
								{{ Form::selectRange('order', 1, 999, Input::old('order'), array('class' => 'form-control')) }}
							</div>
							{{ Form::button('添加', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop