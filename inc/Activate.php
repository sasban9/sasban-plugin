<?php
/**
 * @package SasbanPlugin
 */

class Activate
{
    public static function activateThis() {
        flush_rewrite_rules();
    }
}