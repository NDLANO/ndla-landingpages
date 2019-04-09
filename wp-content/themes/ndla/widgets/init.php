<?php
  require_once('featured-posts.php');
  require_once('featured-posts-sidebar.php');
  require_once('welcome.php');

  function myplugin_register_widgets() {
    register_widget( 'FeaturedPostsWidget' );
    loadPageSpecificWidgets();
  }

  function loadPageSpecificWidgets() {
    global $wpdb;
    $args = array(
      'post_type' => 'page',
      'taxonomy' => 'category',
              'field' => 'slug',
              'term' => 'landingside'
    );
    $landingPages = get_posts($args);
    foreach($landingPages as $page) {
      // Register welcome widget for each landing page
      register_welcome_widget(
        $page->post_title,
        $page->post_name,
        "Velkomst-widget for landingside " . $page->post_title
      );

      register_featured_posts(
        $page->post_title,
        $page->post_name,
        "Innehold for utvalde inlegg for ". $page->post_title
      );
    }
  }

  add_action( 'widgets_init', 'myplugin_register_widgets' );
?>
