@extends('app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><a href="{{ url('user/add') }}" class="btn btn-success" role="button" title="添加用户"><i class="fa fa-plus fa-fw"></i>添加用户</a></div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="user-table" class="table table-striped table-hover data-table">
						<thead>
							<tr>
								<th>用户名</th>
								<th>所在部门</th>
								<th>所属组</th>
								<th>Email</th>
								<th class="yesno">是否启用</th>
								<th>最后登录时间</th>
								<th class="nosort">操作</th>
								<th class="nosort">&nbsp;</th>
								<th class="nosort">&nbsp;</th>
								<th class="nosort">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
							<tr>
								<td>{{ $user->username }}</td>
								<td>{{ $user->department->mc }}</td>
								<td>{{ $user->groups[0]->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->activated }}</td>
								<td>{{ $user->login_at }}</td>
								<td><a href="{{ url('user/show', $user->id) }}" class="btn btn-info" role="button" title="查看"><i class="fa fa-search fa-fw"></i></a></td>
								<td>
									<form id="resetPassword" name="resetPassword" method="POST" action="{{ url('user/reset-password', $user->id) }}" role="form">
										<input type="hidden" name="_method" value="PUT">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn btn-warning" title="重置密码"><i class="fa fa-random fa-fw"></i></button>
									</form>
								</td>
								<td><a href="{{ url('user/edit', $user->id) }}" class="btn btn-primary" role="button" title="编辑"><i class="fa fa-edit fa-fw"></i></a></td>
								<td>
									<form id="delete" name="delete" method="POST" action="{{ url('user/delete', $user->id) }}" role="form">
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