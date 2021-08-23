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

if ( !defined( 'ABSPATH' ) ) {
    die;
}

defined( 'ABSPATH' ) or die( 'Hey, you cant access this file, you silly human!' );

if( !function_exists( 'add_action' )) {
    'Hey, you can\'t access this file, you silly human!';
    exit;
}