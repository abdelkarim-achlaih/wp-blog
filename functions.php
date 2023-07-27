<?php

/* Start Wordpress Bootstrap Navwalker */

function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action( 'after_setup_theme', 'register_navwalker' );

if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

/* End Wordpress Bootstrap Navwalker */

/* Start Adding Menus */

function add_custom_menus()
{
    register_nav_menus(array(
        "Navigation Bar" => "In the Header",
        "Links Menu" => "In the Footer Section 1",
        "Cats Menu" => "In the Footer Section 2"
    ));
}

function nav_bar_menu()
{
    wp_nav_menu(
        array(
            'theme_location' => "Navigation Bar",
            'menu_class' => "nav navbar-nav ",
            'container' => false,
            'depth' => 2,
            'walker' => new WP_Bootstrap_Navwalker()
        )
    );
}
function footer_section_1()
{
    wp_nav_menu(
        array(
            'theme_location' => "Links Menu",
            'menu_class' => "navbar-nav ",
            'container' => false,
            'depth' => 2,
        )
    );
}
function footer_section_2()
{
    wp_nav_menu(
        array(
            'theme_location' => "Cats Menu",
            'menu_class' => "navbar-nav ",
            'container' => false,
            'depth' => 2,
        )
    );
}

add_action("init", "add_custom_menus");

/* End Adding Menus */

/* Start enqueing Styles and Scripts */

function add_styles()
{
    wp_enqueue_style("Font Awesome Free 6.2.1", get_template_directory_uri() . '/css/all.min.css');
    wp_enqueue_style("Bootstrap v5.3.0-alpha1", get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style("Normalize", get_template_directory_uri() . '/css/normalize.css');
    wp_enqueue_style("My Styles", get_template_directory_uri() . '/css/main.css');
}

function add_scripts()
{
    wp_enqueue_script("Font Awesome Free 6.2.1", get_template_directory_uri() . '/js/all.min.js', array(), false, true);
    wp_enqueue_script("Bootstrap v5.3.0-alpha1", get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script("My Scripts", get_template_directory_uri() . '/js/main.js', array(), false, true);
}

add_action('wp_enqueue_scripts', 'add_styles');
add_action('wp_enqueue_scripts', 'add_scripts');

/* End enqueing Styles and Scripts */

/* Start Enabling Posts Thumbnails */

add_theme_support("post-thumbnails"); 

/* End Enabling Posts Thumbnails */

/* Start Excerpt Filters */

function extend_excerpt_length ($length) {
    return 30;
}
function extend_excerpt_more ($length) {
    return "...";
}
add_filter('excerpt_length', 'extend_excerpt_length');
add_filter('excerpt_more', 'extend_excerpt_more');

/* End Excerpt Filters */
/* Start Comments Template */

function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">
        <?php 
            if ( 'div' != $args['style'] ) {
                ?>
                    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
                <?php
            } 
        ?>
        <div class="row text-center text-md-start">
            <div class="col-md-1 mb-lg-auto mb-3">
                <?php 
                    if ( $args['avatar_size'] != 0 ) {
                        echo get_avatar( $comment, $args['avatar_size'] );
                    }
                ?>
            </div>
            <div class="col-md-10 ps-md-5">
                <h4 class="fw-bold text-white"><?php comment_author()?></h4>
                <p>
                    <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" class="text-white-50">
                        <?php
                            /* translators: 1: date, 2: time */
                            printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time());
                        ?>
                    </a>
                    <?php
                        edit_comment_link( __( '<i class="fa-solid fa-pen"></i> Edit' ), '  ', '' );
                    ?>
                </p>
            </div>
            <?php 
                if ( $comment->comment_approved == '0' ) { ?>
                    <p class="awaiting">
                        <?php 
                            _e( 'Your comment is awaiting moderation.' ); 
                        ?>
                    </p><br/><?php
                }
            ?>
        </div>
        <div class="comment-content fs-5 mb-2 text-center text-md-start text-white">
            <?php comment_text(); ?>
        </div>
        <div class="reply">
            <?php
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'reply_text' => __('<i class="fa-solid fa-comments"></i> Reply'),
                            'add_below' => $add_below,
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth']
                        )
                    )
                ); ?>
        </div>
        <?php
    if ( 'div' != $args['style'] ) :
    ?>
    </div>
    <?php 
    endif;
}
/* End Comments Template */
/* Start Pagination */
function pagiante () {
    global $wp_query;
    $number_of_all_pages = $wp_query->max_num_pages;
    $number_of_current_page = max(1, get_query_var('paged'));
    if ($number_of_all_pages > 1) {
        return paginate_links(array (
            'base'=> get_pagenum_link() . '%_%',
            'format' => 'page/%#%',
            'current' => $number_of_current_page
        ));
    }
}
/* End Pagination */
