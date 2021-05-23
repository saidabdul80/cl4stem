<?php
/*
Plugin Name: Unicon Demo Importer
Plugin URI: http://themeforest.net/user/minti
Description: Import the Unicon Demo files. Go to Appearances > Demo Import to import the Demo.
Version: 1.0
Author: minti
Author URI: http://mintithemes.com
License: Custom
License URI: http://themeforest.net/licenses 
Text Domain: unicon-demoimporter
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'UNICON_DEMOIMPORTER_ROOT_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'UNICON_DEMOIMPORTER_PLUGIN_PATH', plugins_url( 'unicon-demoimporter' ) );
	
class Unicon_Demoimporter {
	
	static $instance = false;
	
	public $plugin_version = '1.0';
		
	private function __construct() {
		// Load CSS
		add_action('admin_enqueue_scripts', array( $this, 'unicon_demoimporter_enqueue_css' ),	10);
		
		// Text domain
		add_action( 'init', array( $this, 'unicon_demoimporter_load_textdomain' ));

		// Create Admin Page
		add_action('admin_menu', array( $this, 'minti_add_demo_import_page' ));

		// Initialize Plugin
		add_action( 'after_setup_theme', array( $this, 'init' ), 0);
	}
	
	public static function getInstance() {
		if ( !self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	
	public function unicon_demoimporter_enqueue_css() {
		// Enqueue CSS files
		wp_enqueue_style('unicon-demoimporter', plugins_url('/css/unicon-demoimporter.css', __FILE__),'', $this->plugin_version);

	}

	public function minti_add_demo_import_page() {
		add_theme_page('Demo Import', 'Demo Import', 'manage_options', 'minti_demo_import','minti_demo_import');
	}
	
	public function unicon_demoimporter_load_textdomain() {
		load_plugin_textdomain( 'unicon-demoimporter', false, plugin_basename( dirname( __FILE__ ) ) . '/lang');
	}
	
	public function init() {
		// Load Demo Importer
		require_once( UNICON_DEMOIMPORTER_ROOT_DIR_PATH .'demoimporter/import.php');
	}
	
}

// Plugin init.
$Unicon_Demoimporter = Unicon_Demoimporter::getInstance();