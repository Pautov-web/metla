@extends('admin')

@section('content')
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3"><strong>{{ __('Просмотр') }}</strong> @yield('title')</h1>

			<div class="row">
				<div class="col-12">
					@yield('form')
				</div>
			</div>
		</div>
	</main>
@endsection