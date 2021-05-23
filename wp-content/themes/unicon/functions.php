<?php

/* ------------------------------------------------------------------------ */
/* Translation
/* ------------------------------------------------------------------------ */
load_theme_textdomain( 'unicon', get_template_directory() . '/framework/languages' );

/* ------------------------------------------------------------------------ */
/* Define Constant
/* ------------------------------------------------------------------------ */
define( 'MINTI_THEME_NAME', 'unicon' ); // used to check if theme is in use

/* ------------------------------------------------------------------------ */
/* Inlcudes
/* ------------------------------------------------------------------------ */
require_once(get_template_directory() . '/framework/inc/enqueue.php'); // Enqueue JavaScripts & CSS
require_once(get_template_directory() . '/framework/inc/customcss.php'); // Load Custom CSS
require_once(get_template_directory() . '/framework/inc/customjs.php'); // Load Custom JS
require_once(get_template_directory() . '/framework/inc/sidebar-generator.php'); // Include Sidebar Generator
require_once(get_template_directory() . '/framework/inc/breadcrumbs.php'); // Load Breadcrumbs

/* ------------------------------------------------------------------------ */
/* Redux */
if ( !class_exists( 'redux' ) && file_exists( dirname( __FILE__ ) . '/framework/admin/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/framework/admin/ReduxCore/framework.php' );
}

// Redux Configuration
require_once(dirname(__FILE__).'/framework/admin/admin-config.php');

/* ------------------------------------------------------------------------ */
/* Meta Box Fix if Unicon Core is not installed */
if(!class_exists('Unicon_Core')){
	if(!function_exists( 'rwmb_meta' )) {
	    function rwmb_meta( $key, $args = '', $post_id = null ) {
	        return false;
	    }
	}
}

function my_menu_notitle( $menu ){
  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );

}
add_filter( 'wp_nav_menu', 'my_menu_notitle' );
add_filter( 'wp_page_menu', 'my_menu_notitle' );
add_filter( 'wp_list_categories', 'my_menu_notitle' );

/* ------------------------------------------------------------------------ */
/* Automatic Plugin Activation */
require_once(get_template_directory() . '/framework/inc/class-tgm-plugin-activation.php');

