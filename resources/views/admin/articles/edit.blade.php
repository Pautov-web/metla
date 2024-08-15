@extends('admin.layouts.edit')

@section('title', __('статью'))  
@section('url', route('admin.articles.update', ['article' => $article->id]))
@section('url-destroy', route('admin.articles.destroy', ['article' => $article->id]))

@section('form')
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Название') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<input type="text" name="name[{{ $key }}]" id="name_{{ $key }}" class="form-control" value="{{ $article->getTranslations('name')[$key] }}" placeholder="{{ __('Статья') }}">
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Контент') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<textarea name="content[{{ $key }}]" id="content_{{ $key }}" rows="2" class="form-control">{{ $article->getTranslations('content')[$key] }}</textarea>
			</div>
		</div>
	@endforeach
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Слаг') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="slug" id="slug" value="{{ $article->slug }}" class="form-control" placeholder="article-1">
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
			<div class="mb-3">
				<label class="form-label" for="img" accept="image/*">{{ __('Файл') }}</label>
				<input name="img" id="img" class="form-control" type="file">
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Статус публикации') }}</h5>
		</div>
		<div class="card-body">
			<select name="publish" id="publish" class="form-control mb-3">
				<option value="0" {{ !$article->publish ? 'selected' : '' }}>{{ __('Черновик') }}</option>
				<option value="1" {{ $article->publish ? 'selected' : '' }}>{{ __('Опубликовано') }}</option>
			</select>
		</div>
	</div>
@endsection

@push('scripts')
	@include('admin.blocks.tiny')
@endpush