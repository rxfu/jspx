@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ URL::route('index.new') }}" class="btn btn-success" role="button" title="添加指标"><i class="fa fa-plus fa-fw"></i>添加二级指标</a></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="index-table" class="table table-striped table-hover data-table">
							<thead>
								<tr>
									<th>指标序号</th>
									<th>指标名称</th>
									<th>所属一级指标</th>
									<th>指标排序</th>
									<th class="yesno">是否启用</th>
									<th>填报部门</th>
									<th>审核部门</th>
									<th class="nosort">操作</th>
									<th class="nosort">&nbsp;</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($indexes as $index)
									<tr>
										<td>{{ $index->seq }}</td>
										<td>{{ $index->name }}</td>
										<td>{{ $index->category->name }}</td>
										<td>{{ $index->order }}</td>
										<td>{{ $index->activated }}</td>
										<td>{{ $index->collection_department == 'all' ? '所有填报部门' : $index->collector->name }}</td>
										<td>{{ $index->marker->name }}</td>
										<td><a href="{{ URL::route('index.show', $index->id) }}" class="btn btn-info" role="button" title="查看"><i class="fa fa-search fa-fw"></i></a></td>
										<td><a href="{{ URL::route('index.edit', $index->id) }}" class="btn btn-primary" role="button" title="编辑"><i class="fa fa-edit fa-fw"></i></a></td>
										<td>
											{{ Form::open(array('action' => array('IndexController@postDestroy', $index->id), 'method' => 'delete', 'role' => 'form')) }}
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