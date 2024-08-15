@extends('admin.layouts.edit')

@section('title', __('роль'))  
@section('url', route('admin.roles.update', ['role' => $role->id]))
@section('url-destroy', route('admin.roles.destroy', ['role' => $role->id]))

@section('form')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Название') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="name" id="name" value="{{ $role->name }}" class="form-control" placeholder="Support">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Права') }}</h5>
		</div>
		<div class="card-body">
			@foreach($permissions as $permission)
				<div class="form-check form-switch">
					<input class="form-check-input" type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" {{ $role->permissions->where('id', $permission->id)->count() != 0 ? 'checked' : '' }}>
					<label class="form-check-label" for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
				</div>
			@endforeach
		</div>
	</div>
@endsection