<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Slider_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package		SLIDER
 * @subpackage	Classes/Slider_Run
 * @author		Trushita Aranya
 * @since		1.0.0
 */
class Slider_Run{

	/**
	 * Our Slider_Run constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){
		$this->add_hooks();
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOKS
	 * ###
	 * ######################
	 */

	/**
	 * Registers all WordPress and plugin related hooks
	 *
	 * @access	private
	 * @since	1.0.0
	 * @return	void
	 */
	private function add_hooks(){
	
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_slider_scripts_and_styles' ), 20 );
	
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOK CALLBACKS
	 * ###
	 * ######################
	 */

	/**
	 * Enqueue the backsliderend related scripts and styles for this plugin.
	 * All of the added scripts andstyles will be available on every page within the slider.
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function enqueue_slider_scripts_and_styles() {
		wp_enqueue_script( 'jquery_script', SLIDER_PLUGIN_URL . 'core/includes/assets/js/jquery.min.js', array( 'jquery' ), SLIDER_VERSION, false );
		wp_enqueue_style( 'slider-backend-styles', SLIDER_PLUGIN_URL . 'core/includes/assets/css/slider-styles.css', array(), SLIDER_VERSION, 'all' );
		wp_enqueue_script( 'slider-backend-scripts', SLIDER_PLUGIN_URL . 'core/includes/assets/js/slider-scripts.js', array(), SLIDER_VERSION, false );
		wp_localize_script( 'slider-backend-scripts', 'slider', array(
			'plugin_name'   	=> __( SLIDER_NAME, 'slider' ),
		));
	}

}
