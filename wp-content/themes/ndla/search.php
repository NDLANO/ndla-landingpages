<?php
  get_header();
?>
<section id="primary" class="content-area">
  <main id="main" class="ndla-main" role="main">
    <header class="page-header">
      <?php get_search_form(); ?>
      <h1 class="page-title">
        Søkresultat for <?php echo get_search_query(); ?>
      </h1>
      <div class="page-description"></div>
    </header><!-- .page-header -->
    <?php if ( have_posts() ) : ?>
      <div class="ndla-search__results">
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
</section>
