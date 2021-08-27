<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Base;

class Activate
{
    public static function activate() {
        flush_rewrite_rules();

        $default = array();
        if(!get_option('sasban_plugin')) {
            update_option('sasban_plugin', $default);
        }

        if(!get_option('sasban_plugin_cpt')) {
            update_option('sasban_plugin_cpt', $default);
        }

        if(!get_option('sasban_plugin_tax')) {
            update_option('sasban_plugin_tax', $default);
        }
    }
}