@perm($title.'-view')
	<a href="{{ route('admin.'.$table.'.show', [$title => $model->id]) }}">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye align-middle me-2">
			<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
			<circle cx="12" cy="12" r="3"></circle>
		</svg>
	</a>
@endperm

@perm($title.'-update')
	<a href="{{ route('admin.'.$table.'.edit', [$title => $model->id]) }}">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle me-2">
			<path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
		</svg>
	</a>
@endperm

@perm($title.'-delete')
	<a href="#" data-bs-toggle="modal" data-bs-target="#delete" data-href="{{ route('admin.'.$table.'.destroy', [$title => $model->id]) }}">
	    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 align-middle me-2">
	        <polyline points="3 6 5 6 21 6"></polyline>
	        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line>
	        <line x1="14" y1="11" x2="14" y2="17"></line>
	    </svg>
	</a>
@endperm