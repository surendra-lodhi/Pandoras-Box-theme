<?php
wp_reset_query();
wp_reset_postdata();
$home_hero_bg = get_sub_field('home_hero_bg');
$site_logo = get_sub_field('home_site_logo');
$hero_title = get_sub_field('hero_title');
$hero_sub_title = get_sub_field('hero_sub_title');
?>
<section class="home-hero-section" style="background-image: url(<?php echo $home_hero_bg ?>);">
    <div class="corner-design"></div>
    <div class="container">
        <div class="logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php echo $site_logo?>" alt=""></a>
        </div>
        <div class="home-hero-content">
            <?php if (!empty($hero_title)) { ?>
                <h1><?php echo $hero_title?></h1>
            <?php } ?>
            <?php if (!empty($hero_sub_title)) { ?>
                <h5><?php echo $hero_sub_title?></h5>
            <?php } ?>
        </div>
    </div>
</section>