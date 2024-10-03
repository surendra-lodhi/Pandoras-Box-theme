<?php
/**
 * Pandora Box back compat functionality
 *
 * Prevents Pandora Box from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package WordPress
 * @subpackage PANDORABOX
 * @since Pandora Box 1.0
 */

/**
 * Prevent switching to Pandora Box on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Pandora Box 1.0
 */
function pandorabox_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'pandorabox_upgrade_notice' );
}
add_action( 'after_switch_theme', 'pandorabox_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Pandora Box on WordPress versions prior to 4.4.
 *
 * @since Pandora Box 1.0
 *
 * @global string $wp_version WordPress version.
 */
function pandorabox_upgrade_notice() {
	$message = sprintf( __( 'Pandora Box requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'pandorabox' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since Pandora Box 1.0
 *
 * @global string $wp_version WordPress version.
 */
function pandorabox_customize() {
	wp_die( sprintf( __( 'Pandora Box requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'pandorabox' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'pandorabox_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since Pandora Box 1.0
 *
 * @global string $wp_version WordPress version.
 */
function pandorabox_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Pandora Box requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'pandorabox' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'pandorabox_preview' );
