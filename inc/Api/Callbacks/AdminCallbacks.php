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
}