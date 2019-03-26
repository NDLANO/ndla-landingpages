<?php
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
          'name' => __( 'Sidebar Widget', 'ndla-theme' ),
          'id' => 'ndla-sidebar',
          'description' => __( 'Sidemeny', 'ndla-theme' ),
          'before_widget' => '<div class="ndla-sidebar__widget">',
          'after_widget' => "</div>",
          'before_title' => '<h3 class="ndla-sidebar__widget__title">',
          'after_title' => '</h3>',
      )
    );
  }
  add_action( 'widgets_init', 'ndla_sidebar' );
?>
