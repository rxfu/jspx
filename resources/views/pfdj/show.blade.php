@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">评分等级 {{ $pfdj->mc }} 详细信息</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th class="col-md-4 text-right">最低分值：</th>
							<td class="col-md-8 text-left">{{ $pfdj->zdfz }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">最高分值：</th>
							<td class="col-md-8 text-left">{{ $pfdj->zgfz }}</td>
						</tr>
					</table>
					<a href="{{ url('pfdj/edit', $pfdj->id) }}" title="编辑" class="btn btn-primary" role="button">编辑</a>
				</div>
			</div>
		</div>
	</div>
@stop