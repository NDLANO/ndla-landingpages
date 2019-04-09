<?php
  /**
   * index page for NDLA
   */
   get_header();
?>
<main id="main" class="ndla-main" role="main">
  <?php if (have_posts()) : while (have_posts()) : the_post();
    get_template_part( 'template_parts/content/content', 'page' );
  ?>
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>

</main><!-- .site-main -->
<?php
  get_footer();
?>
