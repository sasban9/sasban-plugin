<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class TaxonomyCallbacks
{
    public function taxSectionManager()
    {
        echo 'Create as many Custom Taxonomies as you want.';
    }

    public function taxSanitize($input)
    {
        $output = get_option('sasban_plugin_tax');

        if(isset($_POST['remove'])) {
            unset($output[$_POST['remove']]);
            return $output;
        }

        if(count($output) == 0) {
            $output[$input['taxonomy']] = $input;
            return $output;
        }

        foreach ($output as $key => $value) {
            if($input['taxonomy'] === $key) {
                $output[$type] = $input;
            } else {
                $output[$input['taxonomy']] = $input;
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

        if(isset($_POST['edit_taxonomy'])) {
            $input = get_option($option_name);
            $value = $input[$_POST['edit_taxonomy']][$name];
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

        if(isset($_POST['edit_taxonomy'])) {
            $checkbox = get_option($option_name);
            $checked = isset($checkbox[$_POST['edit_taxonomy']][$name]) ?: false;
        }

        echo '<div class="'.$classes.'"><input type="checkbox" id="'.$name.'" name="'.$option_name.'['.$name.']" value="1" '.($checked?'checked':'').' ><label for="'.$name.'"><div></div></label></div>';
    }
}