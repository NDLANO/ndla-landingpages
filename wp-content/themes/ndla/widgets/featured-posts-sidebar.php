<?php
  /* Custom shortcut widget for frontpage */
  function register_featured_posts($name, $slug, $description) {
    register_sidebar(
      array(
        'name'          => __( '[' . $name . '] Utvalde inlegg', 'ndla2019' ),
        'id'            => 'ndla-featured-' . $slug,
        'class'         => 'ndla-featured',
        'description'   => __( $description, 'ndla2019' ),
        'before_widget' => '<div id="%1$s" class="widget ndla-featured %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
      )
    );
  }
?>
