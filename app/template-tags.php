<?php
/**
 * Template tags.
 *
 * @since 1.0.0
 *
 * @package BigBox\WC_Combined_Shipping
 * @category Bootstrap
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function wc_combined_shipping() {
  return BigBox\WC_Combined_Shipping\PluginFactory::create();
}
