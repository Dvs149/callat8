jQuery(window).scroll(function () {
	if (jQuery(window).scrollTop() > 154) {
		jQuery('#header').addClass('stiky');
		jQuery('.header-divider').addClass('stiky');
	}
	if (jQuery(window).scrollTop() < 154) {
		jQuery('#header').removeClass('stiky');
		jQuery('.header-divider').removeClass('stiky');
	}
});

if (matchMedia('only screen and (min-width: 768px) and (max-width: 959px)').matches) {
	jQuery(window).scroll(function () {
		if (jQuery(window).scrollTop() > 0) {
			jQuery('#header').addClass('stiky');
			jQuery('.header-divider').addClass('stiky');
		}
	});
}
else if (matchMedia('only screen and (max-width: 767px)').matches) {
	jQuery(window).scroll(function () {
		if (jQuery(window).scrollTop() > 0) {
			jQuery('#header').addClass('stiky');
			jQuery('.header-divider').addClass('stiky');
		}
	});
}