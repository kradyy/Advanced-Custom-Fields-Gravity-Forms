<?php

/*
	Plugin Name: Advanced Custom Fields: Gravity Forms Select Field (Alpha)
	Plugin URI: https:///www.mild.se
	Description: Adds a select field for easy gravity forms embedding
	Version: 1.0.0
	Author: Chris Johansson
	Author URI: https:///www.mild.se
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// check if class already exists
if ( ! class_exists( 'ACF_GravityFormsSelect' ) ) :

	class ACF_GravityFormsSelect {
		// vars
		var $settings;

		function __construct() {
			$this->settings = array(
				'version'   => '1.0.0',
				'name'      => 'Advanced Custom Fields: Gravity Forms (Alpha)',
				'url'       => plugin_dir_url( __FILE__ ),
				'path'      => plugin_dir_path( __FILE__ ),
			);

			// include field
			if ( is_plugin_active( 'gravityforms/gravityforms.php' ) ) {
				add_action( 'acf/include_field_types', array( $this, 'include_field' ) ); // v5
				add_action( 'acf/register_fields', array( $this, 'include_field' ) ); // v4
			} else {
				add_action( 'admin_notices', array( $this, 'show_error_notice' ) );
			}
		}

		function include_field( $version = false ) {
			// support empty $version
			if ( ! $version ) {
				$version = 5;
			}

			// load textdomain
			load_plugin_textdomain( 'acf-gform-select', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' );

			// include
			include_once( 'fields/class-GravityFormsSelect-v' . $version . '.php' );
		}

		function show_error_notice() { ?>
<div class="error notice">
    <p><?php echo "<strong>{$this->settings['name']}</strong> : " . __( 'You need Gravity Forms installed for this plugin to work. ', 'acf-gform-select' ); ?>
    </p>
</div>
<?php
		}

	}

	// initialize
	new ACF_GravityFormsSelect();

endif;