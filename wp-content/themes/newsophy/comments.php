<?php
if ( post_password_required() ){
    return;
}
?>
<div id="post-comments">

  <div class="comments-list">

    <?php comments_number( '', '<h4 class="post-box-title"><span>'.esc_html__('1 Comment','newsophy').'</span></h4>', '<h4 class="post-box-title"><span>'.esc_html__('% Comments','newsophy').'</span></h4>' ); ?>

      <?php if ( have_comments() ) { ?>
        <div class="comments">
          <ul class="comments-thread list-unstyled">
            <?php wp_list_comments('callback=newsophy_list_comments'); ?>
          </ul>
          <?php
          // Are there comments to navigate through?
          if ( get_comment_pages_count() > 1 && get_option('page_comments')) :
              ?>
            <footer class="navigation comment-navigation">
              <div class="previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'newsophy' ) ); ?></div>
              <div class="next right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'newsophy' ) ); ?></div>
            </footer><!-- .comment-navigation -->
          <?php endif; // Check for comment navigation ?>

          <?php if ( ! comments_open() && get_comments_number() ) : ?>
              <p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'newsophy' ); ?></p>
          <?php endif; ?>
        </div>
        <?php } ?>
    </div>
    <?php
      $aria_req = ( $req ? " aria-required='true'" : '' );
      $comment_args = array(
        'title_reply'=> '<span class="heading widgettitles">'.esc_html__('Leave a Comment','newsophy').'</span>',
        'comment_field' => '<div class="comment-form-comment"><textarea rows="8" id="comment" class="form-control" placeholder="'.esc_attr__('Comment*', 'newsophy').'" name="comment"'.$aria_req.'></textarea> </div>',
        'fields' => apply_filters( 'comment_form_default_fields',
                array(
                'author' => '<div class="comment-form-group"><div class="comment-author"><input type="text" name="author" placeholder="'.esc_attr__('Name*', 'newsophy').'" class="form-control" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' /></div>',
                'email' => '<div class="comment-email"><input id="email" name="email" class="form-control" placeholder="'.esc_attr__('Email*', 'newsophy').'" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' /></div>',
                'url' => '<div class="comment-url"><input id="url" name="url" class="form-control" placeholder="'.esc_attr__('Website', 'newsophy').'" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div>',
            )),
        'label_submit' => esc_html__('Post Comment', 'newsophy'),
        'comment_notes_before' => '<p class="h-info">'.esc_html__('Your email address will not be published.','newsophy').'</p>',
        'comment_notes_after' => '',
      );
      ?>
      <?php if('open' == $post->comment_status){ ?>
        <div class="commentform">
          <?php newsophy_comment_form($comment_args,'btn-variant'); ?>
        </div><!-- end commentform -->
      <?php } ?>

</div><!-- end comments -->