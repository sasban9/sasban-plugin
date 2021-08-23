<?php
/**
 * @package SasbanPlugin
 */

class Deactivate
{
    public static function deactivateThis() {
        flush_rewrite_rules();
    }
}