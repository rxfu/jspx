@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ url('permission/add') }}" class="btn btn-success" role="button" title="添加权限"><i class="fa fa-plus fa-fw"></i>添加权限</a></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="permission-table" class="table table-striped table-hover data-table">
							<thead>
								<tr>
									<th>权限标识</th>
									<th>权限名称</th>
									<th class="nosort">权限描述</th>
									<th class="nosort">操作</th>
									<th class="nosort">&nbsp;</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($permissions as $permission)
									<tr>
										<td>{{ $permission->id }}</td>
										<td>{{ $permission->name }}</td>
										<td>{{ $permission->description }}</td>
										<td><a href="{{ url('permission/show', $permission->id) }}" class="btn btn-info" role="button" title="查看"><i class="fa fa-search fa-fw"></i></a></td>
										<td><a href="{{ url('permission/edit', $permission->id) }}" class="btn btn-primary" role="button" title="编辑"><i class="fa fa-edit fa-fw"></i></a></td>
										<td>
											<form id="delete" name="delete" method="POST" action="{{ url('permission/delete', $permission->id) }}" role="form" onsubmit="return confirm('你确定要删除这条记录吗？')">
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