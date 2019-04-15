<?php
  /**
   * Front page for NDLA
   */
   get_header();
   $frontpageCategory = 'fagblogg';
   // Get posts for frontpage
   $getPosts = get_posts(array(
     'numberposts' => 10,
     'post_type' => 'post',
     'taxonomy' => 'category',
               'field' => 'slug',
               'term' => $frontpageCategory
   ));
?>
<main id="main" class="ndla-main" role="main">
    <div class="ndla-frontpage__flexcontent">
      <?php foreach($getPosts as $post) : the_post(); ?>
        <?php get_template_part( 'template_parts/content/content', 'excerpt' ); ?>
      <?php endforeach; ?>
    </div>
    <aside class="ndla-sidebar">
      <?php dynamic_sidebar('ndla-frontpage-sidebar'); ?>
    </aside>
</main>
<?php
  get_footer();
?>