add_action('tgmpa_register', 'minti_register_required_plugins');
function minti_register_required_plugins() {
	$plugins = array(
		array(
			'name'     				=> 'Unicon Core', // The plugin name
			'slug'     				=> 'unicon-core', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/framework/plugins/unicon-core.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'has_notices' 			=> true, 
		),
		array(
			'name'     				=> 'WPBakery Visual Composer', // The plugin name
			'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/framework/plugins/js_composer.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '6.6.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'has_notices' 			=> true, 
		),
		array(
			'name'     				=> 'Unicon Widgets', // The plugin name
			'slug'     				=> 'unicon-widgets', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/framework/plugins/unicon-widgets.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'		=> false,
			'has_notices' 			=> false 
		),
		array(
			'name'     				=> 'Unicon Demo Importer', // The plugin name
			'slug'     				=> 'unicon-demoimporter', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/framework/plugins/unicon-demoimporter.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'		=> false,
			'has_notices' 			=> false
		),
		array(
			'name'     				=> 'Unicon Portfolio CPT', // The plugin name
			'slug'     				=> 'unicon_portfolio_cpt', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/framework/plugins/unicon_portfolio_cpt.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'		=> false,
			'has_notices' 			=> false,
		),
		array(
			'name'     				=> 'Revolution Slider', // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/framework/plugins/revslider.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'		=> false,
			'has_notices' 			=> false,
		),
		array(
        	'name'      			=> 'Contact Form 7',
        	'slug'      			=> 'contact-form-7',
        	'required'  			=> false,
        	'force_activation'		=> false,
        	'has_notices'  			=> false,
        ),
        array(
        	'name'      			=> 'WooCommerce',
        	'slug'      			=> 'woocommerce',
        	'required'  			=> false,
        	'force_activation'		=> false,
        	'has_notices'  			=> false,
        ),
	);

	$config = array(
		'id'           => 'minti',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa($plugins, $config);
	
}

// Show Notice again for updating Users, so that they don't miss out on the required Plugins.
function minti_dismissable_notice_for_recommended_plugins() {
    global $current_user; 

    if( $current_user ) {
        $activation_notice_dismissed = get_user_meta( $current_user->ID, 'tgmpa_dismissed_notice_minti', true );

        if (!class_exists('Unicon_Core') && $activation_notice_dismissed == true) {
            update_user_meta( $current_user->ID, 'tgmpa_dismissed_notice_minti', false, true );
        }
        if (!class_exists('WPBakeryVisualComposerAbstract') && $activation_notice_dismissed == true) {
            update_user_meta( $current_user->ID, 'tgmpa_dismissed_notice_minti', false, true );
        }
    }
}
add_action('admin_notices', 'minti_dismissable_notice_for_recommended_plugins');

// Add CSS to highlight required Plugins
function minti_admin_CSS_tweak() {
  echo '<style>
    .tgmpa.wrap span.recommended {padding: 4px 10px;font-weight:400;border-radius:2px;background:#fafafa;}
	.tgmpa.wrap span.required {padding: 4px 10px;font-weight:700;border-radius:2px;background:#46b450;color:#ffffff;}
</style>';
}
add_action('admin_head', 'minti_admin_CSS_tweak');

// Disable Frontend Editor
if ( function_exists( 'vc_map' ) ) {
	function vc_remove_frontend_links() {
	    vc_disable_frontend(); // this will disable frontend editor
	}
	add_action( 'vc_after_init', 'vc_remove_frontend_links' );
}

/* ------------------------------------------------------------------------ */
/* Comment Styling
/* ------------------------------------------------------------------------ */
function minti_comment( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>

   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix"> 
   		
   		<div class="avatar"><?php echo get_avatar($comment, $size = '100'); ?></div>
         
         <div class="comment-text">
         
			 <div class="author">
			 	<span><?php if($comment->comment_author_url == '' || $comment->comment_author_url == 'http://Website'){ echo get_comment_author(); } else { echo comment_author_link(); } ?></span>
			 	<div class="date">
			 	<?php printf(__('%1$s at %2$s', 'unicon'), get_comment_date(),  get_comment_time() ) ?></a><?php edit_comment_link( __( '(Edit)', 'unicon'),'  ','' ) ?>
			   	&middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>  </div>  
			 </div>
			 
			 <div class="text"><?php comment_text() ?></div>
			 
			 <?php if ( $comment->comment_approved == '0' ) : ?>
	         <em><?php _e( 'Your comment is awaiting moderation.', 'unicon' ) ?></em>
	         <br />
	      	<?php endif; ?>
	      	
      	</div>
      
   </div>
<?php
}
	
/* ------------------------------------------------------------------------ */
/* Custom Excerpts
/* ------------------------------------------------------------------------ */
// Set new Default Excerpt Length
function minti_new_excerpt_length($length) {
    return 200;
}
add_filter('excerpt_length', 'minti_new_excerpt_length');

// Custom Excerpt Length
if (!function_exists('minti_custom_excerpt')) {
	function minti_custom_excerpt($limit=50) {
		global $minti_data;
		if($minti_data['switch_readmore'] != 0) {
	    	return strip_shortcodes(wp_trim_words(get_the_content(), $limit, '... <a class="read-more-link" href="'. get_permalink() .'">' . __('read more', 'unicon') . '  &rarr;</a>'));
		} else {
			return strip_shortcodes(wp_trim_words(get_the_content(), $limit));
		}
	}
}

// Word Limiter
function minti_limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}

// Remove Shortcodes from Search Results Excerpt
function minti_remove_shortcode_from_excerpt($excerpt) {
  if ( is_search() ) {
    $excerpt = strip_shortcodes( $excerpt );
  }
  return $excerpt;
}
add_filter('the_excerpt', 'minti_remove_shortcode_from_excerpt');
	
/* ------------------------------------------------------------------------ */
/* Misc
/* ------------------------------------------------------------------------ */
// Add Title Tag
add_theme_support( 'title-tag' );

// Post Thumbnail Sizes
if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'blog', 1000, 563, true );				// Standard Blog Image
	add_image_size( 'mini', 80, 80, true ); 				// used for widget thumbnail
	add_image_size( 'portfolio', 600, 400, true );			// also for blog-medium
	add_image_size( 'regular', 500, 500, true ); 
	add_image_size( 'wide', 1000, 500, true ); 
	add_image_size( 'tall', 500, 1000, true ); 
	add_image_size( 'widetall', 1000, 1000, true ); 
}

// Content Width
if ( ! isset( $content_width ) ) $content_width = 1161;
	
// Add RSS Links to head section
add_theme_support( 'automatic-feed-links' );
	
// Allow Shortcodes in Text Widget
add_filter('widget_text', 'do_shortcode');

// Add Custom Primary Navigation
function minti_register_custom_menu() {
	register_nav_menu('main_navigation', 'Main Navigation');
	register_nav_menu('footer_navigation', 'Footer Navigation');
	register_nav_menu('topbar_navigation', 'Topbar Navigation');
}
add_action('init', 'minti_register_custom_menu');

// Add Transparent Header Class to Body
function minti_transparent_header_class( $classes ) {
	global $post;
	global $minti_data;

	if (!is_search() && !is_404() && !is_archive() && !is_author() && !is_home()) {
		if ( (rwmb_meta('minti_titlebar') == 'default' && $minti_data['titlebar_layout'] == 'transparentimage') || rwmb_meta('minti_titlebar') == 'transparent' || rwmb_meta('minti_titlebar') == 'transparentimage' ){
			if($minti_data['header_layout'] == 'v1' || $minti_data['header_layout'] == 'v5') {
				$classes[] = 'header-is-transparent ';
			}
		}
	}
	if (is_search() || is_404() || is_archive() || is_author() || is_home()) {
		if ($minti_data['titlebar_layout'] == 'transparentimage'){
			if($minti_data['header_layout'] == 'v1' || $minti_data['header_layout'] == 'v5') {
				$classes[] = 'header-is-transparent ';
			}
		}
	}
	if(function_exists('is_woocommerce') && is_woocommerce()){
		if ($minti_data['titlebar_layout'] == 'transparentimage'){
			if($minti_data['header_layout'] == 'v1' || $minti_data['header_layout'] == 'v5') {
				$classes[] = 'header-is-transparent ';
			}
		}
	}
	if(function_exists('is_bbpress') && is_bbpress()){
		if ($minti_data['titlebar_layout'] == 'transparentimage'){
			if($minti_data['header_layout'] == 'v1' || $minti_data['header_layout'] == 'v5') {
				$classes[] = 'header-is-transparent ';
			}
		}
	}

	return $classes;
}
add_filter('body_class','minti_transparent_header_class');

// One Page Scroll Class
function minti_onepage_class( $classes ) {
	global $minti_data;
	if(isset($minti_data['switch_pagescroll']) && ($minti_data['switch_pagescroll'] == 1)) {
		$classes[] = 'pagescroll';
	}
	return $classes;
}
add_filter( 'body_class', 'minti_onepage_class' );

// Add Lightbox rel to photo galleries
function minti_add_rel_attribute($link) {
	global $post;
	return str_replace('<a href', '<a rel="prettyPhoto[pp_gal]" href', $link);
}
add_filter('wp_get_attachment_link', 'minti_add_rel_attribute');

/* ------------------------------------------------------------------------ */
/* Pagination
/* ------------------------------------------------------------------------ */
function minti_pagination() {
	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div id="pagination" class="clearfix"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="pagination-prev">%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-chevron-left"></i>') );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="current"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li><span>...</span></li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="current"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li><span>...</span></li>' . "\n";

		$class = $paged == $max ? ' class="current"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="pagination-next">%s</li>' . "\n", get_next_posts_link('<i class="fa fa-chevron-right"></i>') );

	echo '</ul></div>' . "\n";
}
	
/* ------------------------------------------------------------------------ */
/* Widget Areas
/* ------------------------------------------------------------------------ */
function minti_widgets_init() {
	
	// Blog Widgets
	register_sidebar(array( 'name' => __('Blog Widgets','unicon' ), 'id' => 'blog-widgets', 'description' => __( 'These are widgets for the Blog sidebar.','unicon' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));

	// Search Results Widgets
	register_sidebar(array( 'name' => __('Search Results Widgets','unicon' ), 'id' => 'search-results-widgets', 'description' => __( 'These are widgets for the Search Results sidebar.','unicon' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	
	// Footer Widgets
	global $minti_data;
	$footercolumns = (!empty($minti_data['select_footercolumns'])) ? $minti_data['select_footercolumns'] : '4';

	register_sidebar(array( 'name' => __('Footer Widgets 1','unicon' ), 'id' => 'footer-widgets', 'description' => __( 'These are widgets for the Footer.','unicon' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	
	if($footercolumns == '2' || $footercolumns == '3' || $footercolumns == '4'){
		register_sidebar(array( 'name' => __('Footer Widgets 2','unicon' ), 'id' => 'footer-widgets-2', 'description' => __( 'These are widgets for the Footer.','unicon' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	}
	if($footercolumns == '3' || $footercolumns == '4'){
		register_sidebar(array( 'name' => __('Footer Widgets 3','unicon' ), 'id' => 'footer-widgets-3', 'description' => __( 'These are widgets for the Footer.','unicon' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	}
	if($footercolumns == '4'){
		register_sidebar(array( 'name' => __('Footer Widgets 4','unicon' ), 'id' => 'footer-widgets-4', 'description' => __( 'These are widgets for the Footer.','unicon' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	}

   	// WooCommerce Widgets
	if (class_exists('Woocommerce')){
		register_sidebar(array( 'name' => __('Shop Widgets','unicon' ), 'id' => 'shop-widgets', 'description' => __( 'These are widgets for the Shop sidebar.','unicon' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	}

	// BBPress Widgets
	if (class_exists('bbPress')){
		register_sidebar(array( 'name' => __('Forum Widgets','unicon' ), 'id' => 'forum-widgets', 'description' => __( 'These are widgets for the Forum sidebar.','unicon' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ));
	}

}
   	
add_action( 'widgets_init', 'minti_widgets_init' );

/* ------------------------------------------------------------------------ */
/* Plugin - WooCommerce
/* ------------------------------------------------------------------------ */
// Add WooCommerce Theme Support
add_theme_support('woocommerce');

if ( class_exists('Woocommerce') ) {

	global $minti_data;

	/* Init Redux API init since functions.php runs BEFORE after_setup_theme 
		https://github.com/reduxframework/redux-framework/issues/2362 */
	$minti_data = get_option('minti_data');

	// Disable WooCommerce CSS
	if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	} else {
		define( 'WOOCOMMERCE_USE_CSS', false );
	}

	// Disable Woocommerce select field styling
	function minti_dequeue_stylesandscripts_select2() {
	    if ( class_exists( 'woocommerce' ) ) {
	        wp_dequeue_style( 'selectWoo' );
	        wp_dequeue_script( 'selectWoo');
	    } 
	} 
	add_action( 'wp_enqueue_scripts', 'minti_dequeue_stylesandscripts_select2', 100 );

	// Increase Number of Related Products to 4
	if (!function_exists('woocommerce_related_output')) {
		function woocommerce_related_output() {
			global $product, $orderby, $related;
			$args = array(
				'posts_per_page'	=> '4',
				'columns'			=> '4',
			);
			return $args;
		}
	}
	add_filter( 'woocommerce_output_related_products_args', 'woocommerce_related_output' );

	// Change products per page
	if(!empty($minti_data['text_shopitems'])){
		//add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . $minti_data['text_shopitems'] . ';' ), 20 );
		add_filter( 'loop_shop_per_page', 'minti_new_loop_shop_per_page', 20 );
	}

	function minti_new_loop_shop_per_page( $cols ) {
		global $minti_data;
		$cols = $minti_data['text_shopitems'];
		return $cols;
	}

	// Toggle Sort by Function
	if(isset($minti_data["switch_shopsorting"]) &&  $minti_data["switch_shopsorting"] == 0){
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
	}

	// Toggle Result Count
	if(isset($minti_data["switch_shopresultcount"]) && $minti_data["switch_shopresultcount"] == 0){
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
	}

	// Toggle Upsell Products
	if(isset($minti_data["switch_shopupsells"]) && $minti_data["switch_shopupsells"] == 0){
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
	}

	// Toggle Related Products
	if(isset($minti_data["switch_shoprelatedproducts"]) && $minti_data["switch_shoprelatedproducts"] == 0){
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
	}

	// Toggle Add to Cart Button
	if(isset($minti_data["switch_addtocart"]) && $minti_data["switch_addtocart"] == 0){
		add_action('init','woocommerce_remove_loop_button');
	}

	// Remove Cart Cross Sells
	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

	//change tab position to be inside summary
	remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
	add_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 1);

	// Remove WooCommerce Prettyphoto Style
	function minti_woo_remove_styles() {
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
		wp_dequeue_script( 'select2' );
	}
	add_action( 'wp_enqueue_scripts', 'minti_woo_remove_styles', 99 );

	// Add Custom Pagination
	remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
	function woocommerce_pagination() {
		minti_pagination(); 		
	}
	add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);

	// Add prettyPhoto gallery back to product galleries
	function custom_woocommerce_single_product_image_html( $html, $post_id ) {
		return str_replace('<a href', '<a rel="prettyPhoto[pp_gal]" href', $html);
	}
	add_filter( 'woocommerce_single_product_image_thumbnail_html', 'custom_woocommerce_single_product_image_html', 10, 2 );

	// Ajaxfiy WooCommerce Cart
	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		
		ob_start(); ?>
		<a href="<?php echo esc_url(wc_get_cart_url()); ?>" id="shopping-btn" class="cart-contents"><i class="icon-minti-cart"></i><?php if ( sizeof( $woocommerce->cart->cart_contents ) != 0 ) { ?><span><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span><?php } ?></a>
		<?php
		
		$fragments['a.cart-contents'] = ob_get_clean();
		
		return $fragments;
	}
	add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

	// Remove Add to Cart Button
	function woocommerce_remove_loop_button(){
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	}

	// Add Second Image on Hover by http://jameskoster.co.uk
	// License: GNU General Public License v3.0
	if ( ! class_exists( 'WC_pif' ) ) {
		class WC_pif {
			public function __construct() {
				add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'woocommerce_template_loop_second_product_thumbnail' ), 11 );
				add_filter( 'post_class', array( $this, 'product_has_gallery' ) );
			}
	        /*-----------------------------------------------------------------------------------*/
			/* Class Functions */
			/*-----------------------------------------------------------------------------------*/
			// Add pif-has-gallery class to products that have a gallery
			function product_has_gallery( $classes ) {
				global $product;
				$post_type = get_post_type( get_the_ID() );
				if ( ! is_admin() ) {
					if ( $post_type == 'product' ) {
						$attachment_ids = $this->get_gallery_image_ids( $product );
						if ( $attachment_ids ) {
							$classes[] = 'pif-has-gallery';
						}
					}
				}
				return $classes;
			}
			/*-----------------------------------------------------------------------------------*/
			/* Frontend Functions */
			/*-----------------------------------------------------------------------------------*/
			// Display the second thumbnails
			function woocommerce_template_loop_second_product_thumbnail() {
				global $product, $woocommerce;
				$attachment_ids = $this->get_gallery_image_ids( $product );
				if ( $attachment_ids ) {
					$attachment_ids     = array_values( $attachment_ids );
					$secondary_image_id = $attachment_ids['0'];
					echo wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog wp-post-image' ) );
				}
			}
			/*-----------------------------------------------------------------------------------*/
			/* WooCommerce Compatibility Functions */
			/*-----------------------------------------------------------------------------------*/
			// Get product gallery image IDs
			function get_gallery_image_ids( $product ) {
				if ( ! is_a( $product, 'WC_Product' ) ) {
					return;
				}
				if ( is_callable( 'WC_Product::get_gallery_image_ids' ) ) {
					return $product->get_gallery_image_ids();
				} else {
					return $product->get_gallery_attachment_ids();
				}
			}
		}
		$WC_pif = new WC_pif();
	}

} // end if woocommerce class exists

/* ------------------------------------------------------------------------ */
/* Plugin - bbPress
/* ------------------------------------------------------------------------ */
if ( class_exists('bbPress') ) {
	
	// Remove Default CSS
	function minti_deregister_bbp_styles() {
		wp_deregister_style( 'bbp-default' );
	}
	add_action( 'wp_print_styles', 'minti_deregister_bbp_styles', 15 );

} // end if bbpress class exists

/* ------------------------------------------------------------------------ */
/* Helper - hex2rgba
/* By: http://mekshq.com/how-to-convert-hexadecimal-color-code-to-rgb-or-rgba-using-php/
/* ------------------------------------------------------------------------ */
function minti_hex2rgba($color, $opacity = false) {
	$default = 'rgb(0,0,0)';
	if(empty($color)){
		return $default; 
	}

    if ($color[0] == '#' ) {
    	$color = substr( $color, 1 );
    }

    if (strlen($color) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
            return $default;
    }

    $rgb =  array_map('hexdec', $hex);

    if($opacity){
    	if(abs($opacity) > 1)
    		$opacity = 1.0;
    	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
    	$output = 'rgb('.implode(",",$rgb).')';
    }

    return $output;
}

/* ------------------------------------------------------------------------ */
/* Helper - expand allowed tags()
/* Source: https://gist.github.com/adamsilverstein/10783774
/* ------------------------------------------------------------------------ */
function minti_expand_allowed_tags() {
	$my_allowed = wp_kses_allowed_html( 'post' );
	// iframe
	$my_allowed['iframe'] = array(
		'src'             => array(),
		'height'          => array(),
		'width'           => array(),
		'frameborder'     => array(),
		'allowfullscreen' => array(),
	); 
	return $my_allowed;
}

/* ------------------------------------------------------------------------ */
/* Helper - minify CSS
/* ------------------------------------------------------------------------ */
if(!function_exists('minti_minfy_css')) {
	function minti_minify_css($css = ''){
		if(!empty($css)) {
		    $css = preg_replace( '/\s+/', ' ', $css );
		    $css = preg_replace( '/\/\*[^\!](.*?)\*\//', '', $css );
		    $css = preg_replace( '/(,|:|;|\{|}) /', '$1', $css );
		    $css = preg_replace( '/ (,|;|\{|})/', '$1', $css );
		    $css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
		    $css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );   
		}
		return $css;
	}
}

/* ------------------------------------------------------------------------ */
/* EOF
/* ------------------------------------------------------------------------ */
?>
