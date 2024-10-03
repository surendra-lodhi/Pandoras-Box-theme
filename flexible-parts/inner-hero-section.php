<?php
wp_reset_query();
wp_reset_postdata();
$inner_hero_bg = get_sub_field('inner_hero_bg');
$inner_hero_mobile_bg = get_sub_field('inner_hero_mobile_bg');
$inner_site_logo = get_sub_field('inner_site_logo');
$hero_title = get_sub_field('hero_title');
$hero_sub_title = get_sub_field('hero_sub_title');
?>
<section class="inner-hero-section desktop-hero" style="background-image: url(<?php echo $inner_hero_bg ?>);">
    <div class="corner-design"></div>
    <div class="container">
        <div class="logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo $inner_site_logo?>" alt=""></a>
        </div>
        <?php if (!empty($hero_title)) { ?>
            <h1><?php echo $hero_title?></h1>
        <?php } ?>
        <?php if (!empty($hero_sub_title)) { ?>
            <h5><?php echo $hero_sub_title?></h5>
        <?php } ?>
    </div>
</section>

<section class="inner-hero-section mobile-hero" style="background-image: url(<?php echo $inner_hero_mobile_bg ?>);">
    <div class="corner-design"></div>
    <div class="container">
        <div class="logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo $inner_site_logo?>" alt=""></a>
        </div>
        <?php if (!empty($hero_title)) { ?>
            <h1><?php echo $hero_title?></h1>
        <?php } ?>
        <?php if (!empty($hero_sub_title)) { ?>
            <h5><?php echo $hero_sub_title?></h5>
        <?php } ?>
    </div>
</section>
