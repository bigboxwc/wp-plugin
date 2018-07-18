<?php
/**
 * Template tags.
 *
 * @since 1.0.0
 *
 * @package BigBox\Plugin
 * @category Bootstrap
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function plugin() {
  return PluginFactory::create();
}
