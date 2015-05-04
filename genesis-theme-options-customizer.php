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
 * Genesis Theme Options Customizer Class
 *
 * @since 0.9.0
 */
class Genesis_Theme_Options_Customizer extends Genesis_Customizer_Base {

	/**
	 * Settings field.
	 */
	public $settings_field = 'genesis-settings';

	/**
	 * Register
	 */
	public function register( $wp_customize ) {

		$this->postoptions( $wp_customize );
	}

	private function postoptions( $wp_customize ) {

		$wp_customize->add_section(
			'genesis_post_options',
			array(
				'title'       => __( 'Post Options', 'genesis-theme-options' ),
				'description' => __( 'These options will affect any default blog listings page, including archive, author, blog, category, search, and tag pages.', 'genesis' ),
			)
		);

		$wp_customize->add_setting(
			$this->get_field_name( 'gto_post_amount' ),
			array(
				'default' => $this->get_field_name( 'gto_post_amount' ),
				'type'    => 'option',
			)
		);

		$wp_customize->add_control(
			'genesis_gto_post_amount',
			array(
				'label'    => __( 'Posts Per Page', 'genesis-theme-options' ),
				'section'  => 'genesis_post_options',
				'settings' => $this->get_field_name( 'gto_post_amount' ),
				'type'     => 'text',
			)
		);

		$wp_customize->add_setting(
			$this->get_field_name( 'gto_post_orderby' ),
			array(
				'default' => $this->get_field_name( 'gto_post_orderby' ),
				'type'    => 'option',
			)
		);

		$wp_customize->add_control(
			'genesis_gto_post_orderby',
			array(
				'label'    => __( 'Order Posts By', 'genesis-theme-options' ),
				'section'  => 'genesis_post_options',
				'settings' => $this->get_field_name( 'gto_post_orderby' ),
				'type'     => 'text',
			)
		);

		$wp_customize->add_setting(
			$this->get_field_name( 'gto_post_order' ),
			array(
				'default' => $this->get_field_name( 'gto_post_order' ),
				'type'    => 'option',
			)
		);

		$wp_customize->add_control(
			'genesis_gto_post_order',
			array(
				'label'    => __( 'Post Order', 'genesis-theme-options' ),
				'section'  => 'genesis_post_options',
				'settings' => $this->get_field_name( 'gto_post_order' ),
				'type'     => 'select',
				'choices'  => array(
					'DESC' => __( 'Descending', 'genesis' ),
					'ASC'  => __( 'Ascending', 'genesis' ),
				)
			)
		);

	}

}

add_action( 'init', 'genesis_gto_customizer_init' );
/**
 * Initialize Genesis Theme Options Customizer
 *
 * @since 0.9.0
 */
function genesis_gto_customizer_init() {
	new Genesis_Theme_Options_Customizer;
}
