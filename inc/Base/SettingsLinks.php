<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController
{

    public function register() {
        add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    public function settings_link( $links ) {
        // add custom settings link
        $settings_link = '<a href="admin.php?page=sasban_plugin">Settings</a>';
        array_push( $links, $settings_link );
        $settings_link = '<a href="https://facebook.com" target="_blank">More</a>';
        array_push( $links, $settings_link );
        return $links;
    }
}