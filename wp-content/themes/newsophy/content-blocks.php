      <?php
        $stl_class = get_theme_mod('newsophy_block_style');
        $blocks = get_theme_mod('newsophy_blocknum', 5);
      ?>
    
    <?php
    for ($x = 1; $x <= $blocks; $x++) {
      if ( $x == 1 ) { 
        ${'catid_'.$x} = get_theme_mod('newsophy_block_cat_'.$x, 'all'); 
        ${'secside_'.$x} = get_theme_mod('newsophy_sidebar_'.$x, 'sidebar-1');
      }
      else { 
        ${'catid_'.$x} = get_theme_mod('newsophy_block_cat_'.$x, 'none'); 
        ${'secside_'.$x} = get_theme_mod('newsophy_sidebar_'.$x, 'none');
      }
      ${'tagid_'.$x} = get_theme_mod('newsophy_block_tag_'.$x, 'all');
      ${'secid_'.$x} = $x;
      ${'sectitle_'.$x} = get_theme_mod('newsophy_block_title_'.$x);
      ${'bclass_'.$x} = get_theme_mod('newsophy_block_style_'.$x, 'one-fr');
      ${'postsnum_'.$x} = get_theme_mod('newsophy_potsnum_'.$x);
      ${'showmore_'.$x} = get_theme_mod('newsophy_show_more_'.$x, true);
      ${'categ_'.$x} = get_theme_mod('newsophy_show_cat_'.$x, true);
      ${'author_'.$x} = get_theme_mod('newsophy_block_author_'.$x, true);
      ${'avatar_'.$x} = get_theme_mod('newsophy_block_avatar_'.$x, true);
      ${'date_'.$x} = get_theme_mod('newsophy_block_date_'.$x, true);
      ${'comments_'.$x} = get_theme_mod('newsophy_block_comments_'.$x, true);
      ${'exc_'.$x} = get_theme_mod('newsophy_block_excerpt_'.$x, true);

      if (${'catid_'.$x} != 'none') {
        Get_Posts_From_Cats(${'catid_'.$x}, ${'secside_'.$x}, ${'tagid_'.$x}, ${'secid_'.$x}, ${'sectitle_'.$x}, ${'bclass_'.$x}, ${'postsnum_'.$x},  ${'showmore_'.$x}, ${'categ_'.$x}, ${'author_'.$x}, ${'avatar_'.$x}, ${'date_'.$x}, ${'comments_'.$x}, ${'exc_'.$x});
      }
   }

  ?>
    <?php
     function Get_Posts_From_Cats($catid, $secside, $tagid, $secid, $sectitle, $stl_class, $postsnum, $showmore, $categ, $author, $avatar, $date, $comments, $exc) { 
    ?> 
    <div id="section-<?php echo esc_attr($secid) ?>" class="posts-sec<?php if ($secside != 'none') : ?> has-sidebar<?php endif;?>">
      
      <div class="container">
        <?php if($sectitle) : ?>
          <div class="section-title">
            <h1><?php echo esc_attr($sectitle); ?></h1>
          </div>
        <?php endif; ?>
        <div class="posts-wrap">
          <div id="<?php echo esc_attr($secid) ?>" class="blog-posts <?php echo esc_attr($stl_class) ?>">
            <?php

            if(get_theme_mod('newsophy_feat_exclude', true)) {
                
              if (!get_theme_mod('newsophy_feat_latest')){

                $exclude_feat = get_posts(array(
                'numberposts'    => 4, // get all posts.
                'meta_query'     => array(
                  array(
                    'post_type'   => 'post',
                    'field'     => 'id',
                    'terms'     => 4,
                    'key'   => 'newsophy_feat_post',
                    'value' => true
                  ),
                ),
                'fields' => 'ids', // Only get post IDs
               ));
            }
            else {
              $exclude_feat = get_posts(array(
                'numberposts'      => 4,
                'meta_query'       => array(
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'post',
                'terms'            => 4,
                'suppress_filters' => true,
                ),
                'fields' => 'ids', // Only get post IDs
            ));
          } 

        } 

        $exclude_pick = ''; 

            if(get_theme_mod('newsophy_pick_exclude', true)) {
              if (!get_theme_mod('newsophy_pick_latest')){
                $exclude_pick = get_posts(array(
                'numberposts'    => -1, // get all posts.
                'meta_query'     => array(
                  array(
                    'post_type'  => 'post',
                    'field'      => 'id',
                    'terms'      => 6,
                    'key'        => 'newsophy_picked_post',
                    'value'      => true
                  ),
                ),
                'fields' => 'ids', // Only get post IDs
               ));
              }
              else {
                $exclude_pick = get_posts(array(
                  'numberposts'      => 6,
                  'meta_query'       => array(
                  'orderby'          => 'post_date',
                  'order'            => 'DESC',
                  'post_type'        => 'post',
                  'terms'     => 6,
                  'suppress_filters' => true,
                  ),
                  'fields' => 'ids', // Only get post IDs
              ));
          } 
             }


            if ($exclude_feat) {
              $exclude_post = $exclude_feat;
            }
            if ($exclude_pick) {
              $exclude_post = $exclude_pick;
            }
            if ($exclude_feat && $exclude_pick ) {
              $exclude_post = array_merge($exclude_feat, $exclude_pick);
            }

             // id by slug
             $cat = get_category_by_slug($catid); 
             if(isset($cat->term_id)){
               $catid = $cat->term_id;
             } 

             if($tagid == 'all'){ $tagid = ''; } 

             // the query

            if ($catid == 'all') {
              $args = array(
                'posts_per_page' => $postsnum,
                'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
                'post_type' => 'post',
                'post_status'  => 'publish',
                'tag' => $tagid,
                'ignore_sticky_posts' => true, 
                'post__not_in'  => $exclude_post,
              );
             }
             else {
              $args = array(
                'posts_per_page' => $postsnum,
                'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
                'cat' => $catid,
                'tag' => $tagid,
                'post__not_in'  => $exclude_post,
              );
             }
              global $wp_query;
              query_posts( $args );
              ?>
              <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); 
                  set_query_var( 'my_var_name', $secid );
                  ?>
                  <?php get_template_part('content','grid',   array( 
                    'data'  => array(
                      'excerpt'  => $exc,
                      'categ'    => $categ,
                      'author'   => $author,
                      'avatar'   => $avatar,
                      'date'     => $date,
                      'comments' => $comments
                    )) 
                  ); ?>
                <?php endwhile; ?>
              <?php endif; 
              ?>
          </div>

          <?php if($showmore) : ?>
            <div id="nav-<?php echo esc_attr($secid) ?>" class="page-nav">
            <?php newsophy_pagination_type($secid); ?>
          </div>
        <?php endif; ?>
       
        </div>
        <aside class="sidebar">
          <div class="sidebar-container">
            <?php if (!function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar($secside)) ?>
         </div>   
        </aside>
      </div>
      </div>
   <?php } ?>