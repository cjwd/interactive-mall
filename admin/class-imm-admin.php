<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://chinarajames.com
 * @since      1.0.0
 *
 * @package    Imm
 * @subpackage Imm/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Imm
 * @subpackage Imm/admin
 * @author     Chinara James <cjwd@chinarajames.com>
 */
class Imm_Admin {

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
   * @param      string    $plugin_name       The name of this plugin.
   * @param      string    $version    The version of this plugin.
   */
  public function __construct( $plugin_name, $version ) {

    $this->plugin_name = $plugin_name;
    $this->version = $version;

  }

  /**
   * Register the stylesheets for the admin area.
   *
   * @since    1.0.0
   */
  public function enqueue_styles() {

    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/imm-admin.css', array(), $this->version, 'all' );

  }

  public function enqueue_block_editor_styles() {
    wp_enqueue_style(
      $this->plugin_name . '_block-styles',
      plugin_dir_url( __FILE__ ) . 'css/imm-admin.css',
      array(),
      $this->version, 'all'
    );
  }

  /**
   * Register the JavaScript for the admin area.
   *
   * @since    1.0.0
   */
  public function enqueue_scripts() {

    wp_enqueue_media();
    wp_enqueue_code_editor( array( 'type' => 'text/html' ) );

    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/imm-admin.js', array( 'jquery', 'wp-util' ), $this->version, false );

  }

  /**
   * Register the Guternberg Editor dependencies
   *
   * @since    1.0.0
   */
  public function enqueue_block_editor_scripts() {
    wp_enqueue_script(
        $this->plugin_name . '_block_scripts',
        plugin_dir_url( __FILE__ ) . 'js/editor.js',
        ['wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n', 'wp-plugins', 'wp-edit-post']
    );
  }


