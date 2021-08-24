<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $pages = array();

    public $subpages = array();

    public function register() 
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();

        $this->setPages();
        $this->setSubpages();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function setPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Sasban Plugin', 
                'menu_title' => 'Sasban', 
                'capability' => 'manage_options', 
                'menu_slug' => 'sasban_plugin', 
                'callback' => array($this->callbacks, 'adminDashboard'), 
                'icon_url' => 'dashicons-airplane', 
                'position' => 110
            ),
        );
    }

    public function setSubpages()
    {
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
}