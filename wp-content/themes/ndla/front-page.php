<?php
  /**
   * Front page for NDLA
   */
   get_header();
   // $categories = get_categories();
   $frontpageCategory = 'fagblogg';
   query_posts( array(
    'category_name'  => $frontpageCategory,
    'posts_per_page' => 10
) );
?>
<main id="main" class="ndla-main" role="main">
    <div class="ndla-frontpage__flexcontent">
      <?php
        while ( have_posts() ) : the_post();
          get_template_part( 'template_parts/content/content', 'excerpt' );
        endwhile;
        // Reset Query
        wp_reset_query();
      ?>
    </div>
    <aside class="ndla-sidebar">
      <?php dynamic_sidebar('ndla-frontpage-sidebar'); ?>
    </aside>
</main>
<?php
  get_footer();
?>
