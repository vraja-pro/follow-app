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
class Folo_Up_Plugin {

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

		$this->register_services();
	}

	  /**
      * Store all the classes inside an array
      * @return array full list of classes
      */
	public static function get_services(){
        return [
			Folo_Up_Forms::class,
			Folo_Up_Entries::class,
			Folo_Up_Gravity_Integration::class,
			Folo_Up_Forms_Meta_Data::class,
			Folo_Up_Entry_Comments::class,
		];
	}

	    /**
     * Loop through the classes, initialize them, 
     * and call the register() if it exists
     *  @return
     */
    public static function register_services(){
		foreach(self::get_services() as $class){
			$service = self::instantiate($class);
			if (method_exists($service,'register')){
				$service->register();
			}
		}
	}


	/**
	 * Initialize the class
	 * @param  class $class     class from the services array
	 * @return class instance   new instance of the class
	 */
	private static function instantiate($class){
		$service = new $class();
		return $service;
	}
}

