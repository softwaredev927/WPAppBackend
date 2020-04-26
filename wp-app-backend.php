<?php
/**
 * Plugin Name:     WordPress App Backend
 * Plugin URI:      
 * Description:     Integrate WordPress with mobile app.
 * Version:         0.1
 * Author:          Yaroslav C.
 * Author URI:      
 *
 * @author          Yaroslav C.
 * @copyright       Copyright (c) Yaroslav C. 2020
 *
 */


// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'WP_App_Backend' ) ) {

    class WP_App_Backend {

    	private static $instance;

		public static function instance() {
			if ( self::$instance === null ) {
				self::$instance = new self();
				self::$instance->includes();
			}

			return self::$instance;
		}

		/**
         * Include necessary files
         *
         * @access      private
         * @since       0.1.0
         * @return      void
         */
        private function includes() {

            require_once plugin_dir_path( __FILE__ ) . 'inc/class-stripe-api.php';
            
        }

	}
} // End if class_exists check


/**
 * The main function responsible for returning the instance
 *
 * @since       0.1.0
 * @return      WP_App_Backend::instance()
 *
 */
function WP_App_Backend_load() {
    return WP_App_Backend::instance();
}
add_action( 'plugins_loaded', 'WP_App_Backend_load' );