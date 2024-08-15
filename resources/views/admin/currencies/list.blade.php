@extends('admin.layouts.list')

@section('title', __('Валюты'))  
@section('url', route('admin.currencies.create'))  

@section('table')
	<table id="all-currencies" class="table table-striped dataTable no-footer dtr-inline" >
		<thead>
			<tr>
				<th>ID</th>
				<th>{{ __('Слаг') }}</th>
				<th>{{ __('Название') }}</th>
				<th>{{ __('Символ') }}</th>
				<th>{{ __('Курс') }}</th>
				<th>{{ __('Действие') }}</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>{{ __('Слаг') }}</th>
				<th>{{ __('Название') }}</th>
				<th>{{ __('Символ') }}</th>
				<th>{{ __('Курс') }}</th>
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
			 
		    $('#all-currencies').DataTable({
		        ajax: '{{ route('admin.currencies.index') }}',
		        method: 'post',
		        parametrside: true,
		        processing: true,
		        columns: [
		            {data: 'id', name: 'id'},
		            {data: 'slug', name: 'slug'},
		            {data: 'name', name: 'name'},
		            {data: 'symbol', name: 'symbol'},
		            {data: 'rate', name: 'rate'},
		            {data: 'action', name: 'action'},
		        ]
		    });
		});
	</script>
@endsection