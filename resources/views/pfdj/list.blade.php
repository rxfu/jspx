@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><a href="{{ url('pfdj/add') }}" class="btn btn-success" role="button" title="添加评分等级"><i class="fa fa-plus fa-fw"></i>添加评分等级</a></div>
				<div class="panel-body">
					<div class="table-responsive">
						<table id="pfdj-table" class="table table-striped table-hover data-table">
							<thead>
								<tr>
									<th>等级名称</th>
									<th>最低分值</th>
									<th>最高分值</th>
									<th class="nosort">操作</th>
									<th class="nosort">&nbsp;</th>
									<th class="nosort">&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($pfdjs as $pfdj)
									<tr>
										<td>{{ $pfdj->mc }}</td>
										<td>{{ $pfdj->zdfz }}</td>
										<td>{{ $pfdj->zgfz }}</td>
										<td><a href="{{ url('pfdj/show', $pfdj->id) }}" class="btn btn-info" role="button" title="查看"><i class="fa fa-search fa-fw"></i></a></td>
										<td><a href="{{ url('pfdj/edit', $pfdj->id) }}" class="btn btn-primary" role="button" title="编辑"><i class="fa fa-edit fa-fw"></i></a></td>
										<td>
											<form id="delete" name="delete" method="POST" action="{{ url('pfdj/delete', $pfdj->id) }}" role="form" onsubmit="return confirm('你确定要删除这条记录吗？')">
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