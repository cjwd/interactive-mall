<?php

/**
 *
 * Functions for the templating system.
 * @version  1.0.0
 */

defined( 'ABSPATH' ) || exit;

// The settings page
function imm_settings_page_display() {
  if ( ! current_user_can( 'manage_options' ) ) {
    return;
  }

  if ( isset( $_GET['settings-update'] ) ) {
    add_settings_error( 'imm_messages', 'imm_message', __( 'Settings Saved', 'imm'), 'updated' );
  }

  settings_errors( 'imm_messages' );

  include IMM_PLUGIN_DIR . 'admin/partials/imm-admin-display.php';
}





function imm_section_general_render() {
  echo '<p></p>';
}





function imm_section_maps_render() {
  echo '<p>Provide the svg (vector) code for each floor of the mall. This is necessary for the interactive 3D map to work.</p>';
}




/**
 * Markup for map layout settings field
 * Setting to be implemented in version 2.0.0
 *
 * @param [type] $args
 * @return void
 */
function imm_field_layout_render( $args ) {
  $options = (array)get_option('imm_options');

  if( isset( $options['layout'] ) ) {
    $layout = $options['layout'];
    echo '
      <input type="radio" name="imm_options[layout]" value="grid"' . checked( $layout, 'grid', false ) . '> Grid
      <input type="radio" name="imm_options[layout]" value="map"' . checked( $layout, 'map', false ) . '> Map
    ';
  } else {
    echo '
      <input type="radio" name="imm_options[layout]" value="grid"> Grid
      <input type="radio" name="imm_options[layout]" value="map"> Map
    ';
  }

}




function imm_field_mallpage_render( $arg ) {
  $options = (array)get_option('imm_options');

  $pages = get_pages();

  if( isset( $options['mallpage'] ) ) {
    $page_id = $options['mallpage'];
    echo '<select name="imm_options[mallpage]">';
      foreach( $pages as $page) {
        echo '<option value="'. $page->ID . '"' . selected( $page_id, $page->ID, false ) . '>' . $page->post_title . '</option>';
      }
    echo '</select>';

  } else {
    echo '<select name="imm_options[mallpage]">';
      foreach( $pages as $page) {
        echo '<option value="'. $page->ID . '">' . $page->post_title . '</option>';
      }
    echo '</select>';
  }
}





function imm_field_lease_category_render( $args ) {
  $options = (array)get_option('imm_options');

  $store_categories = get_categories([ 'taxonomy' => 'imm_store_category']);

  if( isset( $options['lease_category'] ) ) {
    $category = $options['lease_category'];
    echo '<select name="imm_options[lease_category]">';
      foreach( $store_categories as $cat) {
        echo '<option value="'. $cat->term_id . '"' . selected( $category, $cat->term_id, false ) . '>' . $cat->name . '</option>';
      }
    echo '</select>';

  } else {
    echo '<select name="imm_options[lease_category]">';
      foreach( $store_categories as $cat) {
        echo '<option value="'. $cat->term_id . '">' . $cat->name . '</option>';
      }
    echo '</select>';
  }

}





function imm_field_featured_category_render( $args ) {
  $options = (array)get_option('imm_options');

  $store_categories = get_categories([ 'taxonomy' => 'imm_store_category']);

  if( isset( $options['featured_category'] ) ) {
    $category = $options['featured_category'];
    echo '<select name="imm_options[featured_category]">';
      foreach( $store_categories as $cat) {
        echo '<option value="'. $cat->term_id . '"' . selected( $category, $cat->term_id, false ) . '>' . $cat->name . '</option>';
      }
    echo '</select>';

  } else {
    echo '<select name="imm_options[featured_category]">';
      foreach( $store_categories as $cat) {
        echo '<option value="'. $cat->term_id . '">' . $cat->name . '</option>';
      }
    echo '</select>';
  }

}




/**
 * Markup to render a file upload field
 * for the map background
 *
 * Setting to be implemented in version 2.0.0
 *
 * @return void
 */
function imm_field_surroundings_map_render() {
  $options = get_option('imm_options');
  $map = $options['surroundings'];
  $button_text = __('Upload Image', 'imm');

  if ( !empty( $map ) ) {
    $image_attributes = wp_get_attachment_image_src( $map, array( 115, 115 ) );
    $src = $image_attributes[0];
    $value = $map;
  } else {
      $src = '';
      $value = '';
  }
  ?>
  <div class="upload">
    <img data-src="" src="<?= $src; ?>" width="115px" height="115px" />
    <div>
      <input type="hidden" name="imm_options[surroundings]" id="imm_option_surroundings_map" value="<?= $value; ?>" />
      <button type="submit" class="upload_image_button button button-primary"><?= $button_text; ?></button>
      <button type="submit" class="remove_image_button button">&times;</button>
    </div>
  </div>
  <?php
}





function imm_field_maps_render() {
  include IMM_PLUGIN_DIR . 'admin/partials/fields/map.php';
}

