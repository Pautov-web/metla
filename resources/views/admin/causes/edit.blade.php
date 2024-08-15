@extends('admin.layouts.edit')

@section('title', __('причину'))  
@section('url', route('admin.causes.update', ['cause' => $cause->id]))
@section('url-destroy', route('admin.causes.destroy', ['cause' => $cause->id]))

@section('form')
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Название') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<input type="text" name="name[{{ $key }}]" id="name_{{ $key }}" value="{{ $cause->getTranslations('name')[$key] }}" class="form-control" placeholder="Рубль">
			</div>
		</div>
	@endforeach
@endsection