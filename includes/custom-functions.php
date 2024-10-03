<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/*
 * Escape Tags & Slashes
 * Handles escapping the slashes and tags
 */
function pandorabox_escape_attr($data) {
    return !empty( $data ) ? esc_attr( stripslashes( $data ) ) : '';
}

/*
 * Strip Slashes From Array
 */
function pandorabox_escape_slashes_deep($data = array(),$flag=true) {
    if($flag != true) {
         $data = pandorabox_nohtml_kses($data);
    }
    $data = stripslashes_deep($data);
    return $data;
}

/*
 * Strip Html Tags 
 * 
 * It will sanitize text input (strip html tags, and escape characters)
 */
function pandorabox_nohtml_kses($data = array()) {
    if ( is_array($data) ) {
        $data = array_map(array($this,'pandorabox_nohtml_kses'), $data);
    } elseif ( is_string( $data ) ) {
        $data = wp_filter_nohtml_kses($data);
    }
   return $data;
}

/*
 * Display Short Content By Character
 */
function pandorabox_excerpt_char( $content, $length = 40 ) {
    $text = '';
    if( !empty( $content ) ) {
        $text = strip_shortcodes( $content );
        $text = str_replace(']]>', ']]&gt;', $text);
        $text = strip_tags($text);
        $excerpt_more = apply_filters('excerpt_more', ' ' . ' ...');
        $text = substr($text, 0, $length);
        $text = $text . $excerpt_more;
    }
    return $text;
}

/*
 * search in posts and pages
 */
function pandorabox_filter_search( $query ) {
    if( !is_admin() && $query->is_search ) {
        $query->set( 'post_type', array( PANDORABOX_POST_POST_TYPE, PANDORABOX_PAGE_POST_TYPE ) );
    }
    return $query;
}
add_filter( 'pre_get_posts', 'pandorabox_filter_search' );


/*
 * Remove wp logo from admin bar
 */
function pandorabox_remove_wp_logo() {
    global $wp_admin_bar;

    if( class_exists('acf') ) {
        $wp_help  = get_field( 'pandorabox_options_wp_help', 'option' );
        if( empty( $wp_help ) ) {
            $wp_admin_bar->remove_menu('wp-logo');
        }
    }
}
add_action( 'wp_before_admin_bar_render', 'pandorabox_remove_wp_logo' );

/*
 * Custom login logo
 */
function pandorabox_custom_login_logo() {
    if( class_exists('acf') ) {
        $wp_login_logo      = get_field( 'pandorabox_options_login_logo', 'option' );
        $wp_login_w         = get_field( 'pandorabox_options_login_logo_w', 'option' );
        $wp_login_h         = get_field( 'pandorabox_options_login_logo_h', 'option' );
        $wp_login_bg        = get_field( 'pandorabox_options_login_bg', 'option' );
        $wp_login_btn_c     = get_field( 'pandorabox_options_login_btn_color', 'option' );
        $wp_login_btn_c_h   = get_field( 'pandorabox_options_login_btn_color_h', 'option' );
        if( !empty( $wp_login_logo ) ) {
?>
        <style type="text/css">
            .login h1 a {
                background-image: url('<?php echo $wp_login_logo; ?>') !important;
                background-size: <?php echo $wp_login_w.'px'; ?> auto !important;
                height: <?php echo $wp_login_h.'px'; ?> !important;
                width: <?php echo $wp_login_w.'px'; ?> !important;
            }
        </style>
<?php
        }
        if( !empty( $wp_login_bg ) ){
?>
        <style type="text/css">
            body.login{ background: #133759 url("<?php echo $wp_login_bg; ?>") no-repeat center; background-size: cover;}
            body.login div#login form#loginform input#wp-submit {background-color: <?php echo $wp_login_btn_c; ?> !important;}
            body.login div#login form#loginform input#wp-submit:hover {background-color: <?php echo $wp_login_btn_c_h; ?> !important;}
        </style>
<?php
        }
    }
}
add_action( 'login_enqueue_scripts', 'pandorabox_custom_login_logo' );

/*
 * Change custom login page url
 */
function pandorabox_loginpage_custom_link() {
    $site_url = esc_url( home_url( '/' ) );
    return $site_url;
}
add_filter( 'login_headerurl', 'pandorabox_loginpage_custom_link' );

/*
 * Change title on logo
 */
function pandorabox_change_title_on_logo() {
    $site_title = get_bloginfo( 'name' );
    return $site_title;
}
add_filter( 'login_headertitle', 'pandorabox_change_title_on_logo' );

/*
 * Change admin your favicon
 */
function pandorabox_admin_favicon() {
    if( class_exists('acf') ) {
        $favicon_url        = get_field( 'pandorabox_options_wp_favicon', 'option' );
        if( !empty( $favicon_url ) ){
            echo '<link rel="icon" type="image/x-icon" href="' . $favicon_url . '" />';
        }
    }
}
add_action('login_head', 'pandorabox_admin_favicon');
add_action('admin_head', 'pandorabox_admin_favicon');

/*
 * add filter to add shortcode in widget
 */
add_filter( 'widget_text', 'do_shortcode' );
/*
 * comment form customized
 */
add_action('comment_form_before_fields', function () {
    echo '<div class="col-md-6">';
});
add_action('comment_form_after_fields', function () {
    echo '</div>';
});
add_action('comment_form_top', function () {
    echo '<div class="row">';
});
add_action('comment_form', function () {
    echo '</div>';
});

function move_comment_field_to_bottom($fields) {
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter('comment_form_fields', 'move_comment_field_to_bottom');

add_filter('comment_form_default_fields', 'tu_filter_comment_fields', 20);

function tu_filter_comment_fields($fields) {
    $commenter = wp_get_current_commenter();
    $fields['author'] = '<div class="col-full"><input id="author" name="author" type="text" placeholder="Full name*" value="' . esc_attr($commenter['comment_author']) . '" size="30" /></div>';

    $fields['email'] = '<div class="col-full"><input id="email" name="email" type="email" placeholder="Email address*" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" /></div>';

    $fields['url'] = '<div class="col-full"><input id="url" name="url" type="url" placeholder="Website" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div>';

    return $fields;
}

function mytheme_comment($comment, $args, $depth) {
    ?>
    <div class="single-comment <?php if ($comment->comment_parent) { ?>  single-comment-reply <?php } ?>"  id="comment-<?php comment_ID() ?>">
        <h5>
            <?php echo get_comment_author(); ?> | <?php echo get_comment_date(); ?>
            <span class="reply">
                <?php
                comment_reply_link(
                        array_merge(
                                $args,
                                array(
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth']
                                )
                        )
                );
                ?>
            </span>
        </h5>
        <?php comment_text(); ?>
    </div>
    <?php
}

/*
 * Load More Posts
 */
add_action("wp_ajax_pandorabox_load_more_posts", "pandorabox_load_more_posts_fun");
add_action('wp_ajax_nopriv_pandorabox_load_more_posts', 'pandorabox_load_more_posts_fun');

function pandorabox_load_more_posts_fun() {
    $pandorabox_post_per_pages = $_POST['pandorabox_post_per_pages'];
    $pandorabox_paged = $_POST['pandorabox_paged'];
    $pandorabox_term_ids = $_POST['pandorabox_term_ids'];
    ob_start();
    if ($pandorabox_term_ids == 'all' || $pandorabox_term_ids == '') {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $pandorabox_post_per_pages,
            'paged' => $pandorabox_paged,
            'orderby' => 'post_date',
            'order' => 'DESC',
        );
    } else {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $pandorabox_post_per_pages,
            'paged' => $pandorabox_paged,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'terms' => $pandorabox_term_ids,
                    'field' => 'term_id',
                    'operator' => 'IN',
                )
            )
        ); 
        ?>
        
        <?php
    }
    $posts_query = new WP_Query($args);
    ?>
        
    <?php
    if ($posts_query->have_posts()) {
        while ($posts_query->have_posts()) {
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
            <?php
        }
    } else {
        ?>
        <div class="loader-mask">
            <div class="loader">
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="news-card" style="width: 100%;padding-top:80px;text-align: center">Can't Found Post.</div>  
        <?php
    }
    wp_reset_postdata();
    $html .= ob_get_clean();
    echo json_encode(array('html' => $html, 'max_num_pages' => $posts_query->max_num_pages));
    die();
}
