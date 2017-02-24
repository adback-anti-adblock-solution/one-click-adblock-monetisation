<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.adback.co
 * @since             1.0.0
 * @package           Ad_Back
 *
 * @wordpress-plugin
 * Plugin Name:       AdBack solution to adblock
 * Plugin URI:        adback.co
 * Description:       With AdBack, access analytics about adblocker users, address them personalized messages, propose alternative solutions to advertising (video, survey).
 * Version:           1.1.3
 * Author:            Antoine Ferrier
 * Author URI:        https://www.adback.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ad-back
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ad-back-activator.php
 */
function activate_ad_back() {
	if (!current_user_can( 'activate_plugins' ) )
		return;

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ad-back-activator.php';
	Ad_Back_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ad-back-deactivator.php
 */
function deactivate_ad_back() {
	if (!current_user_can( 'activate_plugins' ) )
		return;

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ad-back-deactivator.php';
	Ad_Back_Deactivator::deactivate();
}


register_activation_hook( __FILE__, 'activate_ad_back' );
register_deactivation_hook( __FILE__, 'deactivate_ad_back' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ad-back.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ad_back() {

	$plugin = new Ad_Back();
	$plugin->run();

}
run_ad_back();
