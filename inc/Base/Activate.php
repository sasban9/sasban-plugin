<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Base;

class Activate
{
    public static function activate() {
        flush_rewrite_rules();

        if(get_option('sasban_plugin')) {
            return;
        }

        $default = array();
        update_option('sasban_plugin', $default);
    }
}