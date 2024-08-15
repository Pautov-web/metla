@extends('admin.layouts.show')

@section('title', __('пользователя')) 

@section('form')
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Роль') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" id="role_id" value="{{ $user->role->name ?? '' }}" class="form-control" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Имя') }}</h5>
		</div>
		<div class="card-body">
			<input type="text" id="name" value="{{ $user->name ?? '' }}" class="form-control" disabled>
		</div>
	</div>
	@if($user->role_id == 2)
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Фамилия') }}</h5>
			</div>
			<div class="card-body">
				<input type="text" id="surname" value="{{ $user->surname ?? '' }}" class="form-control" disabled>
			</div>
		</div>
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Отчество') }}</h5>
			</div>
			<div class="card-body">
				<input type="text" id="patronymic" value="{{ $user->patronymic ?? '' }}" class="form-control" disabled>
			</div>
		</div>
	@endif
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Email') }}</h5>
		</div>
		<div class="card-body">
			<input type="email" id="email" value="{{ $user->email ?? '' }}" class="form-control" disabled>
		</div>
	</div>
	<div class="card">
		<div class="card-header">
			<h5 class="card-title mb-0">{{ __('Телефон') }}</h5>
		</div>
		<div class="card-body">
			<input type="tel" id="phone" value="{{ $user->phone ?? '' }}" class="form-control" disabled>
		</div>
	</div>
	@if($user->role_id == 2)
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Дата рождения') }}</h5>
			</div>
			<div class="card-body">
				<input type="date" value="{{ $user->date_of_birth ?? '' }}" id="date_of_birth" class="form-control" disabled>
			</div>
		</div>
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Адрес') }}</h5>
			</div>
			<div class="card-body">
				<textarea id="address" class="form-control" rows="2" disabled>{{ $user->address ?? '' }}</textarea>
			</div>
		</div>
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Серия паспорта') }}</h5>
			</div>
			<div class="card-body">
				<input type="number" id="passport_series" value="{{ $user->passport_series ?? '' }}" class="form-control" disabled>
			</div>
		</div>
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Номер паспорта') }}</h5>
			</div>
			<div class="card-body">
				<input type="number" id="passport_number" value="{{ $user->passport_number ?? '' }}" class="form-control" disabled>
			</div>
		</div>
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Дата выдачи паспорта') }}</h5>
			</div>
			<div class="card-body">
				<input type="date" id="passport_date" value="{{ $user->passport_date ?? '' }}" class="form-control" disabled>
			</div>
		</div>
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Адрес прописки') }}</h5>
			</div>
			<div class="card-body">
				<textarea id="passport_address" class="form-control" rows="2" disabled>{{ $user->passport_address ?? '' }}</textarea>
			</div>
		</div>
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Статус проверки паспорта') }}</h5>
			</div>
			<div class="card-body">
				<select id="passport_check" class="form-control" disabled>
					<option value="0" {{ !$user->passport_check ? 'selected' : '' }}>{{ __('Не проверен') }}</option>
					<option value="1" {{ $user->passport_check ? 'selected' : '' }}>{{ __('Проверен') }}</option>
				</select>
			</div>
		</div>
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Номер счета в банке IBAN') }}</h5>
			</div>
			<div class="card-body">
				<input type="text" value="{{ $user->bank_number ?? '' }}" id="bank_number" class="form-control" disabled>
			</div>
		</div>
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('BIC код банка') }}</h5>
			</div>
			<div class="card-body">
				<input type="text" value="{{ $user->bank_bic ?? '' }}" id="bank_bic" class="form-control" disabled>
			</div>
		</div>
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Название банка') }}</h5>
			</div>
			<div class="card-body">
				<input type="text" value="{{ $user->bank_name ?? '' }}" id="bank_name" class="form-control" disabled>
			</div>
		</div>
		<div class="card" data-role="2">
			<div class="card-header">
				<h5 class="card-title mb-0">{{ __('Размер майки') }}</h5>
			</div>
			<div class="card-body">
				<select id="size" class="form-control" disabled>
					@foreach(config('size') as $key => $value)
						<option value="{{ $key }}" {{ $user->size == $key ? 'selected' : '' }}>{{ $value }}</option>
					@endforeach
				</select>
			</div>
		</div>
		@perm('private-files-view')
			@if(!is_null($user->passport_photo_1))
				<div class="card" data-role="2">
					<div class="card-header">
						<h5 class="card-title mb-0">{{ __('Разворот паспорта') }}</h5>
					</div>
					<div class="card-body">
						<div class="m-3">
							<a href="{{ route('admin.private.file', ['path' => $user->passport_photo_1]) }}" target="_blank">
								<img width="400px" height="350px" style="object-fit: contain;" src="{{ route('admin.private.file', ['path' => $user->passport_photo_1]) }}" alt="">
							</a>
						</div>
						<a href="{{ route('admin.private.file', ['path' => $user->passport_photo_1]) }}" download>{{ __('Скачать') }}</a>
					</div>
				</div>
			@endif
			@if(!is_null($user->passport_photo_2))
				<div class="card" data-role="2">
					<div class="card-header">
						<h5 class="card-title mb-0">{{ __('Прописка в паспорте') }}</h5>
					</div>
					<div class="card-body">
						<div class="m-3">
							<a href="{{ route('admin.private.file', ['path' => $user->passport_photo_2]) }}" target="_blank">
								<img width="400px" height="350px" style="object-fit: contain;" src="{{ route('admin.private.file', ['path' => $user->passport_photo_2]) }}" alt="">
							</a>
						</div>
						<a href="{{ route('admin.private.file', ['path' => $user->passport_photo_2]) }}" download>{{ __('Скачать') }}</a>
					</div>
				</div>
			@endif
			@if(!is_null($user->contract_photo))
				<div class="card" data-role="2">
					<div class="card-header">
						<h5 class="card-title mb-0">{{ __('Фото подписанного договора') }}</h5>
					</div>
					<div class="card-body">
						<div class="m-3">
							<a href="{{ route('admin.private.file', ['path' => $user->contract_photo]) }}" target="_blank">
								<img width="400px" height="350px" style="object-fit: contain;" src="{{ route('admin.private.file', ['path' => $user->contract_photo]) }}" alt="">
							</a>
						</div>
						<a href="{{ route('admin.private.file', ['path' => $user->contract_photo]) }}" download>{{ __('Скачать') }}</a>
					</div>
				</div>
			@endif
			@if(!is_null($user->employment_photo))
				<div class="card" data-role="2">
					<div class="card-header">
						<h5 class="card-title mb-0">{{ __('Фото трудовой книжки') }}</h5>
					</div>
					<div class="card-body">
						<div class="m-3">
							<a href="{{ route('admin.private.file', ['path' => $user->employment_photo]) }}" target="_blank">
								<img width="400px" height="350px" style="object-fit: contain;" src="{{ route('admin.private.file', ['path' => $user->employment_photo]) }}" alt="">
							</a>
						</div>
						<a href="{{ route('admin.private.file', ['path' => $user->employment_photo]) }}" download>{{ __('Скачать') }}</a>
					</div>
				</div>
			@endif
		@endperm
	@endif
@endsection