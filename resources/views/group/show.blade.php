@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">组 {{ $group->name }} 详细信息</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th class="col-md-4 text-right">组名称：</th>
							<td class="col-md-8 text-left">{{ $group->name }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">组描述：</th>
							<td class="col-md-8 text-left">{{ $group->description }}</td>
						</tr>
					</table>
					{{ HTML::linkRoute('group.edit', '编辑', array($group->id), array('class' => 'btn btn-primary', 'role' => 'button')) }}
				</div>
			</div>
		</div>
	</div>
@stop