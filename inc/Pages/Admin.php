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

    public $subpages = array();

    public function __construct() {
        $this->settings = new SettingsApi();

        $this->pages = array(
            array(
                'page_title' => 'Sasban Plugin', 
                'menu_title' => 'Sasban', 
                'capability' => 'manage_options', 
                'menu_slug' => 'sasban_plugin', 
                'callback' => function() { echo '<h1>Sasban Plugin (from callback)</h1>'; }, 
                'icon_url' => 'dashicons-airplane', 
                'position' => 110
            ),
        );

        $this->subpages = array(
            array(
                'parent_slug' => 'sasban_plugin', 
                'page_title' => 'Custom Post Types', 
                'menu_title' => 'CPT', 
                'capability' => 'manage_options', 
                'menu_slug' => 'sasban_cpt', 
                'callback' => function() { echo '<h1>Sasban CPT Manager</h1>'; },
            ),
            array(
                'parent_slug' => 'sasban_plugin', 
                'page_title' => 'Custom Taxonomies', 
                'menu_title' => 'Taxonomies', 
                'capability' => 'manage_options', 
                'menu_slug' => 'sasban_taxonomies', 
                'callback' => function() { echo '<h1>Sasban Taxonomies Manager</h1>'; },
            ),
            array(
                'parent_slug' => 'sasban_plugin', 
                'page_title' => 'Custom Widgets', 
                'menu_title' => 'Widgets', 
                'capability' => 'manage_options', 
                'menu_slug' => 'sasban_widgets', 
                'callback' => function() { echo '<h1>Sasban Widgets Manager</h1>'; },
            ),
        );
    }

    public function register() {
        # add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

        // add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();

        // add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }
}