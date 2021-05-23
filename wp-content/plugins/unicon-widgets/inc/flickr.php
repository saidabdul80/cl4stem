<?php

if(!class_exists('widget_flickr') ) {

	class widget_flickr extends WP_Widget { 
		
		// Widget Settings
		function __construct() {
			$widget_ops = array('description' => __('Display your latest Flickr feed.', 'unicon-widgets') );
			$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'flickr' );
			parent::__construct( 'flickr', __('minti.Flickr', 'unicon-widgets'), $widget_ops, $control_ops );
		}
		
		// Widget Output
		function widget($args, $instance) {
			extract($args);
			$title = apply_filters('widget_title', esc_html($instance['title']));
			$username = $instance['username'];
			$pics = $instance['pics'];
			
			// ------
			echo wp_kses_post($before_widget);
			echo wp_kses_post($before_title) . esc_html($title) . wp_kses_post($after_title);
			
			echo '<div id="flickr_tab" class="clearfix">';
			echo '<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count='.esc_attr($pics).'&display=latest&size=s&layout=x&source=user&user='.esc_attr($username).'"></script>';
			echo '</div>';

			echo wp_kses_post($after_widget);
			// ------
		}
		
		// Update
		function update( $new_instance, $old_instance ) {  
			$instance = $old_instance; 
			
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['username'] = strip_tags( $new_instance['username'] );
			$instance['pics'] = strip_tags( $new_instance['pics'] );

			return $instance;
		}
		
		// Backend Form
		function form($instance) {
			
			$defaults = array( 'title' => 'Flickr Widget', 'pics' => '9', 'username' => '52617155@N08' ); // Default Values
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	        
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e('Title', 'unicon-widgets'); ?>:</label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>
	        <p>
				<label for="<?php echo esc_attr($this->get_field_id( 'username' )); ?>"><?php _e('Flickr ID', 'unicon-widgets'); ?>:</label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'username' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'username' )); ?>" value="<?php echo esc_attr($instance['username']); ?>" /><br /><a href="http://idgettr.com/" target="_blank"><?php _e('Flickr idGettr', 'unicon-widgets'); ?></a>
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'pics' )); ?>"><?php _e('Number of photos to show', 'unicon-widgets'); ?>:</label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pics' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pics' )); ?>" value="<?php echo esc_attr($instance['pics']); ?>" />
			</p>
			
	    <?php }
	}

}

// Add Widget
if(!function_exists('widget_flickr_init') ) {
	function widget_flickr_init() {
		register_widget('widget_flickr');
	}
}
add_action('widgets_init', 'widget_flickr_init');

?>