@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">{{ $indexdatas[0]->index->name . ' ' . $title }}</div>
						@if (Auth::user()->groups[0]->permissions->contains('index.exportStatistics'))
							<div class="col-md-6 text-right">
								{{ HTML::linkRoute('index.exportCompare', '导出单指标统计数据(Excel格式)', array($indexdatas[0]->year, $indexdatas[0]->index_id), array('class' => 'btn btn-success', 'role' => 'button')) }}
							</div>
						@endif
					</div>					
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="statistics-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>填报部门</th>
									<th>{{ $indexdatas[0]->index->name }}</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($indexdatas as $indexdata)
									<tr>
										<td>{{ $indexdata->collector->name }}</td>
										<td>{{ $indexdata->data }}</td>
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