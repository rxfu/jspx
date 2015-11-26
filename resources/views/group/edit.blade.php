@extends('app')

@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">编辑组 {{ $group->name }} 信息</div>
				<div class="panel-body">
					<form action="{{ url('group/update', $group->id) }}" method="POST" role="form">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							<div class="form-group">
								<label for="description" class="control-label">组描述</label>
								<textarea name="description" cols="50" rows="10" class="form-control" placeholder="组描述">{{ strip_tags($group->description) }}</textarea>
							</div>
							<button type="submit" class="btn btn-lg btn-success btn-block">更新</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop