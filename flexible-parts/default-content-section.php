<?php
wp_reset_query();
wp_reset_postdata();
$section_bg = get_sub_field('section_bg');
$content = get_sub_field('content');
?>
<section class="default-content-section" style="background-image: url(<?php echo $section_bg ?>);">
    <div class="container">
        <?php echo $content?>
    </div>
</section>