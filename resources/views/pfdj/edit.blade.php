@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">编辑一级指标 {{ $category->name }} 信息</div>
				<div class="panel-body">
					{{ Form::open(array('action' => array('CategoryController@postUpdate', $category->id), 'method' => 'put', 'role' => 'form')) }}
						<fieldset>
							<div class="form-group">
								{{ Form::label('seq', '指标序号', array('class' => 'control-label')) }}
								{{ Form::text('seq', $category->seq, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('name', '指标名称', array('class' => 'control-label')) }}
								{{ Form::text('name', $category->name, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('description', '指标说明', array('class' => 'control-label')) }}
								{{ Form::textarea('description', strip_tags($category->description), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('order', '指标排序', array('class' => 'control-label')) }}
								{{ Form::selectRange('order', 1, 999, $category->order, array('class' => 'form-control')) }}
							</div>
							{{ Form::button('更新', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop