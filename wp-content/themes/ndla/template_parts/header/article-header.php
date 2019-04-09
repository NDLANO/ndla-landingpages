<?php  ?>
<!-- Article title -->
<?php the_title( '<h1 class="ndla-article__title">', '</h1>' ); ?>
Yo
<?php if ( ! is_page() ) : ?>
  <div class="ndla-article__meda">
    <?php esc_html( get_the_date( DATE_W3C ) ); ?>
  </div>
<?php endif; ?>

<!--
$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
  $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
}

$time_string = sprintf(
  $time_string,
  esc_attr( get_the_date( DATE_W3C ) ),
  esc_html( get_the_date() ),
  esc_attr( get_the_modified_date( DATE_W3C ) ),
  esc_html( get_the_modified_date() )
);

printf(
  '<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
  twentynineteen_get_icon_svg( 'watch', 16 ),
  esc_url( get_permalink() ),
  $time_string
);


-->
