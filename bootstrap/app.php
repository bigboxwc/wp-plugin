<?php
/**
 * Boostrap the application.
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

add_action(
	'plugins_loaded', function() {
		return PluginFactory::create()->register();
	}
);
