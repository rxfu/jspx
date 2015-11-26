@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">权限 {{ $permission->id }} 详细信息</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th class="col-md-4 text-right">权限标识：</th>
							<td class="col-md-8 text-left">{{ $permission->id }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">权限名称：</th>
							<td class="col-md-8 text-left">{{ $permission->name }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">权限描述：</th>
							<td class="col-md-8 text-left">{{ $permission->description }}</td>
						</tr>
					</table>
					<a href="{{ url('permission/edit', $permission->id) }}" title="编辑" class="btn btn-primary" role="button">编辑</a>
				</div>
			</div>
		</div>
	</div>
@stop