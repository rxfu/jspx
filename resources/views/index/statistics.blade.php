@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">{{ $title }}</div>
						@if (Auth::user()->groups[0]->permissions->contains('index.exportStatistics'))
							<div class="col-md-6 text-right">
								{{ HTML::linkRoute('index.exportStatistics', '导出统计数据(Excel格式)', array($year), array('class' => 'btn btn-success', 'role' => 'button')) }}
							</div>
						@elseif (Auth::user()->groups[0]->permissions->contains('index.exportDepartmentStatistics'))
							<div class="col-md-6 text-right">
								{{ HTML::linkRoute('index.exportDepartmentStatistics', '导出本学院统计数据(Excel格式)', array($year), array('class' => 'btn btn-success', 'role' => 'button')) }}
							</div>
						@endif
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="statistics-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="nosort">一级指标</th>
									<th class="nosort">序号</th>
									<th class="nosort">二级指标</th>
									@foreach ($departments as $department)
										<th class="nosort">{{ $department->collector->name }}</th>
									@endforeach
								</tr>
							</thead>
							<tbody>
								@foreach ($datas as $id => $data)
									<tr>
										<td>{{ $data['category'] }}</td>
										<td>{{ $data['seq'] }}</td>
										<td>{{ HTML::linkRoute('index.compare', $data['index'], array($year, $id)) }}</td>
										@foreach ($departments as $department)
											<td>{{ $data['department' . $department->collection_department] }}</td>
										@endforeach
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