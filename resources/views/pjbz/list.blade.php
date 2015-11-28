@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ url('pjbz/add') }}" class="btn btn-success" role="button" title="添加标准"><i class="fa fa-plus fa-fw"></i>添加评价标准</a></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="category-table" class="table table-striped table-hover data-table">
							<thead>
								<tr>
									<th>标准序号</th>
									<th>标准名称</th>
									<th>分值</th>
									<th class="nosort">标准说明</th>
									<th>所属指标</th>
									<th class="yesno">是否启用</th>
									<th>标准排序</th>
									<th class="nosort">操作</th>
									<th class="nosort">&nbsp;</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($pjbzs as $pjbz)
									<tr>
										<td>{{ $pjbz->xh }}</td>
										<td>{{ $pjbz->mc }}</td>
										<td>{{ $pjbz->fz }}</td>
										<td>{{ $pjbz->ms }}</td>
										<td>{{ $pjbz->pjzb->mc }}</td>
										<td>{{ $pjbz->zt }}</td>
										<td>{{ $pjbz->px }}</td>
										<td><a href="{{ url('pjbz/show', $pjbz->id) }}" class="btn btn-info" role="button" title="查看"><i class="fa fa-search fa-fw"></i></a></td>
										<td><a href="{{ url('pjbz/edit', $pjbz->id) }}" class="btn btn-primary" role="button" title="编辑"><i class="fa fa-edit fa-fw"></i></a></td>
										<td>
											<form id="delete" name="delete" method="POST" action="{{ url('pjbz/delete', $pjbz->id) }}" role="form" onsubmit="return confirm('你确定要删除这条记录吗？')">
												<input type="hidden" name="_method" value="DELETE">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<button type="submit" class="btn btn-danger" title="删除"><i class="fa fa-trash-o fa-fw"></i></button>
											</form>
										</td>
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