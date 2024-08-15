@extends('admin.layouts.create')

@section('title', __('опцию'))  
@section('url', route('admin.options.store'))

@section('form')
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Название') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<input type="text" name="name[{{ $key }}]" id="name_{{ $key }}" class="form-control" placeholder="{{ __('Офис') }}">
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
						<input class="form-check-input" type="radio" name="icon" value="{{ $icon }}">
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
			<input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="0.11">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Время (в минутах)') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" name="time" id="time" class="form-control" placeholder="15">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Минимальное значение') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" name="min" id="min" class="form-control" placeholder="1">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Максимальное значение') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" name="max" id="max" class="form-control" placeholder="10">
		</div>
	</div>
@endsection