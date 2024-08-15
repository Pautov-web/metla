@extends('admin.layouts.list')

@section('title', __('причины удаления аккаунта'))  
@section('url', route('admin.causes.create'))  

@section('table')
	<table id="all-causes" class="table table-striped dataTable no-footer dtr-inline" >
		<thead>
			<tr>
				<th>ID</th>
				<th>{{ __('Название') }}</th>
				<th>{{ __('Выбрало пользователей') }}</th>
				<th>{{ __('Действие') }}</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>{{ __('Название') }}</th>
				<th>{{ __('Выбрало пользователей') }}</th>
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
			 
		    $('#all-causes').DataTable({
		        ajax: '{{ route('admin.causes.index') }}',
		        method: 'post',
		        parametrside: true,
		        processing: true,
		        columns: [
		            {data: 'id', name: 'id'},
		            {data: 'name', name: 'name'},
		            {data: 'count_use', name: 'count_use'},
		            {data: 'action', name: 'action'},
		        ]
		    });
		});
	</script>
@endsection