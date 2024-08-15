$(document).ready(function() {
	// Отправка и получение кода
	$(document).on('submit', '.form-phone', function(e){
		e.preventDefault();

		var form = $(this),
			data = $(this).serialize();

		$.ajax({
			type: form.attr('method'),
            url: form.attr('action'),
            data: data,
			success: function(data) {
				if (data.type == 'success') {
					form.hide();
					$('#form_code').show();
					$('#code').val(data.code);
				} 
			},
			error: function(xhr) {
				if (xhr.responseJSON.errors) {
					
					for (var key in xhr.responseJSON.errors) {
						let error_msg = '';

						for (var msg in xhr.responseJSON.errors[key]) {
							error_msg += xhr.responseJSON.errors[key][msg]+ '<br>';
						}
						form.find('input[name="'+key+'"]').after('<div class="form-part-msg">'+error_msg+'</div>');
					}
					
				}
			}

		});

	});

	// Уведомления
    var notify_ = function (type, msg) {
    	alert(msg);
    };

	// Отправка форм AJAX
	$('.form').submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		let form = $(this);
		$('.form-part-msg').remove();

		$.ajax({
			type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: data,
            beforeSend : function( xhr ) {
				form.find('button[type="submit"]').attr('disabled', 'disabled');
			},
			success: function(data) {
				if (data.type == 'success') {
					if(data.msg)
						notify_(data.type, data.msg);
					
					if(data.route) {
						if(data.timeout) {
							setTimeout(function(){
								return window.location.href = data.route;
							}, data.timeout);
							return true;
						}
						return window.location.href = data.route;
					}
				} else {
					notify_(data.type, data.msg);
				}

				form.find('button[type="submit"]').removeAttr('disabled');

			},
			error: function(xhr){
				if(xhr.responseJSON.errors) {
					let errors = '';
					for (var key in xhr.responseJSON.errors) {
						errors += xhr.responseJSON.errors[key];
					}
					notify_('error', errors);
				}
				form.find('button[type="submit"]').removeAttr('disabled');
				console.log(xhr.responseJSON.errors);
			}

		});

	});

});