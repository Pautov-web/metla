@extends('admin.layouts.list')

@section('title', __('Роли'))  
@section('url', route('admin.roles.create'))  

@section('table')
	<table id="all-roles" class="table table-striped dataTable no-footer dtr-inline" >
		<thead>
			<tr>
				<th>ID</th>
				<th>{{ __('Название') }}</th>
				<th>{{ __('Действие') }}</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>{{ __('Название') }}</th>
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
			 
		    $('#all-roles').DataTable({
		        ajax: '{{ route('admin.roles.index') }}',
		        method: 'post',
		        parametrside: true,
		        processing: true,
		        columns: [
		            {data: 'id', name: 'id'},
		            {data: 'name', name: 'name'},
		            {data: 'action', name: 'action'},
		        ]
		    });
		});
	</script>
@endsection