  /**
   * Registers store custom post type
   *
   * @since    1.0.0
   */
  function imm_store_post_type() {

    if ( post_type_exists('imm_store') ) {
      return;
    }

    $labels = array(
      'name'                  => _x( 'Stores', 'Post Type General Name', 'imm' ),
      'singular_name'         => _x( 'Store', 'Post Type Singular Name', 'imm' ),
      'menu_name'             => __( 'Stores', 'imm' ),
      'name_admin_bar'        => __( 'Store', 'imm' ),
      'archives'              => __( 'Store Archives', 'imm' ),
      'attributes'            => __( 'Store Attributes', 'imm' ),
      'parent_item_colon'     => __( 'Parent Store:', 'imm' ),
      'all_items'             => __( 'All Stores', 'imm' ),
      'add_new_item'          => __( 'Add New Store', 'imm' ),
      'add_new'               => __( 'Add New', 'imm' ),
      'new_item'              => __( 'New Store', 'imm' ),
      'edit_item'             => __( 'Edit Store', 'imm' ),
      'update_item'           => __( 'Update Store', 'imm' ),
      'view_item'             => __( 'View Store', 'imm' ),
      'view_items'            => __( 'View Stores', 'imm' ),
      'search_items'          => __( 'Search Stores', 'imm' ),
      'not_found'             => __( 'No Stores Found', 'imm' ),
      'not_found_in_trash'    => __( 'No Stores found in Trash', 'imm' ),
      'featured_image'        => __( 'Store Image', 'imm' ),
      'set_featured_image'    => __( 'Set store image', 'imm' ),
      'remove_featured_image' => __( 'Remove store image', 'imm' ),
      'use_featured_image'    => __( 'Use as store image', 'imm' ),
      'insert_into_item'      => __( 'Insert into store', 'imm' ),
      'uploaded_to_this_item' => __( 'Uploaded to this store', 'imm' ),
      'items_list'            => __( 'Stores list', 'imm' ),
      'items_list_navigation' => __( 'Stores list navigation', 'imm' ),
      'filter_items_list'     => __( 'Filter stores list', 'imm' ),
    );
    $rewrite = array(
      'slug'                  => 'store',
      'with_front'            => true,
      'pages'                 => true,
      'feeds'                 => true,
    );
    $args = array(
      'label'                 => __( 'Store', 'imm' ),
      'description'           => __( 'Mall Tenant information', 'imm' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'excerpt', 'custom-fields' ),
      'taxonomies'            => array( 'imm_store_category' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-store',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => 'store',
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'query_var'             => 'store',
      'rewrite'               => $rewrite,
      'capability_type'       => 'post',
      'show_in_rest'          => true,
      'rest_controller_class' => 'WP_REST_Posts_Controller',
    );
    register_post_type( 'imm_store', $args );

  }

  /**
   * Register custom taxonomy for store categories
   *
   * @since 1.0.0
   * @return void
   */
  function imm_store_category_taxonomy() {

    $labels = array(
      'name'                       => _x( 'Store Categories', 'Taxonomy General Name', 'imm' ),
      'singular_name'              => _x( 'Store Category', 'Taxonomy Singular Name', 'imm' ),
      'menu_name'                  => __( 'Store Categories', 'imm' ),
      'all_items'                  => __( 'All Items', 'imm' ),
      'parent_item'                => __( 'Parent Item', 'imm' ),
      'parent_item_colon'          => __( 'Parent Item:', 'imm' ),
      'new_item_name'              => __( 'New Item Name', 'imm' ),
      'add_new_item'               => __( 'Add New Item', 'imm' ),
      'edit_item'                  => __( 'Edit Item', 'imm' ),
      'update_item'                => __( 'Update Item', 'imm' ),
      'view_item'                  => __( 'View Item', 'imm' ),
      'separate_items_with_commas' => __( 'Separate items with commas', 'imm' ),
      'add_or_remove_items'        => __( 'Add or remove items', 'imm' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'imm' ),
      'popular_items'              => __( 'Popular Items', 'imm' ),
      'search_items'               => __( 'Search Items', 'imm' ),
      'not_found'                  => __( 'Not Found', 'imm' ),
      'no_terms'                   => __( 'No items', 'imm' ),
      'items_list'                 => __( 'Items list', 'imm' ),
      'items_list_navigation'      => __( 'Items list navigation', 'imm' ),
    );
    $rewrite = array(
      'slug'                       => 'store-category',
      'with_front'                 => true,
      'hierarchical'               => true,
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'rewrite'                    => $rewrite,
      'show_in_rest'               => true,
    );
    register_taxonomy( 'imm_store_category', array( 'imm_store' ), $args );

  }

  /**
   * Registers deal custom post type
   *
   * @since 1.0.0
   */
  function imm_deal_post_type() {

    if ( post_type_exists('imm_deal') ) {
      return;
    }

    $labels = array(
      'name'                  => _x( 'Deals', 'Post Type General Name', 'imm' ),
      'singular_name'         => _x( 'Deal', 'Post Type Singular Name', 'imm' ),
      'menu_name'             => __( 'Store Deals', 'imm' ),
      'name_admin_bar'        => __( 'Deals', 'imm' ),
      'archives'              => __( 'Deal Archives', 'imm' ),
      'attributes'            => __( 'Deal Attributes', 'imm' ),
      'parent_item_colon'     => __( 'Parent Deal:', 'imm' ),
      'all_items'             => __( 'All Deals', 'imm' ),
      'add_new_item'          => __( 'Add New Deal', 'imm' ),
      'add_new'               => __( 'Add Deal', 'imm' ),
      'new_item'              => __( 'New Deal', 'imm' ),
      'edit_item'             => __( 'Edit Deal', 'imm' ),
      'update_item'           => __( 'Update Deal', 'imm' ),
      'view_item'             => __( 'View Deal', 'imm' ),
      'view_items'            => __( 'View Deals', 'imm' ),
      'search_items'          => __( 'Search Deals', 'imm' ),
      'not_found'             => __( 'Not found', 'imm' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'imm' ),
      'featured_image'        => __( 'Featured Image', 'imm' ),
      'set_featured_image'    => __( 'Set featured image', 'imm' ),
      'remove_featured_image' => __( 'Remove featured image', 'imm' ),
      'use_featured_image'    => __( 'Use as featured image', 'imm' ),
      'insert_into_item'      => __( 'Insert into item', 'imm' ),
      'uploaded_to_this_item' => __( 'Uploaded to this deal', 'imm' ),
      'items_list'            => __( 'Deals list', 'imm' ),
      'items_list_navigation' => __( 'Deals list navigation', 'imm' ),
      'filter_items_list'     => __( 'Filter deals list', 'imm' ),
    );
    $rewrite = array(
      'slug'                  => 'deal',
      'with_front'            => true,
      'pages'                 => true,
      'feeds'                 => true,
    );
    $args = array(
      'label'                 => __( 'Deal', 'imm' ),
      'description'           => __( 'Store Deals', 'imm' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
      'taxonomies'            => array( 'imm_deal_category' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'menu_icon'             => 'dashicons-tickets-alt',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => 'deal',
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'rewrite'               => $rewrite,
      'capability_type'       => 'post',
      'show_in_rest'          => true,
    );
    register_post_type( 'imm_deal', $args );

  }

  /**
   * Register custom taxonomy for store deals
   *
   * @since 1.0.0
   * @return void
   */
  function imm_deal_category_taxonomy() {

    $labels = array(
      'name'                       => _x( 'Deal Categories', 'Taxonomy General Name', 'imm' ),
      'singular_name'              => _x( 'Deal Category', 'Taxonomy Singular Name', 'imm' ),
      'menu_name'                  => __( 'Deal Categories', 'imm' ),
      'all_items'                  => __( 'All Deal Categories', 'imm' ),
      'parent_item'                => __( 'Parent Deal Category', 'imm' ),
      'parent_item_colon'          => __( 'Parent Deal Category:', 'imm' ),
      'new_item_name'              => __( 'New Deal Category Name', 'imm' ),
      'add_new_item'               => __( 'Add New Deal Category', 'imm' ),
      'edit_item'                  => __( 'Edit Deal Category', 'imm' ),
      'update_item'                => __( 'Update Deal Category', 'imm' ),
      'view_item'                  => __( 'View Deal Category', 'imm' ),
      'separate_items_with_commas' => __( 'Separate deals category with commas', 'imm' ),
      'add_or_remove_items'        => __( 'Add or remove deals categories', 'imm' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'imm' ),
      'popular_items'              => __( 'Popular Deal Categories', 'imm' ),
      'search_items'               => __( 'Search Deal Categories', 'imm' ),
      'not_found'                  => __( 'Not Found', 'imm' ),
      'no_terms'                   => __( 'No deal categories', 'imm' ),
      'items_list'                 => __( 'Deal Categories list', 'imm' ),
      'items_list_navigation'      => __( 'Deal Categories list navigation', 'imm' ),
    );
    $rewrite = array(
      'slug'                       => 'deal-category',
      'with_front'                 => true,
      'hierarchical'               => true,
    );
    $args = array(
      'labels'                     => $labels,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'rewrite'                    => $rewrite,
      'show_in_rest'               => true,
    );
    register_taxonomy( 'imm_deal_category', array( 'imm_deal' ), $args );

  }

 /**
  * Register custom fields (post meta) for store post type
  *
  * @since 1.0.0
  */
  public function imm_register_meta() {
    // Gotcha! Your registered custom post type must support 'custom-fields'
    register_post_meta(
      'imm_store',
      'imm_store_phone',
      [
        'show_in_rest'  =>  true,
        'single'  => true,
        'type'  =>  'string'
      ]
    );

    register_post_meta(
      'imm_store',
      'imm_store_website',
      [
        'show_in_rest'  =>  true,
        'single'  => true,
        'type'  =>  'string'
      ]
    );

    register_post_meta(
      'imm_store',
      'imm_store_facebook',
      [
        'show_in_rest'  =>  true,
        'single'  => true,
        'type'  =>  'string'
      ]
    );

    register_post_meta(
      'imm_store',
      'imm_store_instagram',
      [
        'show_in_rest'  =>  true,
        'single'  => true,
        'type'  =>  'string'
      ]
    );

    register_post_meta(
      'imm_store',
      'imm_store_twitter',
      [
        'show_in_rest'  =>  true,
        'single'  => true,
        'type'  =>  'string'
      ]
    );

    register_post_meta(
      'imm_store',
      'imm_store_floor',
      [
        'show_in_rest'  =>  true,
        'single'  => true,
        'type'  =>  'integer'
      ]
    );

    register_post_meta(
      'imm_store',
      'imm_store_location',
      [
        'show_in_rest'  =>  true,
        'single'  => true,
        'type'  =>  'number'
      ]
    );

    register_post_meta(
      'imm_store',
      'imm_store_size',
      [
        'show_in_rest'  =>  true,
        'single'  => true,
        'type'  =>  'number'
      ]
    );

    register_post_meta(
      'imm_store',
      'imm_store_hours',
      [
        'show_in_rest'  =>  true,
        'single'  => true,
        'type'  => 'string'
      ]
    );

    register_post_meta(
      'imm_store',
      'imm_store_logo',
      [
        'show_in_rest'  =>  true,
        'single'  => true,
        'type'  => 'string'
      ]
    );

    register_post_meta(
      'imm_store',
      'imm_store_color',
      [
        'show_in_rest'  =>  true,
        'single'  =>  true,
        'type'  =>  'string'
      ]
    );

    /**
     * Store Deal Post Meta
     */
  //   register_post_meta(
  //     'imm_deal',
  //     '_imm_deal_expirydate',
  //     [
  //       'show_in_rest' => true,
  //       'single' => true,
  //       'type' => 'string',
  //       'auth_callback' => function() {
  //         return current_user_can( 'edit_posts' );
  //       }
  //     ]
  //   );

  //   register_post_meta(
  //     'imm_deal',
  //     '_imm_deal_store',
  //     [
  //       'show_in_rest' => true,
  //       'single' => true,
  //       'type' => 'string',
  //       'auth_callback' => function() {
  //         return current_user_can( 'edit_posts' );
  //       }
  //     ]
  //   );
  }

  /**
   * Register a store template containing the custom fields
   * Action Hook: init
   * @since 1.0.0
   */
  public function imm_register_store_template() {
    $post_type_object = get_post_type_object( 'imm_store' );
    $post_type_object->template = [
      [ 'imm/store-floor-block' ],
      [ 'imm/store-location-block' ]
    ];
  }

  /**
   * Add custom category for store meta block
   *
   * @param array $categories
   * @param object $post
   * @return void
   */
  function imm_store_block_categories( $categories, $post ) {
    if ( $post->post_type !== 'imm_store' ) {
        return $categories;
    }
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'imm-store-meta-blocks-category',
                'title' => __( 'Mall Store Meta', 'imm' ),
                'icon'  => 'feedback',
            ),
        )
    );
  }

