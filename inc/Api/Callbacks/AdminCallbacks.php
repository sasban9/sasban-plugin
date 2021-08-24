<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once( "$this->plugin_path/templates/admin.php" ); 
    }

    public function adminCPT()
    {
        return require_once( "$this->plugin_path/templates/cpt.php" ); 
    }

    public function adminTaxonomy()
    {
        return require_once( "$this->plugin_path/templates/taxonomy.php" ); 
    }

    public function adminWidget()
    {
        return require_once( "$this->plugin_path/templates/widget.php" ); 
    }

    public function sasbanOptionsGroup($input)
    {
        return $input;
    }

    public function sasbanAdminSection()
    {
        echo 'Check this beautiful section!';
    }

    public function sasbanTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="" placeholder="Write Something Here!">';
    }
}