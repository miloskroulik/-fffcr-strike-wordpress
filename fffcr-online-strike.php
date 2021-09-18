<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/fightforthefuture
 * @since             1.0.0
 * @package           FFFCR_ONLINE_STRIKE
 *
 * @wordpress-plugin
 * Plugin Name:       FFF ČR online strike
 * Plugin URI:        https://github.com/fightforthefuture/earth-day-live-wp
 * Description:       This plugin allows you to easily add the Earth Day Live widget to you Wordpress site.
 * Version:           1.0.0
 * Author:            Fight For The Future
 * Author URI:        https://github.com/fightforthefuture
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       earth-day-live-wp
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
define( 'FFFCR_ONLINE_STRIKE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-earth-day-live-wp-activator.php
 */
function activate_fffcr_online_strike() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fffcr-online-strike-wp-activator.php';
	FFFCROnlineStrike_wp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-earth-day-live-wp-deactivator.php
 */
function deactivate_fffcr_online_strike() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fffcr-online-strike-wp-deactivator.php';
	FFFCROnlineStrike_wp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_fffcr_online_strike' );
register_deactivation_hook( __FILE__, 'deactivate_fffcr_online_strike' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-fffcr-online-strike-wp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_fffcr_online_strike() {

	$plugin = new FFFCROnlineStrike_wp();
	$plugin->run();

}
run_fffcr_online_strike();
