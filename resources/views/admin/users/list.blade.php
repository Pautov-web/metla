@extends('admin.layouts.list')

@section('title', __('Пользователи'))  
@section('url', route('admin.users.create'))  

@section('table')
	<table id="all-users" class="table table-striped dataTable no-footer dtr-inline" >
		<thead>
			<tr>
				<th>ID</th>
				<th>{{ __('Роль') }}</th>
				<th>{{ __('Имя') }}</th>
				<th>{{ __('Телефон') }}</th>
				<th>{{ __('Email') }}</th>
				<th>{{ __('Действие') }}</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>{{ __('Роль') }}</th>
				<th>{{ __('Имя') }}</th>
				<th>{{ __('Телефон') }}</th>
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
			 
		    $('#all-users').DataTable({
		        ajax: '{{ route('admin.users.index') }}',
		        method: 'post',
		        parametrside: true,
		        processing: true,
		        columns: [
		            {data: 'id', name: 'id'},
		            {data: 'role_id', name: 'role_id'},
		            {data: 'name', name: 'name'},
		            {data: 'phone', name: 'phone'},
		            {data: 'email', name: 'email'},
		            {data: 'action', name: 'action'},
		        ]
		    });
		});
	</script>
@endsection