@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">评价指标 {{ $pjzb->name }} 详细信息</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th class="col-md-4 text-right">指标序号：</th>
							<td class="col-md-8 text-left">{{ $pjzb->xh }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">指标名称：</th>
							<td class="col-md-8 text-left">{{ $pjzb->mc }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">指标说明：</th>
							<td class="col-md-8 text-left">{{ $pjzb->ms }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">指标排序：</th>
							<td class="col-md-8 text-left">{{ $pjzb->px }}</td>
						</tr>
					</table>
					<a href="{{ url('pjzb/edit', $pjzb->id) }}" title="编辑" class="btn btn-primary" role="button">编辑</a>
				</div>
			</div>
		</div>
	</div>
@stop