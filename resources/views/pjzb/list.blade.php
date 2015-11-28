@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ url('pjzb/add') }}" class="btn btn-success" role="button" title="添加指标"><i class="fa fa-plus fa-fw"></i>添加评价指标</a></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="category-table" class="table table-striped table-hover data-table">
							<thead>
								<tr>
									<th>指标序号</th>
									<th>指标名称</th>
									<th class="nosort">指标说明</th>
									<th>指标排序</th>
									<th class="nosort">操作</th>
									<th class="nosort">&nbsp;</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($pjzbs as $pjzb)
									<tr>
										<td>{{ $pjzb->xh }}</td>
										<td>{{ $pjzb->mc }}</td>
										<td>{{ $pjzb->ms }}</td>
										<td>{{ $pjzb->px }}</td>
										<td><a href="{{ url('pjzb/show', $pjzb->id) }}" class="btn btn-info" role="button" title="查看"><i class="fa fa-search fa-fw"></i></a></td>
										<td><a href="{{ url('pjzb/edit', $pjzb->id) }}" class="btn btn-primary" role="button" title="编辑"><i class="fa fa-edit fa-fw"></i></a></td>
										<td>
											<form id="delete" name="delete" method="POST" action="{{ url('pjzb/delete', $pjzb->id) }}" role="form" onsubmit="return confirm('你确定要删除这条记录吗？')">
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