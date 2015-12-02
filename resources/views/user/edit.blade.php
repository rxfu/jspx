@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">编辑用户 {{ $user->username }} 个人资料</div>
				<div class="panel-body">
					<form action="{{ url('user/update', $user->id) }}" method="POST" role="form">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="form-group">
								<label for="department" class="control-label">所在部门</label>
								<select name="department" id="department" class="form-control">
									@foreach ($departments as $department)
										<option value="{{ $department->dw }}"{{ $user->department_id == $department->dw ? ' selected' : '' }}>{{ $department->mc }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="major" class="control-label">所在专业</label>
								<select name="major" id="major" class="form-control">
									@foreach ($majors as $major)
										<option value="{{ $major->zy }}" class="{{ $major->xy }}"{{ $user->major_id == $major->zy ? ' selected' : '' }}>{{ $major->mc }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="grade" class="control-label">所在年级</label>
								<input type="text" name="grade" id="grade" class="form-control" placeholder="所在年级" value="{{ $user->grade }}">
							</div>
							<div class="form-group">
								<label for="email" class="control-label">Email</label>
								<input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
							</div>
							<div class="form-group">
								<label for="group" class="control-label">所属组</label>
								<select name="group" class="form-control">
									@foreach ($groups as $group)
										<option value="{{ $group->id }}"{{ $user->groups[0]->id == $group->id ? ' selected' : '' }}>{{ $group->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="activated" class="control-label">启用标志</label>
								<label class="radio-inline">
									<input type="radio" name="activated" id="activated" value="1"{{ ($user->activated == 1) ? ' checked' : ''}}>&nbsp;启用
								</label>
								<label class="radio-inline">
									<input type="radio" name="activated" id="activated" value="0"{{ ($user->activated == 0) ? ' checked' : ''}}>&nbsp;禁用
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