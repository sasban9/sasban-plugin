<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input)
    {
        // return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        // return (isset($input)?true:false);

        $output = array();
        foreach ($this->managers as $key => $value) {
            $output[$key] = isset($input[$key])?true:false;
        }
        return $output;
    }

    public function adminSectionManager()
    {
        echo 'Manage the Sections and Features of this Plugin by selecting the checkboxes from below.';
    }

    public function checkboxField($args)
    {
        $option_name = $args['option_name'];
        $name = $args['label_for'];
        $classes = $args['classes'];
        $checkbox = get_option($option_name);
        echo '<div class="'.$classes.'"><input type="checkbox" id="'.$name.'" name="'.$option_name.'['.$name.']" value="1" '.($checkbox[$name] ? 'checked' : '').' ><label for="'.$name.'"><div></div></label></div>';
    }
}