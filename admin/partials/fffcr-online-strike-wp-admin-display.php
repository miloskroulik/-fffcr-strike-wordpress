
<?php
if ( ! defined( 'WPINC' ) ) die;
use FFFCROnlineStrike_wp_Admin as EdlAdmin;
?>

<div class="wrap earth_day_live-container">
<!--    <h2>Earth Day Live Widget</h2>
    <p>This plugin allows anyone with a Wordpress site to add the <a href="https://github.com/fightforthefuture/earth-day-live-widget" target="_blank">Earth Day Live</a> with just a few clicks. <a href="#earth_day_live_options">Skip to the settings below</a> to turn it on!</p>
    <h2>How the widget works</h2>
    <p>When you enable the widget below it will show a footer banner (<a href="https://widget.earthdaylive2020.org/demo.html" target="_blank">demo</a>) informing visitors that your site is supporting Earth Day Live and directs them to sign up:</p>
    <img src="<?/*= plugins_url( $this->plugin_name . '/assets/screenshot-1.png')*/?>" alt="Earth Day Live Banner">
    <p>Then at midnight on April 22nd (Earth Day) for 24 hours, the banner will expand to be full screen (<a href="https://widget.earthdaylive2020.org/demo.html?fullPage" target="_blank">demo</a>), showing a message that your site is watching Earth Day Live for the day, directing them to join:</p>
    <img src="<?/*= plugins_url( $this->plugin_name . '/assets/screenshot-2.png')*/?>" alt="Earth Day Live Full Page">
    <p>The widget is designed to appear once per user, per device, per day, but can be configured to display at a different interval.</p>-->
    <form method="post" name="earth_day_live_options" class="earth_day_live_options-form" action="options.php" id="earth_day_live_options">
        <h2>Nastavení banneru pro online stávku:</h2>
        <p>Upravte si nastavení widgetu podle svého.</p>
        <?php
        $options = get_option($this->plugin_name);
        $show_earth_day_live_widget = $this->field_is_set($options, 'show_earth_day_live_widget') ? EdlAdmin::ENABLE : EdlAdmin::DISABLE;
        $language = 'cs';
        $force_full_page_widget = $this->field_is_set($options, 'force_full_page_widget') ? EdlAdmin::ENABLE : EdlAdmin::DISABLE;
        $always_show_widget = $this->field_is_set($options, 'always_show_widget') ? EdlAdmin::ENABLE : EdlAdmin::DISABLE;
        $iframe_host = $this->field_is_set($options, 'iframe_host') ? esc_attr($options['iframe_host']) : EdlAdmin::IFRAME_HOST;
        $cookie_expiration_days = $this->field_is_set($options, 'cookie_expiration_days') ? esc_attr($options['cookie_expiration_days']) : EdlAdmin::COOKIE_EXPIRATION_DAYS;
        $disable_google_analytics = $this->field_is_set($options, 'disable_google_analytics') ? EdlAdmin::ENABLE : EdlAdmin::DISABLE;
        $show_close_button_on_full_page_widget = $this->field_is_set($options, 'show_close_button_on_full_page_widget') ? EdlAdmin::ENABLE : EdlAdmin::DISABLE;

        $footer_display_start_date = $this->field_is_set($options, 'footer_display_start_date') ? esc_attr($options['footer_display_start_date']) : date(EdlAdmin::FOOTER_DISPLAY_DATE);
        $full_page_display_start_date = $this->field_is_set($options, 'full_page_display_start_date') ? esc_attr($options['full_page_display_start_date']) : date(EdlAdmin::FULL_PAGE_DISPLAY_DATE);
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
        ?>
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-show_earth_day_live_widget">
                <span><?php esc_attr_e('Zapnout widget stávky za klima:', $this->plugin_name); ?></span>
                <input type="checkbox"
                       id="<?php echo $this->plugin_name; ?>-show_earth_day_live_widget"
                       name="<?php echo $this->plugin_name; ?>[show_earth_day_live_widget]"
                       value="1"
                    <?php checked( $show_earth_day_live_widget, 1 ); ?>
                />
                <p>Zaškrtnutím zajistíte zobrazení widgetu na svém webu.</p>
            </label>
        </fieldset>
        <fieldset>
            <span><?php esc_attr_e( 'Počet dnů před expirací cookie:', $this->plugin_name ); ?></span>
            <input type="number"
                   class="earth_day_live-cookie_expiration_days"
                   id="<?php echo $this->plugin_name; ?>-cookie_expiration_days"
                   name="<?php echo $this->plugin_name; ?>[cookie_expiration_days]"
                   value="<?= !empty( $cookie_expiration_days ) ? $cookie_expiration_days : 1; ?>"/>
            <p>Pokud uživatel zavře banner, je mu nastaveno cookie, aby widget znovu neviděl po zadaný počet dní.</p>
        </fieldset>
        <fieldset>
            <span><?php esc_attr_e( 'iFrame Host:', $this->plugin_name ); ?></span>
            <input type="url"
                   class="earth_day_live-iframe_host"
                   id="<?php echo $this->plugin_name; ?>-iframe_host"
                   name="<?php echo $this->plugin_name; ?>[iframe_host]"
                   value="<?= !empty( $iframe_host ) ? $iframe_host : EdlAdmin::IFRAME_HOST; ?>"/>
            <p>Pokud selfhostujete widget, můžete nastavit doménu, kde se nachází.</p>
        </fieldset>
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-disable_google_analytics">
                <span><?php esc_attr_e('Vypnout Google Analytics:', $this->plugin_name); ?></span>
                <input type="checkbox"
                       id="<?php echo $this->plugin_name; ?>-disable_google_analytics"
                       name="<?php echo $this->plugin_name; ?>[disable_google_analytics]"
                       value="1"
                    <?php checked( $disable_google_analytics, 1 ); ?>
                />
                <p>Odebere sledování interakcí přes Google Analytics z banneru.</p>
            </label>
        </fieldset>
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-always_show_widget">
                <span><?php esc_attr_e('Vždy ukazovat widget:', $this->plugin_name); ?></span>
                <input type="checkbox"
                       id="<?php echo $this->plugin_name; ?>-always_show_widget"
                       name="<?php echo $this->plugin_name; ?>[always_show_widget]"
                       value="1"
                    <?php checked( $always_show_widget, 1 ); ?>
                />
                <p>Ukazovat widget i tehdy, pokud ho uživatel uzavřel. Vhodné pro testovací účely..</p>
            </label>
        </fieldset>
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-force_full_page_widget">
                <span><?php esc_attr_e('Vynutit celoobrazovkový widget:', $this->plugin_name); ?></span>
                <input type="checkbox"
                       id="<?php echo $this->plugin_name; ?>-force_full_page_widget"
                       name="<?php echo $this->plugin_name; ?>[force_full_page_widget]"
                       value="1"
                    <?php checked( $force_full_page_widget, 1 ); ?>
                />
                <p>Vynutí ukazování celostránkového widgetu, jako v den stávky. Užitečné pro testování.</p>
            </label>
        </fieldset>
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-show_close_button_on_full_page_widget">
                <span><?php esc_attr_e('Ukázat tlačítko pro uzavření celostránkového widgetu:', $this->plugin_name); ?></span>
                <input type="checkbox"
                       id="<?php echo $this->plugin_name; ?>-show_close_button_on_full_page_widget"
                       name="<?php echo $this->plugin_name; ?>[show_close_button_on_full_page_widget]"
                       value="1"
                    <?php checked( $show_close_button_on_full_page_widget, 1 ); ?>
                />
                <p>Umožní uživatelům uzavřít celoobrazovkový widget a používat web. (<a href="<?= EdlAdmin::IFRAME_HOST ?>/demo.html?fullPage&showCloseButton" target="_blank">demo</a>)</p>
            </label>
        </fieldset>
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-footer_display_start_date">
                <span><?php esc_attr_e('Počátek zobrazování widgetu v patičce webu:', $this->plugin_name); ?></span>
                <input type="date"
                       id="<?php echo $this->plugin_name; ?>-footer_display_start_date"
                       name="<?php echo $this->plugin_name; ?>[footer_display_start_date]"
                       value="<?= $footer_display_start_date ?>"
                />
                <p>Umožňuje nastavit datum, kdy se začne zobrazovat widget v patičce.</p>
            </label>
        </fieldset>
        <fieldset>
            <label for="<?php echo $this->plugin_name; ?>-full_page_display_start_date">
                <span><?php esc_attr_e('Začátek zobrazování celoobrazovkového widgetu:', $this->plugin_name); ?></span>
                <input type="date"
                       id="<?php echo $this->plugin_name; ?>-full_page_display_start_date"
                       name="<?php echo $this->plugin_name; ?>[full_page_display_start_date]"
                       value="<?= $full_page_display_start_date ?>"
                />
                <p>Umožňuje nastavit datum, kdy se začne zobrazovat celoobrazovkový widget.</p>
            </label>
        </fieldset>
        <?php submit_button( __( 'Uložit změny', $this->plugin_name ), 'primary','submit', TRUE ); ?>
    </form>
</div>
