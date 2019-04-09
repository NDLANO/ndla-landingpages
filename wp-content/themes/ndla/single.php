<?php get_header(); ?>
<?php
  global $wp_query;
  $postID = $wp_query->post->ID;
  $postCategories = wp_get_post_categories($postID);
  $category = get_category($postCategories[0]);
?>
<div id="primary" class="ndla-content-area">
  <main id="main" class="ndla-main" role="main">
    <ul class="ndla-breadcrumb">
      <li class="ndla-breadcrumb__item"><a href="<?php echo get_site_url() . '/' . $category->slug; ?>/"><?php echo $category->name; ?></a> <i class="fas fa-chevron-right"></i></li>
      <li class="ndla-breadcrumb__item"><?php the_title(); ?></li>
    </ul>
    <!-- <aside class="ndla-sidebar">
      <?php dynamic_sidebar( 'ndla-sidebar' ); ?>
    </aside> -->
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();
      setPostViews(get_the_ID());

      get_template_part( 'template_parts/content/content', 'single' );

      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
          comments_template();
      endif;
    endwhile;
    ?>
  </main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
