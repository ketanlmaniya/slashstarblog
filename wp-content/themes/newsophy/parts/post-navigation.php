<?php

	$prevPost = get_previous_post();
	$nextPost = get_next_post();
	
	if(!empty($prevPost) || !empty($nextPost)) { ?>
	<div class="post-navigation">
		
		<div class="post-prev">
			<?php if(!empty($prevPost)) { $prevURL = get_permalink($prevPost->ID); ?>
			<a href="<?php echo esc_url($prevURL); ?>" >
				<?php if( has_post_thumbnail($prevPost->ID)) : ?>
				<div class="postnav-image">
				<?php if( has_post_thumbnail($prevPost->ID) ){ echo '<div class="navprev">'.get_the_post_thumbnail($prevPost->ID, 'thumbnail').'</div>'; } ?>
				</div>
				<?php endif; ?>
				<div class="prev-post-title">
					<i class="icon-left"></i><span><?php esc_html_e('Previous post', 'newsophy'); ?></span>
					<h6><?php echo get_the_title($prevPost->ID); ?></h6>
				</div>
			</a>
			<?php } ?>
		</div>
		
		<div class="post-next">
			<?php if(!empty($nextPost)) { $nextURL = get_permalink($nextPost->ID); ?>
			<a href="<?php echo esc_url($nextURL); ?>">
				<div class="next-post-title">
					<span><?php esc_html_e('Next post', 'newsophy'); ?></span><i class="icon-right"></i>
					<h6><?php echo get_the_title($nextPost->ID); ?></h6>
				</div>
				<?php if( has_post_thumbnail($nextPost->ID)) : ?>
				<div class="postnav-image">
				<?php if( has_post_thumbnail($nextPost->ID) ){ echo '<div class="navnext">'.get_the_post_thumbnail($nextPost->ID, 'thumbnail').'</div>'; } ?>
				</div>
				<?php endif; ?>
			</a>
			<?php } ?>
		</div>
		
	</div>
<?php } ?>