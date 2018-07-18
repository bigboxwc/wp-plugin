<?php
/**
 * Plugin.
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
		$this->register_services();
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
			require_once trailingslashit( WC_COMBINED_SHIPPING_PATH ) . trailingslashit( 'app' ) . $file . '.php';
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

		array_walk(
			$services, function( Service $service ) {
				$service->register();
			}
		);
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
	 * Get the list of services to register.
	 *
	 * @since 1.0.0
	 *
	 * @return array Array of fully qualified class names.
	 */
	private function get_services() {
		/**
		 * Filters the registered services.
		 *
		 * @since 1.0.0
		 *
		 * @param array $services Fully qualified class names of services.
		 */
		return apply_filters( 'wc_combined_shipping_get_services', [] );
	}

}
