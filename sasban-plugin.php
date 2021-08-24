<?php
/**
 * @package SasbanPlugin
 */

/*
Plugin Name: Sasban Plugin
Plugin URI: https://sasban.plugin
Description: This is my mega custom plugin from a tutorial series.
Version: 1.0.0
Author: Saswata "Sasban" Banerjee
Author URI: https://styched.in
License: GPLv2 or later
Text Domain: sasban-plugin 
*/

// if this file is called directly, die
defined( 'ABSPATH' ) or die( 'Hey, you cant access this file, you silly human!' );

// require composer autoload once
if( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

// define plugin constants
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN', plugin_basename( __FILE__ ) );

use Inc\Base\Activate;
use Inc\Base\Deactivate;

/**
 * code that runs on plugin activation
 */
function activate_sasban_plugin() {
    Activate::activate();
}
register_activation_hook( __FILE__, 'activate_sasban_plugin' );

/**
 * code that runs on plugin deactivation
 */
function deactivate_sasban_plugin() {
    Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_sasban_plugin' );

if( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}

// use Inc\Base\Activate;
// use Inc\Base\Deactivate;
// use Inc\Pages\Admin;


// if ( !class_exists( 'SasbanPlugin' )) {

//     class SasbanPlugin 
//     {
//         public $plugin;

//         function __construct() {
//             $this->plugin = plugin_basename( __FILE__ );
//         }
//         public function register() {
//             add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
//             # add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

//             add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

//             add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
//         }

//         public function settings_link( $links ) {
//             // add custom settings link
//             $settings_link = '<a href="admin.php?page=sasban_plugin">Settings</a>';
//             array_push( $links, $settings_link );
//             $settings_link = '<a href="random.php?page=sasban_plugin">More</a>';
//             array_push( $links, $settings_link );
//             return $links;
//         }

//         public function add_admin_pages() {
//             add_menu_page( 'Sasban Plugin', 'Sasban', 'manage_options', 'sasban_plugin', array( $this, 'admin_index' ), 'dashicons-airplane', 110 );
//         }

//         public function admin_index() {
//             require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
//         }
        
//         protected function create_post_type() {
//             add_action( 'init', [ $this, 'custom_post_type' ] );
//         }

//         function custom_post_type() {
//             register_post_type( 'book', [ 'label' => 'Books', 'public' => true ] );
//         }

//         function enqueue() {
//             // enqueue all style and script
//             wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
//             wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
//         }

//         function activate() {
//             Activate::activate();
//         }

//         function deactivate() {
//             Deactivate::deactivate();
//         }
//     }

//     $sasbanPlugin = new SasbanPlugin();
//     $sasbanPlugin->register();

//     // activation
//     // require_once plugin_dir_path( __FILE__ ) . 'inc/Activate.php';
//     // register_activation_hook( __FILE__, array( 'Activate' , 'activateThis' ) );
//     register_activation_hook( __FILE__, array( $sasbanPlugin , 'activate' ) );

//     // deactivation
//     // require_once plugin_dir_path( __FILE__ ) . 'inc/Deactivate.php';
//     // register_deactivation_hook( __FILE__, array( 'Deactivate' , 'deactivateThis' ) );
//     register_deactivation_hook( __FILE__, array( $sasbanPlugin , 'deactivate' ) );
// }