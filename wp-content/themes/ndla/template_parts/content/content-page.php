<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>
<div class="ndla-frontpage__content">
  <article id="post-<?php the_ID(); ?>" <?php post_class('ndla-article'); ?>>
    <div class="ndla-article__content">
      <?php
        function is_landingpage($categories) {
          foreach ($categories as $category) {
            if ($category === 'landingside') {
              return 1;
            }
          }
          return 0;
        }
        $post_categories = get_the_terms( $id, 'category' );
        $categories = wp_list_pluck( $post_categories, 'slug' );
      ?>
      <!-- Load widget for if page is landing page -->
      <?php if ( is_page() && is_landingpage($categories)) : ?>
        <div class="ndla-welcome">
          <?php dynamic_sidebar('ndla-welcome-for-elever'); ?>
        </div>
        <div class="ndla-featured">
          <?php dynamic_sidebar('ndla-featured'); ?>
        </div>
      <?php else : ?>
        <h3>Not landing page</h3>
        <?php the_content(); ?>
      <?php endif; ?>
  	</div><!-- .entry-content -->

  </article><!-- #post-${ID} -->
</div>
