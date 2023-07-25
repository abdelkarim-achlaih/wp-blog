<?php get_header(); ?>
<section class="overlay"></section>
<section class="latest lh-lg p-0">
  <div class="mobile-overlay"></div>
  <div class="container text-center text-lg-start h-100 d-flex align-content-lg-around flex-wrap justify-content-center justify-content-md-start">
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
            
    <div class="latest-title text-white p-0 ps-5 pb-2 mb-2">
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
        <div class="col-lg-5">
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
            <?php the_author();?>
          </div>
          <h2 class="fw-bold fs-4 mb-4 lh-lg">
            <?php the_title();?>
          </h2>
          <a href="<?php the_permalink(); ?>" class="btn rounded-pill p-3">Read Article <i class="fa-solid fa-arrow-right ms-3"></i></a>
        </div>
      </div>
    </div>


    <?php
    $i = 100;
          }
        }
      ?>


  </div>
</section>
<?php get_footer(); ?>