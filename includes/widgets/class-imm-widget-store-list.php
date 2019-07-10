<?php

/**
 *
 * @package   Imm
 * @author    Chinara James <cjwd@chinarajames.com>
 * @link      http://chinarajames.com
 * @copyright 2019 Chinara James
 *
 */

class Imm_Store_List extends WP_Widget {
  protected $widget_slug = 'imm-store-list';

  /*--------------------------------------------------*/
  /* Constructor
  /*--------------------------------------------------*/

  /**
   * Specifies the classname and description, instantiates the widget,
   * loads localization files, and includes necessary stylesheets and JavaScript.
   */
  public function __construct() {

    parent::__construct(
      $this->get_widget_slug(),
      __( 'IMM Store List', $this->get_widget_slug() ),
      array(
        'classname'  => $this->get_widget_slug().'-class',
        'description' => __( 'Displays a list of stores', $this->get_widget_slug() )
      )
    );

    // Refreshing the widget's cached output with each new post
    add_action( 'save_post',    array( $this, 'flush_widget_cache' ) );
    add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
    add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );

  } // end constructor

  public function get_widget_slug() {
    return $this->widget_slug;
  }

  /**
   * Front-end display of the widget.
   *
   * @param array args  The array of form elements
   * @param array instance The current instance of the widget
   */
  public function widget( $args, $instance ) {


    // Check if there is a cached output
    $cache = wp_cache_get( $this->get_widget_slug(), 'widget' );

    if ( !is_array( $cache ) )
      $cache = array();

    if ( ! isset ( $args['widget_id'] ) )
      $args['widget_id'] = $this->id;

    if ( isset ( $cache[ $args['widget_id'] ] ) )
      return print $cache[ $args['widget_id'] ];

    // The widget logic

    extract( $args, EXTR_SKIP );

    $widget_string = $before_widget;

    // Manipulate your widget's values based on their input fields
    ob_start();
    include IMM_PLUGIN_DIR . 'admin/partials/widget.php';
    $widget_string .= ob_get_clean();
    $widget_string .= $after_widget;


    $cache[ $args['widget_id'] ] = $widget_string;

    wp_cache_set( $this->get_widget_slug(), $cache, 'widget' );

    print $widget_string;

  } // end widget


  public function flush_widget_cache()
  {
      wp_cache_delete( $this->get_widget_slug(), 'widget' );
  }
  /**
   * Processes the widget's options to be saved.
   *
   * @param array new_instance The new instance of values to be generated via the update.
   * @param array old_instance The previous instance of values before the update.
   */
  public function update( $new_instance, $old_instance ) {

    $instance = $old_instance;

    // Update your widget's old values with the new, incoming values
        $instance['title']      = strip_tags( stripslashes( $new_instance['title']  ) );
        $instance['image']      = strip_tags( $new_instance['image'] );
        $instance['text']       = $new_instance['text'];
        $instance['applyp']     = $new_instance['applyp'];

    return $instance;

  } // end widget

  /**
   * Generates the administration form for the widget.
   *
   * @param array instance The array of keys and values for the widget.
   */
  public function form( $instance ) {

    // Default values for your variables
    $instance = wp_parse_args(
      (array) $instance,
      array(
        'title'     => '',
        'num_stores'     => 3,
        'show_map'      => 'checked',
        'show_size' => '',
        'show_floor' => '',
        'show_loc' => '',
        'show_cta' => '',
        'cta_url' => '',
        'cta_text'  => 'Lease Space',
        'show_all_btn'  => '',
        'all_url' => 'View All Available Spaces'
      )
    );

    // Display the admin form
    include IMM_PLUGIN_DIR . 'admin/partials/widget-admin.php';

  } // end form


}