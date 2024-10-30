<?php
	add_action('admin_menu', 'alimir_cfn_create_menu');

	function alimir_cfn_create_menu() {
		add_options_page(__( 'Custom Fields Notifications', 'alimir' ),__( 'Custom Fields Notifications', 'alimir' ), 'administrator', __FILE__, 'alimir_cfn_settings_page', __FILE__);
		add_action( 'admin_init', 'alimir_cfn_register_settings' );
	}


	function alimir_cfn_register_settings() {
		register_setting( 'alimir-cfn-settings-group', 'cfn_auto_display' );	
		register_setting( 'alimir-cfn-settings-group', 'cfn_hide_effect' );	
		register_setting( 'alimir-cfn-settings-group', 'cfn_theme' );
	}

	function alimir_cfn_settings_page() {
	?>
	<div class="wrap">
	<h2><?php _e('Custom Fields Notifications','alimir'); ?></h2>

	<form method="post" action="options.php">
		<?php settings_fields( 'alimir-cfn-settings-group' ); ?>
		<?php do_settings_sections( 'alimir-cfn-settings-group' ); ?>
		<table class="form-table">
			<p class="update-nag"><?php _e('Using <code>[custom_fields_notifications]</code> shortcode, to display notifications boxes.','alimir'); ?></p>
			
			<tr>
			<th scope="row"><?php _e('Automatic Display','alimir'); ?></th>
			<td>
			<input name="cfn_auto_display" type="checkbox" value="1" <?php checked( '1', get_option( 'cfn_auto_display' ) ); ?> />
			<p class="description"><?php _e('<strong>On all posts</strong> (home, archives, search) at the bottom of the post', 'alimir'); ?></p>
			</td>
			</tr>
			
			<tr>
			<th scope="row"><?php _e('Hide Effect','alimir'); ?></th>
			<td>
			<input name="cfn_hide_effect" type="checkbox" value="1" <?php checked( '1', get_option( 'cfn_hide_effect' ) ); ?> />
			<p class="description"><?php _e('<strong>Activate</strong> hide effect on mouse click.', 'alimir'); ?></p>
			</td>
			</tr>
			
			<tr>
			<th scope="row"><?php _e('Theme','alimir'); ?></th>
			<td>
			<select name="cfn_theme">
				<option value="1" <?php selected( get_option( 'cfn_theme' ), 1 ); ?>>Default</option>
				<option value="2" <?php selected( get_option( 'cfn_theme' ), 2 ); ?>>Bootstrap</option>
			</select>
			<p class="description"><?php _e('Select your favorite Theme.','alimir'); ?></p>
			</td>
			</tr>
			
		</table>
		<div id="poststuff" class="ui-sortable meta-box-sortables">
			<div class="postbox">	
			<h3><?php _e('Like this plugin?','alimir'); ?></h3>
			<div class="inside">
			<p>
			<?php _e('Show your support by Rating 5 Star in <a href="https://wordpress.org/plugins/custom-fields-notifications/"> Plugin Directory reviews</a>','alimir'); ?><br />
			<?php _e('Follow me on <a href="https://www.facebook.com/alimir.ir"> Facebook</a>','alimir'); ?><br />
			<?php _e('Plugin Author Blog: <a href="http://alimir.ir"> Wordpress & Programming World.</a>','alimir'); ?>
			</p>
			</div>
			</div>
		</div>	
		<?php submit_button(); ?>

	</form>
	</div>
	<?php }