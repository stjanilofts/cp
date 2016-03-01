$(document).ready(function() {
	$(function() {
		var timer = 0;
		var items = [];

		$.each($('nav.top > div'), function(i, v) {
			if($(v).has('> div').length > 0) {
				items.push({ el: $(v), timer: 0 });
			}
		});

		$.each(items, function(i, item) {
			item.el.hover(function() {
				clearTimeout(item.timer);

				item.el.addClass('opened');
			}, function() {
				item.timer = setTimeout(function() {
					item.el.removeClass('opened');
				}, 300);
			});
		});
	});
});