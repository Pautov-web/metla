var notyf = new Notyf({
	position: {
	    x: 'right',
	    y: 'top',
	}
});


$(document).ready(function(){
	$(document).on('click', '[data-bs-target="#delete"]', function(e){
		e.preventDefault();
		$('#delete_form').attr('action', $(this).data('href'));
	});

	$('.form').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			type: $(this).attr('method'),
	        url: $(this).attr('action'),
	        data: data,
			success: function(data) {
				if(data.type == 'success')
					notyf.success(data.msg);
				else
					notyf.error(data.msg);

				if(data.route) {
					setTimeout(function () {
					  	window.location.href = data.route;
					}, 2000);
				}
			},
			error: function(xhr){
				
				for (var key in xhr.responseJSON.errors) {
					notyf.error(xhr.responseJSON.errors[key].join('<br>'));
				}
				console.log(xhr);
			}

		});

	});

	$('.form-has-file').submit(function(e){
		e.preventDefault();
		var data = new FormData($(this).get(0)),
			btn = $(this).find('button[type="submit"]'),
			btn_text = btn.text();

		btn.attr('disabled', 'disabled');

		$.ajax({
			type: $(this).attr('method'),
	        url: $(this).attr('action'),
	        contentType: false,
      		processData: false,
	        data: data,
	        beforeSend : function( xhr ) {
				btn.text('Загрузка...').attr('disabled', 'disabled');
			},
			success: function(data) {
				btn.text(btn_text).removeAttr('disabled');

				if(data.type == 'success')
					notyf.success(data.msg);
				else
					notyf.error(data.msg);

				if(data.route) {
					setTimeout(function () {
					  	window.location.href = data.route;
					}, 2000);
				}
			},
			error: function(xhr){
				btn.text(btn_text).removeAttr('disabled');
				
				for (var key in xhr.responseJSON.errors) {
					notyf.error(xhr.responseJSON.errors[key].join('<br>'));
				}
				console.log(xhr);
			}

		});

	});
});
