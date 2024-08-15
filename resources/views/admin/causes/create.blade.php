@extends('admin.layouts.create')

@section('title', __('причину'))  
@section('url', route('admin.causes.store'))

@section('form')
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Название') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<input type="text" name="name[{{ $key }}]" id="name_{{ $key }}" class="form-control" placeholder="{{ __('Просто так') }}">
			</div>
		</div>
	@endforeach
@endsection