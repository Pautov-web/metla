@extends('admin')

@section('content')
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3"><strong>Настройки</strong> CRM</h1>

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">{{ __('Настройки') }}</h5>
						</div>
						<div class="card-body">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item" role="presentation">
							    <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">{{ __('Общие настройки') }}</button>
							  </li>
							  <li class="nav-item" role="presentation">
							    <button class="nav-link" id="contacts-tab" data-bs-toggle="tab" data-bs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">{{ __('Контакты') }}</button>
							  </li>
							</ul>
							<form action="{{ route('admin.settings') }}" enctype="multipart/form-data" method="POST" class="form-has-file">
								@csrf
								<div class="tab-content" id="myTabContent">
								  <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
								  	<div class="mb-3 mt-3">
										<label class="form-label" for="tiny_key">{{ __('Ключ TinyMCE') }}</label>
										<input type="text" class="form-control" value="{{ settings()->get('tiny_key') }}" id="tiny_key" name="tiny_key" placeholder="XXXXXXX">
									</div>
								  </div>
								  <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
								  	<div class="mb-3 mt-3">
										<label class="form-label" for="contacts_text">{{ __('Текст в контактах') }}</label>
										<textarea name="contacts_text" id="contacts_text" class="form-control">{{ settings()->get('contacts_text') }}</textarea>
									</div>
									<div class="mb-3">
										<label class="form-label" for="contacts_phone">{{ __('Номер телефона') }}</label>
										<input type="text" class="form-control" value="{{ settings()->get('contacts_phone') }}" id="contacts_phone" name="contacts_phone" placeholder="XXXXXXX">
									</div>
									<div class="mb-3">
										<label class="form-label" for="contacts_fb">{{ __('Facebook messenger') }}</label>
										<input type="text" class="form-control" value="{{ settings()->get('contacts_fb') }}" id="contacts_fb" name="contacts_fb" placeholder="XXXXXXX">
									</div>
									<div class="mb-3">
										<label class="form-label" for="contacts_wa">{{ __('Whatsapp') }}</label>
										<input type="text" class="form-control" value="{{ settings()->get('contacts_wa') }}" id="contacts_wa" name="contacts_wa" placeholder="XXXXXXX">
									</div>
									<div class="mb-3">
										<label class="form-label" for="contacts_tg">{{ __('Telegram') }}</label>
										<input type="text" class="form-control" value="{{ settings()->get('contacts_tg') }}" id="contacts_tg" name="contacts_tg" placeholder="XXXXXXX">
									</div>
									<div class="mb-3">
										<label class="form-label" for="contacts_vk">{{ __('Вконтакте') }}</label>
										<input type="text" class="form-control" value="{{ settings()->get('contacts_vk') }}" id="contacts_vk" name="contacts_vk" placeholder="XXXXXXX">
									</div>
									<div class="mb-3">
										<label class="form-label" for="contacts_vb">{{ __('Viber') }}</label>
										<input type="text" class="form-control" value="{{ settings()->get('contacts_vb') }}" id="contacts_vb" name="contacts_vb" placeholder="XXXXXXX">
									</div>
									<div class="mb-3">
										<label class="form-label" for="contacts_inst">{{ __('Instargam') }}</label>
										<input type="text" class="form-control" value="{{ settings()->get('contacts_inst') }}" id="contacts_inst" name="contacts_inst" placeholder="XXXXXXX">
									</div>
								  </div>
								</div>
								
								<button type="submit" class="btn btn-primary">{{ __('Сохранить') }}</button>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>
@endsection