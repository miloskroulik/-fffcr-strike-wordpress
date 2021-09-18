<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/fightforthefuture
 * @since      1.0.0
 *
 * @package    FFFCR_ONLINE_STRIKE
 * @subpackage FFFCR_ONLINE_STRIKE/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fffcr_Online_Strike
 * @subpackage Fffcr_Online_Strike/includes
 * @author     Miloš Kroulík <milos.kroulik@gmail.com>
 */
class FFFCROnlineStrike_wp_Admin {
    const ENABLE = 1;
    const DISABLE = 0;
    const FOOTER_DISPLAY_DATE = '2020-01-01';
    const FULL_PAGE_DISPLAY_DATE = '2020-04-22';
    const COOKIE_EXPIRATION_DAYS = 1;
    const IFRAME_HOST = 'https://widget.zaklima.cz';
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
    * Adds a link to the options page in the Settings section of the menu.
    */
    public function add_plugin_admin_menu() {
        add_submenu_page( 'options-general.php',
            'FfF ČR Online Strike Settings', 'FfF ČR Online Strike Settings', 'manage_options',
            $this->plugin_name, array($this, 'display_plugin_setup_page')
        );
    }

    /**
     * @param $links
     * @return array
     */
    public function add_action_links($links ) {
        $settings_link = array(
            '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __( 'Settings', $this->plugin_name ) . '</a>',
        );
        return array_merge(  $settings_link, $links );
    }

    /**
     * Renders the plugin settings page.
     */
    public function display_plugin_setup_page() {
        include_once( 'partials/' . $this->plugin_name . '-wp-admin-display.php' );
    }

    /**
     * @param $input
     * @param $field
     * @return bool
     */
    private function field_is_set($input, $field ) {
        return ( isset( $input[$field] ) && ! empty( $input[$field] ) );
    }

    /**
     *
     * Validates the plugin settings.
     * `
     * @param $input
     * @return array
     */
    public function validate($input) {
        $valid = array();
        $valid['show_earth_day_live_widget'] = $this->field_is_set($input, 'show_earth_day_live_widget') ? esc_attr($input['show_earth_day_live_widget']) : self::DISABLE;
        $valid['language'] = $this->field_is_set($input, 'language') ? esc_attr($input['language']) : 'en';
        $valid['cookie_expiration_days'] = $this->field_is_set($input, 'cookie_expiration_days') ? esc_attr($input['cookie_expiration_days']) : self::COOKIE_EXPIRATION_DAYS;
        $valid['iframe_host'] = $this->field_is_set($input, 'iframe_host') ? esc_attr($input['iframe_host']) : self::IFRAME_HOST;
        $valid['disable_google_analytics'] = $this->field_is_set($input, 'disable_google_analytics') ? self::ENABLE : self::DISABLE;
        $valid['always_show_widget'] = $this->field_is_set($input, 'always_show_widget') ? self::ENABLE : self::DISABLE;
        $valid['force_full_page_widget'] = $this->field_is_set($input, 'force_full_page_widget') ? self::ENABLE : self::DISABLE;
        $valid['show_close_button_on_full_page_widget'] = $this->field_is_set($input, 'show_close_button_on_full_page_widget') ? self::ENABLE : self::DISABLE;
        $valid['footer_display_start_date'] = $this->field_is_set($input, 'footer_display_start_date') ? esc_attr($input['footer_display_start_date']) : date(self::FOOTER_DISPLAY_DATE);
        $valid['full_page_display_start_date'] = $this->field_is_set($input, 'full_page_display_start_date') ? esc_attr($input['full_page_display_start_date']) : date(self::FULL_PAGE_DISPLAY_DATE);
        return $valid;
    }

    /**
     * Updates the plugin settings based on the configured options.
     */
    public function options_update() {
        register_setting( $this->plugin_name, $this->plugin_name, array( $this, 'validate' ) );
    }

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in FFFCR_ONLINE_STRIKE_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The FFFCR_ONLINE_STRIKE_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/fffcr-online-strike-wp-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in FFFCR_ONLINE_STRIKE_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The FFFCR_ONLINE_STRIKE_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/fffcr-online-strike-wp-admin.js', array( 'jquery' ), $this->version, false );

	}

}
