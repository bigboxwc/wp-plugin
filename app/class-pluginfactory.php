<?php
/**
 * Manage an instance of the plugin.
 *
 * @since 1.0.0
 *
 * @package BigBox\WC_Combined_Shipping
 * @category Bootstrap
 * @author Spencer Finnell
 */

namespace BigBox\WC_Combined_Shipping;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * PluginFactory class.
 *
 * @since 1.0.0
 */
final class PluginFactory {

	/**
	 * Create and return an instance of the plugin.
	 *
	 * This always returns a shared instance.
	 *
	 * @since 1.0.0
	 *
	 * @return $plugin plugin instance.
	 */
	public static function create() {
		static $plugin = null;

		if ( null === $plugin ) {
			$plugin = new Plugin();
		}

		return $plugin;
	}

}
