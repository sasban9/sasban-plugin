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
        echo $string . '<br>';
    }
}

if (class_exists( 'SasbanPlugin' )) {
    $sasbanPlugin = new SasbanPlugin( '======================Sasban Plugin initialized !' );
}

function customFunction($arg) {
    echo $arg;
}

customFunction('======================This is my argument. please echo it.');