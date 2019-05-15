<?php
  /* Plugin Name: Featured Posts Widget
  Plugin URI: http://wordpress.org/extend/plugins/#
  Description: This is a plugin to be used to add featured posts to different landing pages
  Author: Robert Fohlin
  Version: 1.0
  Author URI: http://fohlin.io */

  class FeaturedPostsWidget extends WP_Widget {
    function __construct() {
      $widget_ops = array(
    		'classname' => 'ndla-featured',
    		'description' => 'Widget for utvalde inlegg for landingside',
    	);
      // Instantiate the parent object
      parent::__construct( false, 'Utvalde inlegg', $widget_ops );
    }

    function widget( $args, $instance ) {
      global $post;
      $headerPositionClass = array('left top', 'right top', 'left bottom', 'right bottom');
      // Widget output
      echo $args['before_widget'];

    	if( ! empty( $instance['selected_posts'] ) && is_array( $instance['selected_posts'] ) ){
    		$selected_posts = get_posts( array( 'post__in' => $instance['selected_posts'], 'orderby' => 'post__in' , 'post_type' => 'any' ) );

      if (! empty ( $instance['post_styling'] ) && is_array( $instance['post_styling']  ) ) {
        $post_styling = $instance['post_styling'];
      }

      /* print '<pre style="flex: 1 0 100%;">';
      print_r($instance['selected_categories']);
      print '</pre>'; */
      ?>
      <?php foreach($selected_posts as $key=>$post) : setup_postdata($post) ?>
        <div class="ndla-featured__post <?php echo $post_styling[$key]; ?>">
          <a href="<?php echo get_permalink($post->ID) ?>">
            <div class="ndla-featured__post__image" style="background-image: url('<?php print the_post_thumbnail_url( 'medium_large' ); ?>')"></div>
            <h2 class="ndla-featured__post__title"> <!-- <?php echo $headerPositionClass[$key]; ?>" -->
              <?php echo $post->post_title; ?>
            </h2>
          </a>
        </div>
      <?php endforeach ?>
    		<?php
    	}else { ?>
        <?php if (current_user_can('editor') || current_user_can('administrator')) : ?>
    	   <div class="ndla-featured__post ndla-featured__post--example">
           <p>Utvalde inlegg. Klikk + shift for å redigere</p>
           <div class="ndla-featured__post__image"></div>
         </div>
         <div class="ndla-featured__post ndla-featured__post--example">
           <p>Utvalde inlegg. Klikk + shift for å redigere</p>
           <div class="ndla-featured__post__image"></div>
         </div>
         <div class="ndla-featured__post ndla-featured__post--example">
           <p>Utvalde inlegg. Klikk + shift for å redigere</p>
           <div class="ndla-featured__post__image"></div>
         </div>
         <div class="ndla-featured__post ndla-featured__post--example">
           <p>Utvalde inlegg. Klikk + shift for å redigere</p>
           <div class="ndla-featured__post__image"></div>
         </div>
       <?php endif; ?>
    	<?php }

    	echo $args['after_widget'];
    }

    function update( $new_instance, $old_instance ) {
      $instance = array();

    	$selected_posts = ( ! empty ( $new_instance['selected_posts'] ) ) ? (array) $new_instance['selected_posts'] : array();
    	$instance['selected_posts'] = array_map( 'sanitize_text_field', $selected_posts );

      $selected_categories = ( ! empty ( $new_instance['selected_categories'] ) ) ? (array) $new_instance['selected_categories'] : array();
    	$instance['selected_categories'] = array_map( 'sanitize_text_field', $selected_categories );

      $post_styling = ( ! empty ( $new_instance['post_styling'] ) ) ? (array) $new_instance['post_styling'] : array();
    	$instance['post_styling'] = array_map( 'sanitize_text_field', $post_styling );


    	return $instance;
    }

    function form( $instance ) {
      $selected_posts = ! empty( $instance['selected_posts'] ) ? $instance['selected_posts'] : array();
      $selected_categories = ! empty( $instance['selected_categories'] ) ? $instance['selected_categories'] : array();
      $post_styling = ! empty( $instance['post_styling'] ) ? $instance['post_styling'] : array();
      $maxnrofposts = 4;
      $getPosts = get_posts(array(
        'post_type' => 'post',
        'category_id' => 1
      ));
      $categories = get_categories();
      $postTypeLabels = array('post' => 'Inlegg', 'page' => 'Side');
      ?>
      <!-- <pre>
        <?php print_r($selected_categories); ?>
      </pre> -->
      <div> <!-- Outer div wrapper -->
        <!-- Loop to create all post selects -->
        <?php for($i = 0; $i < $maxnrofposts; $i++) : ?>
          <label style="display: block; line-height: 22px; font-size: 14px; font-weight: 600; margin: 8px 0 8px 0;">
            <?php print 'Inlegg ' . ($i + 1); ?>
          </label>
          <div>
            <label style="display: block; margin: 4px 0 4px 0px; font-weight: 600;">Kategori</label>
            <!-- $(this).closest( 'form' ).find( 'input.widget-control-save' ).trigger( 'click' ); -->
            <!-- onChange="console.log($(this).closest('.form').find( 'input.widget-control-save' ));" -->
            <select
              onChange="$(this).closest( 'form' ).find( 'input.widget-control-save' ).trigger( 'click' );";
              name="<?php echo esc_attr( $this->get_field_name( 'selected_categories' )); ?>[]?>">
              <option value="null" >Velg kategori</option>
              <?php foreach ($categories as $cat) : ?>
                <option value="<?php print $cat->cat_ID; ?>" <?php echo $selected_categories[$i] == $cat->cat_ID ? 'selected' : '' ?>>
                  <?php print $cat->cat_name; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <?php if ($selected_categories[$i] != 'null' && isset($selected_categories[$i])) : ?>
            <label style="display: block; margin: 4px 0 4px 0px; font-weight: 600;">Velg inlegg</label>
            <select name="<?php echo esc_attr( $this->get_field_name( 'selected_posts' ) ); ?>[]">
              <option value="null">Inlegg</option>
              <?php $postArgs = array(
                'numberposts' => -1,
                'post_type' => 'any',
                'category__in' => array($selected_categories[$i])
              ); ?>
            	<?php foreach ( get_posts($postArgs) as $p ) { ?>
                <option
                  value="<?php echo $p->ID; ?>"
                  <?php echo $selected_posts[$i] == $p->ID ? 'selected' : '' ?>
                >
                  <?php echo get_the_title( $p->ID ); ?> (<?php echo $postTypeLabels[$p->post_type]; ?>)
                </option>
            	<?php } ?>
            </select>
            <div>
              <label style="display: block; margin: 4px 0 4px 0px; font-weight: 600;">Titelfærge</label>
              <select name="<?php echo esc_attr( $this->get_field_name( 'post_styling' )); ?>[]?>">
                <option value="default">Standard</option>
                <option value="white" <?php echo $post_styling[$i] == 'white' ? 'selected' : ''; ?>>Hvit</option>
                <option value="black" <?php echo $post_styling[$i] == 'black' ? 'selected' : ''; ?>>Svart</option>
              </select>
            </div>
          <?php endif; ?>
          <hr />
        <?php endfor; ?>
      </div> <!-- Outer div wrapper -->
      	<?php
    }
  }
?>
