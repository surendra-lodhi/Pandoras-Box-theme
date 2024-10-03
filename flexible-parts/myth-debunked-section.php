<?php
wp_reset_query();
wp_reset_postdata();
$section_bg = get_sub_field('section_bg');
$heading = get_sub_field('heading');
$sub_heading = get_sub_field('sub_heading');
$content = get_sub_field('content');
$lamp = get_sub_field('lamp');
?>
<section class="myth-debunked-section" style="background-image: url(<?php echo $section_bg ?>);">
    <div class="container">
        <div class="myth-debunked-inner">
            <?php if (!empty($heading)) { ?>
                <h2><?php echo $heading ?></h2>
            <?php } ?>
            <?php if (!empty($sub_heading)) { ?>
                <h5><?php echo $sub_heading ?></h5>
            <?php } ?>
            <?php if (!empty($content)) { ?>
                <?php echo $content ?>  
            <?php } ?>
            <?php if (!empty($lamp)) { ?>
                <div class="myth-debunked-image">
                    <img src="<?php echo $lamp ?>" alt="">
                </div>  
            <?php } ?>
        </div>
    </div>
</section>