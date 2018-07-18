<?php
/**
 * Register objects.
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
 * Registerable interface.
 *
 * @since 1.0.0
 */
interface Registerable {

	/**
	 * Register the current Registerable.
	 *
	 * @since 1.0.0
	 */
	public function register();

}
