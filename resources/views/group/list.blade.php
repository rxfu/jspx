@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ url('group/add') }}" class="btn btn-success" role="button" title="添加组"><i class="fa fa-plus fa-fw"></i>添加组</a></div>
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
										<td><a href="{{ url('group/grant', $group->id) }}" class="btn btn-warning" role="button" title="权限设置"><i class="fa fa-unlock fa-fw"></i></a></td>
										<td><a href="{{ url('group/show', $group->id) }}" class="btn btn-info" role="button" title="查看"><i class="fa fa-search fa-fw"></i></a></td>
										<td><a href="{{ url('group/edit', $group->id) }}" class="btn btn-primary" role="button" title="编辑"><i class="fa fa-edit fa-fw"></i></a></td>
										<td>
											<form id="delete" name="delete" method="POST" action="{{ url('group/delete', $group->id) }}" role="form" onsubmit="return confirm('你确定要删除这条记录吗？')">
												<input type="hidden" name="_method" value="DELETE">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<button type="submit" class="btn btn-danger" title="删除"><i class="fa fa-trash-o fa-fw"></i></button>
											</form>
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
@stop