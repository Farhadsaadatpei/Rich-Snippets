<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://adminrun.com
 * @since             1.0.0
 * @package           Rating_snippets
 *
 * @wordpress-plugin
 * Plugin Name:       Rating Snippets
 * Plugin URI:        https://adminrun.com/rating-snippets/
 * Description:       Standard rating snippet for multiple content types. This plugin follows Google guidelines for better SERP ranking. 
 * Version:           1.0.0
 * Author:            Admin Run
 * Author URI:        https://adminrun.com
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       rating_snippets
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-rating_snippets-activator.php
 */
function activate_rating_snippets() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rating_snippets-activator.php';
	Rating_snippets_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-rating_snippets-deactivator.php
 */
function deactivate_rating_snippets() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-rating_snippets-deactivator.php';
	Rating_snippets_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_rating_snippets' );
register_deactivation_hook( __FILE__, 'deactivate_rating_snippets' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-rating_snippets.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_rating_snippets() {

	$plugin = new Rating_snippets();
	$plugin->run();

}
run_rating_snippets();
