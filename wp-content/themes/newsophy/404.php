<?php get_header(); ?>
  <div id="main-area" class="error-page">
    <div class="content-wrapper">
    	<div class="content-area">
    		<div class="posts-sec">
					<h1>4<span>0</span>4</h1>
					<h2><?php esc_html_e("Oops... Page Not Found!", 'newsophy'); ?></h2>
					<p><?php esc_html_e("It seems we can't find what you're looking for. Perhaps searching can help.", 'newsophy'); ?></p>
					<?php get_search_form(); ?>
					<div class="back-btn">
						<a href="<?php echo esc_url( home_url('/') ); ?>" class="btn">
							<span><?php esc_html_e("Back to Home", 'newsophy'); ?></span>
						</a>
					</div>
				</div>
			</div>
    </div> 
  </div> 
<?php get_footer(); ?>