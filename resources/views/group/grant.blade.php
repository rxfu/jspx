@extends('master')

@section('content')
	{{ Form::open(array('action' => array('GroupController@postGrant', $group->id), 'method' => 'post', 'role' => 'form')) }}
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">录入指标管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['entry'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<div class="checkbox">
											{{ Form::checkbox('permissions[]', $permission->id, $group->permissions->contains($permission->identify) ? true : false) }}
											{{ $permission->name }}
										</div>
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
					<div class="panel-heading">审核指标管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['audit'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<div class="checkbox">
											{{ Form::checkbox('permissions[]', $permission->id, $group->permissions->contains($permission->identify) ? true : false) }}
											{{ $permission->name }}
										</div>
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
					<div class="panel-heading">一级指标管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['category'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<div class="checkbox">
											{{ Form::checkbox('permissions[]', $permission->id, $group->permissions->contains($permission->identify) ? true : false) }}
											{{ $permission->name }}
										</div>
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
					<div class="panel-heading">二级指标管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['index'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<div class="checkbox">
											{{ Form::checkbox('permissions[]', $permission->id, $group->permissions->contains($permission->identify) ? true : false) }}
											{{ $permission->name }}
										</div>
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
										<div class="checkbox">
											{{ Form::checkbox('permissions[]', $permission->id, $group->permissions->contains($permission->identify) ? true : false) }}
											{{ $permission->name }}
										</div>
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
										<div class="checkbox">
											{{ Form::checkbox('permissions[]', $permission->id, $group->permissions->contains($permission->identify) ? true : false) }}
											{{ $permission->name }}
										</div>
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
										<div class="checkbox">
											{{ Form::checkbox('permissions[]', $permission->id, $group->permissions->contains($permission->identify) ? true : false) }}
											{{ $permission->name }}
										</div>
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
					<div class="panel-heading">部门管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['department'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<div class="checkbox">
											{{ Form::checkbox('permissions[]', $permission->id, $group->permissions->contains($permission->identify) ? true : false) }}
											{{ $permission->name }}
										</div>
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
					<div class="panel-heading">系统设置管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['system'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<div class="checkbox">
											{{ Form::checkbox('permissions[]', $permission->id, $group->permissions->contains($permission->identify) ? true : false) }}
											{{ $permission->name }}
										</div>
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
					<div class="panel-heading">采集设置管理</div>
					<div class="panel-body">
						<ul>
							@foreach ($permissions['setting'] as $permission)
								<li class="pull-left center-block" style="width:150px">
									<div class="checkbox">
										<div class="checkbox">
											{{ Form::checkbox('permissions[]', $permission->id, $group->permissions->contains($permission->identify) ? true : false) }}
											{{ $permission->name }}
										</div>
									</div>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	{{ Form::close() }}
@stop