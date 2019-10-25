<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://chinarajames.com
 * @since             1.0.0
 * @package           Imm
 *
 * @wordpress-plugin
 * Plugin Name:       Interactive Mall Map
 * Plugin URI:        https://chinarajames.com/plugins/mall-map
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Chinara James
 * Author URI:        https://chinarajames.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       imm
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.1.1' );

/**
 * Plugin and template directories
 */
define('IMM_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define( 'IMM_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
define( 'IMM_PLUGIN_TEMPLATE_DIR', IMM_PLUGIN_DIR . 'templates/');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-imm-activator.php
 */
function activate_imm() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-imm-activator.php';
	Imm_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-imm-deactivator.php
 */
function deactivate_imm() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-imm-deactivator.php';
	Imm_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_imm' );
register_deactivation_hook( __FILE__, 'deactivate_imm' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-imm.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_imm() {

	$plugin = new Imm();
	$plugin->run();

}
run_imm();
