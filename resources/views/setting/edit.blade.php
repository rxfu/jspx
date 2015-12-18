@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">系统设置</div>
				<div class="panel-body">
					<form action="{{ url('setting/update', $setting->id) }}" method="POST" role="form">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="form-group">
								<label for="is_open" class="control-label">系统开关</label>
								<label class="radio-inline">
									<input type="radio" name="is_open" id="is_open" value="1"{{ ($setting->is_open == 1) ? ' checked' : ''}}>&nbsp;开启
								</label>
								<label class="radio-inline">
									<input type="radio" name="is_open" id="is_open" value="0"{{ ($setting->activated == 0) ? ' checked' : ''}}>&nbsp;关闭
								</label>
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block">设置</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop