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

add_action( 'pre_get_posts','gto_post_query' );
/**
 * Controls default post display options.
 *
 * @since 0.9.0
 */
function gto_post_query( $query ) {

	global $wp_query;

	if ( ! is_admin() && $query->is_main_query() ) {

		$query->set( 'posts_per_page', genesis_get_option('gto_post_amount') );
		$query->set( 'orderby', genesis_get_option('gto_post_orderby') );
		$query->set( 'order', genesis_get_option('gto_post_order') );
	}
}
