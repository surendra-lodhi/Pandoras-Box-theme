<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if( !defined( 'PANDORABOX_POST_POST_TYPE' ) ) {
    define( 'PANDORABOX_POST_POST_TYPE', 'post' );
}
if( !defined( 'PANDORABOX_PAGE_POST_TYPE' ) ) {
    define( 'PANDORABOX_PAGE_POST_TYPE', 'page' );
}
if( !defined( 'PANDORABOX_CUSTOM_POST_POST_TYPE' ) ) {
    define( 'PANDORABOX_CUSTOM_POST_POST_TYPE', 'custom_post' );
}
if( !defined( 'PANDORABOX_CUSTOM_POST_POST_TAX' ) ) {
    define( 'PANDORABOX_CUSTOM_POST_POST_TAX', 'custom_post_tax' );
}
if( !defined( 'PANDORABOX_META_PREFIX' ) ) {
    define( 'PANDORABOX_META_PREFIX', '_pandorabox_' );
}