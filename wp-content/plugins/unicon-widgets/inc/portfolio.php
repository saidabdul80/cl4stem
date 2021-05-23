<?php

if(!class_exists('widget_portfolio') ) {

	class widget_portfolio extends WP_Widget { 
		
		// Widget Settings
		function __construct() {
			$widget_ops = array('description' => __('Display the latest portfolio items.', 'unicon-widgets') );
			$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'portfolio' );
			parent::__construct( 'portfolio', __('minti.Portfolio', 'unicon-widgets'), $widget_ops, $control_ops );
		}
		
		// Widget Output
		function widget($args, $instance) {
			extract($args);
			$title = apply_filters('widget_title', esc_html($instance['title']));
			$number = intval($instance['number']);
			
			echo wp_kses_post($before_widget);

			if($title) {
				echo wp_kses_post($before_title) . esc_html($title) . wp_kses_post($after_title);
			}
			?>
			<div class="recent-works-items clearfix">
			<?php
			$args = array(
				'post_type' => 'portfolio',
				'posts_per_page' => $number
			);
			$portfolio = new WP_Query($args);
			if($portfolio->have_posts()):
			?>
			<?php while($portfolio->have_posts()): $portfolio->the_post(); ?>
			<div class="portfolio-widget-item">
	            <?php if (has_post_thumbnail()) { ?>
	            	<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" class="portfolio-pic"><?php the_post_thumbnail( 'mini' ); ?><span class="portfolio-overlay"><i class="icon-minti-plus"></i></span></a>
	            <?php } ?>
	       </div>
			<?php endwhile; endif; ?>
			</div>

			<?php echo wp_kses_post($after_widget);
		}
		
		// Update
		function update( $new_instance, $old_instance ) {  
			$instance = $old_instance;

			$instance['title'] = strip_tags($new_instance['title']);
			$instance['number'] = $new_instance['number'];
			
			return $instance;
		}
		
		// Backend Form
		function form($instance) {
			
			$defaults = array('title' => 'Latest Projects', 'number' => 6);
			$instance = wp_parse_args((array) $instance, $defaults); ?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title', 'unicon-widgets'); ?>:</label><br />
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of items to show', 'unicon-widgets'); ?>:</label><br />
				<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
			</p>
		<?php
		}
	}

}

// Add Widget
if(!function_exists('widget_portfolio_init') ) {
	function widget_portfolio_init() {
		register_widget('widget_portfolio');
	}
}
add_action('widgets_init', 'widget_portfolio_init');

?>