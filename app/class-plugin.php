<?php
/**
 * Plugin.
 *
 * @since 1.0.0
 *
 * @package BigBox\Plugin
 * @category Bootstrap
 * @author Spencer Finnell
 */

namespace BigBox\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Theme class.
 *
 * @since 1.0.0
 */
final class Plugin implements Registerable {

	/**
	 * Register the theme with the WordPress system.
	 *
	 * @since 1.0.0
	 *
	 * @throws Exception\InvalidService If a service is not valid.
	 */
	public function register() {
		$this->load_helpers();
	}

	/**
	 * Load functional helpers.
	 *
	 * @since 1.0.0
	 */
	public function load_helpers() {
		$helpers = [
			'template-tags',
		];

		foreach ( $helpers as $file ) {
			require_once get_stylesheet_directory() . '/app/' . $file . '.php';
		}
	}

}
