<?php

if(!class_exists('widget_contact') ) {

	class widget_contact extends WP_Widget { 
		
		// Widget Settings
		function __construct() {
			$widget_ops = array('description' => __('Display your contact informations.', 'unicon-widgets') );
			$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'contact' );
			parent::__construct( 'contact', __('minti.Contact', 'unicon-widgets'), $widget_ops, $control_ops );
		}
		
		// Widget Output
		function widget($args, $instance) {
			extract($args);
			$title = apply_filters('widget_title', esc_html($instance['title']));
			
			echo wp_kses_post($before_widget);
			echo wp_kses_post($before_title) . esc_html($title) . wp_kses_post($after_title);
			?>
			
			<address>
				<?php if($instance['address']): ?>
				<span class="address"><i class="fa fa-map-marker"></i><span class="adress-overflow"><?php echo wp_kses_post($instance['address']); ?></span></span>
				<?php endif; ?>
		
				<?php if($instance['phone']): ?>
				<span class="phone"><i class="fa fa-phone"></i><strong><?php _e( 'Phone', 'unicon-widgets' ) ?>:</strong> <?php echo esc_html($instance['phone']); ?></span>
				<?php endif; ?>
		
				<?php if($instance['fax']): ?>
				<span class="fax"><i class="fa fa-fax"></i><strong><?php _e( 'Fax', 'unicon-widgets' ) ?>:</strong> <?php echo esc_html($instance['fax']); ?></span>
				<?php endif; ?>
		
				<?php if($instance['email']): ?>
				<span class="email"><i class="fa fa-envelope"></i><strong><?php _e( 'E-Mail', 'unicon-widgets' ) ?>:</strong> <a href="mailto:<?php echo esc_html($instance['email']); ?>"><?php echo esc_html($instance['email']); ?></a></span>
				<?php endif; ?>
		
				<?php if($instance['web']): ?>
				<span class="web"><i class="fa fa-globe"></i><strong><?php _e( 'Web', 'unicon-widgets' ) ?>:</strong> <a href="http://<?php echo esc_html($instance['web']); ?>" target="_blank"><?php echo esc_html($instance['web']); ?></a></span>
				<?php endif; ?>
			</address>
			
			<?php
			echo wp_kses_post($after_widget);
			// ------
		}
		
		// Update
		function update( $new_instance, $old_instance ) {  
			$instance = $old_instance; 
			
			$instance['title'] = $new_instance['title'];
			$instance['address'] = $new_instance['address'];
			$instance['phone'] = $new_instance['phone'];
			$instance['fax'] = $new_instance['fax'];
			$instance['email'] = $new_instance['email'];
			$instance['web'] = $new_instance['web'];

			return $instance;
		}
		
		// Backend Form
		function form($instance) {
			
			$defaults = array('title' => 'Contact Info', 'address' => '', 'phone' => '', 'fax' => '', 'email' => '', 'web' => '');
			$instance = wp_parse_args((array) $instance, $defaults); ?>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title', 'unicon-widgets'); ?>:</label><br />
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php _e('Address', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" value="<?php echo esc_attr($instance['address']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php _e('Phone', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" value="<?php echo esc_attr($instance['phone']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('fax')); ?>"><?php _e('Fax', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('fax')); ?>" name="<?php echo esc_attr($this->get_field_name('fax')); ?>" value="<?php echo esc_attr($instance['fax']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php _e('E-Mail', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" value="<?php echo esc_attr($instance['email']); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('web')); ?>"><?php _e('Website URL (without http://)', 'unicon-widgets'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('web')); ?>" name="<?php echo esc_attr($this->get_field_name('web')); ?>" value="<?php echo esc_attr($instance['web']); ?>" />
			</p>
			
	    <?php }
	}

}

// Add Widget
if(!function_exists('widget_contact_init') ) {
	function widget_contact_init() {
		register_widget('widget_contact');
	}
}
add_action('widgets_init', 'widget_contact_init');

?>