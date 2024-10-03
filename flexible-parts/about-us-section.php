<?php
wp_reset_query();
wp_reset_postdata();
$about_us_bg = get_sub_field('about_us_bg');
$about_title = get_sub_field('about_title');
$about_content = get_sub_field('about_content');
$cta = get_sub_field('cta');
$image_gallery_lists = get_sub_field('image_gallery_lists');
?>

<section class="about-us-section" style="background-image: url(<?php echo $about_us_bg ?>);">
    <div class="container">
        <div class="about-us-content">
            <?php if (!empty($about_title)) { ?>
                <h2><?php echo $about_title?></h2>
            <?php } ?>
            <?php echo $about_content?>
            <?php if (!empty($cta['title'])) { ?>
                <div class="btn-block text-center">
                    <a class="btn-primary" href="<?php echo $cta['url']?>" target="<?php echo $cta['target']; ?>"><?php echo $cta['title']?></a>
                </div>
            <?php } ?>
        </div>
        <?php if (!empty($image_gallery_lists)) { ?>
        <div id="our-gallery">
            <div id="image-gallery">
                <?php foreach ($image_gallery_lists as $key => $value) {
                    $gallery_image = $value['gallery_image'];
                ?>
                    <div class="single-item image">
                      <div class="img-wrapper">
                        <a href="<?php echo $gallery_image?>">
                            <img src="<?php echo $gallery_image?>" class="img-responsive">
                        </a>
                        <div class="img-overlay">
                          <img class="keys" src="<?php echo get_template_directory_uri(); ?>/images/keys-icon.svg" alt="">
                        </div>
                      </div>
                    </div>
                <?php } ?>
            </div><!-- End image gallery -->              
        </div>
        <?php } ?>
    </div>
</section>