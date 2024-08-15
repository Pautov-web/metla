@extends('admin.layouts.show')

@section('title', __('вопрос от пользователя')) 

@section('form')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Имя') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" id="name" value="{{ $feedback->name }}" class="form-control" placeholder="" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Email') }}</h5>
		</div>
		<div class="card-body">
			<input type="email" id="email" value="{{ $feedback->email }}" class="form-control" placeholder="" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Сообщение') }}</h5>
		</div>
		<div class="card-body">
			<textarea id="msg" class="form-control" disabled>{{ $feedback->msg }}</textarea>
		</div>
	</div>
@endsection