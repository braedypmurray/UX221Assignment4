<?php
//about theme info
add_action( 'admin_menu', 'darkmusic_blog_gettingstarted_page' );
function darkmusic_blog_gettingstarted_page() {      
    add_theme_page( esc_html__('Darkmusic Blog', 'darkmusic-blog'), esc_html__('All About Darkmusic Blog', 'darkmusic-blog'), 'edit_theme_options', 'darkmusic_blog_mainpage', 'darkmusic_blog_content_main');   
}



function darkmusic_blog_discount_notice() {
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) { ?>
        <div class="notice getting_started">
            <div class="notice-content">
                <p><?php esc_html_e( '🎉 Thank You For Choosing CA WP Themes!', 'darkmusic-blog' ); ?></p>
                
                <h2><?php esc_html_e( '🚀 Get Started with Your Free Theme!', 'darkmusic-blog' ); ?></h2>
                
                <p><?php esc_html_e( "Here are some useful links to help you set up your theme quickly:", 'darkmusic-blog' ); ?></p>
                
                <div class="info-link">
                    <a href="<?php echo esc_url( 'https://cawpthemes.com/darkmusic-blog-free-wordpress-theme/' ); ?>" target="_blank">
                        <?php esc_html_e( '🎨 View Free Theme Details', 'darkmusic-blog' ); ?>
                    </a>
                </div>
                
                <div class="info-link">
                    <a href="<?php echo esc_url( 'https://cawpthemes.com/docs/darkmusic-blog-free-documentation/' ); ?>" target="_blank">
                        <?php esc_html_e( '📖 Read Theme Documentation', 'darkmusic-blog' ); ?>
                    </a>
                </div>

                <h2><?php esc_html_e( '🔥 Upgrade to Pro for More Amazing Features!', 'darkmusic-blog' ); ?></h2>
                
                <p><?php esc_html_e( "Unlock the full potential of your website with our premium version! 🚀", 'darkmusic-blog' ); ?></p>
                
                <div class="info-link">
                   <a href="<?php echo esc_url( 'https://cawpthemes.com/docs/premium-theme-and-plugin-download/' ); ?>" target="_blank">
                        <?php esc_html_e( '📖 Pro Documentation', 'darkmusic-blog' ); ?>
                    </a>
                </div>

                <div class="info-link">
                    <a href="<?php echo esc_url( DARKMUSIC_BLOG_PRO_URL ); ?>" target="_blank">
                        <?php esc_html_e( '🚀 Upgrade to Pro', 'darkmusic-blog' ); ?>
                    </a>
                </div>

                <div class="info-link">
                    <a href="<?php echo esc_url( DARKMUSIC_BLOG_PRO_DEMO ); ?>" target="_blank">
                        <?php esc_html_e( '✨ Premium Demo', 'darkmusic-blog' ); ?>
                    </a>
                </div>

                <h2><?php esc_html_e( '🔥 Limited Time Offer – Flat 15% OFF on Pro Themes!', 'darkmusic-blog' ); ?></h2>
                
                <p><?php esc_html_e( "Upgrade today and get 15% off! Don't miss this exclusive deal! 💰", 'darkmusic-blog' ); ?></p>
                
                <ul class="discount-benefits">
                    <li>✅ <?php esc_html_e('SEO Optimized & Speed Fast 🚀', 'darkmusic-blog'); ?></li>
                    <li>✅ <?php esc_html_e('Fully Responsive & Mobile-Friendly 📱', 'darkmusic-blog'); ?></li>
                    <li>✅ <?php esc_html_e('Customizer Support for Easy Customization 🎨', 'darkmusic-blog'); ?></li>
                    <li>✅ <?php esc_html_e('Premium Features & Regular Updates 🔥', 'darkmusic-blog'); ?></li>
                </ul>
                
                <p class="discount-code">
                    <?php esc_html_e('👉 Use Code:', 'darkmusic-blog'); ?> 
                    <span>SAVE15</span> 
                    <?php esc_html_e(' at Checkout', 'darkmusic-blog'); ?>
                </p>
                
                <div class="info-link">
                    <a href="<?php echo esc_url( DARKMUSIC_BLOG_PRO_URL ); ?>" target="_blank">
                        <?php esc_html_e( '🛒 Shop Now', 'darkmusic-blog' ); ?>
                    </a>
                </div>

                <p class="offer-expiry"><?php esc_html_e('📅 Hurry! Offer ends soon.', 'darkmusic-blog' ); ?></p>
            </div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'darkmusic_blog_discount_notice' );

// Add a Custom CSS file to WP Admin Area
function darkmusic_blog_admin_page_theme_style() {
   wp_enqueue_style('darkmusic-blog-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstarted/getstarted.css');
}
add_action('admin_enqueue_scripts', 'darkmusic_blog_admin_page_theme_style');

//About Theme Info
function darkmusic_blog_content_main() { 

    //custom function about theme customizer

    $return = add_query_arg( array()) ;
    $theme = wp_get_theme( 'darkmusic-blog' );
?>

<div class="theme-discount-banner">
    <h2><?php esc_html_e('🚀 Limited Time Offer – Flat 15% OFF on All Premium WordPress Themes! 🎉', 'darkmusic-blog'); ?></h2>
    <p><?php esc_html_e('Upgrade your website with our stunning, high-performance WordPress themes at an exclusive 15% discount! 💰✨', 'darkmusic-blog'); ?></p>
    
    <ul class="discount-benefits">
        <li>✅ <?php esc_html_e('SEO Optimized & Speed Fast 🚀', 'darkmusic-blog'); ?></li>
        <li>✅ <?php esc_html_e('Fully Responsive & Mobile-Friendly 📱', 'darkmusic-blog'); ?></li>
        <li>✅ <?php esc_html_e('Customizer Support for Easy Customization 🎨', 'darkmusic-blog'); ?></li>
        <li>✅ <?php esc_html_e('Premium Features & Regular Updates 🔥', 'darkmusic-blog'); ?></li>
    </ul>
    
    <p class="discount-code"><?php esc_html_e('👉 Use Code: ', 'darkmusic-blog'); ?> <span>SAVE15</span> <?php esc_html_e(' at Checkout', 'darkmusic-blog'); ?></p>
    
    <a href="https://cawpthemes.com/darkmusic-blog-premium-wordpress-theme/" class="cta-button"><?php esc_html_e('Shop Now 🚀', 'darkmusic-blog'); ?></a>
    
    <p class="offer-expiry"><?php esc_html_e('📅 Hurry! Offer ends soon.', 'darkmusic-blog'); ?></p>
</div>

<div class="admin-main-box">
    <div class="admin-left-box">
        <h2><?php esc_html_e( 'Welcome to Darkmusic Blog', 'darkmusic-blog' ); ?> <span class="version"><?php $theme_info = wp_get_theme();
echo $theme_info->get( 'Version' );?></span></h2>
        <p><?php esc_html_e('CA WP Themes is a premium WordPress theme development company that provides high-quality themes for various types of websites. They specialize in creating themes for businesses, eCommerce, portfolios, blogs, and many more. Their themes are easy to use and customize, making them perfect for those who want to create a professional-looking website without any coding skills.','darkmusic-blog'); ?></p>
        <p><?php esc_html_e('CA WP Themes offers a wide range of themes that are designed to be responsive and compatible with the latest versions of WordPress. Our themes are also SEO optimized, ensuring that your website will rank well on search engines. They come with a variety of features such as customizable widgets, social media integration, and custom page templates.','darkmusic-blog'); ?></p>
        <p><?php esc_html_e('One of the unique things about CA WP Themes is their focus on providing excellent customer support. They have a dedicated team of support staff who are available 24/7 to help customers with any issues they may encounter. Their support team is knowledgeable and friendly, ensuring that customers receive the best possible experience.','darkmusic-blog'); ?></p>
    </div>
    <div class="admin-right-box">
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Buy Darkmusic Blog Premium Theme','darkmusic-blog'); ?></h4>
            <p><?php esc_html_e('Now the Premium Version is only at $39.99 with Lifetime Access!Grab the deal now!', 'darkmusic-blog'); ?></p>
            <div class="info-link">
                <a href="<?php echo esc_url( DARKMUSIC_BLOG_PRO_URL ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'darkmusic-blog' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Premium Theme Demo','darkmusic-blog'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( DARKMUSIC_BLOG_PRO_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Demo', 'darkmusic-blog' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Need Support? / Contact Us','darkmusic-blog'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( DARKMUSIC_BLOG_PRO_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Contact Us', 'darkmusic-blog' ); ?></a>
            </div>
        </div>
        <hr>
        <div class="admin_text-btn">
            <h4><?php esc_html_e('Documentation','darkmusic-blog'); ?></h4>
            <div class="info-link">
                <a href="<?php echo esc_url( DARKMUSIC_BLOG_PRO_DOCUMENTATION ); ?>" target="_blank"> <?php esc_html_e( 'Docs', 'darkmusic-blog' ); ?></a>
            </div>
        </div>
    </div>
</div>

<?php } ?>