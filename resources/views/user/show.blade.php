@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">用户 {{ $user->username }} 详细信息</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th class="col-md-4 text-right">所在部门：</th>
							<td class="col-md-8 text-left">{{ $user->department->name }}</td>
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
					{{ HTML::linkRoute('user.edit', '编辑', array($user->id), array('class' => 'btn btn-primary', 'role' => 'button')) }}
				</div>
			</div>
		</div>
	</div>
@stop