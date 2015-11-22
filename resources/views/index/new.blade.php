@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">添加二级指标</div>
				<div class="panel-body">
					{{ Form::open(array('action' => 'IndexController@postSave', 'method' => 'post', 'role' => 'form')) }}
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
								{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('type', '填报类型', array('class' => 'control-label')) }}
								{{ Form::select('type', array('text' => '文本框', 'textarea' => '文本区域'), Input::old('type'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('has_file', '文件标志', array('class' => 'control-label')) }}
								<label class="radio-inline">
									{{ Form::radio('has_file', '1') }}&nbsp;需要文件
								</label>
								<label class="radio-inline">
									{{ Form::radio('has_file', '0', true) }}&nbsp;无需文件
								</label>
							</div>
							<div class="form-group">
								{{ Form::label('order', '指标排序', array('class' => 'control-label')) }}
								{{ Form::selectRange('order', 1, 999, Input::old('order'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('collection_department', '填报部门', array('class' => 'control-label')) }}
								{{ Form::select('collection_department', array('all' => '所有填报部门') + $collectionDepartment, Input::old('collection_department'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('mark_department', '审核部门', array('class' => 'control-label')) }}
								{{ Form::select('mark_department', $markDepartment, Input::old('mark_department'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('category', '所属一级指标', array('class' => 'control-label')) }}
								{{ Form::select('category', $category, Input::old('category'), array('class' => 'form-control')) }}
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
							<div class="form-group">
								{{ Form::label('memo', '备注', array('class' => 'control-label')) }}
								{{ Form::textarea('memo', Input::old('memo'), array('class' => 'form-control')) }}
							</div>
							{{ Form::button('添加', array('type' => 'submit', 'class' =>'btn btn-lg btn-success btn-block')) }}
						</fieldset>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@stop