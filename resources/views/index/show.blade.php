@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">二级指标 {{ $index->name }} 详细信息</div>
				<div class="panel-body">
					<table class="table table-striped">
						<tr>
							<th class="col-md-4 text-right">指标序号：</th>
							<td class="col-md-8 text-left">{{ $index->seq }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">指标名称：</th>
							<td class="col-md-8 text-left">{{ $index->name }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">指标说明：</th>
							<td class="col-md-8 text-left">{{ $index->description }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">填报类型：</th>
							<td class="col-md-8 text-left">{{ $index->type }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">是否需要上传文件：</th>
							<td class="col-md-8 text-left">{{ $index->has_file ? '需要文件' : '无需文件' }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">指标排序：</th>
							<td class="col-md-8 text-left">{{ $index->order }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">填报部门：</th>
							<td class="col-md-8 text-left">{{ $index->collection_department == 'all' ? '所有填报部门' : $index->collector->name }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">审核部门：</th>
							<td class="col-md-8 text-left">{{ $index->marker->name }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">所属一级指标：</th>
							<td class="col-md-8 text-left">{{ $index->category->name }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">是否启用：</th>
							<td class="col-md-8 text-left">{{ $index->activated ? '已启用' : '未启用' }}</td>
						</tr>
						<tr>
							<th class="col-md-4 text-right">备注：</th>
							<td class="col-md-8 text-left">{{ $index->memo }}</td>
						</tr>
					</table>
					{{ HTML::linkRoute('index.edit', '编辑', array($index->id), array('class' => 'btn btn-primary', 'role' => 'button')) }}
				</div>
			</div>
		</div>
	</div>
@stop