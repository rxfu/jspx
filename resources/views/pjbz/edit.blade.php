@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">编辑评价标准 {{ $pjbz->name }} 信息</div>
				<div class="panel-body">
					<form action="{{ url('pjbz/update', $pjbz->id) }}" method="POST" role="form">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="form-group">
								<label for="xh" class="control-label">标准序号</label>
								<input type="text" name="xh" id="xh" class="form-control" placeholder="标准序号" value="{{ $pjbz->xh }}">
							</div>
							<div class="form-group">
								<label for="mc" class="control-label">标准名称</label>
								<input type="text" name="mc" id="mc" class="form-control" placeholder="标准名称" value="{{ $pjbz->mc }}">
							</div>
							<div class="form-group">
								<label for="fz" class="control-label">分值</label>
								<input type="text" name="fz" id="fz" class="form-control" placeholder="分值" value="{{ $pjbz->fz }}">
							</div>
							<div class="form-group">
								<label for="ms" class="control-label">标准说明</label>
								<textarea name="ms" cols="50" rows="10" class="form-control" placeholder="标准说明">{{ strip_tags($pjbz->ms) }}</textarea>
							</div>
							<div class="form-group">
								<label for="pjzb" class="control-label">所属指标</label>
								<select name="pjzb" class="form-control">
									@foreach ($pjzbs as $pjzb)
										<option value="{{ $pjzb->id }}"{{ $pjbz->pjzb_id == $pjzb->id ? ' selected' : '' }}>{{ $pjzb->mc }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="px" class="control-label">标准排序</label>
								<select name="px" class="form-control">
									@for ($i = 0; $i < 999; ++$i)
										<option value="{{ $i }}"{{ $pjbz->px == $i ? ' selected' : '' }}>{{ $i }}</option>
									@endfor
								</select>
							</div>
							<div class="form-group">
								<label for="zt" class="control-label">启用标志</label>
								<label class="radio-inline">
									<input type="radio" name="zt" value="1"{{ $pjbz->zt == 1 ? ' checked' : '' }}>&nbsp;启用
								</label>
								<label class="radio-inline">
									<input type="radio" name="zt" value="0"{{ $pjbz->zt == 0 ? ' checked' : '' }}>&nbsp;禁用
								</label>
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block">更新</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop