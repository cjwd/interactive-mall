<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://chinarajames.com
 * @since      1.0.0
 *
 * @package    Imm
 * @subpackage Imm/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Imm
 * @subpackage Imm/includes
 * @author     Chinara James <cjwd@chinarajames.com>
 */
class Imm {

  /**
   * The loader that's responsible for maintaining and registering all hooks that power
   * the plugin.
   *
   * @since    1.0.0
   * @access   protected
   * @var      Imm_Loader    $loader    Maintains and registers all hooks for the plugin.
   */
  protected $loader;

  /**
   * The unique identifier of this plugin.
   *
   * @since    1.0.0
   * @access   protected
   * @var      string    $plugin_name    The string used to uniquely identify this plugin.
   */
  protected $plugin_name;

  /**
   * The current version of the plugin.
   *
   * @since    1.0.0
   * @access   protected
   * @var      string    $version    The current version of the plugin.
   */
  protected $version;

  /**
   * Define the core functionality of the plugin.
   *
   * Set the plugin name and the plugin version that can be used throughout the plugin.
   * Load the dependencies, define the locale, and set the hooks for the admin area and
   * the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function __construct() {
    if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
      $this->version = PLUGIN_NAME_VERSION;
    } else {
      $this->version = '1.0.0';
    }
    $this->plugin_name = 'imm';

    $this->load_dependencies();
    $this->set_locale();
    $this->define_admin_hooks();
    $this->define_public_hooks();

  }

  /**
   * Load the required dependencies for this plugin.
   *
   * Include the following files that make up the plugin:
   *
   * - Imm_Loader. Orchestrates the hooks of the plugin.
   * - Imm_i18n. Defines internationalization functionality.
   * - Imm_Admin. Defines all hooks for the admin area.
   * - Imm_Public. Defines all hooks for the public side of the site.
   *
   * Create an instance of the loader which will be used to register the hooks
   * with WordPress.
   *
   * @since    1.0.0
   * @access   private
   */
  private function load_dependencies() {

    /**
     * The class responsible for orchestrating the actions and filters of the
     * core plugin.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-imm-loader.php';

    /**
     * The class responsible for defining internationalization functionality
     * of the plugin.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-imm-i18n.php';

    /**
     * The class responsible for loading and overriding templates
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-imm-template-loader.php';

    /**
     *  Template Tags
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/functions/settings-functions.php';
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/functions/template-functions.php';


    /**
     *  Widget
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/widgets/class-imm-widget-store-list.php';

    /**
     * The class responsible for defining all actions that occur in the admin area.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-imm-admin.php';

    /**
     * The class responsible for defining all actions that occur in the public-facing
     * side of the site.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-imm-public.php';

    $this->loader = new Imm_Loader();

  }

  /**
   * Define the locale for this plugin for internationalization.
   *
   * Uses the Imm_i18n class in order to set the domain and to register the hook
   * with WordPress.
   *
   * @since    1.0.0
   * @access   private
   */
  private function set_locale() {

    $plugin_i18n = new Imm_i18n();

    $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

  }

  /**
   * Register all of the hooks related to the admin area functionality
   * of the plugin.
   *
   * @since    1.0.0
   * @access   private
   */
  private function define_admin_hooks() {

    $plugin_admin = new Imm_Admin( $this->get_plugin_name(), $this->get_version() );

    $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
    $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
    $this->loader->add_action( 'init', $plugin_admin, 'imm_register_meta' );
    $this->loader->add_action( 'init', $plugin_admin, 'imm_register_store_template' );

    $this->loader->add_action( 'enqueue_block_editor_assets', $plugin_admin, 'enqueue_block_editor_scripts' );
    $this->loader->add_action( 'enqueue_block_assets', $plugin_admin, 'enqueue_block_editor_styles' );

    $this->loader->add_action( 'admin_init', $plugin_admin, 'imm_settings_init' );
    $this->loader->add_action( 'admin_menu', $plugin_admin, 'imm_settings_page' );

    $this->loader->add_action( 'init', $plugin_admin, 'imm_store_post_type', 0);
    $this->loader->add_action( 'init', $plugin_admin, 'imm_deal_post_type', 0);

    $this->loader->add_action( 'init', $plugin_admin, 'imm_store_category_taxonomy', 0);

    $this->loader->add_action( 'widgets_init', $plugin_admin, 'imm_register_widget_store_list' );

  }

  /**
   * Register all of the hooks related to the public-facing functionality
   * of the plugin.
   *
   * @since    1.0.0
   * @access   private
   */
  private function define_public_hooks() {

    $plugin_public = new Imm_Public( $this->get_plugin_name(), $this->get_version() );

    // Styles and Scripts
    $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
    $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

    // Locate Templates
    $this->loader->add_filter('template_include', $plugin_public, 'find_template');
    $this->loader->add_filter('template_include', $plugin_public, 'find_tax_template');
    $this->loader->add_filter('template_include', $plugin_public, 'locate_directory_template');

    // Shortcodes
    $this->loader->add_shortcode('imm_stores', $plugin_public, 'imm_stores_shortcode');

    // Content Wrapper
    $this->loader->add_action( 'imm_before_main_content', $plugin_public, 'output_content_wrapper' );
    $this->loader->add_action( 'imm_after_main_content', $plugin_public, 'output_content_wrapper_end' );

  }

  /**
   * Run the loader to execute all of the hooks with WordPress.
   *
   * @since    1.0.0
   */
  public function run() {
    $this->loader->run();
  }

  /**
   * The name of the plugin used to uniquely identify it within the context of
   * WordPress and to define internationalization functionality.
   *
   * @since     1.0.0
   * @return    string    The name of the plugin.
   */
  public function get_plugin_name() {
    return $this->plugin_name;
  }

  /**
   * The reference to the class that orchestrates the hooks with the plugin.
   *
   * @since     1.0.0
   * @return    Imm_Loader    Orchestrates the hooks of the plugin.
   */
  public function get_loader() {
    return $this->loader;
  }

  /**
   * Retrieve the version number of the plugin.
   *
   * @since     1.0.0
   * @return    string    The version number of the plugin.
   */
  public function get_version() {
    return $this->version;
  }

}
