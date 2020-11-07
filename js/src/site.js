jQuery(document).ready(function($) {
	if (jQuery('.wpcf7-form').length) {
		var astx_label_class = 'form-check-label',
			astx_input_class = 'form-check-input',
			astx_parent_class = 'form-check form-check-inline';

		$('.wpcf7-form input[type=checkbox], .wpcf7-form input[type=radio]').each(function() {
			var element = $(this),
				parent = element.closest('.wpcf7-list-item');
			element.addClass(astx_input_class);
			parent.addClass(astx_parent_class);
			if (astx_label_class) parent.find('wpcf7-list-item-label').addClass(astx_label_class);
		});
	}
});
