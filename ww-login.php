<?php
/**
 * Plugin Name:  Werbewolke Login
 * Description:  Changes the login interface
 * Version:      1.1.1
 * Author:       Werbewolke GmbH
 * Author URI:   https://werbewolke.de
 * License:      MIT License
 * Text Domain:  ww-login
 */

function ww_login_custom_head() { 
	wp_register_style('ww-login', plugin_dir_url( __FILE__ ) . 'assets/ww-login.css', array(), 1.5, 'all');
    wp_enqueue_style('ww-login');
}
add_action( 'login_enqueue_scripts', 'ww_login_custom_head' );

function ww_login_custom_logo_url() {
    return 'https://werbewolke.de';
}
add_filter( 'login_headerurl', 'ww_login_custom_logo_url' );

function ww_login_custom_logo_url_title() {
    return 'by Werbewolke GmbH';
}
add_filter( 'login_headertext', 'ww_login_custom_logo_url_title' );

function ww_login_privacy_policy_link_on_loginpage( $link, $privacy_policy_url ) {
    if ( 'wp-login.php' === $GLOBALS['pagenow'] ) {
        ob_start();
            include( 'footer.php' );
        return ob_get_clean();
    }
}
add_filter( 'the_privacy_policy_link', 'ww_login_privacy_policy_link_on_loginpage', 10, 2 );