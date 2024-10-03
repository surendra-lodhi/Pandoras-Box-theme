<?php
wp_reset_query();
wp_reset_postdata();
$contact_bg = get_sub_field('contact_bg');
$contact_title = get_sub_field('contact_title');
$contact_email = get_sub_field('contact_email');
$follow_us_lists = get_sub_field('follow_us_lists');
$form_shortcode = get_sub_field('form_shortcode');
?>

<section class="contact-form-section" style="background-image: url(<?php echo $contact_bg ?>);">
    <div class="container">
        <div class="contact-form-wrap">
            <?php if (!empty($contact_title)) { ?>
                <h2><?php echo $contact_title?></h2>
            <?php } ?>
            <?php if (!empty($contact_email)) { ?>
            <div class="email">
                <a href="mailto:<?php echo $contact_email?>"><?php echo $contact_email?></a>
            </div>
            <?php } ?>
            <?php if (!empty($follow_us_lists)) { ?>
            <div class="follow-us">
                <ul>
                    <?php foreach ($follow_us_lists as $key => $value) {
                        $social_icon = $value['social_icon'];
                        $social_url = $value['social_url'];
                    ?>
                        <li><a href="<?php echo $social_url?>" target="_blank"><img src="<?php echo $social_icon?>" alt=""></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
            <div class="gform-design">
                <?php echo do_shortcode($form_shortcode);?>
            </div>
        </div>
    </div>
</section>