  /**
   * Register settings pages, sections and fields
   *
   * @since 1.0.0
   */
  public function imm_settings_init() {
    register_setting('imm', 'imm_options'); // Option Group and Option Name
    register_setting('imm', 'imm_maps');

    /**
     * Register Sections
     */

    // Mall Directory Layout
    add_settings_section(
      'imm_section_general',          // The ID to use for this section in attribute tags
    __('General Settings','imm'),     // The title of the section rendered to the screen
      'imm_section_general_render',   // The function used to render the options for this section
      'imm-settings'                  // The ID of the page on which this section is rendered (menu slug of add_menu_page)
    );

    // SVG Mall Maps
    add_settings_section(
      'imm_section_maps',         // The ID to use for this section in attribute tags
      __('Mall Maps', 'imm'),     // The title of the section rendered to the screen
      'imm_section_maps_render',  // The function used to render the options for this section
      'imm-settings'              // The ID of the page on which this section is rendered (menu slug of add_menu_page)
    );

    /**
     * Register Settings Fields
     */

    // Layout: Grid or Map
    // @todo In Version 2
    // add_settings_field(
    //   'imm_field_layout',           // The ID or name of the field
    //   __('Layout', 'imm'),          // The text used to label the field
    //   'imm_field_layout_render',    // The callback function used to render the field
    //   'imm-settings',               // The page on which the field will be rendered
    //   'imm_section_general'         // The section to which  the field will be rendered
    // );

    add_settings_field(
      'imm_field_mallpage',           // The ID or name of the field
      __('Mall Page', 'imm'),          // The text used to label the field
      'imm_field_mallpage_render',    // The callback function used to render the field
      'imm-settings',               // The page on which the field will be rendered
      'imm_section_general'         // The section to which  the field will be rendered
    );

    // Category Page for Empty Spaces
    add_settings_field(
      'imm_field_lease_category',           // The ID or name of the field
      __('Lease Category', 'imm'),    // The text used to label the field
      'imm_field_lease_category_render',    // The callback function used to render the field
      'imm-settings',                 // The page on which the field will be rendered
      'imm_section_general'           // The section to which  the field will be rendered
    );

    // Category Page for Featured Store
    add_settings_field(
      'imm_field_featured_category',           // The ID or name of the field
    __('Featured Category', 'imm'),            // The text used to label the field
      'imm_field_featured_category_render',    // The callback function used to render the field
      'imm-settings',                 // The page on which the field will be rendered
      'imm_section_general'           // The section to which  the field will be rendered
    );

    // Maps SVG Code
    // @todo Version 2
    // add_settings_field(
    //   'imm_field_surroundings_map',
    //   __('Surroundings Map', 'imm'),
    //   'imm_field_surroundings_map_render',
    //   'imm-settings',
    //   'imm_section_maps'
    // );


    add_settings_field(
      'imm_field_map',
      __('Floor Plan Maps', 'imm'),
      'imm_field_maps_render',
      'imm-settings',
      'imm_section_maps'
    );
  }

  public function imm_settings_page() {
    add_menu_page(
      __('Interactive 3D Mall Map', 'imm'),                       // Page Title
      'Mall Map Settings',                                        // Menu Title
      'manage_options',                                           // Capability
      'imm-settings',                                             // Menu Slug
      'imm_settings_page_display',                                // Callback Function
      plugin_dir_url(__DIR__) . 'admin/images/menu-icon.png',     // Icon URL
      20                                                          // Menu Position (int)
    );
  }

  public function imm_register_widget_store_list() {
    register_widget( 'Imm_Store_List' );
  }



} // End Class Imm_Admin