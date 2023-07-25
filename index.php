<?php get_header(); ?>
<section class="blogs">
  <div class="container">
    <div class="row text-center text-md-start">
      <?php
        $args = array(
          'post_type' => 'post', // Set the post type to 'post' to retrieve blog posts
          'posts_per_page' => 5, // Set the number of posts to display per page
        );
        if (have_posts()) {
          while (have_posts()) {
            the_post();
            ?>
              <div class="col-lg-4 col-md-6 mb-3">
                <div class="card">
                  <?php the_post_thumbnail('', ['class' => 'card-img-top img-fluid', 'alt' => 'Feature blog image']); ?>
                  <div class="card-infos text-white">
                    <span><i class="fa-solid fa-pen"></i><?php the_author(); ?></span>
                    <span><i class="fa-solid fa-clock"></i><?php the_time('F j, Y'); ?></span>
                    <span><i class="fa-solid fa-comment"></i><?php comments_number(); ?></span>
                  </div>
                  <div class="card-body text-white">
                    <h5 class="card-title fs-5 fw-bold lh-base"><?php the_title(); ?></h5>
                    <p class="card-text lh-sm "><?php the_excerpt(); ?></p>
                    <div class="m-card-footer d-flex justify-content-between align-items-center">
                      <a href="<?php the_permalink(); ?>" class="btn rounded-pill">Read more</a>
                      <span class="text-end">
                        <i class="fa-solid fa-tag"></i>
                        <?php the_category(', '); ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            <?php
          }
        }
      ?>
    </div>
    <div class="pagination pt-4 pb-5 d-flex justify-content-evenly">
      <?php
      if (get_previous_posts_link()) {
          previous_posts_link('« Prev Page');
        } else {
          ?>
            <span class="btn rounded-pill">« Prev Page</span>
          <?php
        }
        if (get_next_posts_link()) {
          next_posts_link();
        } else {
          ?>
            <span class="btn rounded-pill">Next Page »</span>
          <?php
        }
      ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>