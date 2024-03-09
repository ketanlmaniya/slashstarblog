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

<div class="site<?php if(get_theme_mod('newsophy_boxed')) : ?> boxed<?php endif; ?>"><!-- Start Site -->

<?php
  get_template_part('amp/header-amp', 'amp');	
  get_template_part('parts/headers/header', 'sub');   
?>

<div class="site-wrapper amp"><!-- Start Site Wrapper -->