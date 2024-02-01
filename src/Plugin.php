<?php
/**
 * Plugin Class.
 *
 * @package folo-up
 */

namespace FoloUp;

/**
 * Class Plugin.
 */
class Plugin {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->init();
	}

	public function activate() {}
	public function deactivate() {}

	/**
	 * Initialize plugin
	 */
	private function init() {
		define( 'FOLO_UP_PLUGIN_PATH', untrailingslashit( plugin_dir_path( __DIR__ ) ) );
		define( 'FOLO_UP_PLUGIN_URL', untrailingslashit( plugin_dir_url( __DIR__ ) ) );
		define( 'FOLO_UP_PLUGIN_BUILD_PATH', FOLO_UP_PLUGIN_PATH . '/assets/build' );
		define( 'FOLO_UP_PLUGIN_BUILD_URL', FOLO_UP_PLUGIN_URL . '/assets/build' );
		define( 'FOLO_UP_PLUGIN_VERSION', '1.0.0' );

		new Assets();
		new Patterns();
		new SearchApi();
	}
}

