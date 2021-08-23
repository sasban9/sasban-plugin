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

defined( 'ABSPATH' ) or die( 'Hey, you cant access this file, you silly human!' );

if ( !class_exists( 'SasbanPlugin' )) {

    class SasbanPlugin 
    {
        public function register() {
            add_action( 'admin_enqueue_scripts', array( 'SasbanPlugin', 'enqueue' ) );
            # add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
        }
        
        protected function create_post_type() {
            add_action( 'init', [ $this, 'custom_post_type' ] );
        }

        function custom_post_type() {
            register_post_type( 'book', [ 'label' => 'Books', 'public' => true ] );
        }

        function enqueue() {
            // enqueue all style and script
            wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
            wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
        }
    }
    
    // $sasbanPlugin = new SasbanPlugin();
    // $sasbanPlugin->register();

    // activation
    require_once plugin_dir_path( __FILE__ ) . 'inc/Activate.php';
    register_activation_hook( __FILE__, array( 'Activate' , 'activateThis' ) );

    // deactivation
    require_once plugin_dir_path( __FILE__ ) . 'inc/Deactivate.php';
    register_deactivation_hook( __FILE__, array( 'Deactivate' , 'deactivateThis' ) );
}