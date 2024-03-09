<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) { ?>
		<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('newsophy_favicon',get_template_directory_uri().'/favicon.png')); ?>">
		<link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('newsophy_favicon',get_template_directory_uri().'/favicon.png')); ?>">
		<?php } ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>    

<?php get_template_part('parts/hidden-sidebar'); ?>

<div class="site<?php if(get_theme_mod('newsophy_boxed')) : ?> boxed<?php endif; ?><?php if(get_theme_mod('newsophy_header_sticky')) : ?> fixed-header<?php endif; ?>"><!-- Start Site -->


<div id="header-content">
<?php
  get_template_part('parts/headers/header', 'top');	
  get_template_part('parts/headers/header', 'sub');   
?>
</div>

<div class="site-wrapper"><!-- Start Site Wrapper -->