<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Base;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class TaxonomyController extends BaseController
{
    public $callbacks;
    public $subpages = array();

    public function register()
    {
        if(!$this->activated('taxonomy_manager'))return;

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();

        $this->setSubpages();

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
}