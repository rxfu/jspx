@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				@if (Auth::user()->groups[0]->permissions->contains('index.exportMonitor'))
					<div class="panel-heading">
						{{ HTML::linkRoute('index.exportMonitor', '导出监控数据(Excel格式)', array(), array('class' => 'btn btn-success', 'role' => 'button')) }}
					</div>
				@endif
				<div class="panel-body">
					<div class="table-responsive">
						<table id="role-table" class="table table-striped table-hover data-table">
							<thead>
								<tr>
									<th>填报部门</th>
									<th>二级指标名称</th>
									<th class="yesno">填报状态</th>
									<th class="yesno">审核状态</th>
									<th class="yesno">通过状态</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($states as $state)
									<tr>
										<td>{{ $state->collector->name }}</td>
										<td>{{ $state->index->seq . '. ' . $state->index->name }}</td>
										<td>{{ $state->entried }}</td>
										<td>{{ $state->checked }}</td>
										<td>{{ $state->passed }}</td>
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