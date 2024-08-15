@extends('admin.layouts.show')

@section('title', __('FAQ')) 

@section('form')
	@foreach(config('langs') as $key => $value)
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Вопрос') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<input type="text" id="question_{{ $key }}" class="form-control" placeholder="{{ __('Вопрос') }}" value="{{ $faq->question }}" disabled>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Ответ') }} ({{ __($value) }})</h5>
			</div>
			<div class="card-body">
				<textarea id="answer_{{ $key }}" rows="2" class="form-control" disabled>{{ $faq->answer }}</textarea>
			</div>
		</div>
	@endforeach
@endsection