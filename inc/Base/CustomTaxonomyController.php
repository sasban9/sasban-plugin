<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Base;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\TaxonomyCallbacks;

class CustomTaxonomyController extends BaseController
{
    public $settings;
    public $callbacks;
    public $tax_callbacks;
    public $subpages = array();
    public $taxonomies = array();

    public function register()
    {
        if(!$this->activated('taxonomy_manager'))return;

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->tax_callbacks = new TaxonomyCallbacks();

        $this->setSubpages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addSubPages($this->subpages)->register();       
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'sasban_plugin', 
                'page_title' => 'Taxonomy Manager', 
                'menu_title' => 'Taxonomy Manager', 
                'capability' => 'manage_options', 
                'menu_slug' => 'sasban_taxonomy', 
                'callback' => array($this->callbacks, 'adminTaxonomy'),
            ),
        );
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'sasban_plugin_tax_settings',
                'option_name' => 'sasban_plugin_tax',
                'callback' => array($this->tax_callbacks, 'taxSanitize')
            )
        );
        
        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id' => 'sasban_tax_index',
                'title' => 'Custom Taxonomy Manager',
                'callback' => array($this->tax_callbacks, 'taxSectionManager'),
                'page' => 'sasban_taxonomy'
            )
        );
        
        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'taxonomy',
                'title' => 'Custom Taxonomy ID',
                'callback' => array($this->tax_callbacks, 'textField'),
                'page' => 'sasban_taxonomy',
                'section' => 'sasban_tax_index',
                'args' => array(
                    'option_name' => 'sasban_plugin_tax',
                    'label_for' => 'taxonomy',
                    'placeholder' => 'e.g. genre',
                    'array' => 'taxonomy'
                )
            ),
            array(
                'id' => 'singular_name',
                'title' => 'Singular Name',
                'callback' => array($this->tax_callbacks, 'textField'),
                'page' => 'sasban_taxonomy',
                'section' => 'sasban_tax_index',
                'args' => array(
                    'option_name' => 'sasban_plugin_tax',
                    'label_for' => 'singular_name',
                    'placeholder' => 'e.g. Genre',
                    'array' => 'taxonomy'
                )
            ),
            array(
                'id' => 'hierarchical',
                'title' => 'Hierarchical',
                'callback' => array($this->tax_callbacks, 'checkboxField'),
                'page' => 'sasban_taxonomy',
                'section' => 'sasban_tax_index',
                'args' => array(
                    'option_name' => 'sasban_plugin_tax',
                    'label_for' => 'hierarchical',
                    'classes' => 'ui-toggle',
                    'array' => 'taxonomy'
                )
            ),
        );

        $this->settings->setFields($args);
    }
}