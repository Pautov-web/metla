@extends('admin.layouts.list')

@section('title', __('Вопросы от пользователей'))  

@section('table')
	<table id="all-feedback" class="table table-striped dataTable no-footer dtr-inline" >
		<thead>
			<tr>
				<th>ID</th>
				<th>{{ __('Имя') }}</th>
				<th>{{ __('Email') }}</th>
				<th>{{ __('Действие') }}</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>{{ __('Имя') }}</th>
				<th>{{ __('Email') }}</th>
				<th>{{ __('Действие') }}</th>
			</tr>
		</tfoot>
		<tbody>

		</tbody>
	</table>
@endsection

@section('datatables')
	<script>
		$(document).ready(function() {
			 
		    $('#all-feedback').DataTable({
		        ajax: '{{ route('admin.feedback.index') }}',
		        method: 'post',
		        parametrside: true,
		        processing: true,
	        	order: [[ 0, "desc" ]],
		        columns: [
		            {data: 'id', name: 'id'},
		            {data: 'name', name: 'name'},
		            {data: 'email', name: 'email'},
		            {data: 'action', name: 'action'},
		        ]
		    });
		});
	</script>
@endsection