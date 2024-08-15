<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
					{{ __('Удалить') }}</span> 
					
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="" id="delete_form" method="post" class="form-has-file" enctype="multipart/form-data">
				@method('DELETE')
				@csrf
				<div class="modal-body">
						<p class="small">{{ __('Вы уверены?') }}</p>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" id="addRowButton" class="btn btn-primary">{{ __('Удалить') }}</button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Отменить') }}</button>
				</div>
			</form>
		</div>
	</div>
</div>