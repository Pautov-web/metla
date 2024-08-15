@extends('admin.layouts.show')

@section('title', __('роли'))  

@section('form')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Название') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" id="name" value="{{ $role->name }}" class="form-control" placeholder="Support" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">Права</h5>
		</div>
		<div class="card-body">
			@foreach($role->permissions as $permission)
				<div class="form-check form-switch">
					<input class="form-check-input" type="checkbox" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" checked disabled>
					<label class="form-check-label" for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
				</div>
			@endforeach
		</div>
	</div>
@endsection