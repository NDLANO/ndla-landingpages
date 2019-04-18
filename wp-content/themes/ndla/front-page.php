<?php
  /**
   * Front page for NDLA
   */
   get_header();
   // $categories = get_categories();
   $frontpageCategory = 'fagblogg';
   $paged = ($wp_query->query['paged']) ? $wp_query->query['paged'] : 1;
   $args = array(
      'category_name' => $frontpageCategory,
      'posts_per_page' => 5,
      'paged' => $paged
   );
   $the_query = new WP_Query($args);
?>
<main id="main" class="ndla-main" role="main">
    <div class="ndla-frontpage__flexcontent">
      <?php
        while ( $the_query->have_posts() ) : $the_query->the_post();
          get_template_part( 'template_parts/content/content', 'excerpt' );
        endwhile;
        // Reset Query
        // wp_reset_query();
      ?>
      <nav class="ndla-frontpage__pagination">
        <div class="ndla-frontpage__pagination__item ndla-frontpage__pagination__item--left">
          <?php previous_posts_link( __('&laquo; &laquo; Nyere inlegg') ); ?>
        </div>
        <div class="ndla-frontpage__pagination__item ndla-frontpage__pagination__item--right">
          <?php next_posts_link( __('Eldre inlegg &raquo; &raquo;'), $the_query->max_num_pages ); ?>
        </div>
        <?php
          // previous_post_link('&laquo; &laquo; Eldre inlegg');
          // next_post_link('Nyere inlegg &raquo; &raquo; ');


        ?>
        <?php
          // next_posts_link() usage with max_num_pages
          // posts_nav_link('separator','Eldre inlegg','Nyere inlegg');
          // previous_posts_link( __('Nyere inlegg') );
          // next_posts_link( __('Eldre inlegg'), $the_query->max_num_pages );
          // clean up after the query and pagination
          // wp_reset_query();
          wp_reset_postdata();
        ?>
      </nav>
    </div>
    <aside class="ndla-sidebar">
      <?php dynamic_sidebar('ndla-frontpage-sidebar'); ?>
    </aside>
</main>
<?php
  get_footer();
?>
