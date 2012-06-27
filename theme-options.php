<?php

add_action( 'admin_init', 'ajb_options_init' );
add_action( 'admin_menu', 'ajb_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function ajb_options_init(){
	register_setting( 'ajb_option_group', 'ajb_options', 'ajb_options_validate' );
}

/**
 * fix the edit_theme_options/manage_options bug using new WP 3.2 filter
 */
function ajb_get_options_page_cap() {
    return 'edit_theme_options';
}

add_filter( 'option_page_capability_ajb_options', 'ajb_get_options_page_cap' );

/**
 * Load the menu page
 */
function ajb_options_add_page() {
	add_theme_page( __( 'Homepage Options', 'ajb' ), __( 'Theme Options', 'ajb' ), ajb_get_options_page_cap(), 'ajb_options', 'ajb_options_do_page' );
}

/**
 * Create the options page
 */
function ajb_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false ;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'ajb' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'ajb' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'ajb_option_group' ); ?>
			<?php $options = get_option( 'ajb_options' );

			_e( '<p>The <em>Community is...</em> section shows links to 5 pages. Enter here the information for these links.</p>', 'ajb' );
			?>
			<table class="form-table">

			<?php
			/**
			 * button link
			 */
			for ( $i=1; $i<=5; $i++ ) {
				?>
				 <tr valign="top"> <th scope="row"><?php _e( 'Button ' . $i . ' Link', 'ajb' ); ?></th>
					<td>
					    <input id="ajb_options[button_<?php echo $i; ?>_link]" class="regular-text" type="text" name="ajb_options[button_<?php echo $i; ?>_link]" value="<?php esc_attr_e( $options['button_' . $i . '_link'] ); ?>" />
					    <label class="description" for="ajb_options[button_<?php echo $i; ?>_link]"><?php _e( 'Link for link button ' . $i . '', 'ajb' ); ?></label>
					</td>
				 </tr>
				 
			<?php } ?>

			</table>
			
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'ajb' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function ajb_options_validate( $input ) {
	for ( $j=1; $j<=5; $j++) {
		// home page CSS must be safe text with the allowed tags for posts
		$input['button_' . $j . '_link'] = wp_filter_post_kses( $input['button_' . $j . '_link'] );
	}

	return $input;
}

// from http://themeshaper.com/2010/06/03/sample-theme-options/
// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/