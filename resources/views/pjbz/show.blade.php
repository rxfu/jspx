@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">评价标准 {{ $pjbz->name }} 详细信息</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th class="col-md-4 text-right">标准序号：</th>
							<td class="col-md-8 text-left">{{ $pjbz->xh }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">标准名称：</th>
							<td class="col-md-8 text-left">{{ $pjbz->mc }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">分值：</th>
							<td class="col-md-8 text-left">{{ $pjbz->fz }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">标准说明：</th>
							<td class="col-md-8 text-left">{{ $pjbz->ms }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">所属指标：</th>
							<td class="col-md-8 text-left">{{ $pjbz->pjzb->mc }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">是否启用：</th>
							<td class="col-md-8 text-left">{{ $pjbz->zt ? '已启用' : '未启用' }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">标准排序：</th>
							<td class="col-md-8 text-left">{{ $pjbz->px }}</td>
						</tr>
					</table>
					<a href="{{ url('pjbz/edit', $pjbz->id) }}" title="编辑" class="btn btn-primary" role="button">编辑</a>
				</div>
			</div>
		</div>
	</div>
@stop