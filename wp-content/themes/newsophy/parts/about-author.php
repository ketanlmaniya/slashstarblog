<?php 
// Prevent loading this file directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>

<div class="about-author ttl-border">

	<div class="author-img">
		<?php echo get_avatar( get_the_author_meta('email'), '200' ); ?>
	</div>
	
	<div class="author-content">
		<div class="box-title-area"><h4 class="title"><?php _e('About Author / ', 'newsophy'); ?><?php the_author_posts_link(); ?></h4></div>
		<div class="author-info">
			<p><?php the_author_meta('description'); ?></p>
			<?php if(get_the_author_meta('facebook')) : ?><a target="_blank" class="author-social" href="<?php echo the_author_meta('facebook'); ?>"><i class="icon-facebook"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('twitter')) : ?><a target="_blank" class="author-social" href="<?php echo the_author_meta('twitter'); ?>"><i class="icon-twitter-1"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('instagram')) : ?><a target="_blank" class="author-social" href="<?php echo the_author_meta('instagram'); ?>"><i class="icon-instagram"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('pinterest')) : ?><a target="_blank" class="author-social" href="<?php echo the_author_meta('pinterest'); ?>"><i class="fab icon-pinterest"></i></a><?php endif; ?>
			<?php if(get_the_author_meta('tumblr')) : ?><a target="_blank" class="author-social" href="<?php echo the_author_meta('tumblr'); ?>"><i class="icon-tumblr"></i></a><?php endif; ?>
		</div>
	</div>
	
</div>