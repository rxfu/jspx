@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">{{ $title }}</div>
						@if (Auth::user()->groups[0]->permissions->contains('pfjg.exportStatistics'))
							<div class="col-md-6 text-right">
							<a href="{{ url('pfjg.exportStatistics') }}" title="导出统计数据(Excel格式)" class="btn btn-success" role="button">导出统计数据(Excel格式)</a>
							</div>
						@elseif (Auth::user()->groups[0]->permissions->contains('pfjg.exportDepartmentStatistics'))
							<div class="col-md-6 text-right">
							<a href="{{ url('pfjg.exportDepartmentStatistics') }}" title="导出本学院统计数据(Excel格式)" class="btn btn-success" role="button">导出本学院统计数据(Excel格式)</a>
							</div>
						@elseif (Auth::user()->groups[0]->permissions->contains('pfjg.exportMajorStatistics'))
							<div class="col-md-6 text-right">
							<a href="{{ url('pfjg.exportMajorStatistics') }}" title="导出本学院本年级本专业统计数据(Excel格式)" class="btn btn-success" role="button">导出本学院本年级本专业统计数据(Excel格式)</a>
							</div>
						@endif
					</div>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="statistics-table" class="table table-striped table-bordered table-hover data-table">
							<thead>
								<tr>
									<th>课程序号</th>
									<th>课程名称</th>
									<th>开课学院</th>
									<th>任课教师</th>
									<th>总分</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($results as $result)
									<tr>
										<td>{{ $result->kcxh }}</td>
										<td>{{ $result->kcmc }}</td>
										<td>{{ $result->xymc }}</td>
										<td>{{ $result->jsxm }}</td>
										<td>{{ $result->total }}</td>
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