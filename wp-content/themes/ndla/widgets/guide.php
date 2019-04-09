<?php
  function register_page_guide($name, $slug, $description) {
    register_sidebar(
      array(
        'name'          => __( 'Hurtigvalg for ' . $name, 'ndla2019' ),
        'id'            => 'ndla-guide-' . $slug,
        'class'         => 'ndla-guide',
        'description'   => __( $description, 'ndla2019' ),
        'before_widget' => '<div id="%1$s" class="widget ndla-guide %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
      )
    );
  }
?>
