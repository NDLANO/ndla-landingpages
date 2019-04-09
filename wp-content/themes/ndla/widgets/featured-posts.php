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
    		'description' => 'A plugin for listing featured posts on a landing page',
    	);
      // Instantiate the parent object
      parent::__construct( false, 'Landing page Featured Posts', $widget_ops );
    }

    function widget( $args, $instance ) {
      global $post;
      // Widget output
      echo $args['before_widget'];
    	if ( ! empty( $instance['title'] ) ) {
    		echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
    	}

    	if( ! empty( $instance['selected_posts'] ) && is_array( $instance['selected_posts'] ) ){
    		$selected_posts = get_posts( array( 'post__in' => $instance['selected_posts'] ) );
    		?>
      <?php foreach($selected_posts as $post) : setup_postdata($post) ?>
        <div class="ndla-featured__post">
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

    		<?php
    	}else {
    		echo esc_html__( 'No posts selected!', 'text_domain' );
    	}

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
      // Output admin widget options form
      // 'posts_per_page' => 20,
      $posts = get_posts( array(
  			'offset' => 0
  		) );
      $selected_posts = ! empty( $instance['selected_posts'] ) ? $instance['selected_posts'] : array();
      ?>
      <div>
        <!-- Post 1 -->
        <label>Post 1</label>
        <select name="<?php echo esc_attr( $this->get_field_name( 'selected_posts' ) ); ?>[]">
          <option value="null">Velg post</option>
        	<?php foreach ( $posts as $post ) { ?>
        		<option
        			value="<?php echo $post->ID; ?>"
              <?php echo $selected_posts[0] == $post->ID ? 'selected' : '' ?>
            >
        			<?php echo get_the_title( $post->ID ) . ' ID: ' . $post->ID; ?>
            </option>
        	<?php } ?>
        </select>
      <!-- Post 2 -->
      <label>Post 2</label>
      <select name="<?php echo esc_attr( $this->get_field_name( 'selected_posts' ) ); ?>[]">
        <option value="null">Velg post</option>
        <?php foreach ( $posts as $post ) { ?>
      		<option
      			value="<?php echo $post->ID; ?>"
            <?php echo $selected_posts[1] == $post->ID ? 'selected' : '' ?>
          >
      			<?php echo get_the_title( $post->ID ) . ' ID: ' . $post->ID; ?>
          </option>
      	<?php } ?>
      </select>
      <label>Post 3</label>
      <select name="<?php echo esc_attr( $this->get_field_name( 'selected_posts' ) ); ?>[]">
        <option value="null">Velg post</option>
        <?php foreach ( $posts as $post ) { ?>
          <option
            value="<?php echo $post->ID; ?>"
            <?php echo $selected_posts[2] == $post->ID ? 'selected' : '' ?>
          >
            <?php echo get_the_title( $post->ID ) . ' ID: ' . $post->ID; ?>
          </option>
        <?php } ?>
      </select>
      <label>Post 4</label>
      <select name="<?php echo esc_attr( $this->get_field_name( 'selected_posts' ) ); ?>[]">
        <option value="null">Velg post</option>
        <?php foreach ( $posts as $post ) { ?>
      		<option
      			value="<?php echo $post->ID; ?>"
            <?php echo $selected_posts[3] == $post->ID ? 'selected' : '' ?>
          >
      			<?php echo get_the_title( $post->ID ) . ' ID: ' . $post->ID; ?>
          </option>
      	<?php } ?>
      </select>
      	</div>
      	<?php
    }
  }
?>
