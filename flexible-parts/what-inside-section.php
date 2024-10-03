<?php
wp_reset_query();
wp_reset_postdata();
$what_inside_bg = get_sub_field('what_inside_section_bg');
$heading = get_sub_field('heading');
$what_inside_content = get_sub_field('what_inside_content');
$cta = get_sub_field('cta');
$cta_icon = get_sub_field('cta_icon');
?>
<section class="what-inside-section" style="background-image: url(<?php echo $what_inside_bg ?>);">
    <div class="container">
        <div class="what-inside-content">
        	<?php if (!empty($heading)) { ?>
            	<h2><?php echo $heading?></h2>
            <?php } ?>
            <?php if (!empty($what_inside_content)) { ?>
            	<?php echo $what_inside_content?>
            <?php } ?>
            <?php if (!empty($cta['title'])) { ?>
	            <div class="btn-block">
	                <a class="btn-outline" href="<?php echo $cta['url']?>" target="<?php echo $cta['target']?>"><?php echo $cta['title']?> <img class="keys" src="<?php echo $cta_icon?>" alt=""></a>
	            </div>  
            <?php } ?>
        </div>
    </div>
</section>