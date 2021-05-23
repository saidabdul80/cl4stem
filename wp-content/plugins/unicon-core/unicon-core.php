<?php
/*
Plugin Name: Unicon Core
Plugin URI: http://themeforest.net/user/minti
Description: This is the Core Plugin for Unicon WordPress Theme.
Version: 1.4
Author: minti
Author URI: http://mintithemes.com
License: Custom
License URI: http://themeforest.net/licenses 
Text Domain: unicon-core
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'UNICON_CORE_ROOT_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'UNICON_CORE_PLUGIN_PATH', plugins_url( 'unicon-core' ) );
	
class Unicon_Core {
	
	static $instance = false;
	
	public $plugin_version = '1.4';
		
	private function __construct() {
		// Load CSS
		add_action('wp_enqueue_scripts', array( $this, 'unicon_core_enqueue_assets' ),	12);
		
		// Text domain
		add_action( 'init', array( $this, 'unicon_core_load_textdomain' ));
		
		// Initialize Plugin
		add_action( 'after_setup_theme', array( $this, 'init' ), 0);
	}
	
	public static function getInstance() {
		if ( !self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function unicon_core_enqueue_assets() {

		// When Unicon is not in use
		if(!defined( 'MINTI_THEME_NAME')) { 
			
			// Register Style
			wp_register_style('unicon-shortcodes', plugins_url('/css/unicon-shortcodes.css', __FILE__), '', $this->plugin_version);

			// Register JS
			wp_register_script('waypoints', plugins_url('/js/fallback/waypoints.min.js', __FILE__), array( 'jquery' ), $this->plugin_version, true);
			wp_register_script('isotope', plugins_url('/js/fallback/isotope.pkgd.min.js', __FILE__), array( 'jquery' ), $this->plugin_version, true);
			wp_register_script('flexslider', plugins_url('/js/fallback/flexslider.min.js', __FILE__), array( 'jquery' ), $this->plugin_version, true);
			wp_register_script('unicon-shortcodes', plugins_url('/js/unicon-shortcodes.js', __FILE__), array( 'jquery' ), $this->plugin_version, true);

			// Deregister Composer Custom CSS
			wp_deregister_style( 'js_composer_custom_css' );
			
			// Load Visual Composer at Top of the Site
			if ( function_exists( 'vc_map' ) && !is_admin() ) {
				wp_enqueue_style( 'js_composer_front' );
			}

			// Load Shortcodes CSS
			wp_enqueue_style('unicon-shortcodes');
			
			// Load JS
			wp_enqueue_script('jquery');
			wp_enqueue_script('waypoints');
			wp_enqueue_script('isotope');
			wp_enqueue_script('flexslider');
			wp_enqueue_script('unicon-shortcodes');
		}
	}
	
	public function unicon_core_load_textdomain() {
		load_plugin_textdomain( 'unicon-core', false, plugin_basename( dirname( __FILE__ ) ) . '/lang');
	}
	
	public function init() {

		// Add Post Formats. Need metaboxes to work properly
		add_theme_support( 'post-formats', array('gallery', 'link', 'quote', 'audio', 'video')); 	

		// Shortcodes
		require_once( UNICON_CORE_ROOT_DIR_PATH . 'inc/shortcodes.php' );
		// Tiny MCE Shortcode Generator
		require_once( UNICON_CORE_ROOT_DIR_PATH . 'inc/tinymce.php' );

		// Visual Composer Tweaks
		if (class_exists('WPBakeryVisualComposerAbstract')) {
			require_once( UNICON_CORE_ROOT_DIR_PATH . 'inc/visualcomposer/vctweaks.php'); // Load Visual Composer Tweaks
		}

		// Meta Boxes
		require_once( UNICON_CORE_ROOT_DIR_PATH . 'inc/meta-box/meta-box.php' );
		require_once( UNICON_CORE_ROOT_DIR_PATH . 'inc/meta-box/meta-box-tabs/meta-box-tabs.php' );
		require_once( UNICON_CORE_ROOT_DIR_PATH . 'inc/meta-boxes.php' );
	}
	
}

// Plugin init
$Unicon_Core = Unicon_Core::getInstance();
