<?php
/**
 * Widget endpoints for the WP REST API.
 *
 * Plugin Name: WordPress REST API Widgets Endpoints
 * Description: Widget endpoints for the WP REST API
 * Author: WP REST API Team
 * Author URI: http://wp-api.org
 * Version: 0.1.0
 * Plugin URI: https://github.com/WP-API/widgets-endpoints
 * License: GPL2+
 *
 * @package         REST_API
 * @author          WP REST API Team
 * @license         GPL-2.0+
 */

add_action( 'rest_api_init', 'wp_api_widgets_init_controllers', 0 );

/**
 * Bootstrap endpoints.
 */
function wp_api_widgets_init_controllers() {
	if ( ! class_exists( 'WP_REST_Controller' ) ) {
		return;
	}

	if ( ! class_exists( 'WP_REST_Widgets_Controller' ) ) {
		require_once dirname( __FILE__ ) . '/lib/class-wp-rest-widgets-controller.php';
	}

	/**
	 * Get global widget factory.
	 *
	 * @type WP_Widget_Factory $wp_widget_factory
	 */
	global $wp_widget_factory;

	$widgets_controller = new WP_REST_Widgets_Controller( $wp_widget_factory->widgets );
	$widgets_controller->register_routes();
}
