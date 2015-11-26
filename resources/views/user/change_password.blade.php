@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">修改用户 {{ Auth::user()->username }} 密码</div>
				<div class="panel-body">
					<form action="{{ url('user/change-password' )}}" method="POST" role="form">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="form-group">
								<label for="password_old" class="control-label">旧密码</label>
								<input type="password" name="password_old" id="password_old" class="form-control" placeholder="旧密码">
							</div>
							<div class="form-group">
								<label for="password" class="control-label">新密码</label>
								<input type="password" name="password" id="password_old" class="form-control" placeholder="新密码">
							</div>
							<div class="form-group">
								<label for="password_confirmation" class="control-label">确认密码</label>
								<input type="password" name="password_confirmation" id="password_old" class="form-control" placeholder="确认密码">
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block">修改密码</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop