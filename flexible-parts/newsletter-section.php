<?php
wp_reset_query();
wp_reset_postdata();
$section_bg = get_sub_field('section_bg');
$left_pic = get_sub_field('left_pic');
$heading = get_sub_field('heading');
$form_shortcode = get_sub_field('form_shortcode');
?>
<section class="newsletter-section" style="background-image: url(<?php echo $section_bg ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="newsletter-image">
                    <?php if (!empty($left_pic)) { ?>
                        <img src="<?php echo $left_pic ?>" alt="">
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-9 d-flex align-items-center">
                <div class="newsletter-content">
                    <?php if (!empty($heading)) { ?>
                        <h2><?php echo $heading ?></h2>
                    <?php } ?>
                    <div class="newsletter-form">
                        <?php echo do_shortcode($form_shortcode);?>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>