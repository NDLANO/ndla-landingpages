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
      parent::__construct( false, 'Utvalde inlegg landingside', $widget_ops );
    }

    function widget( $args, $instance ) {
      global $post;
      $headerPositionClass = array('left top', 'right top', 'left bottom', 'right bottom');
      // Widget output
      echo $args['before_widget'];
    	if ( ! empty( $instance['title'] ) ) {
    		echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
    	}

    	if( ! empty( $instance['selected_posts'] ) && is_array( $instance['selected_posts'] ) ){
    		$selected_posts = get_posts( array( 'post__in' => $instance['selected_posts'] ) );
    		?>

      <?php foreach($selected_posts as $key=>$post) : setup_postdata($post) ?>
        <div class="ndla-featured__post <?php echo get_field('white')[0]; ?>">
          <a href="<?php echo get_permalink($post->ID) ?>">
            <div class="ndla-featured__post__image" style="background-image: url('<?php print the_post_thumbnail_url( 'medium_large' ); ?>')"></div>
            <h2 class="ndla-featured__post__title <?php echo $headerPositionClass[$key]; ?>">
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
    	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    	$selected_posts = ( ! empty ( $new_instance['selected_posts'] ) ) ? (array) $new_instance['selected_posts'] : array();
    	$instance['selected_posts'] = array_map( 'sanitize_text_field', $selected_posts );

    	return $instance;
    }

    function form( $instance ) {
      $selected_posts = ! empty( $instance['selected_posts'] ) ? $instance['selected_posts'] : array();
      // Get all categories
      $args = array(
        'post_type' => 'page',
        'taxonomy' => 'category',
                'field' => 'slug',
                'term' => 'landingside'
      );
      $landingPages = get_posts($args);
      $posts = array();
      ?>
      <?php
        foreach($landingPages as $page) {
          $getPosts = get_posts(array(
            'post_type' => 'post',
            'taxonomy' => 'category',
                      'field' => 'slug',
                      'term' => $page->post_name
          ));
          // print $page->post_name . ' : ';
          array_push($posts, array(
            name => $page->post_title,
            posts => $getPosts
          ));
        }
      ?>
      <div>
        <!-- Post 1 -->
        <label>Inlegg 1</label>
        <select name="<?php echo esc_attr( $this->get_field_name( 'selected_posts' ) ); ?>[]">
          <option value="null">Velg post</option>
        	<?php foreach ( $posts as $post ) { ?>
            <optgroup label="<?php print $post['name']; ?>">
              <?php foreach ($post['posts'] as $p) : ?>
                <option
                  value="<?php echo $p->ID; ?>"
                  <?php echo $selected_posts[0] == $p->ID ? 'selected' : '' ?>
                >
                  <?php echo get_the_title( $p->ID ); ?>
                </option>
              <?php endforeach; ?>
            </optgroup>
        	<?php } ?>
        </select>
      <!-- Post 2 -->
      <label>Inlegg 2</label>
      <select name="<?php echo esc_attr( $this->get_field_name( 'selected_posts' ) ); ?>[]">
        <option value="null">Velg post</option>
        <?php foreach ( $posts as $post ) { ?>
          <optgroup label="<?php print $post['name']; ?>">
            <?php foreach ($post['posts'] as $p) : ?>
              <option
                value="<?php echo $p->ID; ?>"
                <?php echo $selected_posts[1] == $p->ID ? 'selected' : '' ?>
              >
                <?php echo get_the_title( $p->ID ); ?>
              </option>
            <?php endforeach; ?>
          </optgroup>
        <?php } ?>
      </select>
      <label>Inlegg 3</label>
      <select name="<?php echo esc_attr( $this->get_field_name( 'selected_posts' ) ); ?>[]">
        <option value="null">Velg post</option>
        <?php foreach ( $posts as $post ) { ?>
          <optgroup label="<?php print $post['name']; ?>">
            <?php foreach ($post['posts'] as $p) : ?>
              <option
                value="<?php echo $p->ID; ?>"
                <?php echo $selected_posts[2] == $p->ID ? 'selected' : '' ?>
              >
                <?php echo get_the_title( $p->ID ); ?>
              </option>
            <?php endforeach; ?>
          </optgroup>
        <?php } ?>
      </select>
      <label>Inlegg 4</label>
      <select name="<?php echo esc_attr( $this->get_field_name( 'selected_posts' ) ); ?>[]">
        <option value="null">Velg post</option>
        <?php foreach ( $posts as $post ) { ?>
          <optgroup label="<?php print $post['name']; ?>">
            <?php foreach ($post['posts'] as $p) : ?>
              <option
                value="<?php echo $p->ID; ?>"
                <?php echo $selected_posts[3] == $p->ID ? 'selected' : '' ?>
              >
                <?php echo get_the_title( $p->ID ); ?>
              </option>
            <?php endforeach; ?>
          </optgroup>
        <?php } ?>
      </select>
      	</div>
      	<?php
    }
  }
?>
