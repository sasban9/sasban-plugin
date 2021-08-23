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
    function __construct(string $string) {
        #echo $string . '<br>';
        add_action( 'init', [ $this, 'custom_post_type' ] );
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

    function uninstall() {
        # delete CPT
        # delete all plugin data from DB
    }

    function custom_post_type() {
        register_post_type( 'book', [ 'label' => 'Books', 'public' => true ] );
    }

}

if (class_exists( 'SasbanPlugin' )) {
    $sasbanPlugin = new SasbanPlugin( '======================Sasban Plugin initialized !' );

    // activation
    register_activation_hook( __FILE__, array( $sasbanPlugin, 'activate' ) );

    // deactivation
    register_deactivation_hook( __FILE__, array( $sasbanPlugin, 'deactivate' ) );

    //uninstall

}