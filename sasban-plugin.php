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

/**
 * initialize all core classes of the plugin
 */
if( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}