<?php
  require_once('featured-posts.php');

  function myplugin_register_widgets() {
    register_widget( 'FeaturedPostsWidget' );
  }

  add_action( 'widgets_init', 'myplugin_register_widgets' );
?>
