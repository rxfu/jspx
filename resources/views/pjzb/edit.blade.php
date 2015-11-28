@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">编辑评价指标 {{ $pjzb->name }} 信息</div>
				<div class="panel-body">
					<form action="{{ url('pjzb/update', $pjzb->id) }}" method="POST" role="form">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="form-group">
								<label for="xh" class="control-label">指标序号</label>
								<input type="text" name="xh" id="xh" class="form-control" placeholder="指标序号" value="{{ $pjzb->xh }}">
							</div>
							<div class="form-group">
								<label for="mc" class="control-label">指标名称</label>
								<input type="text" name="mc" id="mc" class="form-control" placeholder="指标名称" value="{{ $pjzb->mc }}">
							</div>
							<div class="form-group">
								<label for="ms" class="control-label">指标说明</label>
								<textarea name="ms" cols="50" rows="10" class="form-control" placeholder="指标说明">{{ strip_tags($pjzb->ms) }}</textarea>
							</div>
							<div class="form-group">
								<label for="px" class="control-label">指标排序</label>
								<select name="px" class="form-control">
									@for ($i = 0; $i < 999; ++$i)
										<option value="{{ $i }}"{{ $pjzb->px == $i ? ' selected' : '' }}>{{ $i }}</option>
									@endfor
								</select>
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block">更新</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop