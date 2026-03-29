<?php
// Define the query to get the latest posts from the selected category
$args_one = array(
    'category_name'     => get_theme_mod('darkmusic_blog_section1_category_one'),
    'posts_per_page'    => get_theme_mod('darkmusic_blog_section1_category_number_of_posts_setting_one'),
    'order'             => 'DESC'
);

$query_one = new WP_Query($args_one);

// Loop through the posts
if ($query_one->have_posts()) :
    while ($query_one->have_posts()) : $query_one->the_post(); ?>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="post">
                <!-- Check if the post has a thumbnail and display it -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    </div>
                <?php endif; ?>
                
                <!-- Post meta: Date and Author (conditionally displayed) -->
                <?php if (get_theme_mod('darkmusic_blog_post_meta_toggle_switch_control', true)) : ?>
                    <div class="sec2-meta">
                        <span><?php echo esc_html(get_the_date()); ?></span>
                        <span class="separator">|</span>
                        <span><?php echo esc_html(get_the_author()); ?></span>
                    </div>
                <?php endif; ?>

                <!-- Post Title -->
                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                
                <!-- Post Content -->
                <div class="latest-content">
                    <?php the_content(); ?>
                </div>
                
                <!-- Read More Button -->
                <div class="readmore-latest">
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'darkmusic-blog'); ?></a>
                </div>
            </div>
        </div>

    <?php endwhile;
    wp_reset_postdata();
else : ?>
    <!-- Message when no posts are found -->
    <p><?php esc_html_e('No posts found in this category.', 'darkmusic-blog'); ?></p>
<?php endif; ?>
