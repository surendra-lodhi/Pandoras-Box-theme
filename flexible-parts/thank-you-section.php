<?php
wp_reset_query();
wp_reset_postdata();
$section_bg = get_sub_field('section_bg');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$cta = get_sub_field('cta');
?>
<section class="thank-you-section" style="background-image: url(<?php echo $section_bg ?>);">
    <div class="container">
        <div class="thank-you-inner">
            <?php if (!empty($heading)) { ?>
                <h2><?php echo $heading; ?></h2>
            <?php } ?>
            <?php echo $content; ?>
            
            <?php if (!empty($cta['title'])) { ?>
                <div class="btn-block">
                    <a class="btn-primary" href="<?php echo $cta['url']; ?>" target="<?php echo $cta['target']; ?>"><?php echo $cta['title']; ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>