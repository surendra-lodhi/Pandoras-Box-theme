<?php
wp_reset_query();
wp_reset_postdata();
$section_bg = get_sub_field('section_bg');
$heading = get_sub_field('heading');
$form_shortcode = get_sub_field('form_shortcode');
?>

<section class="payment-detail-section" style="background-image: url(<?php echo $section_bg; ?>);">
    <div class="container">
        <div class="payment-form-wrap">
            <?php if (!empty($heading)) { ?>
                <h2><?php echo $heading; ?></h2>
            <?php } ?>
            <?php if (!empty($form_shortcode)) { ?>
                <div class="gform-design">
                    <?php echo do_shortcode($form_shortcode);?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>