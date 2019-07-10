<?php

if ( ! class_exists( 'Gamajo_Template_Loader' ) ) {
  require plugin_dir_path( __DIR__ ) . '/lib/class-gamajo-template-loader.php';
}

class IMM_Template_Loader extends Gamajo_Template_Loader {
  protected $filter_prefix = 'imm';

  protected $theme_template_directory = 'imm';

  protected $plugin_directory = IMM_PLUGIN_DIR;

  protected $plugin_template_directory = 'templates';
}