@extends('app')

@section('content')
	<form action="{{ url('group/grant', $group->id) }}" method="POST" role="form">
		<input type="hidden" name="_method" value="PUT">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">评价指标管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['pjzb'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<input type="checkbox" name="permissions[]" id="{{ $permission->id }}" value="{{ $permission->id }}"{{ $group->permissions->contains($permission->id) ? ' checked' : '' }}>{{ $permission->name }}
									</div>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">评价标准管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['pjbz'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<input type="checkbox" name="permissions[]" id="{{ $permission->id }}" value="{{ $permission->id }}"{{ $group->permissions->contains($permission->id) ? ' checked' : '' }}>{{ $permission->name }}
									</div>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">评分等级管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['pfdj'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<input type="checkbox" name="permissions[]" id="{{ $permission->id }}" value="{{ $permission->id }}"{{ $group->permissions->contains($permission->id) ? ' checked' : '' }}>{{ $permission->name }}
									</div>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">评分结果管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['pfjg'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<input type="checkbox" name="permissions[]" id="{{ $permission->id }}" value="{{ $permission->id }}"{{ $group->permissions->contains($permission->id) ? ' checked' : '' }}>{{ $permission->name }}
									</div>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">用户管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['user'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<input type="checkbox" name="permissions[]" id="{{ $permission->id }}" value="{{ $permission->id }}"{{ $group->permissions->contains($permission->id) ? ' checked' : '' }}>{{ $permission->name }}
									</div>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">组管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['group'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<input type="checkbox" name="permissions[]" id="{{ $permission->id }}" value="{{ $permission->id }}"{{ $group->permissions->contains($permission->id) ? ' checked' : '' }}>{{ $permission->name }}
									</div>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">权限管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['permission'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<input type="checkbox" name="permissions[]" id="{{ $permission->id }}" value="{{ $permission->id }}"{{ $group->permissions->contains($permission->id) ? ' checked' : '' }}>{{ $permission->name }}
									</div>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</form>
@stop