<?php
/*
Plugin Name: Restrict Non-Admins
Description: hide wordpress admin panel and wordpress nav-bar
Author: Amirhosseinhpv
Author URI: https://amirhosseinhpv.ir/
Plugin URI: https://blackswablab.ir/
Version: 1.0.0
*/

add_action( 'admin_init', 'restrict_admin_with_redirect', 1 );
function restrict_admin_with_redirect() {
    if ( ! current_user_can( 'manage_options' ) && ( ! wp_doing_ajax() ) ) {
        wp_safe_redirect( home_url("dashboard") );    exit;
    }
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	  add_filter('show_admin_bar', '__return_false');
	}
}
