<?php
function newsophy_editor_dynamic_styles() {
?>
<?php ob_start(); 

$headfont = get_theme_mod( 'newsophy_settings_headings_font', [] );
$h_family =  $headfont['font-family'];

$basefont = get_theme_mod( 'newsophy_settings_base_font', [] );
$b_family =  $basefont['font-family'];

?>

body .editor-styles-wrapper {
  background:  <?php echo esc_attr(get_theme_mod('newsophy_site_bg_color', '#fff')); ?>; 
}

body .editor-post-title__block .editor-post-title__input,
.wp-block.editor-block-list__block .editor-block-list__block-edit .title h2, 
.wp-block.editor-block-list__block .editor-block-list__block-edit .title h3,
.editor-post-title__block .editor-post-title__input { 
  font-family: <?php echo esc_attr($h_family); ?>;
  font-size: <?php echo esc_attr(get_theme_mod('newsophy_title_font_size', '37')); ?>px;
  font-weight: <?php echo esc_attr(get_theme_mod('newsophy_title_font_weight', '600')); ?>;
}

body .editor-styles-wrapper .editor-block-list__block-edit .components-autocomplete > p:not(.wp-block-cover-text),
body .editor-styles-wrapper,
body .editor-styles-wrapper p {
  font-family:  <?php echo esc_attr($b_family); ?>;
  font-size: <?php echo esc_attr(get_theme_mod( 'newsophy_font_size', '15' )); ?>px;
}

.wp-block-widget-area__panel-body-content .editor-styles-wrapper ul li,
.wp-block-widget-area__panel-body-content .editor-styles-wrapper ol li {
  list-style: none!important;
}
body .editor-styles-wrapper h1, 
body .editor-styles-wrapper h2, 
body .editor-styles-wrapper h3, 
body .editor-styles-wrapper h4, 
body .editor-styles-wrapper h5, 
body .editor-styles-wrapper h6 {
  font-family: <?php echo esc_attr($h_family); ?>;  
}
<?php 
  if(get_theme_mod('newsophy_title_upper')) {
    $css = '
			body .editor-post-title__block .editor-post-title__input,
			.wp-block.editor-block-list__block .editor-block-list__block-edit .title h2, 
			.wp-block.editor-block-list__block .editor-block-list__block-edit .title h3,
			.editor-post-title__block .editor-post-title__input { 
      text-transform: uppercase;
    }';
    echo esc_attr( $css,'newsophy' );
  }
?>

<?php $out=ob_get_contents(); $out = newsophy_minify($out); ob_end_clean();
    wp_add_inline_style('newsophy-blocks-style', $out);
}
add_action( 'enqueue_block_editor_assets', 'newsophy_editor_dynamic_styles', 30 );
?>