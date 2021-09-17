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
 * @package    FFFCR_ONLINE_STRIKE
 * @subpackage FFFCR_ONLINE_STRIKE/includes
 * @author     Fight For The Future <team@fightforthefuture.org>
 */
class FFFCR_ONLINE_STRIKE_i18n {


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
