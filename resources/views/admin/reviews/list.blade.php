@extends('admin.layouts.list')

@section('title', __('Отзывы'))  
@section('url', route('admin.reviews.create'))  

@section('table')
	<table id="all-reviews" class="table table-striped dataTable no-footer dtr-inline" >
		<thead>
			<tr>
				<th>ID</th>
				<th>{{ __('Имя') }}</th>
				<th>{{ __('Рейтинг') }}</th>
				<th>{{ __('Действие') }}</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>{{ __('Имя') }}</th>
				<th>{{ __('Рейтинг') }}</th>
				<th>{{ __('Действие') }}</th>
			</tr>
		</tfoot>
		<tbody>

		</tbody>
	</table>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/v/bs4/jq-3.7.0/dt-1.13.6/datatables.min.js" defer></script>
<script>
	$(document).ready(function() {
		 
	    $('#all-reviews').DataTable({
	        ajax: '{{ route('admin.reviews.index') }}',
	        method: 'post',
	        parametrside: true,
	        processing: true,
	        columns: [
	            {data: 'id', name: 'id'},
	            {data: 'name', name: 'name'},
	            {data: 'rating', name: 'rating'},
	            {data: 'action', name: 'action'},
	        ]
	    });
	});
</script>
@endpush