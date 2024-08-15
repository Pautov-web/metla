@extends('admin.layouts.show')

@section('title', __('опции')) 

@section('form')
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Название') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<input type="text" value="{{ $option->getTranslations('name')[$key] }}" id="name_{{ $key }}" class="form-control" placeholder="{{ __('Офис') }}" disabled>
			</div>
		</div>
	@endforeach
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Иконка') }}</h5>
		</div>
		<div class="card-body">
			<div>
				@foreach(config('icons') as $icon)
					<label class="form-check form-check-inline">
						<input class="form-check-input" type="radio" value="{{ $icon }}" {{ $icon == $option->icon ? 'checked' : '' }} disabled>
						<span class="form-check-label">
                    		<i class="align-middle" data-feather="{{ $icon }}"></i> 
						</span>
					</label>
				@endforeach
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Цена') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" step="0.01" value="{{ $option->price }}" id="price" class="form-control" placeholder="0.11" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Время (в минутах)') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" value="{{ $option->time }}" id="time" class="form-control" placeholder="15" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Минимальное значение') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" id="min" value="{{ $option->min ?? '' }}" class="form-control" placeholder="1" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Максимальное значение') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" id="max" value="{{ $option->max ?? '' }}" class="form-control" placeholder="10" disabled>
		</div>
	</div>
@endsection