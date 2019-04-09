<?php
  get_header();
?>
<main id="main" class="ndla-main ndla-main--column" role="main">
  <header class="ndla-search__header">
    <?php get_search_form(); ?>
    <span class="search-count"><?php echo $wp_query->found_posts.' treff i NDLA.'; ?></span>
    <div class="page-description"></div>
  </header><!-- .page-header -->
  <?php if ( have_posts() ) : ?>
    <div class="ndla-search__results">
      <h1>Du søkte på: <span class="query"><?php echo get_search_query(); ?></span></h1> 
      <?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();

        get_template_part( 'template_parts/content/content', 'excerpt' );
				// End the loop.
			endwhile;
      ?>
    </div>
  <?php endif; ?>
</main>
