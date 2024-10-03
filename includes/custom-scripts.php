<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/*
 * Enqueue scripts and styles for the back end.
 */
function pandorabox_admin_scripts() {
    global $wp_version;
    // Load our admin stylesheet.
    wp_enqueue_style( 'pandorabox-admin-style', get_template_directory_uri() . '/css/admin-style.css' );
    // Load our admin script.
    wp_enqueue_script( 'pandorabox-admin-script', get_template_directory_uri() . '/js/admin-script.js' );
    //localize admin script
    wp_localize_script( 'pandorabox-admin-script', 'PANDORABOXADMIN', array(
                                                                    'ajaxurl' => admin_url('admin-ajax.php', ( is_ssl() ? 'https' : 'http')),
                                                                ));
    wp_enqueue_media();
}
/*
 * Enqueue scripts and styles for the front end.
 */
function pandorabox_public_scripts() {
    
    // Load our bootstrap stylesheet.
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css', array(), NULL );
    // Load our slick stylesheet.
    wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/css/slick.css', array(), NULL );
    // Load our main stylesheet.
    wp_enqueue_style( 'pandorabox-style', get_stylesheet_uri(), array(), NULL );
    // Load our public style stylesheet.
    wp_enqueue_style( 'pandorabox-public-style', get_template_directory_uri() . '/css/public-style.css', array(), NULL );

    // Load main jquery
    wp_enqueue_script( 'jquery', array(), NULL );
    // Load bootstrap script
    wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.js', array(), NULL );
    // Load slick script
    wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/js/slick.js', array(), NULL );
    // Load masonry script
    wp_enqueue_script( 'masonry-script', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array(), NULL );
    // Load public script
    wp_enqueue_script( 'pandorabox-public-script', get_template_directory_uri() . '/js/public-script.js', array(), NULL );
    //localize public script
    wp_localize_script( 'pandorabox-public-script', 'PANDORABOXFRONTEND', 
        array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'pandorabox_post_per_pages' => '6' ,
        ));
}
/*
 * Enqueue scripts and styles for the admin login screen.
 */
function pandorabox_login_stylesheet() {
    wp_enqueue_style( 'pandorabox-login-style', get_stylesheet_directory_uri() . '/css/login-style.css' );
}
//add action to load scripts and styles for the back end
add_action( 'admin_enqueue_scripts', 'pandorabox_admin_scripts' );
//add action load scripts and styles for the front end
add_action( 'wp_enqueue_scripts', 'pandorabox_public_scripts' );
//add action load scripts and styles for admin login screen
add_action( 'login_enqueue_scripts', 'pandorabox_login_stylesheet' );