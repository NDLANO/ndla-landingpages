<?php
  // get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('ndla-article'); ?>>
  <header class="ndla-article__header">
    <!-- Article title -->
    <?php the_title( '<h1 class="ndla-article__title">', '</h1>' ); ?>
    <?php if ( ! is_page() ) : ?>
      <div class="ndla-article__meta">
        <span class="ndla-article__meta__time"><?php echo date('d.m.Y', get_post_time()); ?></span>
        <span class="ndla-article__meta__seperator"></span>
        <?php echo get_the_author(); ?>
      </div>
    <?php endif; ?>
	</header>
  <div class="ndla-article__content">
		<?php
		the_content();

		/* wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
				'after'  => '</div>',
			)
		); */
		?>
	</div><!-- .entry-content -->

</article><!-- #post-${ID} -->
