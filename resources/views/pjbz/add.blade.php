@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">添加评价标准</div>
				<div class="panel-body">
					<form action="{{ url('pjbz/save') }}" method="POST" role="form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="form-group">
								<label for="xh" class="control-label">标准序号</label>
								<input type="text" name="xh" id="xh" class="form-control" placeholder="标准序号" value="{{ old('xh') }}">
							</div>
							<div class="form-group">
								<label for="mc" class="control-label">标准名称</label>
								<input type="text" name="mc" id="mc" class="form-control" placeholder="标准名称" value="{{ old('mc') }}">
							</div>
							<div class="form-group">
								<label for="fz" class="control-label">分值</label>
								<input type="text" name="fz" id="fz" class="form-control" placeholder="分值" value="{{ old('fz') }}">
							</div>
							<div class="form-group">
								<label for="ms" class="control-label">标准说明</label>
								<textarea name="ms" cols="50" rows="10" class="form-control" placeholder="标准说明">{{ old('ms') }}</textarea>
							</div>
							<div class="form-group">
								<label for="pjzb" class="control-label">所属指标</label>
								<select name="pjzb" class="form-control">
									@foreach ($pjzbs as $pjzb)
										<option value="{{ $pjzb->id }}"{{ old('pjzb') == $pjzb->id ? ' selected' : '' }}>{{ $pjzb->mc }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="px" class="control-label">标准排序</label>
								<select name="px" class="form-control">
									@for ($i = 0; $i < 999; ++$i)
										<option value="{{ $i }}"{{ old('px') == $i ? ' selected' : '' }}>{{ $i }}</option>
									@endfor
								</select>
							</div>
							<div class="form-group">
								<label for="zt" class="control-label">启用标志</label>
								<label class="radio-inline">
									<input type="radio" name="zt" value="1" checked>&nbsp;启用
								</label>
								<label class="radio-inline">
									<input type="radio" name="zt" value="0">&nbsp;禁用
								</label>
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block">添加</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop