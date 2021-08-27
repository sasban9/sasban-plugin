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
        $output = get_option('sasban_plugin_cpt');

        if(isset($_POST['remove'])) {
            unset($output[$_POST['remove']]);
            return $output;
        }

        if(count($output) == 0) {
            $output[$input['post_type']] = $input;
            return $output;
        }

        foreach ($output as $key => $value) {
            if($input['post_type'] === $key) {
                $output[$type] = $input;
            } else {
                $output[$input['post_type']] = $input;
            }
        }
        
        return $output;
    }

    public function textField($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $placeholder = $args['placeholder'];
        // $input = get_option($option_name);
        $value = '';

        if(isset($_POST['edit_post'])) {
            $input = get_option($option_name);
            $value = $input[$_POST['edit_post']][$name];
        }

        echo '<input type="text" class="regular-text" id="'.$name.'" name="'.$option_name.'['.$name.']" value="'.$value.'" placeholder="'.$placeholder.'" required>';
    }

    public function checkboxField($args)
    {
        $option_name = $args['option_name'];
        $name = $args['label_for'];
        $classes = $args['classes'];
        $checkbox = get_option($option_name);
        $checked = false;

        if(isset($_POST['edit_post'])) {
            $checkbox = get_option($option_name);
            $checked = isset($checkbox[$_POST['edit_post']][$name]) ?: false;
        }

        echo '<div class="'.$classes.'"><input type="checkbox" id="'.$name.'" name="'.$option_name.'['.$name.']" value="1" '.($checked?'checked':'').' ><label for="'.$name.'"><div></div></label></div>';
    }
}