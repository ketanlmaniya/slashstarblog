<?php

if(!function_exists('newsophy_minify')) {
    function newsophy_minify( $minify ) {
       /* remove comments */
      $minify = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $minify );
      /* remove tabs, spaces, newlines, etc. */
      $minify = str_replace( array("\r\n", "\r", "\n", "\t", '; ', '  ', '    ', '    ',': ', ', ','{ ','}.'), array('','','','',';','','','',':',',','{','} .'), $minify );
      return $minify;
    }
}

/* Convert hexdec color string to rgb(a) string */
 
function hex2rgba($color, $opacity = false) {
 
  $default = 'rgb(0,0,0)';
 
  //Return default if no color provided
  if(empty($color))
    return $default; 

   //Sanitize $color if "#" is provided 
    if ($color[0] == '#' ) {
      $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
            return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity){
      if(abs($opacity) > 1)
        $opacity = 1.0;
      $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
      $output = implode(",",$rgb);
    }
    //Return rgb(a) color string
    return $output;
}

function newsophy_custom_styles() {

$css = '';
$pkshadow = 'rgba(27,43,52,0.22)';

if ( class_exists( 'Kirki' ) ) {  
  $shadowclr = Kirki::get_option('newsophy_shadow_color');
  $anispeed = Kirki::get_option('newsophy_ani_speed');
  $pkshadow = hex2rgba($shadowclr);
}

?>

<?php ob_start(); 

    $categories = get_categories();
    foreach( $categories as $c ){
        if (class_exists('ACF')) {
          $fields = get_fields($c);
        }
        if( !empty($fields) ){
          $cat_color = get_field('category_color', $c);
            if($cat_color != ''){
                $css =
                    'div.tags a.tag-link-'.$c->term_id.'::after {border-bottom: 4px solid '.$cat_color.'; }
                     .category-box h1.tag-link-'.$c->term_id.'::after {border-bottom: 4px solid '.$cat_color.'; }';
            }
        }
        echo esc_attr( $css,'newsophy' );
    }
?>
    :root {
      --background: <?php echo esc_attr(get_theme_mod('newsophy_site_bg', '#fff')); ?>;;
      --accent: <?php echo esc_attr(get_theme_mod('newsophy_settings_primary_color', '#2c40ff')); ?>;
      --main: <?php echo esc_attr(get_theme_mod('newsophy_settings_headings_color', '#1a1f28')); ?>;
      --text: <?php echo esc_attr(get_theme_mod('newsophy_settings_text_color', '#717582')); ?>;
      --border: <?php echo esc_attr(get_theme_mod('newsophy_settings_borders_color', '#cfe0e9')); ?>;
    }

  <?php 

    if(get_theme_mod('newsophy_bg_image')) {
      $css = '
      body { 
        background-image: url('.get_theme_mod("newsophy_bg_image").');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }';
      echo esc_attr( $css,'newsophy' );
    }
    if(get_theme_mod('newsophy_feat_bg_img')) {
      $css = '
      .feat-area,
      .single-bg { 
        background-image: url('.get_theme_mod("newsophy_feat_bg_img").');
        background-repeat: no-repeat;
        background-position: center;
      }';
      echo esc_attr( $css,'newsophy' );
    }

  ?>

    <?php if (get_theme_mod('newsophy_image_border') != '0'): ?>
    .main-area img,
    .entry-image,
    .image-part,
    .sidebar img,
    .category-img,
    .category-box,
    .related-image img,
    .mc4wp-form,
    .wp-block-search__input {
      border-radius: <?php echo esc_attr(get_theme_mod('newsophy_image_border', '0')); ?>px!important; 
    }
    <?php endif ?>

    .post-item .image-part img {
      transition: transform <?php echo esc_attr($anispeed) ?>s ease-in-out, -webkit-transform <?php echo esc_attr($anispeed) ?>s ease-in-out;
    }
    
    #header,
    .nav-panel {
      background: <?php echo esc_attr(get_theme_mod('newsophy_topbar_color', '#fff')); ?>; 
    }

    #header {
      height: <?php echo esc_attr(get_theme_mod('newsophy_tophead_height', '90')); ?>px;
    }

    #top-logo {
      width: <?php echo esc_attr(get_theme_mod('newsophy_logo_width', '180')); ?>px;
    }

    .close-menu::before, .close-menu::before,
    .close-menu::before, .close-menu::after {
      background-color: <?php echo esc_attr(get_theme_mod('newsophy_topbar_linkcolor', 'var(--main)')); ?>; 
    }

    .top-bar-right a.cta-btn,
    a.cta-btn {
      background: <?php echo esc_attr(get_theme_mod('newsophy_cta_bg', '#e9e9e9')); ?>; 
    }

    #menuheader,
    #nav-wrapper .topmenu .sub-menu,
    #sidenav {
      background: <?php echo esc_attr(get_theme_mod('newsophy_header_color', '#ffffff')); ?>; 
    }

    .close::before, 
    .close::after {
      background-color: <?php echo esc_attr(get_theme_mod('newsophy_topmenu_linkcolor', 'var(--main)')); ?>;
    }

    .feat-area {
      background-color: <?php echo esc_attr(get_theme_mod('newsophy_feat_bg', '#f1f3f8')); ?>; 
    }

    .feat-cont h2 a,
    .feat-cont .post-meta a {
      color: <?php echo esc_attr(get_theme_mod('newsophy_feat_heading', 'var(--main)')); ?>; 
    }

    .feat-cont .post-meta {
      color: <?php echo esc_attr(get_theme_mod('newsophy_feat_text', 'var(--main)')); ?>; 
    }

    .picked-area {
      background: <?php echo esc_attr(get_theme_mod('newsophy_pick_bg', '#e9ebf3')); ?>; 
    }

    .picked-area.innershadow {
      box-shadow: 3px 7px 19px 3px rgba(<?php echo esc_attr($pkshadow)?>,0.22) inset;
      -webkit-box-shadow: 3px 7px 19px 3px rgba(<?php echo esc_attr($pkshadow)?>,0.22) inset;
      -moz-box-shadow: 3px 7px 19px 3px rgba(<?php echo esc_attr($pkshadow)?>,0.22) inset;
    }

<?php 

$out=ob_get_contents(); $out = newsophy_minify($out); ob_end_clean();
wp_add_inline_style('newsophy-main', $out);

}

add_action( 'wp_enqueue_scripts', 'newsophy_custom_styles' );

?>