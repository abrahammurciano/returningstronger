$('.commit-form').submit(function(e) {
	e.preventDefault();
	var form = $(this);
	var name = form.find('input[type="text"]').val();
	if (!validate(name)) {
		grecaptcha.reset();
		return false;
	}
	var button = form.find('input[type="submit"]');
	$.ajax({
		url: 'commit.php',
		type: 'post',
		dataType: 'text',
		data: form.serialize(),
		success: function(data) {
			if (data.startsWith('Error:')) {
				alert(data);
				location.reload();
			} else {
				form_post_process(form, name);
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
			button.addClass('loading');
			button.attr('disabled', true);
		},
		complete: function() {
			button.removeClass('loading');
		}
	});
});

function commit_submit() {
	$('.commit-form').submit();
}

function form_post_process(form = $('.commit-form'), name = $('.commit-form input[type="text"]').val()) {
	success_message(form);
	add_name(name);
	remember();
}

function success_message(form = $('.commit-form')) {
	var success = $('.success')
	var height = form.height();
	success.css('height', height);
	form.css('display', 'none');
	success.css('display', 'block');
	success.addClass('slide-in-up');
}

function add_name(name) {
	var span = $('span.count');
	span.text(parseInt(span.text()) + 1);

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

function validate(name) {
	if (name === '') {
		alert('You must enter a name.');
		return false;
	}
	if (name.length > 25) {
		alert('Your name is too long. Please input at most 25 characters.');
		return false;
	}
	if (!/^(?:(?:[A-Za-z]+|[A-Za-z]{1,3}\.|(?:[A-Z]\.)+[A-Z]?)[ -]?){1,3}(?: (?:[A-Z]\.)+[A-Z]?)?$/.test(name)) {
		alert('That is a made-up name. What is your real name?');
		return false;
	}
	return true;
}