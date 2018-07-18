<?php
/**
 * Do not modify this file.
 *
 * @since 1.0.0
 *
 * @package Plugin
 * @category Bootstrap
 * @author Spencer Finnell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Current version -- automatically updated on release.
define( 'PLUGIN_VERSION', '%PLUGIN_VERSION%' );

// Plugin path and URL.
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Composer autoloader.
require_once __DIR__ . '/bootstrap/version-check.php';

// Composer autoloader.
require_once __DIR__ . '/bootstrap/autoload.php';

// Start things.
require_once __DIR__ . '/bootstrap/app.php';
