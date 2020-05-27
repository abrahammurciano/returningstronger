function commit_submit(token) {
	var name = $('.commit-form input[type="text"]').val();
	$.ajax({
		url: 'commit.php',
		type: 'post',
		dataType: 'text',
		data: $('.commit-form').serialize(),
		success: function(data) {
			if (data.startsWith('Error:')) {
				alert(data);
				location.reload();
			} else {
				form_post_process();
			}
		},
		error: function(xhr, status, error) {
			console.error('Error code: ' + status);
			console.error(error);
			console.log(xhr);
			alert('Oh no! We\'ve encountered some trouble when submitting your name. Please check your internet connection and try again, or contact us if the error persists.');
			location.reload();
		},
		beforeSend: function() {
			var button = $('.commit-form input[type="submit"]');
			button.addClass('loading');
			button.attr('disabled', true);
		},
		complete: function() {
			var button = $('.commit-form input[type="submit"]');
			button.removeClass('loading');
		}
	});
}

function form_post_process() {
	success_message();
	add_name($('.commit-form input[name="name"]').val());
	remember();
}

function success_message() {
	var form = $('.commit-form');
	var success = $('.success')
	var height = form.height();
	success.css('height', height);
	form.css('display', 'none');
	success.css('display', 'block');
	success.addClass('slide-in-up');
}

function add_name(name) {
	var name_element = $(document.createElement('div'));
	name_element.addClass('name');
	name_element.text(name);
	$('.names').prepend(name_element);
	refresh_names();
	name_element.addClass('slide-in-down');
}

function remember() {
	window.localStorage.setItem('committed', 'true');
}

$(function() {
	if (window.localStorage.getItem('committed') == 'true') {
		success_message();
	}
})