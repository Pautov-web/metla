@extends('admin.layouts.list')

@section('title', __('Опции'))  
@section('url', route('admin.options.create'))  

@section('table')
	<table id="all-options" class="table table-striped dataTable no-footer dtr-inline" >
		<thead>
			<tr>
				<th>ID</th>
				<th>{{ __('Название') }}</th>
				<th>{{ __('Цена') }}</th>
				<th>{{ __('Действие') }}</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>{{ __('Название') }}</th>
				<th>{{ __('Цена') }}</th>
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
		 
	    $('#all-options').DataTable({
	        ajax: '{{ route('admin.options.index') }}',
	        method: 'post',
	        parametrside: true,
	        processing: true,
	        columns: [
	            {data: 'id', name: 'id'},
	            {data: 'name', name: 'name'},
	            {data: 'price', name: 'price'},
	            {data: 'action', name: 'action'},
	        ]
	    });
	});
</script>
@endpush