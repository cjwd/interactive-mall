<?php

/**
 *
 * Functions for the templating system.
 * @version  1.0.0
 */

defined( 'ABSPATH' ) || exit;

function imm_get_template_part($slug, $name='', $data = null) {
  global $post;
  $template_loader = new IMM_Template_Loader;

  if( $name ) {
    $template = $template_loader->locate_template( $slug . '-' . $name . '.php');
    include $template;
  } else {
    $template = $template_loader->locate_template( $slug . '.php');
    include $template;
  }
}


function imm_directory( $args = []) {
  $template_names = [
    'directory.php'
  ];

  if ( ! empty( $args['view'] ) ) {
    if ( 'grid' == $args['view'] ) {
      $template_names = array_merge(['directory-grid.php'], $template_names);
    }

  }

  $template_loader = new IMM_Template_Loader;
  $template = $template_loader->locate_template( $template_names );

  include $template;
}


function get_icon_spritesheet() {
  $template_loader = new IMM_Template_Loader;
  $template_loader->get_template_part( 'partials/icons' );
  return ob_get_clean();
}


function imm_store_list( $atts ) {
  $template_loader = new IMM_Template_Loader;
  ob_start();
  $template_loader
    ->set_template_data($atts, 'atts')
    ->get_template_part( 'stores' );
  return ob_get_clean();

}


function gcm_display_stores_list( $atts, $view = 'grid' ) {
  $template_loader = new IMM_Template_Loader;

  $template_part = ('list' == $view) ? 'store-list' : 'store-grid';

  ob_start();
  $template_loader
    ->set_template_data( $atts, 'atts')
    ->get_template_part($template_part);
  echo ob_get_clean();
}


function addZero($string, $num = 1) {
  if( strlen(substr(strrchr($string, "."), 1)) == $num) {
    echo sprintf("%0.2f",$string);
  } else {
    echo $string;
  }
}


/**
 * Custom Post Pagination
 *
 * @param string $num_pages
 * @param string $paged
 * @param integer $page_range
 * @return void
 */
function posts_pagination( $num_pages = '', $format='', $paged='', $page_range = 2 ) {

  /**
   * Fallback for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * Good because we can override default pagination
   * in our theme, and use this function in default queries
   * and custom queries.
   */
  global $paged;

  if( empty($paged) ) {
    $paged = 1;
  }

  if( $num_pages == '' ) {
    global $wp_query;
    $num_pages = $wp_query->max_num_pages;

    if( !$num_pages ) {
      $num_pages = 1;
    }
  }

  /** End Fallback **/

  if( empty($format) ) {
    $format = 'page/%#%';
  }

  /**
   * Construct the pagination arguments for WordPress' paginate_links
   * function.
   */
  $pagination_args = array(
    'base'                => get_pagenum_link(1) . '%_%',
    'format'              => $format,
    'total'               => $num_pages,
    'current'             => $paged,
    'show_all'            => false,
    'end_size'            => 1,
    'mid_size'            => $page_range,
    'prev_next'           => true,
    'prev_text'           => __('&laquo; Previous', 'beat'),
    'next_text'           => __('Next &raquo;', 'beat'),
    'type'                => 'array',
    'add_args'            => false,
    'add_fragment'        => '',
    'before_page_number'  => '',
    'after_page_number'   => '<span class="page-number-divider">/</span>'
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='c-pagination'>";
      echo "<ul class='c-pagination__list'>";
        foreach( $paginate_links as $link ) {
          if(strpos($link, 'prev') !== false) {
            $next_prev_class = 'prevlink';
          } elseif(strpos($link, 'next') !== false) {
            $next_prev_class = 'nextlink';
          } else {
            $next_prev_class = '';
          }

          echo "<li class='o-list-inline__item " .$next_prev_class . "'>" . $link . "</li>";

        }
      echo "</ul>";
    echo "</nav>";
  }
}