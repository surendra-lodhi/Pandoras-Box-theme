<?php
wp_reset_query();
wp_reset_postdata();
$section_bg = get_sub_field('section_bg');
$heading = get_sub_field('heading');
$sub_heading = get_sub_field('sub_heading');
$content = get_sub_field('content');
$cta = get_sub_field('cta');
$about_diana_image = get_sub_field('about_diana_image');
?>
<section class="about-diana-section" style="background-image: url(<?php echo $section_bg ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="about-diana-content">
                	<?php if (!empty($heading)) { ?>
                    	<h2><?php echo $heading ?></h2>
                    <?php } ?>
                    <?php if (!empty($sub_heading)) { ?>
                    	<h5><?php echo $sub_heading ?></h5>
                    <?php } ?>
                    <?php if (!empty($content)) { ?>
                    	<?php echo $content ?>   
                    <?php } ?>
                    <?php if (!empty($cta['title'])) { ?>
                    <div class="btn-block">
                        <a class="btn-outline" href="<?php echo $cta['url'] ?>" target="<?php echo $cta['target'] ?>"><?php echo $cta['title'] ?></a>
                    </div>
                    <?php } ?>  
                </div>
            </div>
            <div class="col-md-4">
                <div class="about-diana-image">
                	<?php if (!empty($about_diana_image)) { ?>
                    	<img src="<?php echo $about_diana_image ?>" alt="">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>