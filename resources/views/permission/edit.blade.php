@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">编辑权限 {{ $permission->identify }} 信息</div>
				<div class="panel-body">
					<form action="{{ url('permission/update', $permission->id) }}" method="POST" role="form">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="form-group">
								<label for="name" class="control-label">权限名称</label>
								<input type="text" name="name" id="name" class="form-control" placeholder="权限名称" value="{{ $permission->name }}">
							</div>
							<div class="form-group">
								<div class="form-group">
									<label for="description" class="control-label">权限描述</label>
									<textarea name="description" cols="50" rows="10" class="form-control" placeholder="权限描述">{{ strip_tags($permission->description) }}</textarea>
								</div>
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block">更新</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop