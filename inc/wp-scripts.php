<?php
	add_action('wp_enqueue_scripts', 'alimir_cfn_enqueue');
	function alimir_cfn_enqueue()
	{
		if ( !is_rtl() ):
			wp_enqueue_style( 'custom-notifications', plugins_url('assets/css/style.css',  dirname(__FILE__)) );
		else:
			wp_enqueue_style( 'custom-notifications-rtl', plugins_url('assets/css/rtl-style.css',  dirname(__FILE__)) );
		endif;
		
		if(get_option( 'cfn_hide_effect' )==1):	
		wp_enqueue_script('jquery');
		wp_enqueue_script(
			'cfn_scripts',
			plugins_url( '/assets/js/scripts.js' , dirname(__FILE__) ),
			false,'',true
		);
		endif;
	}