@extends('admin.layouts.create')

@section('title', __('пользователя'))  
@section('url', route('admin.users.store'))

@section('form')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Роль') }}</h5>
		</div>
		<div class="card-body">
			<select name="role_id" id="role_id" class="form-control">
				@foreach($roles as $role)
					<option value="{{ $role->id }}">{{ $role->name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Имя') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Виктор') }}">
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Фамилия') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="surname" id="surname" class="form-control" placeholder="{{ __('Симонов') }}">
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Отчество') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="patronymic" id="patronymic" class="form-control" placeholder="{{ __('Александрович') }}">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Email') }}</h5>
		</div>
		<div class="card-body">
			<input type="email" name="email" id="email" class="form-control" placeholder="{{ __('mail@mail.mail') }}">
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Телефон') }}</h5>
		</div>
		<div class="card-body">
			<input type="tel" name="phone" id="phone" class="form-control" placeholder="">
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Дата рождения') }}</h5>
		</div>
		<div class="card-body">
			<input type="date" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="">
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Адрес') }}</h5>
		</div>
		<div class="card-body">
			<textarea name="address" id="address" class="form-control" rows="2"></textarea>
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Серия паспорта') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" name="passport_series" id="passport_series" class="form-control" placeholder="">
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Номер паспорта') }}</h5>
		</div>
		<div class="card-body">
			<input type="number" name="passport_number" id="passport_number" class="form-control" placeholder="">
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Дата выдачи паспорта') }}</h5>
		</div>
		<div class="card-body">
			<input type="date" name="passport_date" id="passport_date" class="form-control" placeholder="">
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Адрес прописки') }}</h5>
		</div>
		<div class="card-body">
			<textarea name="passport_address" id="passport_address" class="form-control" rows="2"></textarea>
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Статус проверки паспорта') }}</h5>
		</div>
		<div class="card-body">
			<select name="passport_check" id="passport_check" class="form-control">
				<option value="0" selected>{{ __('Не проверен') }}</option>
				<option value="1">{{ __('Проверен') }}</option>
			</select>
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Номер счета в банке IBAN') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="bank_number" id="bank_number" class="form-control" placeholder="">
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('BIC код банка') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="bank_bic" id="bank_bic" class="form-control" placeholder="">
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Название банка') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="">
		</div>
	</div>
	<div class="card" data-role="2">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Размер майки') }}</h5>
		</div>
		<div class="card-body">
			<select name="size" id="size" class="form-control">
				@foreach(config('size') as $key => $value)
					<option value="{{ $key }}" selected>{{ $value }}</option>
				@endforeach
			</select>
		</div>
	</div>
	@perm('private-files-view')
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Разворот паспорта') }}</h5>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<label class="form-label" id="passport_photo_1">{{ __('Фото') }}</label>
					<input class="form-control" type="file" name="passport_photo_1" id="passport_photo_1">
				</div>
			</div>
		</div>

		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Прописка в паспорте') }}</h5>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<label class="form-label" id="passport_photo_2">{{ __('Фото') }}</label>
					<input class="form-control" type="file" name="passport_photo_2" id="passport_photo_2">
				</div>
			</div>
		</div>

		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Фото подписанного договора') }}</h5>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<label class="form-label" id="contract_photo">{{ __('Фото') }}</label>
					<input class="form-control" type="file" name="contract_photo" id="contract_photo">
				</div>
			</div>
		</div>

		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Фото трудовой книжки') }}</h5>
			</div>
			<div class="card-body">
				<div class="mb-3">
					<label class="form-label" id="employment_photo">{{ __('Фото') }}</label>
					<input class="form-control" type="file" name="employment_photo" id="employment_photo">
				</div>
			</div>
		</div>
		
	@endperm
@endsection

@push('scripts')
	<script>
		if(+$('#role_id').val() != 2)
			$('.card[data-role="2"]').hide();

		$(document).on('change', '#role_id', function(e){
			if(+$(this).val() != 2)
				$('.card[data-role="2"]').hide();
			else
				$('.card[data-role="2"]').show();
		});
	</script>
@endpush