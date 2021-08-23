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

class SasbanPlugin 
{
    function __construct() {
        add_action( 'init', [ $this, 'custom_post_type' ] );
    }

    function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
        # add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
    }

    function activate() {
        # generate a CPT
        $this->custom_post_type();
        # flush rewrite rules
        flush_rewrite_rules();
    }

    function deactivate() {
        # flush rewrite rules
        flush_rewrite_rules();
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

if (class_exists( 'SasbanPlugin' )) {
    $sasbanPlugin = new SasbanPlugin();
    $sasbanPlugin->register();

    // activation
    register_activation_hook( __FILE__, array( $sasbanPlugin, 'activate' ) );

    // deactivation
    register_deactivation_hook( __FILE__, array( $sasbanPlugin, 'deactivate' ) );
}