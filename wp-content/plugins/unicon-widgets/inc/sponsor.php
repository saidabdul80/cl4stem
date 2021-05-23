<?php

if(!class_exists('widget_sponsor') ) {

	class widget_sponsor extends WP_Widget { 
		
		// Widget Settings
		function __construct() {
			$widget_ops = array('description' => __('Display sponsor images with a link.', 'unicon-widgets') );
			$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'sponsor' );
			parent::__construct( 'sponsor', __('minti.Sponsor', 'unicon-widgets'), $widget_ops, $control_ops );
		}
		
		// Widget Output
		function widget($args, $instance) {
			extract($args);
			$title = apply_filters('widget_title', esc_html($instance['title']));
			
			$sponsor1 = $instance['sponsor1'];
			$sponsorimg1 = $instance['sponsorimg1'];
			
			$sponsor2 = $instance['sponsor2'];
			$sponsorimg2 = $instance['sponsorimg2'];
			
			$sponsor3 = $instance['sponsor3'];
			$sponsorimg3 = $instance['sponsorimg3'];
			
			$sponsor4 = $instance['sponsor4'];
			$sponsorimg4 = $instance['sponsorimg4'];
			
			// ------
			echo wp_kses_post($before_widget);
			echo wp_kses_post($before_title) . esc_html($title) . wp_kses_post($after_title);
			
			echo '<div class="sponsors clearfix">';
				if (!empty($sponsorimg1)) { echo '<a href="'.esc_url($sponsor1).'" target="_blank"><img src="'.esc_url($sponsorimg1).'" /></a>';}
				if (!empty($sponsorimg2)) { echo '<a href="'.esc_url($sponsor2).'" target="_blank"><img src="'.esc_url($sponsorimg2).'" /></a>';}
				if (!empty($sponsorimg3)) { echo '<a href="'.esc_url($sponsor3).'" target="_blank"><img src="'.esc_url($sponsorimg3).'" /></a>';}
				if (!empty($sponsorimg4)) { echo '<a href="'.esc_url($sponsor4).'" target="_blank"><img src="'.esc_url($sponsorimg4).'" /></a>';}
			echo '</div>';

			echo wp_kses_post($after_widget);
			// ------
		}
		
		// Update
		function update( $new_instance, $old_instance ) {  
			$instance = $old_instance; 
			
			$instance['title'] = strip_tags( $new_instance['title'] );
			
			$instance['sponsor1'] = strip_tags( $new_instance['sponsor1'] );
			$instance['sponsorimg1'] = strip_tags( $new_instance['sponsorimg1'] );
			
			$instance['sponsor2'] = strip_tags( $new_instance['sponsor2'] );
			$instance['sponsorimg2'] = strip_tags( $new_instance['sponsorimg2'] );
			
			$instance['sponsor3'] = strip_tags( $new_instance['sponsor3'] );
			$instance['sponsorimg3'] = strip_tags( $new_instance['sponsorimg3'] );
			
			$instance['sponsor4'] = strip_tags( $new_instance['sponsor4'] );
			$instance['sponsorimg4'] = strip_tags( $new_instance['sponsorimg4'] );

			return $instance;
		}
		
		// Backend Form
		function form($instance) {
			$placeholder = 'http://placehold.it/120x120';
			$defaults = array( 'title' => 'Sponsor Widget', 'sponsor1' => '#', 'sponsorimg1' => $placeholder, 'sponsor2' => '#', 'sponsorimg2' => $placeholder, 'sponsor3' => '#', 'sponsorimg3' => $placeholder, 'sponsor4' => '#', 'sponsorimg4' => $placeholder ); // Default Values
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	        
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e('Title', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>
			
	        <p>
				<label for="<?php echo esc_attr($this->get_field_id( 'sponsor1' )); ?>"><?php _e('Sponsor #1 URL', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'sponsor1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'sponsor1' )); ?>" value="<?php echo esc_attr($instance['sponsor1']); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'sponsorimg1' )); ?>"><?php _e('Sponsor #1 Image URL', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'sponsorimg1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'sponsorimg1' )); ?>" value="<?php echo esc_attr($instance['sponsorimg1']); ?>" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'sponsor2' )); ?>"><?php _e('Sponsor #2 URL', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'sponsor2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'sponsor2' )); ?>" value="<?php echo esc_attr($instance['sponsor2']); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'sponsorimg2' )); ?>"><?php _e('Sponsor #2 Image URL', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'sponsorimg2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'sponsorimg2' )); ?>" value="<?php echo esc_attr($instance['sponsorimg2']); ?>" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'sponsor3' )); ?>"><?php _e('Sponsor #3 URL', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'sponsor3' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'sponsor3' )); ?>" value="<?php echo esc_attr($instance['sponsor3']); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'sponsorimg3' )); ?>"><?php _e('Sponsor #3 Image URL', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'sponsorimg3' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'sponsorimg3' )); ?>" value="<?php echo esc_attr($instance['sponsorimg3']); ?>" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'sponsor4' )); ?>"><?php _e('Sponsor #4 URL', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'sponsor4' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'sponsor4' )); ?>" value="<?php echo esc_attr($instance['sponsor4']); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'sponsorimg4' )); ?>"><?php _e('Sponsor #4 Image URL', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'sponsorimg4' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'sponsorimg4' )); ?>" value="<?php echo esc_attr($instance['sponsorimg4']); ?>" />
			</p>
			
	    <?php }
	}

}

// Add Widget
if(!function_exists('widget_sponsor_init') ) {
	function widget_sponsor_init() {
		register_widget('widget_sponsor');
	}
}
add_action('widgets_init', 'widget_sponsor_init');

?>