<?php
$share_facebook     = get_theme_mod('newsophy_share_facebook',false);
$share_twitter      = get_theme_mod('newsophy_share_twitter',false);
$share_linkedin     = get_theme_mod('newsophy_share_linkedin',false);
$share_pinterest    = get_theme_mod('newsophy_share_pinterest',false);
$share_whatsapp     = get_theme_mod('newsophy_share_whatsapp',false);
$share_telegram     = get_theme_mod('newsophy_share_telegram',false);
// Featured image
$post_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
?>
<?php if( $share_facebook || $share_twitter || $share_pinterest || $share_linkedin || $share_whatsapp ):?>
<ul class="post-share">
 <?php if ($share_facebook):?>
  <li>
    <a class="facebook" href="//www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="<?php echo esc_attr('facebook'); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;">
      <i class="icon-facebook"></i>
    </a>
  </li>
  <?php endif; ?>	
  <?php if ($share_twitter):?>
  <li>  
	  <a class="twitter" href="https://twitter.com/intent/tweet?text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&url=<?php the_permalink(); ?>" title="<?php echo esc_attr('twitter'); ?>&via=<?php get_bloginfo( 'name' ); ?>">
	    <i class="icon-twitter-1 twitter"></i>
	  </a>
  </li>   
  <?php endif; ?>
  <?php if ($share_linkedin):?>
  <li>
    <a class="linkedin" href="//www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php echo esc_attr('linkedin'); ?>">
      <i class="icon-linkedin"></i>
    </a>
  </li>  
  <?php endif; ?>
  <?php if ($share_pinterest):?>
  <li>  
   <a class="pinterest" data-pin-do="none" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(the_permalink()); ?>&media=<?php echo esc_url($post_image); ?>&description=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" target="_blank">
    <i class="icon-pinterest"></i>
    </a>
  </li>  
  <?php endif; ?>
  <?php if ($share_whatsapp):?>
  <li>  
    <a href="https://api.whatsapp.com/send?text=<?php the_permalink(); ?>" data-action="share/whatsapp/share" class="whatsapp">
      <i class="icon-whatsapp"></i>
    </a>
  </li>  
  <?php endif; ?>
  <?php if ($share_telegram):?>
  <li>  
    <a href="https://telegram.me/share/?url=<?php the_permalink(); ?>&text=<?php echo htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>&description=<?php get_bloginfo('name'); ?>&image=<?php echo esc_url($post_image); ?>" class="telegram">
      <i class="icon-paper-plane"></i>
    </a>
  </li>  
  <?php endif; ?>
</ul>
<?php endif; ?>