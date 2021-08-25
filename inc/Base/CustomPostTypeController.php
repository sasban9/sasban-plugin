<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Base;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class CustomPostTypeController extends BaseController
{
    public $callbacks;
    public $subpages = array();

    public function register()
    {
        $option = get_option('sasban_plugin');
        $activated = isset($option['cpt_manager']) ? $option['cpt_manager'] : false;
        if(!$activated)return;

        $this->settings = new SettingsApi();

        $this->setSubpages();

        $this->settings->addSubPages($this->subpages)->register();

        add_action('init', array($this, 'activate'));        
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'sasban_plugin', 
                'page_title' => 'Custom Post Types', 
                'menu_title' => 'CPT Manager', 
                'capability' => 'manage_options', 
                'menu_slug' => 'sasban_cpt', 
                'callback' => array($this->callbacks, 'adminCPT'),
            ),
        );
    }

    public function activate()
    {
        register_post_type('sasban_products',
            array(
                'labels' => array(
                    'name' => 'Products',
                    'singular_name' => 'Product'
                ),
                'public' => true,
                'hs_archive' => true
            )    
        );
    }
}