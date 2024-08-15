@extends('admin.layouts.create')

@section('title', __('FAQ'))  
@section('url', route('admin.faqs.store'))

@section('form')
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Вопрос') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<input type="text" name="question[{{ $key }}]" id="question_{{ $key }}" class="form-control" placeholder="{{ __('Вопрос') }}">
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Ответ') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<textarea name="answer[{{ $key }}]" id="answer_{{ $key }}" rows="2" class="form-control"></textarea>
			</div>
		</div>
	@endforeach
@endsection