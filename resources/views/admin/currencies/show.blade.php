@extends('admin.layouts.show')

@section('title', __('валюты')) 

@section('form')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Слаг') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" id="slug" value="{{ $currency->slug }}" class="form-control" placeholder="RUB" disabled>
		</div>
	</div>
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Название') }}</h5>
			</div>
			<div class="card-body">
				<input type="text" id="name_{{ $key }}" value="{{ $currency->getTranslations('name')[$key] }}" class="form-control" placeholder="{{ __('Рубль') }}" disabled>
			</div>
		</div>
	@endforeach
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Символ валюты') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" id="symbol" value="{{ $currency->symbol }}" class="form-control" placeholder="₽" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Курс к валюте по-умолчанию') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" id="rate" value="{{ $currency->rate }}" class="form-control" step="0.01" placeholder="0.01" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('По-умолчанию') }}</h5>
		</div>
		<div class="card-body">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" id="default" value="1" {{ $currency->default ? 'checked' : '' }} disabled>
				<label class="form-check-label" for="default"></label>
			</div>
		</div>
	</div>
@endsection