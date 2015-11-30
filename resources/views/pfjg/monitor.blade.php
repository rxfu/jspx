@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				@if (Auth::user()->groups[0]->permissions->contains('pfjg.exportMonitor'))
					<div class="panel-heading">
						<a href="{{ url('pfjg.exportMonitor') }}" title="导出监控数据(Excel格式)" class="btn btn-success" role="button">导出监控数据(Excel格式)</a>
					</div>
				@endif
				<div class="panel-body">
					<div class="table-responsive">
						<table id="monitor-table" class="table table-striped table-hover data-table">
							<thead>
								<tr>
									<th>教师工号</th>
									<th>教师姓名</th>
									<th>所在学院</th>
									<th>课程序号</th>
									<th>已评数量</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($results as $result)
									<tr>
										<td>{{ $result->jsgh }}</td>
										<td>{{ $result->jsxm }}</td>
										<td>{{ $result->xymc }}</td>
										<td>{{ $result->kcxh }}</td>
										<td>{{ $result->count }}</td>
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