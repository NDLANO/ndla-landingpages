<?php
  require_once('widgets/init.php');
  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support(
    'html5',
    array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    )
  );
  // Allow block styles
  add_theme_support( 'wp-block-styles' );
  // Allow responsive media
  add_theme_support( 'responsive-embeds' );
  // Add support for thumbnails
  add_theme_support( 'post-thumbnails' );
  // Edit buttons for widgets
  add_theme_support( 'customize-selective-refresh-widgets' );
  // Enable automatic feed links
  add_theme_support( 'automatic-feed-links' );
  /*
   * Set post views count using post meta
   */
  function setPostViews($postID) {
      $countKey = 'post_views_count';
      $count = get_post_meta($postID, $countKey, true);
      if ($count==''){
          $count = 0;
          delete_post_meta($postID, $countKey);
          add_post_meta($postID, $countKey, '0');
      } else {
          $count++;
          update_post_meta($postID, $countKey, $count);
      }
  }

  /*
   * Custom sidebar
   */
  function ndla_sidebar() {
    register_sidebar(
      array (
          'name' => __( 'Sidebar Widget', 'ndla2019' ),
          'id' => 'ndla-sidebar',
          'description' => __( 'Sidemeny', 'ndla-theme' ),
          'before_widget' => '<div class="ndla-sidebar__widget">',
          'after_widget' => "</div>",
          'before_title' => '<h3 class="ndla-sidebar__widget__title">',
          'after_title' => '</h3>',
      )
    );
  }

  function ndla_frontpage_sidebar() {
    register_sidebar(
      array (
          'name' => __( '[Framside] Sidebar', 'ndla2019' ),
          'id' => 'ndla-frontpage-sidebar',
          'description' => __( 'Sidemeny fagblogg', 'ndla-theme' ),
          'before_widget' => '<div class="ndla-sidebar__widget">',
          'after_widget' => "</div>",
          'before_title' => '<h3 class="ndla-sidebar__widget__title">',
          'after_title' => '</h3>',
      )
    );
  }

  /*  Function for getting the most viewed posts for a category */
  function ndla_get_most_viewed($category) {
    // $mostViewed = query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC');
    $getPosts = get_posts(array(
      'numberposts' => 4,
      'post_type' => 'post',
      'meta_key' => 'post_views_count',
      'order_by' => 'meta_value_num',
      'taxonomy' => 'category',
                'field' => 'slug',
                'term' => $category
    ));

    // return 'Get most viewed for ' . $category;
    return $getPosts;
  }

  /* Function for determining if page is landing page */
  function ndla_is_landing_page($categories) {
    if ($categories) {
      $categoryTypes = wp_list_pluck( $categories, 'slug' );
      if ($categoryTypes) {
        foreach($categoryTypes as $type) {
          if ($type === 'landingside') {
            return 1;
          }
        }
      }
    }
    return 0;
  }

  /* Get landingpage type */
  function ndla_get_category_id($categorySlug) {
    global $wpdb;
    $categories = get_categories();

    return $categories;
  }

  add_action('pre_get_posts','homepage_queries');
  function homepage_queries( $query ) {
     // && !is_admin() $query->is_main_query() && !$query->is_feed()
    if( is_home() && $query->is_main_query() && !is_admin() ) {
      $query->set( 'paged',  get_query_var( 'page' ) ); // str_replace( '/', '', get_query_var( 'page' ) )
    }
  }

  /* Widget for welcome widget for pages */
  // add_action( 'widgets_init', 'ndla_sidebar' );
  add_action ( 'widgets_init', 'ndla_frontpage_sidebar');
  // add_action( 'widgets_init', 'register_shortcuts' );
  // load jquery
  // wp_enqueue_script("jquery");
  function theme_slug_setup() {
     add_theme_support( 'title-tag' );
  }
  add_action( 'after_setup_theme', 'theme_slug_setup' );
?>
