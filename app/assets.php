<?php
/**
 * Template tags.
 *
 * @since 2.0.0
 *
 * @package BigBox\Plugin
 * @category Functions
 * @author Spencer Finnell
 */

namespace BigBox\Plugin\Assets;

use const BigBox\Plugin\URL;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Enqueue compiled assets.
 *
 * @since 2.0.0
 */
function enqueue_assets() {
	wp_enqueue_script(
		'script',
		trailingslashit( URL ) . 'public/js/app.min.js',
		[
			'wp-element',
		],
		time(),
		true
	);

	wp_enqueue_style( 'style', trailingslashit( URL ) . 'public/css/app.min.css' );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_assets' );
