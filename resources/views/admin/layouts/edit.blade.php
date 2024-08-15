@extends('admin')

@section('content')
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3"><strong>{{ __('Редактировать') }}</strong> @yield('title')</h1>

			<div class="row">
				<div class="col-12">
					<form action="@yield('url')" enctype="multipart/form-data" method="POST" class="form-has-file">
						@method('PUT')
						@csrf
                        <div class="card">
                            <div class="card-body">
                                <button type="button" class="btn btn-pill btn-danger card-actions float-end" data-bs-toggle="modal" data-bs-target="#delete" data-href="@yield('url-destroy')">{{ _('Удалить') }}</button>
                            </div>
                        </div>

						@yield('form')
						
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-pill btn-success">{{ __('Обновить') }}</button>
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</main>
@endsection