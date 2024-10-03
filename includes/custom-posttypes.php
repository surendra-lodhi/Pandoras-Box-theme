<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Register Custom Post Types
 */
function pandorabox_register_post_types() {
    $custompost_labels = array(
                            'name'               => _x( 'Custom Post', 'custom_post', 'pandorabox' ),
                            'singular_name'      => _x( 'Custom Post', 'custom_post', 'pandorabox' ),
                            'menu_name'          => _x( 'Custom Post', 'custom_post', 'pandorabox' ),
                            'name_admin_bar'     => _x( 'Custom Post', 'custom_post', 'pandorabox' ),
                            'add_new'            => _x( 'Add New', 'custom_post', 'pandorabox' ),
                            'add_new_item'       => __( 'Add New Custom Post', 'pandorabox' ),
                            'new_item'           => __( 'New Custom Post', 'pandorabox' ),
                            'edit_item'          => __( 'Edit Custom Post', 'pandorabox' ),
                            'view_item'          => __( 'View Custom Post', 'pandorabox' ),
                            'all_items'          => __( 'All Custom Post', 'pandorabox' ),
                            'search_items'       => __( 'Search Custom Post', 'pandorabox' ),
                            'parent_item_colon'  => __( 'Parent Custom Post:', 'pandorabox' ),
                            'not_found'          => __( 'No Custom Post Found.', 'pandorabox' ),
                            'not_found_in_trash' => __( 'No Custom Post Found In Trash.', 'pandorabox' ),
                        );

    $custompost_args = array(
                            'labels'             => $custompost_labels,
                            'public'             => true,
                            'publicly_queryable' => true,
                            'show_ui'            => true,
                            'show_in_menu'       => true,
                            'query_var'          => true,
                            'rewrite'            => array( 'slug'=> 'custompost', 'with_front' => false ),
                            'capability_type'    => 'post',
                            'has_archive'        => false,
                            'hierarchical'       => false,
                            'menu_position'      => null,
                            'menu_icon'          => 'dashicons-pressthis',
                            'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' )
                        );

    register_post_type( PANDORABOX_CUSTOM_POST_POST_TYPE, $custompost_args );
    
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
                    'name'              => _x( 'Categories', 'taxonomy general name', 'pandorabox'),
                    'singular_name'     => _x( 'Category', 'taxonomy singular name','pandorabox' ),
                    'search_items'      => __( 'Search Categories','pandorabox' ),
                    'all_items'         => __( 'All Categories','pandorabox' ),
                    'parent_item'       => __( 'Parent Category','pandorabox' ),
                    'parent_item_colon' => __( 'Parent Category:','pandorabox' ),
                    'edit_item'         => __( 'Edit Category' ,'pandorabox'), 
                    'update_item'       => __( 'Update Category' ,'pandorabox'),
                    'add_new_item'      => __( 'Add New Category' ,'pandorabox'),
                    'new_item_name'     => __( 'New Category Name' ,'pandorabox'),
                    'menu_name'         => __( 'Categories' ,'pandorabox')
                );

    $args = array(
                    'hierarchical'      => true,
                    'labels'            => $labels,
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'query_var'         => true,
                    'rewrite'           => array( 'slug'=> 'custom_tax' )
                );
	
    register_taxonomy( PANDORABOX_CUSTOM_POST_POST_TAX, PANDORABOX_CUSTOM_POST_POST_TYPE, $args );
    //flush rewrite rules
    flush_rewrite_rules();
}
//add action to create custom post type
add_action( 'init', 'pandorabox_register_post_types' );