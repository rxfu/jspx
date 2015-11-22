@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">权限 {{ $permission->identify }} 详细信息</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th class="col-md-4 text-right">权限标识：</th>
							<td class="col-md-8 text-left">{{ $permission->identify }}</td>
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
					{{ HTML::linkRoute('permission.edit', '编辑', array($permission->id), array('class' => 'btn btn-primary', 'role' => 'button')) }}
				</div>
			</div>
		</div>
	</div>
@stop