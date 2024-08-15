@extends('admin.layouts.list')

@section('title', __('Статьи'))  
@section('url', route('admin.articles.create'))  

@section('table')
	<table id="all-articles" class="table table-striped dataTable no-footer dtr-inline" >
		<thead>
			<tr>
				<th>ID</th>
				<th>{{ __('Название') }}</th>
				<th>{{ __('Слаг') }}</th>
				<th>{{ __('Статус публикации') }}</th>
				<th>{{ __('Автор') }}</th>
				<th>{{ __('Действие') }}</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>ID</th>
				<th>{{ __('Название') }}</th>
				<th>{{ __('Слаг') }}</th>
				<th>{{ __('Статус публикации') }}</th>
				<th>{{ __('Автор') }}</th>
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
		 
	    $('#all-articles').DataTable({
	        ajax: '{{ route('admin.articles.index') }}',
	        method: 'post',
	        parametrside: true,
	        processing: true,
	        columns: [
	            {data: 'id', name: 'id'},
	            {data: 'name', name: 'name'},
	            {data: 'slug', name: 'slug'},
	            {data: 'publish', name: 'publish'},
	            {data: 'user_id', name: 'user_id'},
	            {data: 'action', name: 'action'},
	        ]
	    });
	});
</script>
@endpush