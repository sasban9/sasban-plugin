<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
    public $settings;

    public $pages = array();

    public function __construct() {
        $this->settings = new SettingsApi();

        $this->pages = array(
            array(
                'page_title' => 'Sasban Plugin', 
                'menu_title' => 'Sasban', 
                'capability' => 'manage_options', 
                'menu_slug' => 'ext_plugin', 
                'callback' => function() { echo '<h1>Sasban Plugin (from callback)</h1>'; }, 
                'icon_url' => 'dashicons-airplane', 
                'position' => 110
            ),
            array(
                'page_title' => 'Text Plugin', 
                'menu_title' => 'Text Sasban', 
                'capability' => 'manage_options', 
                'menu_slug' => 'sasban_plugin', 
                'callback' => function() { echo '<h1>TEXT Plugin (from cb)</h1>'; }, 
                'icon_url' => 'dashicons-external', 
                'position' => 15
            ),
        );
    }

    public function register() {
        # add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

        // add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

        $this->settings->addPages($this->pages)->register();

        // add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }
}