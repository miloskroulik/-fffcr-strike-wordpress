<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/fightforthefuture
 * @since      1.0.0
 *
 * @package    FFFCR_ONLINE_STRIKE
 * @subpackage FFFCR_ONLINE_STRIKE/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Fffcr_Online_Strike
 * @subpackage Fffcr_Online_Strike/includes
 * @author     Miloš Kroulík <milos.kroulik@gmail.com>
 */
class FFFCROnlineStrike_wp_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'earth-day-live-wp',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
