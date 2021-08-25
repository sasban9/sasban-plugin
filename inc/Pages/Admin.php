<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $callbacks_mngr;

    public $pages = array();

    public $subpages = array();

    public function register() 
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();
        $this->setSubpages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

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
                'callback' => array($this->callbacks, 'adminCPT'),
            ),
            array(
                'parent_slug' => 'sasban_plugin', 
                'page_title' => 'Custom Taxonomies', 
                'menu_title' => 'Taxonomies', 
                'capability' => 'manage_options', 
                'menu_slug' => 'sasban_taxonomies', 
                'callback' => array($this->callbacks, 'adminTaxonomy'),
            ),
            array(
                'parent_slug' => 'sasban_plugin', 
                'page_title' => 'Custom Widgets', 
                'menu_title' => 'Widgets', 
                'capability' => 'manage_options', 
                'menu_slug' => 'sasban_widgets', 
                'callback' => array($this->callbacks, 'adminWidget'),
            ),
        );
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'sasban_plugin_settings',
                'option_name' => 'cpt_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'sasban_plugin_settings',
                'option_name' => 'taxonomy_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'sasban_plugin_settings',
                'option_name' => 'media_widget',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'sasban_plugin_settings',
                'option_name' => 'gallery_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'sasban_plugin_settings',
                'option_name' => 'testimonial_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'sasban_plugin_settings',
                'option_name' => 'templates_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'sasban_plugin_settings',
                'option_name' => 'login_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'sasban_plugin_settings',
                'option_name' => 'membership_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                'option_group' => 'sasban_plugin_settings',
                'option_name' => 'chat_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'sasban_admin_index',
                'title' => 'Settings Manager',
                'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
                'page' => 'sasban_plugin'
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'cpt_manager',
                'title' => 'Activate CPT Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'sasban_plugin',
                'section' => 'sasban_admin_index',
                'args' => array(
                    'label_for' => 'cpt_manager',
                    'classes' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'taxonomy_manager',
                'title' => 'Activate Taxonomy Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'sasban_plugin',
                'section' => 'sasban_admin_index',
                'args' => array(
                    'label_for' => 'taxonomy_manager',
                    'classes' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'media_widget',
                'title' => 'Activate Media Widget',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'sasban_plugin',
                'section' => 'sasban_admin_index',
                'args' => array(
                    'label_for' => 'media_widget',
                    'classes' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'gallery_manager',
                'title' => 'Activate Gallery Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'sasban_plugin',
                'section' => 'sasban_admin_index',
                'args' => array(
                    'label_for' => 'gallery_manager',
                    'classes' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'testimonial_manager',
                'title' => 'Activate Testimonial Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'sasban_plugin',
                'section' => 'sasban_admin_index',
                'args' => array(
                    'label_for' => 'testimonial_manager',
                    'classes' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'template_manager',
                'title' => 'Activate Template Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'sasban_plugin',
                'section' => 'sasban_admin_index',
                'args' => array(
                    'label_for' => 'template_manager',
                    'classes' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'login_manager',
                'title' => 'Activate Login Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'sasban_plugin',
                'section' => 'sasban_admin_index',
                'args' => array(
                    'label_for' => 'login_manager',
                    'classes' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'membership_manager',
                'title' => 'Activate Membership Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'sasban_plugin',
                'section' => 'sasban_admin_index',
                'args' => array(
                    'label_for' => 'membership_manager',
                    'classes' => 'ui-toggle',
                )
            ),
            array(
                'id' => 'chat_manager',
                'title' => 'Activate Chat Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'sasban_plugin',
                'section' => 'sasban_admin_index',
                'args' => array(
                    'label_for' => 'chat_manager',
                    'classes' => 'ui-toggle',
                )
            ),
        );

        $this->settings->setFields($args);
    }
}