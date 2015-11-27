@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">编辑评分等级 {{ $pfdj->mc }} 信息</div>
				<div class="panel-body">
					<form action="{{ url('pfdj/update', $pfdj->id) }}" method="POST" role="form">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="form-group">
								<label for="zdfz" class="control-label">最低分值</label>
								<input type="text" name="zdfz" id="zdfz" class="form-control" placeholder="最低分值" value="{{ $pfdj->zdfz }}">
							</div>
							<div class="form-group">
								<label for="zgfz" class="control-label">最高分值</label>
								<input type="text" name="zgfz" id="zgfz" class="form-control" placeholder="最高分值" value="{{ $pfdj->zgfz }}">
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block">更新</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop