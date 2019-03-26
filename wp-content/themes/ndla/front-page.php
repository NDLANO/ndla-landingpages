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
  ?>
  <section class="ndla-frontpage__latest">
    <?php foreach($frontpagePosts as $post) : setup_postdata($post) ?>
    <div class="ndla-frontpage__post">
      <a href="<?php echo get_permalink($post->ID) ?>">
        <div class="ndla-frontpage__post__image">
          <?php print the_post_thumbnail( 'medium_large' ); ?>
        </div>
        <h2 class="ndla-frontpage__post__title">
          <?php echo $post->post_title; ?>
        </h2>
      </a>
    </div>
    <?php endforeach ?>
  </section>
  <section class="ndla-frontpage__section">
    <!-- Most viewed posts -->
    <div class="ndla-frontpage__mostviewed">
      <?php
        $mostViewed = query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC');
      ?>
      <h3>Mest brukt</h3>
      <ul>
      <?php foreach($mostViewed as $post) : setup_postdata($post) ?>
        <li class="ndla-frontpage__mostviewed__post">
            <a href="<?php print get_permalink($post->ID); ?>">
            <?php print $post->post_title; ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
    </div> <!-- End of most viewed -->
    <!-- Guides -->
    <div class="ndla-frontpage__guides">
      <h3>Jeg skal...</h3>
      <ul>
        <li class="ndla-frontpage__guide"><a href="#">... ha eksamen</a></li>
        <li class="ndla-frontpage__guide"><a href="#">... levere oppgave</a></li>
        <li class="ndla-frontpage__guide"><a href="#">... holde en presentasjon</a></li>
      </ul>
    </div>
    <!-- End of guides -->
  </section>
</div>
