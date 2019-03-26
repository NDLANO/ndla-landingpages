<?php
  get_header();
?>
<main>
  <?php

  /* Start the Loop */
  while ( have_posts() ) :
    the_post();
    // Add count to page
    setPostViews(get_the_ID());
    get_template_part( 'template-parts/content/content', 'single' );
    /* print get_the_title();
    echo the_content(
			sprintf(
				get_the_title()
			)
		); */
  endwhile; // End of the loop.
  ?>
</main>
