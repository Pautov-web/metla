@extends('admin.layouts.show')

@section('title', __('статьи')) 

@section('form')
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Название') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<input type="text" id="name_{{ $key }}" class="form-control" value="{{ $article->getTranslations('name')[$key] }}" placeholder="{{ __('Статья') }}" disabled>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Контент') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				{!! $article->getTranslations('content')[$key] !!}
			</div>
		</div>
	@endforeach
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Слаг') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" id="slug" value="{{ $article->slug }}" class="form-control" placeholder="article-1" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Изображение статьи') }}</h5>
		</div>
		<div class="card-body">
			@if(!is_null($article->img))
				<div class="mb-3">
					<img src="/storage/{{ $article->img }}" width="300px" height="200px" style="object-fit: contain;" alt="">
				</div>
			@endif
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Статус публикации') }}</h5>
		</div>
		<div class="card-body">
			<select id="publish" class="form-control mb-3" disabled>
				<option value="0" {{ !$article->publish ? 'selected' : '' }}>{{ __('Черновик') }}</option>
				<option value="1" {{ $article->publish ? 'selected' : '' }}>{{ __('Опубликовано') }}</option>
			</select>
		</div>
	</div>
@endsection