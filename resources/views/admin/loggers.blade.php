@extends('admin')

@section('content')
	<main class="content">
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">{{ __('Логи') }}</h5>
						</div>
						<div class="card-body">
							<div id="datatables-reponsive_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
								<div class="row dt-row">
									<div class="col-sm-12">
										<table id="all-loggers" class="table table-striped dataTable no-footer dtr-inline" >
											<thead>
												<tr>
													<th>ID</th>
													<th>{{ __('Пользователь') }}</th>
													<th>{{ __('Информация') }}</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<th>ID</th>
													<th>{{ __('Пользователь') }}</th>
													<th>{{ __('Информация') }}</th>
												</tr>
											</tfoot>
											<tbody>

											</tbody>
										</table>
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
<script>
	$(document).ready(function() {
		 
	    $('#all-loggers').DataTable({
	        ajax: '{{ route('admin.loggers') }}',
	        method: 'post',
	        serverSide: true,
	        processing: true,
	        columns: [
	            {data: 'id', name: 'id'},
	            {data: 'user_id', name: 'user_id'},
	            {data: 'info', name: 'info'},
	        ]
	    });
	});
</script>
@endpush