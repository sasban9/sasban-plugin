<?php
/**
 * @package SasbanPlugin
 */

namespace Inc;

class Deactivate
{
    public static function deactivate() {
        flush_rewrite_rules();
    }
}