@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">添加评分等级</div>
				<div class="panel-body">
					<form action="{{ url('pfdj/save') }}" method="POST" role="form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="form-group">
								<label for="mc" class="control-label">等级名称</label>
								<input type="text" name="mc" id="mc" class="form-control" placeholder="等级名称" value="{{ old('mc') }}">
							</div>
							<div class="form-group">
								<label for="zdfz" class="control-label">最低分值</label>
								<input type="text" name="zdfz" id="zdfz" class="form-control" placeholder="最低分值" value="{{ old('zdfz') }}">
							</div>
							<div class="form-group">
								<label for="zgfz" class="control-label">最高分值</label>
								<input type="text" name="zgfz" id="zgfz" class="form-control" placeholder="最高分值" value="{{ old('zgfz') }}">
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block">添加</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop