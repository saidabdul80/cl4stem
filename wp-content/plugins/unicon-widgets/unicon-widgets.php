<?php
/*
Plugin Name: Unicon Widgets
Plugin URI: http://themeforest.net/user/minti
Description: This Plugin will add the Unicon widgets for Unicon WordPress Theme.
Version: 1.0
Author: minti
Author URI: http://mintithemes.com
License: Custom
License URI: http://themeforest.net/licenses 
Text Domain: unicon-widgets
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'UNICON_WIDGETS_ROOT_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'UNICON_WIDGETS_PLUGIN_PATH', plugins_url( 'unicon-widgets' ) );
	
class Unicon_Widgets {
	
	static $instance = false;
	
	public $plugin_version = '1.0';
		
	private function __construct() {
		// Load CSS
		add_action('wp_enqueue_scripts', array( $this, 'unicon_widgets_enqueue_css' ),	10);
		
		// Text domain
		add_action( 'init', array( $this, 'unicon_widgets_load_textdomain' ));
		
		// Initialize Plugin
		add_action( 'after_setup_theme', array( $this, 'init' ), 0);
	}
	
	public static function getInstance() {
		if ( !self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function unicon_widgets_enqueue_css() {
		// Register CSS files
		wp_register_style('unicon-widgets', plugins_url('/css/unicon-widgets.css', __FILE__),'', $this->plugin_version);
	
    	// Enqueue CSS files if Unicon Theme is not installed
		if(!defined( 'MINTI_THEME_NAME')) { 
			wp_enqueue_style('unicon-widgets'); 
		}
	}
	
	public function unicon_widgets_load_textdomain() {
		load_plugin_textdomain( 'unicon-widgets', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' );
	}
	
	public function init() {
		// Contact Widget
		require_once( UNICON_WIDGETS_ROOT_DIR_PATH . 'inc/contact.php' );
		// Flickr Widget
		require_once( UNICON_WIDGETS_ROOT_DIR_PATH . 'inc/flickr.php' );
		// Portfolio Widget
		if(function_exists( 'minti_portfolio_register' )){ 
			require_once( UNICON_WIDGETS_ROOT_DIR_PATH . 'inc/portfolio.php' );
		}
		// Sponsor Widget
		require_once( UNICON_WIDGETS_ROOT_DIR_PATH . 'inc/sponsor.php' );
	}
	
}

// Plugin init.
$Unicon_Widgets = Unicon_Widgets::getInstance();