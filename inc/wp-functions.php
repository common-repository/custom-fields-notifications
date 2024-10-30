<?php
	//Auto load function
	if(get_option( 'cfn_auto_display' )==1){
	function wp_cfn_autoadd($content) {
		if(!is_feed() && !is_page()) {
			$content.= alimir_cfn();
		}
		return $content;
	}
	add_filter('the_content', 'wp_cfn_autoadd');
	}
	
	//Notifications theme style
	function wp_cfn_theme(){
		if(get_option( 'cfn_theme' ) == 2){
			return 'boot_';
		}
		else
			return '';
	}
	
	//Support old versions function
	function alimir_custom_notifications_position(){
		echo alimir_cfn();
	}
	
	//Shortcode function
	function  alimir_cfn_shortcode(){
		return alimir_cfn();
	}
	add_shortcode( 'custom_fields_notifications', 'alimir_cfn_shortcode' );	
	
	//main function
	function alimir_cfn()
	{
		if(	get_post_custom_values('warning') || 
		get_post_custom_values('information') || 
		get_post_custom_values('success') || 
		get_post_custom_values('failure') || 
		get_post_custom_values('lightbulb')|| 
		get_post_custom_values('messages') 
		):
		
		$string = '';

			$string .= '<div class="notification_container" style="margin-top:20px;">';
			$warning = get_post_meta(get_the_ID(), 'warning', true);
				if(get_post_custom_values('warning')) :
					$string .= '<div class="notification '.wp_cfn_theme().'warning hideit">';
					$string .= '<p>'. $warning. '</p>';
					$string .= '</div>';
				endif;
			
			$string .= '<div class="notification_container" style="margin-top:20px;">';
			$information = get_post_meta(get_the_ID(), 'information', true);
				if(get_post_custom_values('information')) :
					$string .= '<div class="notification '.wp_cfn_theme().'information hideit">';
					$string .= '<p>'. $information. '</p>';
					$string .= '</div>';
				endif;
			
			$string .= '<div class="notification_container" style="margin-top:20px;">';
			$success = get_post_meta(get_the_ID(), 'success', true);
				if(get_post_custom_values('success')) :
					$string .= '<div class="notification '.wp_cfn_theme().'success hideit">';
					$string .= '<p>'. $success. '</p>';
					$string .= '</div>';
				endif;
			
			$string .= '<div class="notification_container" style="margin-top:20px;">';
			$failure = get_post_meta(get_the_ID(), 'failure', true);
				if(get_post_custom_values('failure')) :
					$string .= '<div class="notification '.wp_cfn_theme().'failure hideit">';
					$string .= '<p>'. $failure. '</p>';
					$string .= '</div>';
				endif;
			
			$string .= '<div class="notification_container" style="margin-top:20px;">';
			$lightbulb = get_post_meta(get_the_ID(), 'lightbulb', true);
				if(get_post_custom_values('lightbulb')) :
					$string .= '<div class="notification '.wp_cfn_theme().'lightbulb hideit">';
					$string .= '<p>'. $lightbulb. '</p>';
					$string .= '</div>';
				endif;
			
			$string .= '<div class="notification_container" style="margin-top:20px;">';
			$messages = get_post_meta(get_the_ID(), 'messages', true);
				if(get_post_custom_values('messages')) :
					$string .= '<div class="notification '.wp_cfn_theme().'messages hideit">';
					$string .= '<p>'. $messages. '</p>';
					$string .= '</div>';
				endif;
			
			return $string;
			
		endif;	
	}