<?php 

if ( ! defined( '_S_VERSION' ) ) {
  // Replace the version number of the theme on each release.
  define( '_S_VERSION', '1.0.0' );
}

// Set content width
//--------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) { $content_width = 1140; }

// Theme set up
//--------------------------------------------------------------------------*/
add_action('after_setup_theme', 'newsophy_theme_setup');
if (!function_exists('newsophy_theme_setup')) {
    function newsophy_theme_setup() {
      
      // Register navigation menu
      register_nav_menus(
        array(
          'main-menu' => esc_html__('Main Menu', 'newsophy'),
          'footer-menu' => esc_html__('Footer Menu', 'newsophy'),
        )
      );

      // Localization support
      load_theme_textdomain('newsophy', get_template_directory() . '/languages');

      // Title tag
      add_theme_support('title-tag');

      // Set post formats
      add_theme_support('post-formats', array('video','audio'));

      // Add default posts and comments RSS feed link.
      add_theme_support( 'automatic-feed-links' );


      // AMP Support.
      add_theme_support('amp', array(
          'paired' => true,
          'template_dir' => 'amp'
      ) );

      // Post Thumbnails
      add_theme_support('post-thumbnails');
      add_image_size('newsophy-tiny', 60, 46, true);
      add_image_size('newsophy-small-thumb', 80, 80, true);
      add_image_size('newsophy-mid-thumb', 300, 200, true);
      add_image_size('newsophy-big-thumb', 750, 575, true);
      add_image_size('newsophy-post', 1250, 715, true);

      // Editor
      add_theme_support('align-wide');
      add_theme_support('wp-block-styles');
      add_theme_support('editor-styles');
      add_editor_style('editor-style.css'); 
  }
}   

// Includes
//--------------------------------------------------------------------------*/
require get_template_directory().'/framework/theme-functions.php'; // Main Functions 
require get_template_directory().'/framework/theme-fields.php';    // ACF 
include_once(get_template_directory().'/framework/sidebars.php');  // Sidebar Widgets 
//Customizer
include_once(trailingslashit(get_template_directory()).'customize/customize.php');
include_once(trailingslashit(get_template_directory()).'customize/custom-css.php');
if( is_admin() ){
  include_once(trailingslashit(get_template_directory()).'customize/editor-css.php');
}

// Load scripts and styles
//--------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts','newsophy_load_scripts', 1 );
function newsophy_load_scripts() {
  // Register Styles
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fonts/css/fontello.css', array(), '5.13.0');
  wp_enqueue_style('newsophy-main', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
  wp_enqueue_style( 'newsophy-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0', 'all' );
  wp_enqueue_style('interlace-css', get_template_directory_uri() . '/assets/css/interlace.css', array(), '2.6');
  wp_enqueue_style('newsophy-amp', get_template_directory_uri() . '/assets/css/amp.scss', array(), '1.0', 'all' );
  // Register Scripts 
  wp_enqueue_script('fitvids', get_template_directory_uri() . '/assets/js/fitvids.js', array( 'jquery' ), '', true);
  wp_enqueue_script('interlace', get_template_directory_uri() . '/assets/js/interlace.min.js', array( 'jquery' ), '', true);
  wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/assets/js/infinite-scroll.pkgd.min.js', array('jquery'), '2.1.0', true );
  wp_enqueue_script('newsophy-scripts', get_template_directory_uri() . '/assets/js/newsophy.js', array( 'jquery' ), '', true);
}

if( class_exists('WooCommerce') ){
  add_action( 'wp_enqueue_scripts','newsophy_woo_styles', 10);
  function newsophy_woo_styles() {
    wp_enqueue_style( 'newsophy-woocommerce', get_template_directory_uri(). '/assets/css/woocommerce.css', array(), '1.0', 'all' );
  }      
}

function newsophy_gutenberg_editor() {
  wp_enqueue_style( 'newsophy-blocks-style', get_template_directory_uri() . '/customize/assets/css/editor-style.css');
}

add_action( 'enqueue_block_editor_assets', 'newsophy_gutenberg_editor' );

// AMP
//--------------------------------------------------------------------------*/

function epcl_is_amp() {
  return function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() && !is_admin();
}


// Register Sidebar & Widgets
//--------------------------------------------------------------------------*/
if (!function_exists('newsophy_widgets_init')) {
  function newsophy_widgets_init() {
    $snum = get_theme_mod('newsophy_sidenum', '3');
    for ($x = 1; $x <= $snum; $x++) {
      $sid = $x;
      if ($sid >= 4) $sid++; // Previous version compability 
      register_sidebar(array(
        'name' => esc_html__('Home Sidebar '.$x, 'newsophy'),
        'id' => 'sidebar-'.$sid,
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
      ));
    }
    register_sidebar(array(
      'name' => esc_html__('Posts/Pages Sidebar', 'newsophy'),
      'id' => 'sidebar-4',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widget-title">',
      'after_title' => '</h4>',
    ));
    register_sidebar(array(
      'name' => esc_html__('Hidden Sidebar', 'newsophy'),
      'id' => 'hidden-sidebar',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widget-title">',
      'after_title' => '</h4>',
    ));
  }
}
add_action( 'widgets_init', 'newsophy_widgets_init' );

// Register Plugins
//--------------------------------------------------------------------------*/
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'newsophy_register_theme_plugins' );

function newsophy_register_theme_plugins() {
    $plugins = array(    
    array(
      'name'                  => esc_html__('Newsophy Core', 'newsophy'),
      'slug'                  => 'newsophy-core',
      'source'                => get_template_directory() . '/framework/plugins/newsophy-core.zip',
      'required'              => true,
      'version'               => '',
      'force_activation'      => false,
      'force_deactivation'    => false,
      'external_url'          => '',
    ),  
    array(
      'name'                  => esc_html__('Kirki', 'newsophy'),
      'slug'                  => 'kirki',
      'required'              => true,
      'version'               => '',
      'force_activation'      => false,
      'force_deactivation'    => false,
      'external_url'          => '',
    ),
    array(
      'name'                  => esc_html__('Contact Form 7', 'newsophy'),
      'slug'                  => 'contact-form-7',
      'required'              => false,
      'version'               => '',
      'force_activation'      => false,
      'force_deactivation'    => false,
      'external_url'          => '',
    ),
    array(
      'name'                  => esc_html__('MailChimp for WordPress', 'newsophy'),
      'slug'                  => 'mailchimp-for-wp',
      'required'              => false,
      'version'               => '',
      'force_activation'      => false,
      'force_deactivation'    => false,
      'external_url'          => '',
    ),
    array(
      'name'                  => esc_html__('Advanced Custom Fields','newsophy'),
      'slug'                  => 'advanced-custom-fields',
      'required'              => true,
      'version'               => '',
      'force_activation'      => false,
      'force_deactivation'    => false,
    ),
    array(
      'name'                  => esc_html__('Smash Balloon Instagram Feed', 'newsophy'),
      'slug'                  => 'instagram-feed',
      'required'              => false,
      'version'               => '',
      'force_activation'      => false,
      'force_deactivation'    => false,
      'external_url'          => '',
    ),
    array(
      'name'                  => esc_html__('One Click Demo Import','newsophy'),
      'slug'                  => 'one-click-demo-import',
      'required'              => false,
      'version'               => '',
      'force_activation'      => false,
      'force_deactivation'    => false,
    ),
    array(
      'name'                  => esc_html__('Envato Market','newsophy'),
      'slug'                  => 'envato-market',
      'source'                => get_stylesheet_directory() . '/framework/plugins/envato-market.zip',
      'required'              => false,
      'version'               => '2.0.3',
    )
 );

    $config = array(
      'id'           => 'newsophy',                 // Unique ID for hashing notices for multiple 
      'default_path' => '',                        // Default absolute path to bundled plugins.
      'menu'         => 'tgmpa-install-plugins',   // Menu slug.
      'has_notices'  => true,                      // Show admin notices or not.
      'dismissable'  => true,                      // If false, a user cannot dismiss the nag message.
      'dismiss_msg'  => '',                        // If 'dismissable' is false, this message will be 
      'is_automatic' => true,                     // Automatically activate plugins after installation 
      'message'      => '',                        // Message to output right before the plugins table.
    );
    tgmpa($plugins, $config);
}

if(!function_exists('newsophy_import_files')){
  function newsophy_import_files() {
      return array(
          array(
              'import_file_name'             => 'Main News',
              'local_import_file'            => trailingslashit( get_template_directory() ).'framework/demos/main/demo.xml',
              'local_import_customizer_file' => trailingslashit( get_template_directory() ).'framework/demos/main/customizer.dat',
              'local_import_widget_file'     => trailingslashit( get_template_directory() ).'framework/demos/main/widgets.wie',
              'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'framework/demos/main/demo.jpg',
              'preview_url'                  => 'http://hqd.mah.mybluehost.me/themes/newsophy/main/',
          ),
          array(
              'import_file_name'             => 'Travel News',
              'local_import_file'            => trailingslashit( get_template_directory() ).'framework/demos/travel/demo.xml',
              'local_import_customizer_file' => trailingslashit( get_template_directory() ).'framework/demos/travel/customizer.dat',
              'local_import_widget_file'     => trailingslashit( get_template_directory() ).'framework/demos/travel/widgets.wie',
              'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'framework/demos/travel/demo.jpg',
              'preview_url'                  => 'http://hqd.mah.mybluehost.me/themes/newsophy/travel/',
          ),
          array(
              'import_file_name'             => 'Business Blog',
              'local_import_file'            => trailingslashit( get_template_directory() ).'framework/demos/business/demo.xml',
              'local_import_customizer_file' => trailingslashit( get_template_directory() ).'framework/demos/business/customizer.dat',
              'local_import_widget_file'     => trailingslashit( get_template_directory() ).'framework/demos/business/widgets.wie',
              'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'framework/demos/business/demo.jpg',
              'preview_url'                  => 'http://hqd.mah.mybluehost.me/themes/newsophy/business/',
          ),   
           array(
              'import_file_name'             => 'Dark',
              'local_import_file'            => trailingslashit( get_template_directory() ).'framework/demos/dark/demo.xml',
              'local_import_customizer_file' => trailingslashit( get_template_directory() ).'framework/demos/dark/customizer.dat',
              'local_import_widget_file'     => trailingslashit( get_template_directory() ).'framework/demos/dark/widgets.wie',
              'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'framework/demos/dark/demo.jpg',
              'preview_url'                  => 'http://hqd.mah.mybluehost.me/themes/newsophy/dark/',
          ), 
           array(
              'import_file_name'             => 'Minimal',
              'local_import_file'            => trailingslashit( get_template_directory() ).'framework/demos/minimal/demo.xml',
              'local_import_customizer_file' => trailingslashit( get_template_directory() ).'framework/demos/minimal/customizer.dat',
              'local_import_widget_file'     => trailingslashit( get_template_directory() ).'framework/demos/minimal/widgets.wie',
              'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ).'framework/demos/minimal/demo.jpg',
              'preview_url'                  => 'http://hqd.mah.mybluehost.me/themes/newsophy/mini/',
          )   
      );
  }
  add_filter( 'pt-ocdi/import_files', 'newsophy_import_files' );
}  

if(!function_exists('newsophy_after_import_setup')) {
  function newsophy_after_import_setup( $selected_import ) {
    if( 'Main News' === $selected_import['import_file_name'] ) {
      $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
      set_theme_mod( 'nav_menu_locations', array(
        'main-menu' => $main_menu->term_id,
      ));
    }
    if( 'Business News' === $selected_import['import_file_name'] ) {
      $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
      set_theme_mod( 'nav_menu_locations', array(
        'main-menu' => $main_menu->term_id,
      ));
    }
    if( 'Travel News' === $selected_import['import_file_name'] ) {
      $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
      set_theme_mod( 'nav_menu_locations', array(
        'main-menu' => $main_menu->term_id,
      ));
    }
  }
  add_action( 'pt-ocdi/after_import', 'newsophy_after_import_setup' );
}