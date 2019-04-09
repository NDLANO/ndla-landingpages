<?php
  /* Widget for welcome text on frontpage */
  function register_welcome_widget($name, $slug, $description) {
    register_sidebar(
      array(
        'name'          => __( 'Velkomstwidget for ' . $name, 'ndla2019' ),
        'id'            => 'ndla-welcome-' . $slug,
        'class'         => 'ndla-welcome',
        'description'   => __( $description, 'ndla2019' ),
        'before_widget' => '<div id="%1$s" class="ndla-welcome__widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="ndla-welcome__title">',
        'after_title'   => '</h2>',
      )
    );
  }
?>
