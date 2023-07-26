<?php get_header(); ?>
<section class="author-page">
  <div class="container">
    <div class="author-meta text-center ">
      <?php echo get_avatar(get_the_author_meta('ID'), 180) ?>
      <h3 class="text-white mt-5 mb-5"><?php the_author_meta('nickname');?></h3>
      <div class="text-white-50 d-flex justify-content-center">
        <p class="w-50 text-start mb-5"><?php the_author_meta('description'); ?></p>
      </div>
    </div>
    <div class="row text-center text-md-start">
      <?php
        $args = array(
          'post_type' => 'post', // Set the post type to 'post' to retrieve blog posts
          'posts_per_page' => 5, // Set the number of posts to display per page
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) {
          while ($query->have_posts()) {
            $query->the_post();
            ?>
              <div class="col-lg-4 col-md-6 mb-3">
                <div class="card">
                  <div class="img-holder">
                    <?php the_post_thumbnail('', ['class' => 'card-img-top img-fluid', 'alt' => 'Feature blog image']); ?>
                  </div>
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
  </div>
</section>
<?php get_footer(); ?>