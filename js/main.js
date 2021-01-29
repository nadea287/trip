$(function () {
	$('.ajax_output').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'GET',
			url: $('.form_list_trips').attr('action'),
			data: $('.form_list_trips').serialize() + '&ajax=true',
		}).done(function (response) {
			$('.ajax_output').html(response);
		});
	});
});