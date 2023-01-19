<?php

if ( ! function_exists( 'pds_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook.
 */
function pds_setup() {
	// Add support for block styles.
	add_theme_support( 'wp-block-styles' );

	// Enqueue editor styles.
	add_editor_style( 'style.css' );
	add_editor_style( 'tokens.css' );
}
endif; // pds_setup
add_action( 'after_setup_theme', 'pds_setup' );

if ( ! function_exists( 'pds_styles' ) ) :
	// Enqueue styles.
	function pds_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'pds-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);
		wp_register_style(
			'pds-tokens',
			get_template_directory_uri() . '/tokens.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheets.
		wp_enqueue_style( 'pds-style' );
		wp_enqueue_style( 'pds-tokens' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'pds_styles' );