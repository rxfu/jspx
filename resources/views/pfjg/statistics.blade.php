@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">{{ $title }}</div>
						<div class="col-md-6 text-right">
						<a href="{{ url('pfjg/export-statistics', [$year, $term]) }}" title="导出统计数据(Excel格式)" class="btn btn-success" role="button">导出统计数据(Excel格式)</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="statistics-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>课程序号</th>
									<th>课程名称</th>
									<th>开课学院</th>
									<th>专业</th>
									<th>年级</th>
									<th>总分</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td>课程序号</td>
									<td>课程名称</td>
									<td>开课学院</td>
									<td>专业</td>
									<td>年级</td>
									<td>总分</td>
								</tr>
							</tfoot>
							<tbody>
								@foreach ($results as $result)
									<tr>
										<td>{{ $result->kcxh }}</td>
										<td>{{ $result->kcmc }}</td>
										<td>{{ $result->xymc }}</td>
										<td>{{ $result->zymc }}</td>
										<td>{{ $result->nj }}</td>
										<td>{{ number_format($result->total, 2) }}</td>
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