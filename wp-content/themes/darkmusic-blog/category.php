  <?php get_header(); ?>

  <main id="primary" class="site-main py-5">
    <div class="container">
      <div class="row">

        <!-- Left Content Column -->
        <div class="col-md-8">
          <h1 class="archive-title">
            <?php single_cat_title(); ?>
          </h1>

          <?php if ( category_description() ) : ?>
            <div class="category-description mb-4">
              <?php echo category_description(); ?>
            </div>
          <?php endif; ?>

          <div class="row">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <div class="col-md-6 mb-4">
                <div class="card h-100">
                  <?php if ( has_post_thumbnail() ) : ?>
                    <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail( 'medium', ['class' => 'card-img-top'] ); ?>
                    </a>
                  <?php endif; ?>

                  <div class="card-body">
                    <h5 class="card-title">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h5>

                    <!-- Custom Field Example -->
                    <?php
                      $custom_value = get_post_meta(get_the_ID(), 'custom_field_key', true);
                      if ($custom_value) :
                    ?>
                      <p><strong>Extra Info:</strong> <?php echo esc_html($custom_value); ?></p>
                    <?php endif; ?>

                    <p class="card-text"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                  </div>
                  <div class="card-footer text-muted">
                    Posted on <?php echo get_the_date(); ?>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>

          <div class="pagination mt-4">
            <?php the_posts_pagination(); ?>
          </div>

          <?php else : ?>
            <p><?php esc_html_e( 'No posts found in this category.', 'darkmusic-blog' ); ?></p>
          <?php endif; ?>
        </div>

        <!-- Right Sidebar -->
        <div class="col-md-4">
          <?php get_sidebar(); ?>
        </div>

      </div>
    </div>
  </main>

  <?php get_footer(); ?>
