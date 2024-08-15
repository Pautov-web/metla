@extends('admin.layouts.show')

@section('title', __('услуги')) 

@section('form')
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Название') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<input type="text" value="{{ $service->getTranslations('name')[$key] }}" id="name_{{ $key }}" class="form-control" placeholder="{{ __('Статья') }}" disabled>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Короткое описание') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<textarea id="excerpt_{{ $key }}" rows="2" class="form-control" disabled>{{ $service->getTranslations('excerpt')[$key] }}</textarea>
			</div>
		</div>
	@endforeach
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Слаг') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" value="{{ $service->slug }}" id="slug" class="form-control" placeholder="article-1" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Цена') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" step="0.01" value="{{ $service->price }}" id="price" class="form-control" placeholder="0.11" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Базовое время (в минутах)') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" id="time" value="{{ $service->time }}" class="form-control" placeholder="15" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Отображать выбор даты и времени заказа?') }}</h5>
		</div>
		<div class="card-body">
			<select name="change_date" id="change_date" class="form-control mb-3" disabled>
				<option value="1" {{ $service->change_date ? 'selected' : '' }}>{{ __('Да') }}</option>
				<option value="0" {{ !$service->change_date ? 'selected' : '' }}>{{ __('Нет') }}</option>
			</select>
		</div>
	</div>
@endsection