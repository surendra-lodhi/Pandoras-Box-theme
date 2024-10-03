<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage PANDORABOX
 * @since Pandora Box 1.0
 */
?>
<?php 
    if(class_exists('acf')){
        $footer_bg = get_field('footer_bg','option');
        $footer_title = get_field('pandorabox_options_footer_title','option');
        $footer_email = get_field('pandorabox_options_c_email','option');
        $pandorabox_options_s_tw_link = get_field('pandorabox_options_s_tw_link','option');
        $pandorabox_options_s_fb_link = get_field('pandorabox_options_s_fb_link','option');
        $pandorabox_options_s_in_link = get_field('pandorabox_options_s_in_link','option');
        $pandorabox_options_s_yt_link = get_field('pandorabox_options_s_yt_link','option');
        
        $copyright_text = get_field('pandorabox_options_copyright_text','option');
        $website_design_by_text = get_field('pandorabox_options_website_design_by_text','option');
        if(is_home() || is_single() ){
            $page_ids =  get_option( 'page_for_posts' );

        }else{
            $page_ids = get_the_ID();
        }
        $footer_testimonial = get_field('footer_testimonial',$page_ids);
    }
?>
<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="footer-inner-wrap" style="background-image: url(<?php echo $footer_bg; ?>);">
        <div class="container">
            <?php if (!empty($footer_testimonial)) { ?>
            <div class="testimonials">
                <?php foreach ($footer_testimonial as $key => $value) {
                    $testimonial_text = get_field('testimonial_text',$value->ID);
                    $author = get_field('author',$value->ID);
                ?>
                    <div class="testimonial">
                        <p><?php echo $testimonial_text?></p>	
                        <div class="author"><?php echo $author?></div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="get-in-touch">
                <div class="divider-line"><img src="<?php echo get_template_directory_uri(); ?>/images/keys-icon.svg" alt=""></div>
                <h3><?php echo $footer_title?></h3>
                <div class="email"><a href="mailto:<?php echo $footer_email?>"><?php echo $footer_email?></a></div>
                <div class="footer-social">
                    <ul>
                        <li><a href="<?php echo $pandorabox_options_s_tw_link ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.svg" alt=""></a></li>
                        <li><a href="<?php echo $pandorabox_options_s_fb_link ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-icon.svg" alt=""></a></li>
                        <li><a href="<?php echo $pandorabox_options_s_in_link ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/instagram-icon.svg" alt=""></a></li>
                        <li><a href="<?php echo $pandorabox_options_s_yt_link ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/youtube-icon.svg" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
        		<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'pandorabox' ); ?>">
        			<?php
        				wp_nav_menu( array(
        					'theme_location' => 'primary',
        					'menu_class'     => 'primary-menu',
        				 ) );
        			?>
        		</nav><!-- .main-navigation -->
    	    <?php endif; ?>
        </div>
        <div class="corner-design"></div>
    </div>

    <div class="site-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="copyright">
                        <?php echo $copyright_text?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="design-by"><?php echo $website_design_by_text?></div>
                </div>
            </div>
        </div>
    </div>
</footer><!-- .site-footer -->               

        <?php wp_footer(); ?>
    </body>
</html>
