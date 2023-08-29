<?php get_header(); ?>
<section class="overlay"></section>
<section class="latest lh-lg p-0">
  <div class="mobile-overlay"></div>
  <div class="container pt-5 pb-5 pt-lg-0 pb-lg-0 text-center text-lg-start h-100 d-flex align-content-lg-around flex-wrap justify-content-center justify-content-lg-start">
    <?php
      $args = array(
          'post_type' => 'post', // Set the post type to 'post' to retrieve blog posts
          'posts_per_page' => 1, // Set the number of posts to display per page
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
          while ($query->have_posts()) {
            $query->the_post();
            ?>
            
    <div class="latest-title text-white p-0 ps-lg-5 ps-0 pb-4 pb-lg-2 mb-lg-2 mb-4">
      <h1 class="fs-2 fw-bold mb-3">
        Latest Blog
      </h1>
      <h5 class="fs-5 text-white-50">
        Explore our latest article
      </h5>
    </div>

    <div class="latest-info">
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-5 mb-4 mb-lg-0">
          <?php the_post_thumbnail('', ['class' => 'card-img-top img-fluid rounded-4', 'alt' => 'Feature blog image']);?>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5 text-white">
          <div class="latest-meta">
            <span class="fw-bold"><?php the_category(', ');?></span>
          -
            <span class="text-white-50"><?php the_time('F j, Y');?></span>
          </div>
          <div class="latest-author text-white-50 mb-4">
            <?php the_author_posts_link();?>
          </div>
          <h2 class="fw-bold fs-4 mb-4 lh-lg">
            <?php the_title();?>
          </h2>
          <a href="<?php the_permalink(); ?>" class="btn rounded-pill p-3">Read Article <i class="fa-solid fa-arrow-right ms-3"></i></a>
        </div>
      </div>
    </div>


    <?php
          }
        }
      ?>


  </div>
</section>
<section class="hottest">
  <div class="container text-center text-lg-start">
    <div class="main-title text-white p-0 ps-lg-5 ps-0 pb-4 pt-3 pb-lg-2 mb-lg-5 mb-4">
      <h3 class="fs-2 fw-bold mb-3">
        Trending
      </h1>
      <p class="fs-5 text-black-50">
        Discover our hottest articles
      </h5>
    </div>

  <div class="row">
    
    <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 4,
      'orderby' => 'comment_count'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        ?>
        <div class="col-lg-3 col-md-6 mb-3 hot">
          <div class="hot-card rounded">
            <?php the_post_thumbnail('', ['class' => 'card-img-top img-fluid', 'alt' => 'Feature blog image']);?>
            <div class="card-body rounded p-2">
              <h5 class="card-title fw-bold lh-base mb-2"><?php the_title(); ?></h5>
              <div class="hot-author mb-3">
                <?php the_author_posts_link();?>
              </div>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="btn rounded-pill mb-3 d-lg-flex ms-auto">Read more</a>
            </div>
          </div>
        </div>
        <?php
      }
    }
    wp_reset_postdata();
  ?>
  </div>
  </div>
</section>
<section class="featured">
  <div class="container text-center text-lg-start">
    <div class="main-title text-white p-0 ps-lg-5 ps-0 pb-4 pt-3 pb-lg-2 mb-lg-5 mb-4">
      <h3 class="fs-2 fw-bold mb-3">
        Featured Blogs
      </h1>
      <p class="fs-5 text-black-50">
        Be always up to date with what's going on in the tech world
      </h5>
    </div>
    <div class="row">
      <div class="col-md-6">
        <?php
          $args = array(
            'post_type' => 'post',
            'category__in' => 5,
            'posts_per_page' => 1,
            'orderby' => 'date'
          );
          $query = new WP_Query($args);
          if ($query->have_posts()) {
            while ($query->have_posts()) {
              $query->the_post();
              ?>
              <div class="mb-3 featured-1">
                <div class="">
                  <a href="<?php the_permalink(); ?>" class=""><?php the_post_thumbnail('', ['class' => 'img-fluid mb-3 rounded-4', 'alt' => 'Feature blog image']);?></a>
                </div>
                <div class="p-3">
                  <div class="date mb-3"><?php the_time('F j, Y');?></div>
                  <h5 class="fw-bold lh-base mb-2"><?php the_title(); ?></h5>
                </div>
              </div>
              <?php
            }
          }
          wp_reset_postdata();
        ?>
      </div>
      <div class="col-md-6">
        <?php
          $args = array(
            'post_type' => 'post',
            'category__in' => 5,
            'posts_per_page' => 5,
            'orderby' => 'date'
          );
          $query = new WP_Query($args);
          if ($query->have_posts()) {
            $i = false;
            while ($query->have_posts()) {
              $query->the_post();
              if($i) {
                ?>
                <div class="mb-3 row featured-2">
                  <div class="col-lg-3">
                    <a href="<?php the_permalink(); ?>" class=""><?php the_post_thumbnail('', ['class' => 'img-fluid mb-3 rounded-4', 'alt' => 'Feature blog image']);?></a>
                  </div>
                  <div class="col-lg-9">
                    <div class="date mb-1"><?php the_time('F j, Y');?></div>
                    <h5 class="fw-bold lh-lg mb-2"><?php the_title(); ?></h5>
                  </div>
                </div>
                <?php
              } else {
                $i = true;
              }
            }
          }
          wp_reset_postdata();
        ?>
      </div>
    </div>
  </div>
</section>
<section class="newsletter">

</section>
<?php get_footer(); ?>