<?php
  /**
   * Front page for NDLA
   */
   get_header();
?>

<div>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div>
      <p><?php the_content(__('(more...)')); ?></p>
    </div>
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
  <?php endif; ?>
</div>
