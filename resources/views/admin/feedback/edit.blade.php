@extends('admin.layouts.edit')

@section('title', __('вопрос от пользователя'))  
@section('url', route('admin.feedback.update', ['feedback' => $feedback->id]))
@section('url-destroy', route('admin.feedback.destroy', ['feedback' => $feedback->id]))

@section('form')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Имя') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="name" id="name" value="{{ $feedback->name }}" class="form-control" placeholder="">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Email') }}</h5>
		</div>
		<div class="card-body">
			<input type="email" name="email" id="email" value="{{ $feedback->email }}" class="form-control" placeholder="">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Сообщение') }}</h5>
		</div>
		<div class="card-body">
			<textarea name="msg" id="msg" class="form-control">{{ $feedback->msg }}</textarea>
		</div>
	</div>
@endsection