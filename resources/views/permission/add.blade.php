@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">添加权限</div>
				<div class="panel-body">
					<form action="{{ url('permission/save') }}" method="POST" role="form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="form-group">
								<label for="id" class="control-label">权限标识</label>
								<input type="text" name="id" id="id" class="form-control" placeholder="权限标识" value="{{ old('id') }}">
							</div>
							<div class="form-group">
								<label for="name" class="control-label">权限名称</label>
								<input type="text" name="name" id="name" class="form-control" placeholder="权限名称" value="{{ old('name') }}">
							</div>
							<div class="form-group">
								<label for="description" class="control-label">权限描述</label>
								<textarea name="description" cols="50" rows="10" class="form-control" placeholder="权限描述">{{ old('description') }}</textarea>
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block">添加</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop