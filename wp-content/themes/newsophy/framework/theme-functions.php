<?php

if( !function_exists('wp_body_open') ){
  function wp_body_open() {
    return false;
  }
}

$newsophy_allow_html = array(
  'a' => array(
    'href' => array(),
    'title' => array()
  ),
  'br' => array(),
  'em' => array(),
  'strong' => array(),
  'b' => array(),
  'i' => array(),
);

// Google Font
//--------------------------------------------------------------------------*/
if(!function_exists('newsophy_googlefonts')){
    function newsophy_googlefonts(){
      global $wp_filesystem;
      $filepath = get_template_directory().'/assets/googlefont/googlefont.json';
      if( empty( $wp_filesystem ) ) {
        require_once( ABSPATH .'/wp-admin/includes/file.php' );
        WP_Filesystem();
      }
      if( $wp_filesystem ) {
        $listGoogleFont=$wp_filesystem->get_contents($filepath);
      }
      if($listGoogleFont){
        $gfont = json_decode($listGoogleFont);
        $fontarray = $gfont->items;
        $options = array();
        foreach($fontarray as $font){
          $options[$font->family] = $font->family;
        }
          return $options;
      }
      return false;
    }
}

// Theme Option
//--------------------------------------------------------------------------*/

if ( !function_exists( 'newsophy_option' ) ) :
function newsophy_option($id, $default = false) {
  if (!$id) { return; }
  return get_theme_mod($id, $default);
}
endif;

// Mobile Menu
//--------------------------------------------------------------------------*/

if ( !function_exists( 'newsophy_mobile_menu' ) ) {
  function newsophy_mobile_menu( $args = array() ) {
    ob_start();

    $defaults = array(
      'container' => '',
      'menu_class' => 'mobile-menu',
      'theme_location' => 'main-menu',
      'fallback_cb' => false,
      'before' => '',
      'after' => '',
      'link_before' => '',
      'link_after' => ''
    );

    $args = wp_parse_args($args, $defaults);

    if ( has_nav_menu('main-menu') ) {
      wp_nav_menu($args);
    } else {
      echo '<ul class="mobile-advanced">';
      wp_list_pages('title_li=');
      echo '</ul>';
    }

    $output = str_replace( '&nbsp;', '', ob_get_clean() );
    return apply_filters( 'newsophy_mobile_menu', $output );
  }
}

//Submenu Toggle
add_filter( 'walker_nav_menu_start_el', 'add_arrow',10,4);
function add_arrow( $output, $item, $depth, $args ){
if('main-menu' == $args->theme_location ) {
  if (in_array("menu-item-has-children", $item->classes)) {
    $output .='<span class="sub-menu-toggle"></span>';
  }
}
  return $output;
}

// Excerpt
//--------------------------------------------------------------------------*/

function newsophy_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function wpdocs_custom_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Comments Layout
//--------------------------------------------------------------------------*/
function newsophy_comment_form($arg,$class='btn-variant',$id='submit'){
    ob_start();
    comment_form($arg);
    $form = ob_get_clean();
    echo str_replace('id="submit"','id="'.$id.'"', $form);
}

function newsophy_list_comments($comment, $args, $depth){
  $path = get_template_directory() . '/parts/list-comments.php';
  if( is_file($path) ) require ($path);
}

function newsophy_enqueue_comments_reply() {
  if( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'comment_form_before', 'newsophy_enqueue_comments_reply' );


// Author Social Links
function newsophy_contactmethods( $contactmethods ) {

  $contactmethods['facebook']  = 'Facebook Link';
  $contactmethods['twitter']   = 'Twitter Link';
  $contactmethods['linkedin']  = 'Linkedin Link';
  $contactmethods['tumblr']    = 'Tumblr Link';
  $contactmethods['instagram'] = 'Instagram Link';
  $contactmethods['pinterest'] = 'Pinterest Link';

  return $contactmethods;
}
add_filter('user_contactmethods','newsophy_contactmethods',10,1);

//Social Share Info
function insert_og_image_in_head() {
  if (have_posts()) {
  global $post;
  if(has_post_thumbnail( $post->ID )) {
      $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'newsophy-big-thumb' );
      echo '<meta property="og:image" content="' . esc_html( $thumbnail_src[0] ) . '"/>';
    } 
  }  
}
add_action( 'wp_head', 'insert_og_image_in_head', 5 );

function insert_og_descr_in_head() {
  global $post;
    echo '<meta property="og:description" content="'. esc_attr(newsophy_excerpt(20)).'"/>';
}
add_action( 'wp_head', 'insert_og_descr_in_head', 5 );

// Related Posts
//--------------------------------------------------------------------------*/

add_filter( 'the_posts', function( $posts, \WP_Query $query )
{
    if( $pick = $query->get( '_shuffle_and_pick' ) )
    {
        shuffle( $posts );
        $posts = array_slice( $posts, 0, (int) $pick );
    }
    return $posts;
}, 10, 2 );


// Add Span Around Counts in Widgets
//--------------------------------------------------------------------------*/
if ( !function_exists('framec_cat_count_span') ) {
  function framec_cat_count_span( $links ) {
    $links = str_replace( '</a> (', '</a><span class="widget-count">(', $links );
    $links = str_replace( ')', ')</span>', $links );
    return $links;
  }
}
add_filter( 'wp_list_categories', 'framec_cat_count_span' );

if ( !function_exists('framec_archive_count_span') ) {
  function framec_archive_count_span( $links ) {
    $links = str_replace( '</a>&nbsp;(', '</a><span class="widget-count">(', $links );
    $links = str_replace( ')', ')</span>', $links );
    return $links;
  }
}
add_filter( 'get_archives_link', 'framec_archive_count_span' );


// Woocomerce
//--------------------------------------------------------------------------*/
if( class_exists('WooCommerce') ){
  
  add_action( 'after_setup_theme', 'newsophy_woocommerce_support' );
  function newsophy_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
  }

  function newsophy_add_to_cart_header( $fragments ) {
    ob_start(); ?>
    <?php if( WC()->cart->get_cart_contents_count() >= 0 ) : ?>
      <span class="cart-count"><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'newsophy' ), WC()->cart->get_cart_contents_count() ); ?></span>
    <?php endif; ?>
    <?php $fragments['span.cart-count'] = ob_get_clean(); return $fragments;
  }
  add_filter( 'woocommerce_add_to_cart_fragments', 'newsophy_add_to_cart_header' );

  function newsophy_related_products_args( $args ) {
    $args['posts_per_page'] = 4; // 4 related products
    $args['columns'] = 4; // arranged in 4 columns
    return $args;
  }
  add_filter( 'woocommerce_output_related_products_args', 'newsophy_related_products_args' );
  //move message to top
  remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );
  add_action( 'woocommerce_show_message', 'wc_print_notices', 10 );
  //remove add to cart button after item
  remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
  remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
    //Single product organize
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
  add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15 );
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
  add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 15 );
  remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
  //remove cart total under cross sell
  remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );
  remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}


if ( !function_exists('newsophy_get_products') ) {
    function newsophy_get_products( $args = array() ) {

      global $woocommerce, $wp_query;

        $args = wp_parse_args( $args, array(
          'categories' => array(),
          'product_type' => 'recent_product',
          'paged' => 1,
          'post_per_page' => -1,
          'orderby' => '',
          'order' => '',
          'includes' => array(),
          'excludes' => array(),
          'author' => '',
        ));
        extract($args);

        $query_args = array(
          'post_type' => 'product',
          'posts_per_page' => $post_per_page,
          'post_status' => 'publish'
        );

        switch ($product_type) {
          case 'best_selling':
            $query_args['meta_key']='total_sales';
            $query_args['orderby']='meta_value_num';
            $query_args['ignore_sticky_posts']   = 1;
            $query_args['meta_query'] = array();
            $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
            $query_args['meta_query'][] = $woocommerce->query->visibility_meta_query();
            break;
          case 'featured_product':
            $product_visibility_term_ids = wc_get_product_visibility_term_ids();
            $query_args['tax_query'][] = array(
                'taxonomy' => 'product_visibility',
                'field'    => 'term_taxonomy_id',
                'terms'    => $product_visibility_term_ids['featured'],
            );
            break;
          case 'top_rate':
            $query_args['meta_query'] = array();
            $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
            $query_args['meta_query'][] = $woocommerce->query->visibility_meta_query();
            break;
          case 'recent_product':
            $query_args['meta_query'] = array();
            $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
            break;
          case 'on_sale':
            $product_ids_on_sale    = wc_get_product_ids_on_sale();
            $product_ids_on_sale[]  = 0;
            $query_args['post__in'] = $product_ids_on_sale;
            break;            
        }

    $loop = new WP_Query($query_args);
    return $loop;

 }
}   


//Pagination

function newsophy_pagination($pages = '', $range = 2) {  
    $showitems = ($range * 2)+1;
    $out ='';

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '') {
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if(!$pages) {
        $pages = 1;
      }
    }
    
    if(1 != $pages) {
      if($paged > 1) {
        $out .= get_previous_posts_link('<i class="fa fa-angle-left"></i>');
      }
      
      for ($i=1; $i <= $pages; $i++) {
        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
          $out .= ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
        }
      }
      if ($paged < $pages) {
          $out .= get_next_posts_link('<i class="fa fa-angle-right"></i>');
        }
    }
    return '<nav class="navigation pagination"><div class="nav-links">'.$out.'</div></nav>';
}

function newsophy_pagination_type($secid) {
  $snum = str_replace('section-', '', $secid);
  $pagn_type = 'loadmore';
  if($pagn_type == 'loadmore' || $pagn_type == 'infinite') {
      wp_enqueue_script('infinite-scroll');
      $script = "var win = jQuery(window);
        var doc = jQuery(document);
        var Blogsec".$snum." = jQuery('#section-".$snum." .container .posts-wrap .blog-posts');

        doc.ready(function($){ 

            Blogsec".$snum.".infinitescroll({
            navSelector  : '#nav-".$secid.".page-nav .pagination', 
            nextSelector : '#nav-".$secid.".page-nav .pagination a',
            itemSelector : '.".$secid."', 
            history: true,
            scrollThreshold: true,
                loading: {
                  finishedMsg: '".esc_html__('No more items to load.', 'newsophy')."',
                  msgText: '<i class=\"icon-spin6\"></i>'
                },
              },  
            );
              $('a.loadmore".$snum."').click(function () {
                $(this).addClass('active');
                Blogsec".$snum.".infinitescroll('retrieve');
                return false;
            });
         });";
         if($pagn_type == 'loadmore') {
            $script .= "jQuery(document).ready(function(){
              Blogsec".$snum.";
              jQuery(window).unbind('.infscr');
           });";
         }
      
      wp_add_inline_script('infinite-scroll', $script);
  
      echo '<div class="hide pagination">'.get_next_posts_link().'</div>';
      if($pagn_type == 'loadmore') {
      echo '<div class="loadmore-container"><a href="#" class="loadmore'.$snum.' button"><span>'.esc_html__("Load More", "newsophy").'</span></a></div>';
      }
      else {echo newsophy_pagination();}
    } 
}

function newsophy_load_image($thumb_size, $postid) {
  if(has_post_thumbnail()){
  $thumbnail1 = wp_get_attachment_image_src(get_post_thumbnail_id($postid), "newsophy-tiny");
  $thumbnail2 = wp_get_attachment_image_src(get_post_thumbnail_id($postid), $thumb_size);
    echo '<div class="entry-image" data-interlace-src="'.esc_url($thumbnail2[0]).'" data-interlace-low="'.esc_url($thumbnail1[0]).'"></div>';
  }
}  

function trs_render_categories($class = 'absolute') {
  $categories = get_the_category();
  if(empty($categories)) return;
  $html = '<div class="tags '.$class.'">';
  $i = 0;
  $limit = 2;
  foreach($categories as $c){
      if( $i == $limit ) break;
      $html .= '<a href="'.get_category_link($c).'" class="tag-link-'.$c->term_id.'">'.$c->name.'</a>';
      $i++;
  }
  $html .= '</div>';
  return $html;
}

function trs_render_single_categories($class = 'absolute') {
  $categories = get_the_category();
  if(empty($categories)) return;
  $html = '<div class="tags '.$class.'">';
  $i = 0;
  foreach($categories as $c){
      $html .= '<a href="'.get_category_link($c).'" class="tag-link-'.$c->term_id.'">'.$c->name.'</a>';
      $i++;
  }
  $html .= '</div>';
  return $html;
}

function trs_render_singlecat($class = 'absolute') {
  if (is_category()) {
    $categs = get_the_category();

    $html = '<div class="tags '.$class.'">';
    $html .= '<h1 class="tag-link-'.$categs[0]->term_id.'">'.single_cat_title( '', false ).'</h1>';
    $html .= '</div>';
    return $html;
  }
}

function newsophy_theme_option() {
  global $newsophy_option;
  return $newsophy_option;
};