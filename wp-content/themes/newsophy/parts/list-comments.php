<?php

$GLOBALS['comment'] = $comment;
$add_below = '';

?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">


    <div class="thecomment">
			<div class="author-avatar">
				<?php echo get_avatar($comment, 70); ?>
			</div>
			<div class="comment-text">

				<h6 class="author">
					<?php echo get_comment_author_link(); ?>
				</h6>
				<span class="date">
					<?php printf( _x( '%s ago', '%s = human-readable time difference', 'newsophy' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
				</span>

			<span class="reply">
				<?php edit_comment_link(__('Edit', 'newsophy'),'  ',' ') ?>
				<?php comment_reply_link(array_merge( $args, array( 'reply_text' => esc_html__('Reply', 'newsophy'), 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</span>

			
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php esc_html_e('Your comment is awaiting moderation.', 'newsophy') ?></em>
					<br />
				<?php endif; ?>
					<?php comment_text() ?>
	    	</div>
  </div>
