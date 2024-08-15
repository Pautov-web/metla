@extends('admin')

@section('content')
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3"><strong>{{ __('Добавить') }}</strong> @yield('title')</h1>

			<div class="row">
				<div class="col-12">
					<form action="@yield('url')" enctype="multipart/form-data" method="POST" class="form-has-file">
						@csrf

               			@yield('form')
						
						<div class="card">
							<div class="card-body">
								<button class="btn btn-pill btn-success">{{ __('Добавить') }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
@endsection