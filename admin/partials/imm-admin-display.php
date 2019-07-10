<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://chinarajames.com
 * @since      1.0.0
 *
 * @package    Imm
 * @subpackage Imm/admin/partials
 */
?>

<div class="wrap">
  <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
  <form action="options.php" method="post">
    <?php
    // output setting sections and their fields
    do_settings_sections( 'imm-settings' );

    // output security fields for the registered setting
    settings_fields( 'imm' );

    // output save settings button
    submit_button( 'Save Settings' );
    ?>
  </form>
</div>
