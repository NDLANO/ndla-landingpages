<?php
  get_header();
?>
<main id="main" class="ndla-main" role="main">
  <div class="ndla-frontpage__content">
    <article id="post-<?php the_ID(); ?>" <?php post_class('ndla-article'); ?>>
      <div class="ndla-article__content">
        <h1>404: Oops, noe gikk galt. Vi beklager!</h1>
        <p>Siden eller dokumentet du leter etter finnes ikke, har endret navn eller er midlertidig utilgjengelig.</p>
        <div class="ndla-article--error">
          <!-- <?php get_search_form(); ?> -->
          <p>Klikk på en av lenkene for å navigere til en side som fungerer.</p>
          <ul>
            <?php
              $args = array(
                'post_type' => 'page',
                'taxonomy' => 'category',
                        'field' => 'slug',
                        'term' => 'landingside'
              );
              $landingPages = get_posts($args);
            ?>
            <?php foreach($landingPages as $page) : ?>
              <li><a href="<?php print get_permalink($page->ID); ?>"><?php print $page->post_title; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </article>
  </div>
</main>
