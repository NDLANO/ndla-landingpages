<?php
  require_once('featured-posts.php');
  require_once('featured-posts-sidebar.php');
  require_once('guide.php');
  require_once('most-viewed.php');
  require_once('welcome.php');

  function myplugin_register_widgets() {
    register_widget( 'FeaturedPostsWidget' );
    register_widget( 'MostViewedPostsWidget' );
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
        "Velkomst-widget for landingside " . strtolower($page->post_title)
      );

      register_featured_posts(
        $page->post_title,
        $page->post_name,
        "Innehold for utvalde inlegg  ". strtolower($page->post_title)
      );

      register_page_guide(
        $page->post_title,
        $page->post_name,
        "Hurtigvalg for ". $page->post_title
      );

      register_landingpage_bottom_left_widget(
        $page->post_title,
        $page->post_name,
        "Innehold for venstre nedre widget på landingside " . strtolower($page->post_title)
      );
    }
  }

  add_action( 'widgets_init', 'myplugin_register_widgets' );
?>
