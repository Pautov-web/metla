@extends('admin.layouts.edit')

@section('title', __('валюту'))  
@section('url', route('admin.currencies.update', ['currency' => $currency->id]))
@section('url-destroy', route('admin.currencies.destroy', ['currency' => $currency->id]))

@section('form')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Слаг') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="slug" id="slug" value="{{ $currency->slug }}" class="form-control" placeholder="RUB">
		</div>
	</div>
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Название') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<input type="text" name="name[{{ $key }}]" id="name_{{ $key }}" value="{{ $currency->getTranslations('name')[$key] }}" class="form-control" placeholder="Рубль">
			</div>
		</div>
	@endforeach
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Символ валюты') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="symbol" id="symbol" value="{{ $currency->symbol }}" class="form-control" placeholder="₽">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Курс к валюте по-умолчанию') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" name="rate" id="rate" value="{{ $currency->rate }}" class="form-control" step="0.01" placeholder="0.01">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('По-умолчанию') }}</h5>
		</div>
		<div class="card-body">
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" name="default" id="default" value="1" {{ $currency->default ? 'checked' : '' }}>
				<label class="form-check-label" for="default"></label>
			</div>
		</div>
	</div>
@endsection