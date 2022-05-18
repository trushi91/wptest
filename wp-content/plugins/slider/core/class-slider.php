<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Slider' ) ) :

	/**
	 * Main Slider Class.
	 *
	 * @package		SLIDER
	 * @subpackage	Classes/Slider
	 * @since		1.0.0
	 * @author		Trushita Aranya
	 */
	final class Slider {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Slider
		 */
		private static $instance;

		/**
		 * SLIDER helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Slider_Helpers
		 */
		public $helpers;

		/**
		 * SLIDER settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Slider_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'slider' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'slider' ), '1.0.0' );
		}

		/**
		 * Main Slider Instance.
		 *
		 * Insures that only one instance of Slider exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Slider	The one true Slider
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Slider ) ) {
				self::$instance					= new Slider;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Slider_Helpers();
				self::$instance->settings		= new Slider_Settings();

				//Fire the plugin logic
				new Slider_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'SLIDER/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once SLIDER_PLUGIN_DIR . 'core/includes/classes/class-slider-helpers.php';
			require_once SLIDER_PLUGIN_DIR . 'core/includes/classes/class-slider-settings.php';

			require_once SLIDER_PLUGIN_DIR . 'core/includes/classes/class-slider-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'slider', FALSE, dirname( plugin_basename( SLIDER_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.