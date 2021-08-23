<?php

/**
 * Trigger this file on Plugin uninstall
 * 
 * @package SasbanPlugin
 */

 if( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
     die;
 }

# Clear DB stored data
$books = get_posts( [ 'post_type' => 'book', 'numberposts' => -1 ] );

foreach( $books as $book ) {
    wp_delete_post( $book->ID, true ); # false means move to trash but don't delete permanently
}

# Alternate way to delete using queries
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );