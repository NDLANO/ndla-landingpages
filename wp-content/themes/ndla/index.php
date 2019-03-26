<?php
  /**
   * index page for NDLA
   */
   get_header();
?>
<section id="primary" class="content-area">
  <main id="main" class="ndla-main" role="main">
    <aside class="ndla-sidebar">
      <?php dynamic_sidebar( 'ndla-sidebar' ); ?>
    </aside>
    <?php if (have_posts()) : while (have_posts()) : the_post();
      get_template_part( 'template_parts/content/content', 'page' );

    ?>
      <!-- <div>
        <h1><?php the_title(); ?></h1>
        <h4>Posted on <?php the_time('F jS, Y') ?></h4>
        <p><?php the_content(__('(more...)')); ?></p>
      </div> -->
      <?php endwhile; else: ?>
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>

  </main><!-- .site-main -->
</section><!-- .content-area -->

<?php
get_footer();
?>
