<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage PANDORABOX
 * @since Pandora Box 1.0
 */


get_header(); ?>

<?php if (class_exists('acf')) { 
    
    if (have_rows('flexible_content', get_option( 'page_for_posts' ))):
        while (the_flexible_field('flexible_content', get_option( 'page_for_posts' ))) : 
            include locate_template('flexible-parts/' . str_replace('_', '-', get_row_layout()) . '.php');
        endwhile;
    endif;
} ?>

<section class="blog-section">
    <div class="container">
        <div class="blog-categories">
            <ul>
                <li  data-term_ids="all">All</li>
                <?php
                $terms = get_terms( array(
                    'taxonomy'   => 'category',
                    'hide_empty' => false,
                ) );
                    foreach($terms as $category) { ?>
                        <li data-term_ids="<?php echo $category->term_id; ?>"><?php echo $category->name . ' '; ?></li>
                <?php } ?>
            </ul>
        </div>
        <div class="blog-wrap">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details">
                        <div class="blog-single">
                            <div class="blog-pic">
                                <?php
                                $post_thumbnail_url = get_the_post_thumbnail_url();
                                $post_thumbnail_url = !empty($post_thumbnail_url) ? $post_thumbnail_url : get_template_directory_uri() . '/images/placeholder-image.png'
                                ?>
                                <img src="<?php echo $post_thumbnail_url; ?>" alt="<?php the_title(); ?>">
                            </div>
                            <h5><?php the_title(); ?></h5>
                            <?php the_content(); ?>
                            <div class="share-post">
                                <h5>Share this post</h5>
                                <ul>
                                    <li><a href="https://twitter.com/share?source=<?php echo urlencode(get_permalink()) ?>&text=<?php echo get_the_title(); ?> - <?php echo urlencode(get_permalink()) ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/x-b.svg" alt=""></a></li>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()) ?>&title=<?php echo get_the_title(); ?>&description=<?php echo wp_trim_words(get_the_content(), 50) ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-b.svg" alt=""></a></li>
                                    <li><a href="https://www.instagram.com/sharer.php?u=<?php echo urlencode(get_permalink()) ?>&title=<?php echo get_the_title(); ?>&description=<?php echo wp_trim_words(get_the_content(), 50) ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/instagram-b.svg" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="leave-comment-form">
                        <?php
                        if (comments_open() || get_comments_number()) {
                            comments_template();
                        }
                        ?>
                    </div>
                    <?php if (have_comments()) : ?>
                        <div class="comments-listing"> 
                            <h2>Comments</h2>
                            <div class="comment-list">
                                <?php wp_list_comments('type=comment&callback=mytheme_comment&max_depth=3'); ?>
                            </div>
                            <?php the_comments_navigation(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="btn-block text-center d-lg-none">
                        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn-primary">Back to all posts</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        
                        <?php
                            $our_pic = get_field('our_pic','option');
                            $our_content = get_field('our_content','option');
                            $cta = get_field('cta','option');
                            $divider = get_field('divider','option');
                        ?>
                        <?php if(get_field('sidebar_about_block', 'option')): ?>
                        <div class="about-diana">
                            <div class="pic-border">
                                <img src="<?php echo $our_pic ?>" alt="">
                            </div>
                            <div class="diana-bio">
                                <?php echo $our_content ?>
                            </div>
                            <div class="btn-block">
                                <a class="btn-outline" href="<?php echo $cta['url'] ?>" target="<?php echo $cta['target'] ?>"><?php echo $cta['title'] ?></a>
                            </div>
                        </div>
                        <div class="key-divider"><img src="<?php echo $divider ?>" alt=""></div>
                        <?php endif; ?>
                        <?php get_sidebar(); ?> 
                    </div>
                </div>
            </div>
            <div class="btn-block text-center d-none d-lg-block">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn-primary">Back to all posts</a> 
            </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>