(function ($) {


	/**
	*  initialize_field
	*
	*  This function will initialize the $field.
	*
	*  @date	30/11/17
	*  @since	5.6.5
	*
	*  @param	n/a
	*  @return	n/a
	*/

	function initialize_field($field) {

		//$field.doStuff();

	}


	if (typeof acf.add_action !== 'undefined') {

		/*
		*  ready & append (ACF5)
		*/

		acf.add_action('ready_field/type=gform_id', initialize_field);
		acf.add_action('append_field/type=gform_id', initialize_field);


	} else {

		/*
		*  acf/setup_fields (ACF4)
		*/

		$(document).on('acf/setup_fields', function (e, postbox) {

			// find all relevant fields
			$(postbox).find('.field[data-field_type="gform_id"]').each(function () {

				// initialize
				initialize_field($(this));

			});

		});

	}

})(jQuery);
