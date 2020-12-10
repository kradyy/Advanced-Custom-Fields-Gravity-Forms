<?php
// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// check if class already exists
if ( ! class_exists( 'GravityFormsSelect' ) ) :

	class GravityFormsSelect extends acf_field {
		function __construct( $settings ) {
			$this->name = 'Gravity forms';
			$this->label = __( 'Gravity Form', 'acf-gform' );
			$this->category = 'basic';

			$this->l10n = array(
				'error' => __( 'Error! Please select a valid form', 'acf-gform' ),
			);

			$this->settings = $settings;

			parent::__construct();
		}

		function render_field_settings( $field ) {

			$forms = array();

			foreach ( RGFormsModel::get_forms() as $form ) {
				if ( $form->is_active ) {
					$forms[ $form->id ] = "$form->title (ID: $form->id)";
				}
			}

			acf_render_field_setting(
				$field,
				array(
					'label' => __( 'Select Type', 'acf-gform' ),
					'instructions' => '',
					'type' => 'select',
					'name' => 'gform_id',
					'choices' => $forms,
					'layout' => 'horizontal',
				)
			);

		}

		function render_field( $field ) {
			// TODO: Shortcode for form
			echo '<pre>fdfd';
			print_r( $field );
			echo '</pre>';
			?>

<?php
		}


		/*
		*  input_admin_enqueue_scripts()
		*
		*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
		*  Use this action to add CSS + JavaScript to assist your render_field() action.
		*
		*  @type    action (admin_enqueue_scripts)
		*  @since   3.6
		*  @date    23/01/13
		*
		*  @param   n/a
		*  @return  n/a
		*/

		/*
		function input_admin_enqueue_scripts() {

		// vars
		$url = $this->settings['url'];
		$version = $this->settings['version'];


		// register & include JS
		wp_register_script('TEXTDOMAIN', "{$url}assets/js/input.js", array('acf-input'), $version);
		wp_enqueue_script('TEXTDOMAIN');


		// register & include CSS
		wp_register_style('TEXTDOMAIN', "{$url}assets/css/input.css", array('acf-input'), $version);
		wp_enqueue_style('TEXTDOMAIN');

		}

		*/


		/*
		*  input_admin_head()
		*
		*  This action is called in the admin_head action on the edit screen where your field is created.
		*  Use this action to add CSS and JavaScript to assist your render_field() action.
		*
		*  @type    action (admin_head)
		*  @since   3.6
		*  @date    23/01/13
		*
		*  @param   n/a
		*  @return  n/a
		*/

		/*
		function input_admin_head() {



		}

		*/


		/*
		*  input_form_data()
		*
		*  This function is called once on the 'input' page between the head and footer
		*  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and
		*  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
		*  seen on comments / user edit forms on the front end. This function will always be called, and includes
		*  $args that related to the current screen such as $args['post_id']
		*
		*  @type    function
		*  @date    6/03/2014
		*  @since   5.0.0
		*
		*  @param   $args (array)
		*  @return  n/a
		*/

		/*
		function input_form_data( $args ) {



		}

		*/


		/*
		*  input_admin_footer()
		*
		*  This action is called in the admin_footer action on the edit screen where your field is created.
		*  Use this action to add CSS and JavaScript to assist your render_field() action.
		*
		*  @type    action (admin_footer)
		*  @since   3.6
		*  @date    23/01/13
		*
		*  @param   n/a
		*  @return  n/a
		*/

		/*
		function input_admin_footer() {



		}

		*/


		/*
		*  field_group_admin_enqueue_scripts()
		*
		*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
		*  Use this action to add CSS + JavaScript to assist your render_field_options() action.
		*
		*  @type    action (admin_enqueue_scripts)
		*  @since   3.6
		*  @date    23/01/13
		*
		*  @param   n/a
		*  @return  n/a
		*/

		/*
		function field_group_admin_enqueue_scripts() {

		}

		*/


		/*
		*  field_group_admin_head()
		*
		*  This action is called in the admin_head action on the edit screen where your field is edited.
		*  Use this action to add CSS and JavaScript to assist your render_field_options() action.
		*
		*  @type    action (admin_head)
		*  @since   3.6
		*  @date    23/01/13
		*
		*  @param   n/a
		*  @return  n/a
		*/

		/*
		function field_group_admin_head() {

		}

		*/


		/*
		*  load_value()
		*
		*  This filter is applied to the $value after it is loaded from the db
		*
		*  @type    filter
		*  @since   3.6
		*  @date    23/01/13
		*
		*  @param   $value (mixed) the value found in the database
		*  @param   $post_id (mixed) the $post_id from which the value was loaded
		*  @param   $field (array) the field array holding all the field options
		*  @return  $value
		*/

		/*
		function load_value( $value, $post_id, $field ) {

		return $value;

		}

		*/


		/*
		*  update_value()
		*
		*  This filter is applied to the $value before it is saved in the db
		*
		*  @type    filter
		*  @since   3.6
		*  @date    23/01/13
		*
		*  @param   $value (mixed) the value found in the database
		*  @param   $post_id (mixed) the $post_id from which the value was loaded
		*  @param   $field (array) the field array holding all the field options
		*  @return  $value
		*/

		/*
		function update_value( $value, $post_id, $field ) {

		return $value;

		}

		*/


		/*
		*  format_value()
		*
		*  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
		*
		*  @type    filter
		*  @since   3.6
		*  @date    23/01/13
		*
		*  @param   $value (mixed) the value which was loaded from the database
		*  @param   $post_id (mixed) the $post_id from which the value was loaded
		*  @param   $field (array) the field array holding all the field options
		*
		*  @return  $value (mixed) the modified value
		*/

		/*
		function format_value( $value, $post_id, $field ) {

		// bail early if no value
		if( empty($value) ) {

			return $value;

		}


		// apply setting
		if( $field['font_size'] > 12 ) {

			// format the value
			// $value = 'something';

		}


		// return
		return $value;
		}

		*/


		/*
		*  validate_value()
		*
		*  This filter is used to perform validation on the value prior to saving.
		*  All values are validated regardless of the field's required setting. This allows you to validate and return
		*  messages to the user if the value is not correct
		*
		*  @type    filter
		*  @date    11/02/2014
		*  @since   5.0.0
		*
		*  @param   $valid (boolean) validation status based on the value and the field's required setting
		*  @param   $value (mixed) the $_POST value
		*  @param   $field (array) the field array holding all the field options
		*  @param   $input (string) the corresponding input name for $_POST value
		*  @return  $valid
		*/

		/*
		function validate_value( $valid, $value, $field, $input ){

		// Basic usage
		if( $value < $field['custom_minimum_setting'] )
		{
			$valid = false;
		}


		// Advanced usage
		if( $value < $field['custom_minimum_setting'] )
		{
			$valid = __('The value is too little!','TEXTDOMAIN'),
		}


		// return
		return $valid;

		}

		*/


		/*
		*  delete_value()
		*
		*  This action is fired after a value has been deleted from the db.
		*  Please note that saving a blank value is treated as an update, not a delete
		*
		*  @type    action
		*  @date    6/03/2014
		*  @since   5.0.0
		*
		*  @param   $post_id (mixed) the $post_id from which the value was deleted
		*  @param   $key (string) the $meta_key which the value was deleted
		*  @return  n/a
		*/

		/*
		function delete_value( $post_id, $key ) {



		}

		*/


		/*
		*  load_field()
		*
		*  This filter is applied to the $field after it is loaded from the database
		*
		*  @type    filter
		*  @date    23/01/2013
		*  @since   3.6.0
		*
		*  @param   $field (array) the field array holding all the field options
		*  @return  $field
		*/

		/*
		function load_field( $field ) {

		return $field;

		}

		*/


		/*
		*  update_field()
		*
		*  This filter is applied to the $field before it is saved to the database
		*
		*  @type    filter
		*  @date    23/01/2013
		*  @since   3.6.0
		*
		*  @param   $field (array) the field array holding all the field options
		*  @return  $field
		*/

		/*
		function update_field( $field ) {

		return $field;

		}

		*/


		/*
		*  delete_field()
		*
		*  This action is fired after a field is deleted from the database
		*
		*  @type    action
		*  @date    11/02/2014
		*  @since   5.0.0
		*
		*  @param   $field (array) the field array holding all the field options
		*  @return  n/a
		*/

		/*
		function delete_field( $field ) {



		}

		*/


	}


	// initialize
	new GravityFormsSelect( $this->settings );


	// class_exists check
endif;