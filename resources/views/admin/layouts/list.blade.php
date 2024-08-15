@extends('admin')

@section('content')
	<main class="content">
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">@yield('title')</h5>
							<a href="@yield('url')" class="btn btn-pill btn-primary card-actions float-end">{{ __('Добавить') }}</a>
						</div>
						<div class="card-body">
							<div id="datatables-reponsive_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
								<div class="row dt-row">
									<div class="col-sm-12">
										@yield('table')
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>
@endsection

@push('scripts')
	<script src="https://cdn.datatables.net/v/bs4/jq-3.7.0/dt-1.13.6/datatables.min.js" defer></script>
	@yield('datatables')
@endpush