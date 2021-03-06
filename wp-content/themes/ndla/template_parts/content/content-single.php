<?php
  $page_slug = get_queried_object()->post_name;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('ndla-article'); ?>>
  <section class="ndla-article__wrapper">
    <header class="ndla-article__header">
      <!-- Article title -->
      <?php the_title( '<h1 class="ndla-article__title">', '</h1>' ); ?>
      <?php if ( ! is_page() ) : ?>
        <div class="ndla-article__meta">
          <span class="ndla-article__meta__time"><?php echo date('d.m.Y', get_post_time()); ?></span>
          <span class="ndla-article__meta__seperator"></span>
          <?php echo get_the_author(); ?>
        </div>
      <?php endif; ?>
  	</header>
    <div class="ndla-article__content">
      <section>
  	     <?php the_content(); ?>
      </section>
  	</div><!-- .entry-content -->
  </section>
</article><!-- #post-${ID} -->
