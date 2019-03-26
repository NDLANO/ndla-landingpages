<?php
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php print the_content(
    sprintf(
      get_the_title()
    )
  ); ?>
</article>
