<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://chinarajames.com
 * @since      1.0.0
 *
 * @package    Imm
 * @subpackage Imm/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Imm
 * @subpackage Imm/public
 * @author     Chinara James <cjwd@chinarajames.com>
 */
class Imm_Public {

  /**
   * The ID of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $plugin_name    The ID of this plugin.
   */
  private $plugin_name;

  /**
   * The version of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $version    The current version of this plugin.
   */
  private $version;

  /**
   * Initialize the class and set its properties.
   *
   * @since    1.0.0
   * @param      string    $plugin_name       The name of the plugin.
   * @param      string    $version    The version of this plugin.
   */
  public function __construct( $plugin_name, $version ) {

    $this->plugin_name = $plugin_name;
    $this->version = $version;

  }

  /**
   * Register the stylesheets for the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function enqueue_styles() {

    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/imm-public.css', array(), $this->version, 'all' );

  }

  /**
   * Register the JavaScript for the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function enqueue_scripts() {

    wp_enqueue_script( 'list-js', plugin_dir_url( __FILE__ ) . 'js/lib/list.min.js', null, '1.5.0', false );
    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/imm-public.js', array( 'jquery' ), $this->version, false );

  }

  /**
   * Load templates for store CPT from the plugin, if none
   * available in the appropriate theme directory
   *
   * Hooked into template_include
   *
   * @param string $template
   * @return void
   * @link https://www.ibenic.com/include-or-override-wordpress-templates/
   */
  public function find_template( $template ) {
    $new_template = '';

    $my_post_types = array( 'imm_store' );

    if( ! is_singular( $my_post_types) && ! is_post_type_archive( $my_post_types ) ){
      return $template;
    }

    if( is_singular('imm_store') ) {
      $new_template = 'single-store.php';
    }

    if( is_post_type_archive('imm_store') ) {
      $new_template = 'archive-store.php';
    }


    if( $theme_template = locate_template('imm/' . $new_template ) ) {
      return $theme_template;
    } else {
      $plugin_template = IMM_PLUGIN_TEMPLATE_DIR . $new_template;

      if( file_exists( $plugin_template ) ) {
        return $plugin_template;
      }
    }

    return $template;
  }

  /**
   * Load templates for store taxonomy archive pages from the plugin, if none
   * available in the appropriate theme directory
   *
   * Hooked into template_include
   *
   * @param string $template
   * @return void
   * @link https://www.ibenic.com/include-or-override-wordpress-templates/
   */
  public function find_tax_template( $template ) {
    $new_template = '';

    $my_taxonomies = array( 'imm_store_category' );

    if( ! is_tax( $my_taxonomies) ) {
      return $template;
    }

    if( is_tax('imm_store_category') ) {
      $new_template = 'taxonomy.php';
    }

    if( $theme_template = locate_template('imm/' . $new_template ) ) {
      return $theme_template;
    } else {
      $plugin_template = IMM_PLUGIN_TEMPLATE_DIR . $new_template;

      if( file_exists( $plugin_template ) ) {
        return $plugin_template;
      }
    }

    return $template;
  }

  public function locate_directory_template( $template ) {
    $new_template = '';
    $mall_page = get_option('imm_options')['mallpage'];

    /**
     * @todo Page ID should not be hardcoded
     * Add Option for Mall Page
     */
    if( ! is_page( $mall_page ) ){
      return $template;
    }

    if( is_page( $mall_page ) ) {
      $new_template = 'mall.php';
    }

    if( $theme_template = locate_template('imm/' . $new_template ) ) {
      return $theme_template;
    } else {
      $plugin_template = IMM_PLUGIN_TEMPLATE_DIR . $new_template;

      if( file_exists( $plugin_template ) ) {
        return $plugin_template;
      }
    }

    return $template;
  }


  /**
   * Hook for imm_stores shortcode tag
   *
   * @param array $atts
   * @return void
   */
  public function imm_stores_shortcode($atts = []) {
    $atts = array_change_key_case((array)$atts, CASE_LOWER);

    $atts = shortcode_atts([
      'title' => '',
      'num_stores'  => '3',
      'map' => 'false',
      'size' => 'false',
      'floor' => 'false',
      'image' => 'true',
      'description'  => 'false',
      'show_categories' => 'false',
      'btn_text' => _x('View Store', 'imm'),
      'btn_url' =>  '',
      'link_text' =>  _x('View All', 'imm'),
      'link_url'  =>  '',
      'view'  => 'grid',
      'categories' => '',
      'exclude_categories' => '',
      'show_pagination' => 'true'
    ], $atts, 'imm_stores');

    $template_loader = new IMM_Template_Loader;
    ob_start();
    $template_loader
      ->set_template_data($atts, 'atts')
      ->get_template_part( 'stores' );
    return ob_get_clean();

  }


  /**
   * Hook for imm_deals shortcode tag
   *
   * @param array $atts
   * @return void
   */
  public function imm_deals_shortcode($atts = []) {
    $atts = array_change_key_case((array)$atts, CASE_LOWER);

    $atts = shortcode_atts([
      'title' => '',
      'num_deals'  => '3',
      'show_image' => 'true',
      'show_description'  => 'false',
      'show_categories' => 'false',
      'btn_text' => _x('Deal Details', 'imm'),
      'btn_url' =>  '',
      'link_text' =>  _x('View All Deals', 'imm'),
      'link_url'  =>  '',
      'view'  => 'grid',
      'categories' => '',
      'exclude_categories' => '',
      'show_pagination' => 'true'
    ], $atts, 'imm_deals');

    $template_loader = new IMM_Template_Loader;
    ob_start();
    $template_loader
      ->set_template_data($atts, 'atts')
      ->get_template_part( 'deals' );
    return ob_get_clean();

  }

  /**
   * Parse token variables in enclosing shortcode tags and replace with appropriate markup
   *
   * @param array $keys Key Value pairs of token and markup
   * @param string $content Shortcode content
   * @return void
   */
  private function imm_parser($keys, $content) {
    $opening_tag = '{';
    $closing_tag = '}';
    $pattern = '/{[^}]*}/';
    $parsed = $content;
    foreach ($keys as $key => $markup) {
      $parsed = str_replace( $opening_tag . $key . $closing_tag, $markup, $parsed );
    }
    return $parsed;
  }

  public function output_content_wrapper() {
    echo '<div class="container"><div id="content-area" class="clearfix">';
  }

  public function output_content_wrapper_end() {
    echo '</div></div>';
  }

  public function imm_get_sidebar() {
    imm_get_template('global/sidebar.php');
  }

} // End Class Imm_Public
