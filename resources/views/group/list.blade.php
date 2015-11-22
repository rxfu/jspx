@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ URL::route('group.new') }}" class="btn btn-success" role="button" title="添加组"><i class="fa fa-plus fa-fw"></i>添加组</a></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="group-table" class="table table-striped table-hover data-table">
							<thead>
								<tr>
									<th>组名称</th>
									<th class="nosort">组描述</th>
									<th class="nosort">操作</th>
									<th class="nosort">&nbsp;</th>
									<th class="nosort">&nbsp;</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($groups as $group)
									<tr>
										<td>{{ $group->name }}</td>
										<td>{{ $group->description }}</td>
										<td><a href="{{ URL::route('group.grant', $group->id) }}" class="btn btn-warning" role="button" title="权限设置"><i class="fa fa-unlock fa-fw"></i></a></td>
										<td><a href="{{ URL::route('group.show', $group->id) }}" class="btn btn-info" role="button" title="查看"><i class="fa fa-search fa-fw"></i></a></td>
										<td><a href="{{ URL::route('group.edit', $group->id) }}" class="btn btn-primary" role="button" title="编辑"><i class="fa fa-edit fa-fw"></i></a></td>
										<td>
											{{ Form::open(array('action' => array('GroupController@postDestroy', $group->id), 'method' => 'delete', 'role' => 'form')) }}
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