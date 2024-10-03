<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/*
 * Template Name: Front Page Template
 *
 * @package WordPress
 * @subpackage pandorabox
 * @since pandorabox 1.0
 */
get_header(); ?>
    <?php if (class_exists('acf')) { 
        
        if (have_rows('flexible_content')):
            while (the_flexible_field('flexible_content')) : 
                include locate_template('flexible-parts/' . str_replace('_', '-', get_row_layout()) . '.php');
            endwhile;
        endif;
    } ?>
<?php get_footer(); ?>