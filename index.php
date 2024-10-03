<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage PANDORABOX
 * @since Pandora Box 1.0
 */

get_header(); 
global $wp_query;
?>

<?php if (class_exists('acf')) { 
    
    if (have_rows('flexible_content', get_option( 'page_for_posts' ))):
        while (the_flexible_field('flexible_content', get_option( 'page_for_posts' ))) : 
            include locate_template('flexible-parts/' . str_replace('_', '-', get_row_layout()) . '.php');
        endwhile;
    endif;
} ?>
<style>
    
    .grid-sizer, .item {
  width: calc(50% - 5px);
}
</style>

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
                    <div class="blog-lists">
                        <div class="row">
                        <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => '6',
                                'orderby' => 'post_date',
                                'order'   => 'DESC',
                                'paged' => 1
                            );
                            $posts_query = new WP_Query($args);
                            ?>
                            <?php if ($posts_query->have_posts() ) { ?>
                            
                                <div class="grid-sizer"></div>

                                <?php while ($posts_query->have_posts() ) {
                                $posts_query->the_post(); 
                                ?>
                                    <div class="item">
                                        <div class="blog-single">
                                            <div class="blog-pic">
                                                <a href="<?php echo get_permalink( $post->ID ); ?>">
                                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                                                </a>
                                            </div>
                                            <h5><?php the_title(); ?></h5>
                                            <p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
                                            <div class="readmore">
                                                <a href="<?php echo get_permalink( $post->ID ); ?>">Find out more</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if ($posts_query->max_num_pages > 1) { ?>
                        <div class="btn-block text-center d-lg-none">
                            <a class="btn-primary loadmore-post" href="#" data-pandorabox_paged="2">Load more posts</a>
                        </div>
                    <?php } ?>
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
            <?php if ($posts_query->max_num_pages > 1) { ?>
                <div class="btn-block text-center d-none d-lg-block">
                    <a class="btn-primary loadmore-post" href="#" data-pandorabox_paged="2">Load more posts</a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>