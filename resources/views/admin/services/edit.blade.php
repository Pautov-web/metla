@extends('admin.layouts.edit')

@section('title', __('услугу'))  
@section('url', route('admin.services.update', ['service' => $service->id]))
@section('url-destroy', route('admin.services.destroy', ['service' => $service->id]))

@section('form')
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Название') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<input type="text" name="name[{{ $key }}]" value="{{ $service->getTranslations('name')[$key] }}" id="name_{{ $key }}" class="form-control" placeholder="{{ __('Статья') }}">
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Короткое описание') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<textarea name="excerpt[{{ $key }}]" id="excerpt_{{ $key }}" rows="2" class="form-control">{{ $service->getTranslations('excerpt')[$key] }}</textarea>
			</div>
		</div>
	@endforeach
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Слаг') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="slug" value="{{ $service->slug }}" id="slug" class="form-control" placeholder="article-1">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Цена') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" step="0.01" value="{{ $service->price }}" name="price" id="price" class="form-control" placeholder="0.11">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Базовое время (в минутах)') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" name="time" id="time" value="{{ $service->time }}" class="form-control" placeholder="15">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Отображать выбор даты и времени заказа?') }}</h5>
		</div>
		<div class="card-body">
			<select name="change_date" id="change_date" class="form-control mb-3">
				<option value="1" {{ $service->change_date ? 'selected' : '' }}>{{ __('Да') }}</option>
				<option value="0" {{ !$service->change_date ? 'selected' : '' }}>{{ __('Нет') }}</option>
			</select>
		</div>
	</div>
@endsection