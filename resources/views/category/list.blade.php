@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ URL::route('category.new') }}" class="btn btn-success" role="button" title="添加指标"><i class="fa fa-plus fa-fw"></i>添加一级指标</a></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="category-table" class="table table-striped table-hover data-table">
							<thead>
								<tr>
									<th>指标序号</th>
									<th>指标名称</th>
									<th class="nosort">指标说明</th>
									<th>指标排序</th>
									<th class="nosort">操作</th>
									<th class="nosort">&nbsp;</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($categories as $category)
									<tr>
										<td>{{ $category->seq }}</td>
										<td>{{ $category->name }}</td>
										<td>{{ $category->description }}</td>
										<td>{{ $category->order }}</td>
										<td><a href="{{ URL::route('category.show', $category->id) }}" class="btn btn-info" role="button" title="查看"><i class="fa fa-search fa-fw"></i></a></td>
										<td><a href="{{ URL::route('category.edit', $category->id) }}" class="btn btn-primary" role="button" title="编辑"><i class="fa fa-edit fa-fw"></i></a></td>
										<td>
											{{ Form::open(array('action' => array('CategoryController@postDestroy', $category->id), 'method' => 'delete', 'role' => 'form')) }}
											{{ Form::button('<i class="fa fa-trash-o fa-fw"></i>', array('type' => 'button', 'class' => 'btn btn-danger', 'title' => '删除', 'data-toggle' => 'modal', 'data-target' => '#dialogConfirm')) }}
											{{ Form::close() }}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('delete_confirm');
@stop