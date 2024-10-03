<?php
wp_reset_query();
wp_reset_postdata();
$section_bg = get_sub_field('section_bg');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$sessions_lists = get_sub_field('sessions_lists');
?>

<section class="sessions-detail-section" style="background-image: url(<?php echo $section_bg; ?>);">
    <div class="container">
        <div class="sessions-overview">
            <?php if (!empty($heading)) { ?>
                <h2><?php echo $heading; ?></h2>
            <?php } ?>
            <?php echo $content; ?>
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
    </div>
</section>
