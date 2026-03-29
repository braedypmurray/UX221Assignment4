<?php
/**
 * Theme Functions and Definitions
 *
 * @package darkmusic-blog
 */

// Theme Setup
add_action( 'after_setup_theme', function() {
    add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'quote', 'video', 'audio', 'link', 'status', 'chat' ) );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'custom-background' );
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'darkmusic-blog' ),
    ) );
});

// Enqueue Styles & Scripts
function darkmusic_blog_enqueue_scripts() {
    // Bootstrap
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '', true );

    // Menu Styles and JS
    wp_enqueue_style( 'darkmusic-blog-menu', get_template_directory_uri() . '/menu/menu.css', array(), '1.0' );
    wp_enqueue_script( 'darkmusic-blog-menu', get_template_directory_uri() . '/menu/menu.js', array( 'jquery' ), '1.0', true );

    // Back to Top JS
    wp_enqueue_script( 'darkmusic-blog-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), null, true );

    // Customizer Button CSS
    wp_enqueue_style( 'darkmusic-blog-customizer-css', get_stylesheet_directory_uri() . '/inc/customizer-button/customizer-custom.css' );

    // Main Stylesheet
    wp_enqueue_style( 'darkmusic-blog-style', get_stylesheet_uri() );

    // Fonts via Local Loader
    require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
    wp_add_inline_style(
        'darkmusic-blog-style',
        wptt_get_webfont_styles( 'https://fonts.googleapis.com/css2?family=Literata&display=swap' )
    );

    // Inline color selector (make sure $custom_css is set correctly inside the included file)
    require get_parent_theme_file_path( '/inc/color-selector.php' );
    if ( isset( $custom_css ) ) {
        wp_add_inline_style( 'darkmusic-blog-style', $custom_css );
    }
}
add_action( 'wp_enqueue_scripts', 'darkmusic_blog_enqueue_scripts' );

// Skip Link Focus Fix for IE11
function darkmusic_blog_skip_link_focus_fix() {
    ?>
    <script>
        /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
    </script>
    <?php
}
add_action( 'wp_print_footer_scripts', 'darkmusic_blog_skip_link_focus_fix' );

// Navigation Menu Output
if ( ! function_exists( 'darkmusic_blog_primary_nagivation' ) ) :
function darkmusic_blog_primary_nagivation() {
    ?>
    <nav id="site-navigation" class="main-navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
            <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
            <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'darkmusic-blog' ); ?>">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu main-menu-modal',
                    'fallback_cb'    => 'darkmusic_blog_primary_menu_fallback',
                ) );
                ?>
            </div>
        </div>
        <button class="toggle-button" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
            <span class="toggle-bar"></span>
            <span class="toggle-bar"></span>
            <span class="toggle-bar"></span>
        </button>
    </nav>
    <?php
}
endif;

// Menu Fallback
if ( ! function_exists( 'darkmusic_blog_primary_menu_fallback' ) ) :
function darkmusic_blog_primary_menu_fallback() {
    if ( current_user_can( 'manage_options' ) ) {
        echo '<ul id="primary-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'darkmusic-blog' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

// Sidebar
function darkmusic_blog_theme_register_sidebars() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'darkmusic-blog' ),
        'id'            => 'primary-sidebar',
        'description'   => __( 'Widgets in this area will be shown in the sidebar.', 'darkmusic-blog' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'darkmusic_blog_theme_register_sidebars' );

// Register Footer Widget Area
function darkmusic_blog_register_footer_widget_area() {
    register_sidebar( array(
        'name'          => __( 'Footer 1 Widget Area', 'darkmusic-blog' ),
        'id'            => 'footer_widget_area1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'darkmusic-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 2 Widget Area', 'darkmusic-blog' ),
        'id'            => 'footer_widget_area2',
        'description'   => __( 'Add widgets here to appear in your footer.', 'darkmusic-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 3 Widget Area', 'darkmusic-blog' ),
        'id'            => 'footer_widget_area3',
        'description'   => __( 'Add widgets here to appear in your footer.', 'darkmusic-blog' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'darkmusic_blog_register_footer_widget_area' );


// Customizer and Helpers
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom-customizer.php';
require get_template_directory() . '/inc/getstarted/getstart.php';

// Radio button sanitizer
function darkmusic_blog_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    return ( isset( $control->choices[ $input ] ) ) ? $input : $setting->default;
}

// Credit Link
define( 'darkmusic_blog_URL', 'https://cawpthemes.com/' );
function darkmusic_blog_credit_link() {
    echo esc_html__( 'Powered by WordPress | By ', 'darkmusic-blog' ) . '<a href="' . esc_url( darkmusic_blog_URL ) . '" target="_blank">' . esc_html__( 'CA WP Themes', 'darkmusic-blog' ) . '</a>';
}


function darkmusic_blog_mytheme_register_block_styles() {
    // Register a block style for the heading block
    wp_register_style(
        'heading-style-darkmusic-blog',
        get_template_directory_uri() . '/css/blocks.css',
        array( 'wp-blocks' ),
        '1.0',
        'all'
    );
    register_block_style(
        'core/heading',
        array(
            'name'         => 'darkmusic-blog-heading',
            'label' => __( 'My Theme Heading', 'darkmusic-blog' ),
            'style_handle' => 'heading-style-darkmusic-blog-',
        )
    );
}
add_action( 'init', 'darkmusic_blog_mytheme_register_block_styles' );


//------Custom Block---------

function darkmusic_blog_mytheme_register_block_patterns() {
    if ( function_exists( 'register_block_pattern' ) ) {
        register_block_pattern(
            'darkmusic-blog/custom-pattern',
            array(
                'title'       => __( 'My Custom Pattern', 'darkmusic-blog' ),
                'description' => __( 'A custom block pattern for my theme', 'darkmusic-blog' ),
                'categories'  => array( 'text' ),
                'content'     => '<!-- wp:paragraph --><p>This is my custom block pattern</p><!-- /wp:paragraph -->',
            )
        );
    }
}
add_action( 'init', 'darkmusic_blog_mytheme_register_block_patterns' );


function darkmusic_blog_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'darkmusic_blog_add_editor_styles' );

//------------------------Comments-------------


function darkmusic_blog_enable_threaded_comments() {
    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'darkmusic_blog_enable_threaded_comments');

// ----------------------------Menu navigation keyboard--------------


function darkmusic_blog_add_tabindex_to_menu_items( $atts, $item, $args, $depth ) {
    // Add tabindex="0" to the menu item
    $atts['tabindex'] = '0';
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'darkmusic_blog_add_tabindex_to_menu_items', 10, 4 );



//--------------------Define--------------------


define('DARKMUSIC_BLOG_PRO_URL', 'https://cawpthemes.com/darkmusic-blog-premium-wordpress-theme/');
define('DARKMUSIC_BLOG_PRO_SUPPORT', 'https://cawpthemes.com/support/');
define('DARKMUSIC_BLOG_PRO_DEMO', 'https://demo.cawpthemes.com/darkmusic-pro');
define('DARKMUSIC_BLOG_PRO_DOCUMENTATION', 'https://cawpthemes.com/docs/darkmusic-blog-free-theme-documentation/');
define('DARKMUSIC_BLOG_FREE_URL', 'https://demo.cawpthemes.com/darkmusic-blog');


