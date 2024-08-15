@extends('admin.layouts.list')

@section('title', __('FAQ'))  
@section('url', route('admin.faqs.create'))  

@section('table')
	<table id="all-faqs" class="table table-striped dataTable no-footer dtr-inline" >
		<thead>
			<tr>
				<th>ID</th>
				<th>{{ __('Вопрос') }}</th>
				<th>{{ __('Действие') }}</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>{{ __('Вопрос') }}</th>
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
		 
	    $('#all-faqs').DataTable({
	        ajax: '{{ route('admin.faqs.index') }}',
	        method: 'post',
	        parametrside: true,
	        processing: true,
	        columns: [
	            {data: 'id', name: 'id'},
	            {data: 'question', name: 'question'},
	            {data: 'action', name: 'action'},
	        ]
	    });
	});
</script>
@endpush