<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/*
 * Custom Theme Options
 */
if( function_exists('acf_add_options_page') ) {
    // Pandora Box General Settings
    $general_settings   = array(
                                'page_title' 	=> __( 'Pandora Box Settings', 'pandorabox' ),
                                'menu_title'	=> __( 'Pandora Box Settings', 'pandorabox' ),
                                'menu_slug' 	=> 'pandorabox-general-settings',
                                'capability'	=> 'edit_posts',
                                'redirect'      => false,
                                'icon_url'      => 'dashicons-admin-customizer'
                            );
    acf_add_options_page( $general_settings );
}