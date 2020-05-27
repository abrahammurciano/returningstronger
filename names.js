var names = null;
const name_size = 2.5; // vw

$(function() {
	refresh_names();
});

$(window).scroll(function() {
	adjust_fonts(names);
});

function refresh_names() {
	names = $('.name');
	adjust_fonts(names);
}

function adjust_fonts(names) {
	names.each(function() {
		adjust_font($(this));
	});
}

function adjust_font(name) {
	var top = name.offset().top - $(window).scrollTop() + name.height() / 2;
	if (top < 0) {
		return;
	}
	var bottom = $(window).height() - top;
	if (bottom < 0) {
		return;
	}
	var size_factor = 2 * Math.min(top, bottom) / $(window).height();
	var max_size_scale = 2.3;
	var new_size = name_size + name_size * (max_size_scale - 1) * size_factor;
	name.css('font-size', new_size.toFixed(2) + 'vw');
}