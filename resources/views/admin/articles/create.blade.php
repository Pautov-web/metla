@extends('admin.layouts.create')

@section('title', __('статью'))  
@section('url', route('admin.articles.store'))

@section('form')
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Название') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<input type="text" name="name[{{ $key }}]" id="name_{{ $key }}" class="form-control" placeholder="{{ __('Статья') }}">
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Контент') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<textarea name="content[{{ $key }}]" id="content_{{ $key }}" rows="2" class="form-control"></textarea>
			</div>
		</div>
	@endforeach
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Слаг') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="slug" id="slug" class="form-control" placeholder="article-1">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Изображение статьи') }}</h5>
		</div>
		<div class="card-body">
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
				<option value="0" selected>{{ __('Черновик') }}</option>
				<option value="1">{{ __('Опубликовано') }}</option>
			</select>
		</div>
	</div>
@endsection

@push('scripts')
	@include('admin.blocks.tiny')
@endpush