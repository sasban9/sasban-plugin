<?php
/**
 * @package SasbanPlugin
 */

namespace Inc\Pages;

class Admin
{

    public function register() {
        # add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );

        add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

        // add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
    }

    public function add_admin_pages() {
        add_menu_page( 'Sasban Plugin', 'Sasban', 'manage_options', 'sasban_plugin', array( $this, 'admin_index' ), 'dashicons-airplane', 110 );
    }

    public function admin_index() {
        require_once PLUGIN_PATH . 'templates/admin.php';
    }
}