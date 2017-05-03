<?php
/*
Plugin Name: WP Turbolinks 5
Plugin URI: http://christophwolff.de
Description: Make your WordPress Website fast with Turbolinks 5!
Version: 0.2
Author: Christoph Wolff
*/

define('WPTURBOLINKS5_VERSION'    , '0.2');
define('WPTURBOLINKS5_PLUGIN_NAME', 'WP Turbolinks 5');
define('WPTURBOLINKS5_FILE'       , __FILE__);
define('WPTURBOLINKS5_PATH'       , realpath(plugin_dir_path(WPTURBOLINKS5_FILE)) . '/');
define('WPTURBOLINKS5_URL'        , plugin_dir_url(WPTURBOLINKS5_FILE));
define('WPTURBOLINKS5_LIB_URL', WPTURBOLINKS5_URL . '/js/turbolinks.min.js'); // (Turbolinks 5 BETA5)

/*
 * Init the Turbolinks Script. Nothing more. It just works.
 */
function turolinks_init() {
	// TURBOLINKS 5 doenst like the Adminbar so we will have a peek if it exists
	if(!is_admin() && !is_admin_bar_showing()) {
		wp_register_script('turbolinks', WPTURBOLINKS5_LIB_URL);
		wp_enqueue_script( 'turbolinks', WPTURBOLINKS5_LIB_URL , array(), WPTURBOLINKS5_VERSION, true );	
	}
}

add_action('init', 'turolinks_init');
