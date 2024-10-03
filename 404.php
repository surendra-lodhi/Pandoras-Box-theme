<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage PANDORABOX
 * @since Pandora Box 1.0
 */

get_header(); ?>

<?php 
    if(class_exists('acf')){
        $background_404 = get_field('background_404','option');
        $mobile_background_404 = get_field('mobile_background_404','option');
        $site_logo = get_field('site_logo','option');
        $error_title = get_field('error_title','option');
        $error_sub_title = get_field('error_sub_title','option');
        $error_content = get_field('error_content','option');
        $cta_title = get_field('cta_title','option');
    }
?>

<section class="inner-hero-section desktop-hero" style="background-image: url(<?php echo $background_404?>);">
    <div class="corner-design"></div>
    <div class="container">
        <div class="logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo $site_logo?>" alt=""></a>
        </div>
        <div class="content-404">
            <?php if (!empty($error_title)) { ?>
                <h1><?php echo $error_title?></h1>
            <?php } ?>
            <?php if (!empty($error_sub_title)) { ?>
                <h2><?php echo $error_sub_title?></h2>
            <?php } ?>
            <?php if (!empty($error_content)) { ?>
                <p><?php echo $error_content?></p>
            <?php } ?>
            <?php if (!empty($cta_title)) { ?>
            <div class="btn-block">
                <a class="btn-outline" href="<?php echo home_url(); ?>"><?php echo $cta_title?></a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="inner-hero-section mobile-hero" style="background-image: url(<?php echo $mobile_background_404?>);">
    <div class="corner-design"></div>
    <div class="container">
        <div class="logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo $site_logo?>" alt=""></a>
        </div>
        <div class="content-404">
            <?php if (!empty($error_title)) { ?>
                <h1><?php echo $error_title?></h1>
            <?php } ?>
            <?php if (!empty($error_sub_title)) { ?>
                <h2><?php echo $error_sub_title?></h2>
            <?php } ?>
            <?php if (!empty($error_content)) { ?>
                <p><?php echo $error_content?></p>
            <?php } ?>
            <?php if (!empty($cta_title)) { ?>
            <div class="btn-block">
                <a class="btn-outline" href="<?php echo home_url(); ?>"><?php echo $cta_title?></a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>