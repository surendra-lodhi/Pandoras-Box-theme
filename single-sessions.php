<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage PANDORABOX
 * @since Pandora Box 1.0
 */

get_header();?>

<?php if (class_exists('acf')) { 
    
    if (have_rows('flexible_content')):
        while (the_flexible_field('flexible_content')) : 
            include locate_template('flexible-parts/' . str_replace('_', '-', get_row_layout()) . '.php');
        endwhile;
    endif;
} ?>

<?php
wp_reset_query();
wp_reset_postdata();
$sessions_bg = get_field('sessions_bg');
$overview_heading = get_field('overview_heading');
$overview_content = get_field('overview_content');
$sessions_lists = get_field('sessions_lists');

$sessions_title = get_field('sessions_title');
$sessions_sub_title = get_field('sessions_sub_title');
$sessions_description = get_field('sessions_description');
$cta_get_in_touch = get_field('cta_get_in_touch');
$tabs_lists = get_field('tabs_lists');

?>

<section class="sessions-detail-section" style="background-image: url(<?php echo $sessions_bg; ?>);">
    <div class="container">
        <div class="sessions-overview">
            <?php if (!empty($overview_heading)) { ?>
                <h2><?php echo $overview_heading; ?></h2>
            <?php } ?>
            <?php echo $overview_content; ?>
        </div>
        <?php if (!empty($sessions_lists)) { ?>
        <div class="sessions-wrap">
            <?php foreach ($sessions_lists as $key => $value) {
                $sessions_image = get_field('sessions_image',$value->ID);
                $sessions_heading = get_field('sessions_heading',$value->ID);
            ?>
            <div class="single-sessions">
                <?php if (!empty($sessions_image)) { ?>
                    <div class="sessions-pic">
                        <a href="<?php echo get_permalink( $value->ID); ?>" target="">
                            <img src="<?php echo $sessions_image; ?>" alt="">
                            <div class="overlay">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/keys-icon.svg" alt="">
                            </div>
                        </a>
                    </div>
                <?php } ?>
                <?php if (!empty($sessions_heading)) { ?>
                    <h3><?php echo $sessions_heading; ?></h3>
                <?php } ?>
                <div class="btn-block">
                    <a class="btn-primary" href="<?php echo get_permalink( $value->ID); ?>/#sessions-single">Find out more</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>

        <div id="sessions-single" class="sessions-description">
            <div class="sessions-single-desc astro-session">
                <div class="close">Close</div>
                <?php if (!empty($sessions_title)) { ?>
                    <h2><?php echo $sessions_title; ?></h2>
                <?php } ?>
                <?php if (!empty($sessions_sub_title)) { ?>
                    <h5><?php echo $sessions_sub_title; ?></h5>
                <?php } ?>
                <?php echo $sessions_description; ?>
                <?php if (!empty($cta_get_in_touch['title'])) { ?>
                    <div class="btn-block text-center">
                        <a class="btn-primary" href="<?php echo $cta_get_in_touch['url']; ?>" target="<?php echo $cta_get_in_touch['target']; ?>"><?php echo $cta_get_in_touch['title']; ?></a>
                    </div>
                <?php } ?>
                <section class="tabs">
                  <ul class="tabs-header">
                    <?php foreach ($tabs_lists as $key => $value) {
                        $tabs_title = $value['tabs_title'];
                        $tabs_content = $value['tabs_content'];
                    ?>
                        <li class="tabs-header-title js-tabs-title <?php if($key == '0') { ?> active <?php } ?>" data-tab="#tab-<?php echo $key; ?>"><?php echo $tabs_title; ?></li>
                    <?php } ?>
                  </ul>
                  <?php foreach ($tabs_lists as $key => $value) {
                        $tabs_title = $value['tabs_title'];
                        $tabs_content = $value['tabs_content'];
                        $cta = $value['cta'];
                    ?>
                      <div class="tabs-content js-tabs-content <?php if($key == '0') { ?> active <?php } ?> "  id="tab-<?php echo $key; ?>">
                        <?php echo $tabs_content; ?>

                        <?php if (!empty($cta['title'])) { ?>
                            <div class="btn-block text-center">
                                <a class="btn-primary" href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>"><?php echo $cta['title']; ?></a>
                            </div>
                        <?php } ?>
                      </div>
                  <?php } ?>
                </section>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>