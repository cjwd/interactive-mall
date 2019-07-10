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