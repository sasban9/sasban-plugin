<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class CptCallbacks
{
    public function acptSection()
    {
        echo 'Manage your Custom Post Types.';
    }

    public function cptSanitize($input)
    {
        return $input;
    }

    public function textField($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $placeholder = $args['placeholder'];
        $input = get_option($option_name);
        $value = $input[$name];

        echo '<input type="text" class="regular-text" id="'.$name.'" name="'.$option_name.'['.$name.']" value="'.$value.'" placeholder="'.$placeholder.'">';
    }

    public function checkboxField($args)
    {
        $option_name = $args['option_name'];
        $name = $args['label_for'];
        $classes = $args['classes'];
        $checkbox = get_option($option_name);

        $checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;
        echo '<div class="'.$classes.'"><input type="checkbox" id="'.$name.'" name="'.$option_name.'['.$name.']" value="1" '.($checked?'checked':'').' ><label for="'.$name.'"><div></div></label></div>';
    }
}