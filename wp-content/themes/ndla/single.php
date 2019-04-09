<?php get_header(); ?>
<div id="primary" class="content-area">
  <main id="main" class="ndla-main" role="main">
    <aside class="ndla-sidebar">
      <?php dynamic_sidebar( 'ndla-sidebar' ); ?>
    </aside>
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();
      setPostViews(get_the_ID());

      get_template_part( 'template_parts/content/content', 'single' );

      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
          comments_template();
      endif;

      // Previous/next post navigation.
      /* the_post_navigation( array(
          'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
              '<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
              '<span class="post-title">%title</span>',
          'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
              '<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
              '<span class="post-title">%title</span>',
      ) ); */

    // End the loop.
    endwhile;
    ?>
  </main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
