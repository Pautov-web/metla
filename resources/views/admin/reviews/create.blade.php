@extends('admin.layouts.create')

@section('title', __('отзыв'))  
@section('url', route('admin.reviews.store'))

@section('form')
	<div class="card">
		<div class="card-body">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Тип отзыва') }}</h5>
			</div>
			<div class="card-body">
				<select name="instagram" id="instagram" class="form-control">
					<option value="0">{{ __('Простой отзыв') }}</option>
					<option value="1">{{ __('Отзыв из instagram') }}</option>
				</select>
			</div>
		</div>
	</div>
	<div class="card" data-inst="1">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Изображение отзыва') }}</h5>
		</div>
		<div class="card-body">
			<input type="file" name="file" id="file" class="form-control">
		</div>
	</div>
	<div class="card" data-inst="0">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Имя') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Анастасия') }}">
		</div>
	</div>
	<div class="card" data-inst="0">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Текст отзыва') }}</h5>
		</div>
		<div class="card-body">
			<textarea name="content" id="content" class="form-control"></textarea>
		</div>
	</div>
	<div class="card" data-inst="0">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Рейтинг') }}</h5>
		</div>
		<div class="card-body">
			<select name="rating" id="rating" class="form-control">
				@for($i = 1; $i <= 5; $i++)
					<option value="{{ $i }}">{{ $i }}</option>
				@endfor
			</select>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Статус публикации') }}</h5>
		</div>
		<div class="card-body">
			<select name="publish" id="publish" class="form-control">
				<option value="0">{{ __('На утверждении') }}</option>
				<option value="1">{{ __('Опубликовано') }}</option>
			</select>
		</div>
	</div>
@endsection

@push('scripts')
	<script>
		if(+$('#instagram').val() == 1) {
			$('.card[data-inst="1"]').show();
			$('.card[data-inst="0"]').hide();
		} else {
			$('.card[data-inst="1"]').hide();
			$('.card[data-inst="0"]').show();
		}

		$(document).on('change', '#instagram', function(e){
			if(+$(this).val() == 1) {
				$('.card[data-inst="1"]').show();
				$('.card[data-inst="0"]').hide();
			}
			else {
				$('.card[data-inst="1"]').hide();
				$('.card[data-inst="0"]').show();
			}
		});
	</script>
@endpush