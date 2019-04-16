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
      <!-- Load widget for if page is landing page -->
      <?php
        $page_slug = get_queried_object()->post_name;
      ?>
      <?php if ( is_page() && ndla_is_landing_page(get_the_terms( $id, 'category' )) ) : ?> <!--  -->
        <div class="ndla-welcome">
          <?php dynamic_sidebar('ndla-welcome-' . $page_slug); ?>
        </div>
        <div class="ndla-featured">
          <?php dynamic_sidebar('ndla-featured-' . $page_slug); ?>
        </div>
        <div class="ndla-links">
          <div class="ndla-links__guides">
              <?php dynamic_sidebar('ndla-bottom-left-' . $page_slug); ?>
            </div>
            <div class="ndla-links__guides">
              <?php dynamic_sidebar('ndla-guide-' . $page_slug); ?>
            </div>
          </div>
        </div>
      <!-- End of landing page -->
      <?php else : ?>
        <?php the_content(); ?>
      <?php endif; ?>
  	</div><!-- .ndla-article__content -->

  </article><!-- #post-${ID} -->
</div>
