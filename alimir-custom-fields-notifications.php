<?php

/*
Plugin Name: Custom Fields Notifications
Plugin URI: http://wordpress.org/plugins/custom-fields-notifications
Description: Custom Fields Notifications is a tiny WordPress plugin that allows you to use WordPress custom fields in notification boxes. It is an easy to use WordPress plugin and can be configured quickly and easily.
Version: 1.0.1
Author: Ali Mirzaei
Author URI: http://alimir.ir
License: GPLv2 or later
*/

	//Load plugin text domain
	load_plugin_textdomain( 'alimir', false, dirname( plugin_basename( __FILE__ ) ) .'/lang/' );
	
	//activation hook function
	function alimir_cfn_activation() {
		add_option('cfn_auto_display', '0', '', 'yes');
		add_option('cfn_hide_effect', '1', '', 'yes');
		add_option('cfn_theme', '1', '', 'yes');
	}
	register_activation_hook(__FILE__, 'alimir_cfn_activation');
	
	//uninstall hook function
	function alimir_cfn_uninstall() {
		delete_option('cfn_auto_display');
		delete_option('cfn_hide_effect');
		delete_option('cfn_theme');
	}	
	register_uninstall_hook(__FILE__, 'alimir_cfn_uninstall');	
	
	//Load Options
	include( plugin_dir_path( __FILE__ ) . 'inc/wp-options.php');
	//Load Functions
	include( plugin_dir_path( __FILE__ ) . 'inc/wp-functions.php');
	//Load Scripts
	include( plugin_dir_path( __FILE__ ) . 'inc/wp-scripts.php');

?>