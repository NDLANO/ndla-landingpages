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

  /* Custom shortcut widget for frontpage */
  /* function register_featured_posts() {
    register_sidebar(
      array(
        'name'          => __( 'Utvalde inlegg', 'ndla2019' ),
        'id'            => 'ndla-featured',
        'class'         => 'ndla-featured',
        'description'   => __( 'Innehold for utvalde poster for landingside.', 'ndla2019' ),
        'before_widget' => '<div id="%1$s" class="widget ndla-featured %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
      )
    );
  } */
  /* Custom shortcut widget for frontpage */
  function register_shortcuts() {
    register_sidebar(
  		array(
  			'name'          => __( 'Hurtigvalg landingside', 'ndla2019' ),
  			'id'            => 'ndla-hurtigvalg',
  			'description'   => __( 'Innehold for hurtigvalgs widget.', 'ndla2019' ),
  			'before_widget' => '<div id="%1$s" class="widget ndla-shortcuts %2$s">',
  			'after_widget'  => '</div>',
  			'before_title'  => '<h3 class="widget-title">',
  			'after_title'   => '</h3>',
  		)
    );
  }

  /* Add widget for for-elever */
  function register_for_elever_widget() {
    register_sidebar(
  		array(
  			'name'          => __( 'Velkomsttekst for elevside', 'ndla2019' ),
  			'id'            => 'ndla-welcome-for-elever',
        'class'         => 'ndla-welcome',
  			'description'   => __( 'Innehold for-elever landingside velkomst-widget.', 'ndla2019' ),
  			'before_widget' => '<div id="%1$s" class="ndla-welcome__widget %2$s">',
  			'after_widget'  => '</div>',
  			'before_title'  => '<h2 class="ndla-welcome__title">',
  			'after_title'   => '</h2>',
  		)
    );
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

  /* Widget for welcome widget for pages */
  add_action( 'widgets_init', 'ndla_sidebar' );
  add_action( 'widgets_init', 'register_shortcuts' );
  // add_action( 'widgets_init', 'register_welcome_widget' );
  // add_action( 'widgets_init', 'register_featured_posts' );
  // add_action( 'widgets_init', 'register_for_elever_widget' );
?>
