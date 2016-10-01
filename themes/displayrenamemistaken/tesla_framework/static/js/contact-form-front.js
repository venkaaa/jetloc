jQuery(document).ready(function($) {
	$('.tt-form').on('submit', function(event) {
		if($(this).parsley( 'isValid' )){
			event.preventDefault();
			var form = $(this);
			var submit = form.find('input[type=submit]');
			var submit_val = $(submit).val();
			var action = "action=" + $(this).attr('action') + "&";
			console.log(form.serialize());
			$.ajax({
				url: ajaxurl,
				type: 'POST',
				data: action + form.serialize(),
				success: function(response) {
					console.log(response);
					if (response === '1') {
						
					} else {
						
					}
				}
			});
		}
		return false;
	});
});