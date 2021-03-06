<?php /**
 * Plugin Name: Add Categories to Pages.
 * Plugin URI: https://spicewp.com
 * Description: Easily add Categories and Tags to Pages. Simply Activate and visit the Page Edit SCreen.
 * Version: 1.1
 * Author: a.ankit
 * Author URI: https://spicewp.com
 * License:  GPL2
 */
 
 
 
 function add_taxonomies_to_pages() {
      register_taxonomy_for_object_type( 'post_tag', 'page' );
      register_taxonomy_for_object_type( 'category', 'page' );
  } 

 add_action( 'init', 'add_taxonomies_to_pages' );


 add_action( 'pre_get_posts', 'category_and_tag_archives' );

 
// Add Page as a post_type in the archive.php and tag.php

function category_and_tag_archives( $wp_query ) {

if( $wp_query->is_main_query() && ! is_admin() && ( $wp_query->is_category() || $wp_query->is_tag() )) {
    $my_post_array = array('post','page');
    
    if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
     $wp_query->set( 'post_type', $my_post_array );
    
   if ( $wp_query->get( 'tag' ) )
     $wp_query->set( 'post_type', $my_post_array );
}
 }

?>