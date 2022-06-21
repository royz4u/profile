<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Resumi
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function resumi_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'resumi_jetpack_setup' );
