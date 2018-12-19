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

use const BigBox\Plugin\PATH;

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
	 */
	public function register() {
		add_action( 'plugins_loaded', [ $this, 'load_helpers' ] );
		add_action( 'plugins_loaded', [ $this, 'register_services' ] );
	}

	/**
	 * Load functional helpers.
	 *
	 * @since 1.0.0
	 */
	public function load_helpers() {
		$helpers = [
			'template-tags',
			'assets',
		];

		foreach ( $helpers as $file ) {
			require_once trailingslashit( PATH ) . trailingslashit( 'app' ) . $file . '.php';
		}
	}

	/**
	 * Register the individual services of this plugin.
	 *
	 * @since 1.0.0
	 *
	 * @throws Exception\InvalidService If a service is not valid.
	 */
	public function register_services() {
		$services = $this->get_services();
		$services = array_map( [ $this, 'instantiate_service' ], $services );

		// Register.
		array_walk( $services, [ $this, 'register_service' ] );
	}

	/**
	 * Instantiate a single service.
	 *
	 * @since 1.0.0
	 *
	 * @param string $class Service class to instantiate.
	 *
	 * @return Service
	 * @throws Exception\InvalidService If the service is not valid.
	 */
	private function instantiate_service( $class ) {
		if ( ! class_exists( $class ) ) {
			throw Exception\InvalidService::from_service( $class );
		}

		$service = new $class();

		if ( ! $service instanceof Service ) {
			throw Exception\InvalidService::from_service( $service );
		}

		return $service;
	}

	/**
	 * Register a single service.
	 *
	 * @since 2.0.0
	 *
	 * @param Service $service service information.
	 */
	public function register_service( Service $service ) {
		return $service->register();
	}

	/**
	 * Get the list of services to register.
	 *
	 * @since 1.0.0
	 *
	 * @return array Array of fully qualified class names.
	 */
	private function get_services() {
		$services = [];

		/**
		 * Filters the registered services.
		 *
		 * @since 1.0.0
		 *
		 * @param array $services Fully qualified class names of services.
		 */
		return apply_filters( 'plugin_get_services', $services );
	}

}
