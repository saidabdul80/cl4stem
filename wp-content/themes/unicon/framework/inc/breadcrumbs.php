<?php
/*-----------------------------------------------------------------------------------*/
/*  Breadcrumbs Function based on Dimox
    Source: http://dimox.net/wordpress-breadcrumbs-without-a-plugin/ */
/*-----------------------------------------------------------------------------------*/

function minti_breadcrumbs() {
  
  /* Options */
  $text['home']     = get_bloginfo('name'); // text for the 'Home' link
  $text['category'] = __( 'Archive by Category %s', 'unicon' ); // text for a category page
  $text['search']   = __( 'Search Results for %s Query', 'unicon' ); // text for a search results page
  $text['tag']      = __( 'Posts Tagged %s', 'unicon' ); // text for a tag page
  $text['author']   = __( 'Articles Posted by %s', 'unicon' ); // text for an author page
  $text['404']      = __( 'Error 404', 'unicon' ); // text for the 404 page
  $text['page']     = __( 'Page %s', 'unicon' ); // text 'Page N'
  $text['cpage']    = __( 'Comment Page %s', 'unicon' ); // text 'Comment Page N'

  $show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
  $show_current   = 1; // 1 - show current page title, 0 - don't show
  $show_last_sep  = 1; // 1 - show last separator, when current page title is not displayed, 0 - don't show

  global $post;
  $home_url       = home_url('/');
  $link           = '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a class="breadcrumbs__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a><meta itemprop="position" content="%3$s" /></span>';
  $parent_id      = ( $post ) ? $post->post_parent : '';
  //sprintf( $link, $home_url, $text['home'], 1 )      = sprintf( $link, $home_url, $text['home'], 1 );

  if ( is_home() || is_front_page() ) {

    if ( $show_on_home ) echo '<div id="crumbs" class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">' . sprintf( $link, $home_url, $text['home'], 1 ) . '</div><!-- .breadcrumbs -->';

  } else {

    $position = 0;

    echo '<div id="crumbs" class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';

    if ( $show_home_link ) {
      $position += 1;
      echo sprintf( $link, $home_url, $text['home'], 1 );
    }

    if ( is_category() ) {
      $parents = get_ancestors( get_query_var('cat'), 'category' );
      foreach ( array_reverse( $parents ) as $cat ) {
        $position += 1;
        if ( $position > 1 ) echo '<span class="breadcrumbs__separator"> / </span>';
        echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
      }
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        $cat = get_query_var('cat');
        echo '<span class="breadcrumbs__separator"> / </span>' . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
        echo '<span class="breadcrumbs__separator"> / </span>' . '<span class="breadcrumbs__current">' . sprintf( $text['page'], get_query_var( 'paged' ) ) . '</span>';
      } else {
        if ( $show_current ) {
          if ( $position >= 1 ) echo '<span class="breadcrumbs__separator"> / </span>';
          echo '<span class="breadcrumbs__current">' . sprintf( $text['category'], single_cat_title( '', false ) ) . '</span>';
        } elseif ( $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';
      }

    } elseif ( is_search() ) {
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        if ( $show_home_link ) echo '<span class="breadcrumbs__separator"> / </span>';
        echo sprintf( $link, $home_url . '?s=' . get_search_query(), sprintf( $text['search'], get_search_query() ), $position );
        echo '<span class="breadcrumbs__separator"> / </span>' . '<span class="breadcrumbs__current">' . sprintf( $text['page'], get_query_var( 'paged' ) ) . '</span>';
      } else {
        if ( $show_current ) {
          if ( $position >= 1 ) echo '<span class="breadcrumbs__separator"> / </span>';
          echo '<span class="breadcrumbs__current">' . sprintf( $text['search'], get_search_query() ) . '</span>';
        } elseif ( $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';
      }

    } elseif ( is_year() ) {
      if ( $show_home_link && $show_current ) echo '<span class="breadcrumbs__separator"> / </span>';
      if ( $show_current ) echo '<span class="breadcrumbs__current">' . get_the_time('Y') . '</span>';
      elseif ( $show_home_link && $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';

    } elseif ( is_month() ) {
      if ( $show_home_link ) echo '<span class="breadcrumbs__separator"> / </span>';
      $position += 1;
      echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
      if ( $show_current ) echo '<span class="breadcrumbs__separator"> / </span>' . '<span class="breadcrumbs__current">' . get_the_time('F') . '</span>';
      elseif ( $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';

    } elseif ( is_day() ) {
      if ( $show_home_link ) echo '<span class="breadcrumbs__separator"> / </span>';
      $position += 1;
      echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . '<span class="breadcrumbs__separator"> / </span>';
      $position += 1;
      echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
      if ( $show_current ) echo '<span class="breadcrumbs__separator"> / </span>' . '<span class="breadcrumbs__current">' . get_the_time('d') . '</span>';
      elseif ( $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';

    } elseif ( is_single() && ! is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $position += 1;
        $post_type = get_post_type_object( get_post_type() );
        if ( $position > 1 ) echo '<span class="breadcrumbs__separator"> / </span>';
        echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
        if ( $show_current ) echo '<span class="breadcrumbs__separator"> / </span>' . '<span class="breadcrumbs__current">' . get_the_title() . '</span>';
        elseif ( $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';
      } else {
        $cat = get_the_category(); $catID = $cat[0]->cat_ID;
        $parents = get_ancestors( $catID, 'category' );
        $parents = array_reverse( $parents );
        $parents[] = $catID;
        foreach ( $parents as $cat ) {
          $position += 1;
          if ( $position > 1 ) echo '<span class="breadcrumbs__separator"> / </span>';
          echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
        }
        if ( get_query_var( 'cpage' ) ) {
          $position += 1;
          echo '<span class="breadcrumbs__separator"> / </span>' . sprintf( $link, get_permalink(), get_the_title(), $position );
          echo '<span class="breadcrumbs__separator"> / </span>' . '<span class="breadcrumbs__current">' . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . '</span>';
        } else {
          if ( $show_current ) echo '<span class="breadcrumbs__separator"> / </span>' . '<span class="breadcrumbs__current">' . get_the_title() . '</span>';
          elseif ( $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';
        }
      }

    } elseif ( is_post_type_archive() ) {
      $post_type = get_post_type_object( get_post_type() );
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        if ( $position > 1 ) echo '<span class="breadcrumbs__separator"> / </span>';
        echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
        echo '<span class="breadcrumbs__separator"> / </span>' . '<span class="breadcrumbs__current">' . sprintf( $text['page'], get_query_var( 'paged' ) ) . '</span>';
      } else {
        if ( $show_home_link && $show_current ) echo '<span class="breadcrumbs__separator"> / </span>';
        if ( $show_current ) echo '<span class="breadcrumbs__current">' . $post_type->label . '</span>';
        elseif ( $show_home_link && $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';
      }

    } elseif ( is_attachment() ) {
      $parent = get_post( $parent_id );
      $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
      $parents = get_ancestors( $catID, 'category' );
      $parents = array_reverse( $parents );
      $parents[] = $catID;
      foreach ( $parents as $cat ) {
        $position += 1;
        if ( $position > 1 ) echo '<span class="breadcrumbs__separator"> / </span>';
        echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
      }
      $position += 1;
      echo '<span class="breadcrumbs__separator"> / </span>' . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
      if ( $show_current ) echo '<span class="breadcrumbs__separator"> / </span>' . '<span class="breadcrumbs__current">' . get_the_title() . '</span>';
      elseif ( $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';

    } elseif ( is_page() && ! $parent_id ) {
      if ( $show_home_link && $show_current ) echo '<span class="breadcrumbs__separator"> / </span>';
      if ( $show_current ) echo '<span class="breadcrumbs__current">' . get_the_title() . '</span>';
      elseif ( $show_home_link && $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';

    } elseif ( is_page() && $parent_id ) {
      $parents = get_post_ancestors( get_the_ID() );
      foreach ( array_reverse( $parents ) as $pageID ) {
        $position += 1;
        if ( $position > 1 ) echo '<span class="breadcrumbs__separator"> / </span>';
        echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
      }
      if ( $show_current ) echo '<span class="breadcrumbs__separator"> / </span>' . '<span class="breadcrumbs__current">' . get_the_title() . '</span>';
      elseif ( $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';

    } elseif ( is_tag() ) {
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        $tagID = get_query_var( 'tag_id' );
        echo '<span class="breadcrumbs__separator"> / </span>' . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
        echo '<span class="breadcrumbs__separator"> / </span>' . '<span class="breadcrumbs__current">' . sprintf( $text['page'], get_query_var( 'paged' ) ) . '</span>';
      } else {
        if ( $show_home_link && $show_current ) echo '<span class="breadcrumbs__separator"> / </span>';
        if ( $show_current ) echo '<span class="breadcrumbs__current">' . sprintf( $text['tag'], single_tag_title( '', false ) ) . '</span>';
        elseif ( $show_home_link && $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';
      }

    } elseif ( is_author() ) {
      $author = get_userdata( get_query_var( 'author' ) );
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        echo '<span class="breadcrumbs__separator"> / </span>' . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
        echo '<span class="breadcrumbs__separator"> / </span>' . '<span class="breadcrumbs__current">' . sprintf( $text['page'], get_query_var( 'paged' ) ) . '</span>';
      } else {
        if ( $show_home_link && $show_current ) echo '<span class="breadcrumbs__separator"> / </span>';
        if ( $show_current ) echo '<span class="breadcrumbs__current">' . sprintf( $text['author'], $author->display_name ) . '</span>';
        elseif ( $show_home_link && $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';
      }

    } elseif ( is_404() ) {
      if ( $show_home_link && $show_current ) echo '<span class="breadcrumbs__separator"> / </span>';
      if ( $show_current ) echo '<span class="breadcrumbs__current">' . $text['404'] . '</span>';
      elseif ( $show_last_sep ) echo '<span class="breadcrumbs__separator"> / </span>';

    } elseif ( has_post_format() && ! is_singular() ) {
      if ( $show_home_link && $show_current ) echo '<span class="breadcrumbs__separator"> / </span>';
      echo get_post_format_string( get_post_format() );
    }

    echo '</div><!-- .breadcrumbs -->';

  }

}
