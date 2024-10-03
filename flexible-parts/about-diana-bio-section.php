<?php
wp_reset_query();
wp_reset_postdata();
$diana_bio_bg = get_sub_field('diana_bio_bg');
$diana_bio_title = get_sub_field('diana_bio_title');
$diana_bio_content = get_sub_field('diana_bio_content');
$diana_pic = get_sub_field('diana_pic');
?>
<section class="about-diana-bio-section" style="background-image: url(<?php echo $diana_bio_bg ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="about-diana-content">
                    <?php if (!empty($diana_bio_title)) { ?>
                        <h2><?php echo $diana_bio_title?></h2>
                    <?php } ?>
                    <?php echo $diana_bio_content?>
                </div>
            </div>
            <div class="col-md-4">
                <?php if (!empty($diana_pic)) { ?>
                <div class="about-us-image">
                    <img src="<?php echo $diana_pic?>" alt="">
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>