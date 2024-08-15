@extends('admin.layouts.show')

@section('title', __('отзывы')) 

@section('form')
	<div class="card">
		<div class="card-body">
			<div class="form-check form-switch">
				<input class="form-check-input" value="1" type="checkbox" id="instagram" {{ $review->instagram ? 'checked' : '' }} disabled>
				<label class="form-check-label" for="instagram">{{ __('Отзыв из instagram') }}</label>
			</div>
		</div>
	</div>
	@if($review->instagram)
		<div class="card" data-inst="1">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Изображение отзыва') }}</h5>
			</div>
			@if(!is_null($review->file))
				<div class="card-body">
					<div class="mb-3">
						<img src="/storage/{{ $review->file }}" width="150px" height="300px" style="object-fit: cover;" alt="">
					</div>
				</div>
			@endif
		</div>
	@else
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Имя') }}</h5>
			</div>
			<div class="card-body">
				<input type="text" value="{{ $review->name }}" id="name" class="form-control" placeholder="{{ __('Анастасия') }}" disabled>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Текст отзыва') }}</h5>
			</div>
			<div class="card-body">
				<textarea id="content" class="form-control" disabled>{{ $review->content }}</textarea>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Рейтинг') }}</h5>
			</div>
			<div class="card-body">
				<input type="number" value="{{ $review->rating }}" id="rating" class="form-control" disabled>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Статус публикации') }}</h5>
			</div>
			<div class="card-body">
				<select id="publish" class="form-control" disabled>
					<option value="0" {{ !$review->publish ? 'selected' : '' }}>{{ __('На утверждении') }}</option>
					<option value="1" {{ $review->publish ? 'selected' : '' }}>{{ __('Опубликовано') }}</option>
				</select>
			</div>
		</div>
	@endif
@endsection