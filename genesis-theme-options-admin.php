<?php
/**
 * Genesis Theme Options
 *
 * @package   Genesis_Theme_Options
 * @author    Brad Potter
 * @license   GPL-2.0+
 * @link      http://www.bradpotter.com/plugins/genesis-theme-options
 * @copyright Copyright (c) 2015, Brad Potter
 */

/**
 * Add Post Options metabox
 *
 * @since 0.9.0
 */
add_action( 'genesis_theme_settings_metaboxes', 'gto_add_post_options', 10, 1 );
function gto_add_post_options( $pagehook ) {

	add_meta_box( 'post-options-metabox', __( 'Post Options', 'genesis-post-options-metabox' ), 'gto_post_options_content', $pagehook, 'main', 'low' );
}

/**
 * Content for Post Options metabox
 *
 * @since 0.9.0
 */
function gto_post_options_content() {

	?>
		<div>
		<label for="<?php echo GENESIS_SETTINGS_FIELD; ?>[gto_post_amount]"><?php _e( 'Posts Per Page', 'genesis-theme-options' ); ?></label>
		<input name="<?php echo GENESIS_SETTINGS_FIELD; ?>[gto_post_amount]" id="<?php echo GENESIS_SETTINGS_FIELD; ?>[gto_post_amount]" type="number" value="<?php echo esc_attr( genesis_get_option('gto_post_amount') ); ?>" size="4" />
		<p class="description"><?php _e( 'Enter the number of posts per page. Enter -1 to display all posts in one page', 'genesis-theme-options' ); ?></p>
		</div><br />

		<div>
		<label for="genesis-meta[post_orderby]"><?php _e( 'Order Posts By', 'genesis-theme-options' ); ?></label>
		<input name="<?php echo GENESIS_SETTINGS_FIELD; ?>[gto_post_orderby]" id="<?php echo GENESIS_SETTINGS_FIELD; ?>[gto_post_orderby]" type="text" value="<?php echo esc_attr( genesis_get_option('gto_post_orderby') ); ?>" size="20" />
		<p class="description"><?php _e( 'Enter parameter to order posts by. Example: title, date, author, rand, etc. See the <a href="https://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters">WordPress Codex</a>.', 'genesis-theme-options' ); ?></p>
		</div><br />

		<div>
		<label for="genesis-meta[post_order]"><?php _e( 'Post Order', 'genesis-theme-options' ); ?></label>
		<select name="<?php echo GENESIS_SETTINGS_FIELD; ?>[gto_post_order]" id="<?php echo GENESIS_SETTINGS_FIELD; ?>[gto_post_order]" />
		<option value="DESC"<?php selected( genesis_get_option('gto_post_order'), 'DESC' ); ?>><?php _e( 'Descending', 'genesis-theme-options' ); ?></option>
		<option value="ASC"<?php selected( genesis_get_option('gto_post_order'), 'ASC' ); ?>><?php _e( 'Ascending', 'genesis-theme-options' ); ?></option>
		</select>
		</div>

	<?php

}

add_filter( 'genesis_theme_settings_defaults', 'gto_theme_settings_defaults' );
/**
 * Create defaults for new settings
 *
 * @since 0.9.0
 */
function gto_theme_settings_defaults( $defaults ) {

	$defaults['gto_post_amount'] = '';
	$defaults['gto_post_orderby'] = '';
	$defaults['gto_post_order'] = '';

	return $defaults;
}

add_action( 'genesis_settings_sanitizer_init', 'gto_sanitization_filters' );
/**
 * Sanitize the settings
 *
 * @since 0.9.0
 */
function gto_sanitization_filters() {
	genesis_add_option_filter( 'no_html', GENESIS_SETTINGS_FIELD,
		array(
			'gto_post_amount',
			'gto_post_orderby',
			'gto_post_order',
		) );
}
