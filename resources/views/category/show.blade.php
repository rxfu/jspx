@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">一级指标 {{ $category->name }} 详细信息</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th class="col-md-4 text-right">指标序号：</th>
							<td class="col-md-8 text-left">{{ $category->seq }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">指标名称：</th>
							<td class="col-md-8 text-left">{{ $category->name }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">指标说明：</th>
							<td class="col-md-8 text-left">{{ $category->description }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">指标排序：</th>
							<td class="col-md-8 text-left">{{ $category->order }}</td>
						</tr>
					</table>
					{{ HTML::linkRoute('category.edit', '编辑', array($category->id), array('class' => 'btn btn-primary', 'role' => 'button')) }}
				</div>
			</div>
		</div>
	</div>
@stop