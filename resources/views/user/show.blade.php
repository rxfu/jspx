@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">用户 {{ $user->username }} 详细信息</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th class="col-md-4 text-right">所在部门：</th>
							<td class="col-md-8 text-left">{{ $user->department->mc }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">Email：</th>
							<td class="col-md-8 text-left">{{ $user->email }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">所属组：</th>
							<td class="col-md-8 text-left">{{ $user->groups[0]->name }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">是否启用：</th>
							<td class="col-md-8 text-left">{{ $user->activated ? '已启用' : '未启用' }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">最后登录时间：</th>
							<td class="col-md-8 text-left">{{ $user->login_at }}</td>
						</tr>
					</table>
					<a href="{{ url('user/edit', $user->id) }}" title="编辑" class="btn btn-primary" role="button">编辑</a>
				</div>
			</div>
		</div>
	</div>
@stop