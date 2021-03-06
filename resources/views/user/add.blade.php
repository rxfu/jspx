@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">添加用户</div>
				<div class="panel-body">
					<form action="{{ url('user/save') }}" method="POST" role="form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="form-group">
								<label for="username" class="control-label">用户名</label>
								<input type="text" name="username" id="username" class="form-control" placeholder="用户名" value="{{ old('username') }}">
							</div>
							<div class="form-group">
								<label for="email" class="control-label">Email</label>
								<input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ str_random(10) }}@gxnu.edu">
							</div>
							<div class="form-group">
								<label for="department" class="control-label">所在部门</label>
								<select name="department" id="department" class="form-control">
									@foreach ($departments as $department)
										<option value="{{ $department->dw }}"{{ old('department') == $department->dw ? ' selected' : '' }}>{{ $department->mc }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="major" class="control-label">所在专业</label>
								<select name="major" id="major" class="form-control">
									@foreach ($majors as $major)
										<option value="{{ $major->zy }}" class="{{ $major->xy }}"{{ old('major') == $major->zy ? ' selected' : '' }}>{{ $major->mc }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="grade" class="control-label">所在年级</label>
								<input type="text" name="grade" id="grade" class="form-control" placeholder="所在年级" value="{{ old('grade') }}">
							</div>
							<div class="form-group">
								<label for="group" class="control-label">所属组</label>
								<select name="group" class="form-control">
									@foreach ($groups as $group)
										<option value="{{ $group->id }}"{{ old('group') == $group->id ? ' selected' : '' }}>{{ $group->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="activated" class="control-label">启用标志</label>
								<label class="radio-inline">
									<input type="radio" name="activated" value="1" checked>&nbsp;启用
								</label>
								<label class="radio-inline">
									<input type="radio" name="activated" value="0">&nbsp;禁用
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