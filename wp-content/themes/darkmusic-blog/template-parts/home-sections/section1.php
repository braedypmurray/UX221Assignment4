<?php
/**
 * Theme Section 2
 *
 * @package Darkmusic Blog
 */

// All function code and function definitions go here...

$darkmusic_blog_section_one = get_theme_mod('darkmusic_blog_section1_enable');
if ('Disable' === $darkmusic_blog_section_one) {
    return;
}
?>

<section id="section1" class="featured-posts">
    <div class="container-fluid">
        <div class="section-heading-main">
            <?php 
            // Check if the section title is set
            $section_title = get_theme_mod('darkmusic_blog_section1_title');
            if (!empty($section_title)) { ?>
                <h3><?php echo esc_html($section_title); ?></h3>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <?php get_template_part('template-parts/home-sections/section-blog1'); ?>      
            </div>
            <div class="col-lg-6">
                <?php get_template_part('template-parts/home-sections/section-blog2'); ?>
            </div>
            <div class="col-lg-3">
                <?php get_template_part('template-parts/home-sections/section-blog3'); ?>
            </div>
        </div>
    </div>
</section>
