<?php
  /* Plugin Name: Most viewed posts Widget
  Plugin URI: http://wordpress.org/extend/plugins/#
  Description: This is a plugin to be used to add featured posts to different landing pages
  Author: Robert Fohlin
  Version: 1.0
  Author URI: http://fohlin.io */
  class MostViewedPostsWidget extends WP_Widget {
    function __construct() {
      $widget_ops = array(
    		'classname' => 'ndla-mostviewed',
    		'description' => 'Widget for mest brukt inlegg',
    	);
      // Instantiate the parent object
      parent::__construct( false, 'Widget for mest brukt inlegg', $widget_ops );
    }

    function widget( $args, $instance ) {
      $mostViewedPosts = get_posts(array(
        'post_type' => 'post',
        'category__in' => $instance['selected_categories'],
        'meta_key' => 'post_views_count',
        'orderby' => 'meta_value_num',
        'posts_per_page' => 4
      ));
      // Widget output
      echo $args['before_widget'];
      ?>
      <div>
        <h2 class="ndla-widget__title"><?php echo $instance['title']; ?></h2>
        <ul>
        <?php foreach($mostViewedPosts as $post) : ?>
          <li>
            <a href="<?php print get_permalink($post->ID); ?>">
              <?php echo $post->post_title; ?>
            </a>
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
    	<?php echo $args['after_widget'];
    }

    function update( $new_instance, $old_instance ) {
      $instance = array();
      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

      $selected_categories = ( ! empty ( $new_instance['selected_categories'] ) ) ? (array) $new_instance['selected_categories'] : array();
      $instance['selected_categories'] = array_map( 'sanitize_text_field', $selected_categories );

      return $instance;
    }

    function form( $instance ) {
      $categories = get_categories();
      $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Title', 'text_domain' );
      $selected_categories = ! empty( $instance['selected_categories'] ) ? $instance['selected_categories'] : array();
      ?>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Titell</label>
      <input
        type="text"
        id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
    		name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
        value="<?php echo esc_attr( $title ); ?>"
      />
      <div>
      <label style="display: block;">Hvilke kategorier skal vises?</label>
      <?php foreach($categories as $category) : ?>
        <div>
          <input
            type="checkbox"
            value="<?php echo $category->term_id; ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'selected_categories' ) ); ?>[]"
            <?php checked( ( in_array( $category->term_id, $selected_categories ) ) ? $category->term_id : '', $category->term_id ); ?>
          >
          <label>
            <?php echo $category->name; ?>
          </label>
        </div>
      <?php endforeach; ?>
      </div>
      <?php
    }
  }

?>
