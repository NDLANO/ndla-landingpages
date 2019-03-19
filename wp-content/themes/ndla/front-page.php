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
  <?php
    $args = array(
      'category' => 2,
      'post_type' => 'post',
      'numberposts' => 4
    );
    $frontpagePosts = get_posts($args);
    // print '<pre>';
    // print_r($frontpagePosts);
    // print '</pre>';
  ?>
  <div class="ndla-frontpage__latest">
    <?php foreach($frontpagePosts as $post) : setup_postdata($post) ?>
    <div class="ndla-frontpage__post">
      <div class="ndla-frontpage__post__image"></div>
      <h2 class="ndla-frontpage__post__title">
        <?php echo $post->post_title; ?>
      </h2>
    </div>
    <?php endforeach ?>
  </div>
</div>
