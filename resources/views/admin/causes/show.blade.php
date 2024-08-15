@extends('admin')

@section('content')
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3"><strong>{{ __('Просмотр') }}</strong> {{ __('причины') }}</h1>

			<div class="row">
				<div class="col-12">
					@foreach(config('langs') as $key => $value)
						<div class="card">
							<div class="card-header">
								<h5 class="card-title mb-0">{{ __('Название') }}</h5>
							</div>
							<div class="card-body">
								<input type="text" id="name_{{ $key }}" value="{{ $cause->getTranslations('name')[$key] }}" class="form-control" disabled>
							</div>
						</div>
					@endforeach
					<div class="card">
						<div class="card-header">
							<h5 class="card-title mb-0">{{ __('Выбрало пользователей') }}</h5>
						</div>
						<div class="card-body">
							<input type="numeric" id="count_use" value="{{ $cause->count_use }}" class="form-control" placeholder="₽" disabled>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection