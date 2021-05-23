<?php global $minti_data; ?>
<div class="sharebox clearfix">
	<ul>
		<?php if($minti_data['check_sharebox']['facebook'] == '1') { ?>	
		<li>
			<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" class="share-facebook" target="_blank" title="<?php _e( 'Share via', 'unicon' ) ?> <?php _e( 'Facebook', 'unicon' ) ?>"><i class="fa fa-facebook"></i> <?php _e( 'Facebook', 'unicon' ) ?></a>
		</li>
		<?php } ?>
		<?php if($minti_data['check_sharebox']['twitter'] == '1') { ?>	
		<li>
			<a href="https://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" class="share-twitter" target="_blank" title="<?php _e( 'Share via', 'unicon' ) ?> <?php _e( 'Twitter', 'unicon' ) ?>"><i class="fa fa-twitter"></i> <?php _e( 'Twitter', 'unicon' ) ?></a>
		</li>
		<?php } ?>
		<?php if($minti_data['check_sharebox']['tumblr'] == '1') { ?>	
		<li>
			<a href="http://www.reddit.com/submit?url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(esc_attr(the_title('', '', false))); ?>" class="share-reddit" target="_blank" title="<?php _e( 'Share via', 'unicon' ) ?> <?php _e( 'Tumblr', 'unicon' ) ?>"><i class="fa fa-reddit"></i> <?php _e( 'Reddit', 'unicon' ) ?></a>
		</li>
		<?php } ?>
		<?php if($minti_data['check_sharebox']['pinterest'] == '1') { ?>	
		<li>
			<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo esc_url($url); ?>&amp;" target="_blank" class="share-pinterest" title="<?php _e( 'Share via', 'unicon' ) ?> <?php _e( 'Pinterest', 'unicon' ) ?>"><i class="fa fa-pinterest"></i> <?php _e( 'Pinterest', 'unicon' ) ?></a>
		</li>
		<?php } ?>
		<?php if($minti_data['check_sharebox']['googleplus'] == '1') { ?>	
		<li>
			<a href="https://plus.google.com/share?url=<?php the_permalink() ?>" target="_blank" class="share-google" title="<?php _e( 'Share via', 'unicon' ) ?> <?php _e( 'Google+', 'unicon' ) ?>"><i class="fa fa-google-plus"></i> <?php _e( 'Google+', 'unicon' ) ?></a>
		</li>
		<?php } ?>
		<?php if($minti_data['check_sharebox']['linkedin'] == '1') { ?>	
		<li>
			<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink();?>&amp;title=<?php the_title();?>" target="_blank" class="share-linkedin" title="<?php _e( 'Share via', 'unicon' ) ?> <?php _e( 'LinkedIn', 'unicon' ) ?>"><i class="fa fa-linkedin"></i> <?php _e( 'LinkedIn', 'unicon' ) ?></a>
		</li>
		<?php } ?>
		<?php if($minti_data['check_sharebox']['email'] == '1') { ?>	
		<li>
			<a href="mailto:?subject=<?php the_title();?>&amp;body=<?php the_permalink() ?>" class="share-mail" title="<?php _e( 'Share via', 'unicon' ) ?> <?php _e( 'E-Mail', 'unicon' ) ?>"><i class="fa fa-envelope-o"></i> <?php _e( 'E-Mail', 'unicon' ) ?></a>
		</li>
		<?php } ?>
	</ul>
</div>
