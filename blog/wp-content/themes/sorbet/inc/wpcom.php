<?php
/**
 * WordPress.com-specific functions and definitions
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package Sorbet
 */

function sorbet_theme_colors() {
	global $themecolors;

	/**
	 * Set a default theme color array for WP.com.
	 *
	 * @global array $themecolors
	 */
	if ( ! isset( $themecolors ) ) :
		$themecolors = array(
			'bg' => 'ffffff',
			'border' => 'cccccc',
			'text' => '808080',
			'link' => 'f45145',
			'url' => 'f45145',
		);
	endif;
}
add_action( 'after_setup_theme', 'sorbet_theme_colors' );

/*
 * De-queue Google fonts if custom fonts are being used instead
 */
function sorbet_dequeue_fonts() {
	if ( class_exists( 'TypekitData' ) && class_exists( 'CustomDesign' ) && CustomDesign::is_upgrade_active() ) {
		$customfonts = TypekitData::get( 'families' );
		if ( $customfonts && $customfonts['site-title']['id'] && $customfonts['headings']['id'] && $customfonts['body-text']['id'] ) {
			wp_dequeue_style( 'sorbet-source-sans-pro' );
			wp_dequeue_style( 'sorbet-pt-serif' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'sorbet_dequeue_fonts' );

/*
 * WordPress.com print styles & responsive videos
 */

function sorbet_theme_support() {
	add_theme_support( 'wpcom-responsive-videos' );
	add_theme_support( 'print-style' );
}
add_action( 'after_setup_theme', 'sorbet_theme_support' );



//WordPress.com specific styles
function sorbet_wpcom_styles() {
	wp_enqueue_style( 'sorbet-wpcom', get_template_directory_uri() . '/style-wpcom.css', '011514' );
}
add_action( 'wp_enqueue_scripts', 'sorbet_wpcom_styles' );