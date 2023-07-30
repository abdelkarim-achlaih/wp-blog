<?php
  get_header();
  include(get_template_directory() . '/includes/breadcrumb.php');
?>
<section class="blog-post">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 ps-sm-0 pe-sm-0 rounded">
        <div class="blog-post-item rounded mb-5">
          <?php
            if (have_posts()) {
              while (have_posts()) {
                the_post();
                ?>
                  <div class="blog-post-author-meta text-center text-white-50 pt-3">
                    <?php echo get_avatar($post, 50) ?>
                    <span class=""></i><?php the_author(); ?></span>
                    <span><i class="fa-solid fa-clock"></i><?php the_time('F j, Y'); ?></span>
                    <span><i class="fa-solid fa-comment"></i><?php comments_number(); ?></span>
                    <span class="post-category"><i class="fa-solid fa-tag"></i><?php the_category(', '); ?></span>
                  </div>
                  <div class="blog-post-title d-flex justify-content-center text-white mt-5 mb-5">
                    <h1 class="text-center fs-1 fw-bold lh-base"><?php the_title(); ?></h1>
                  </div>
                  <div class="blog-post-img">
                    <?php the_post_thumbnail('', ['class' => 'img-fluid rounded', 'alt' => 'Blog-post-img']); ?>
                  </div>
                  <div class="blog-post-content text-white-50 lh-lg ps-sm-5 pe-sm-5 ps-3 pe-3 pt-4 pb-4">
                    <?php the_content(); ?>
                  </div>
                  <?php
                }
              }
            ?>
        </div>
        <div class="pagination d-flex justify-content-evenly">
          <?php
            if (get_previous_post_link()) {
              previous_post_link('%link', '« Prev Article');
            } else {
              ?>
                <span class="btn rounded-pill">« Prev Article</span>
              <?php
            }
            if (get_next_post_link()) {
              next_post_link('%link', 'Next Article »');
            } else {
              ?>
                <span class="btn rounded-pill">Next Article »</span>
              <?php
            }
          ?>
        </div>
        <div class="author mt-5 mb-5 p-sm-5 pt-5 pb-5 text-center text-md-start rounded">
          <h3 class="fw-bold fs-3 mb-5">About the Author</h3>
          <div class="row align-items-center">
            <div class="col-md-3 mb-3">
              <?php echo get_avatar(get_the_author_meta('ID'), 180) ?>
              <p class="author-stats row text-center fs-5 mt-3 lh-lg">
                <span>
                  <i class="fa-solid fa-pen-to-square"></i>
                  <?php echo count_user_posts(get_the_author_meta('ID'));?> Blogs
                </span>
                <span>
                  <i class="fa-solid fa-user"></i>
                  <?php the_author_posts_link();?>
                </span>
              </p>
            </div>
            <div class="col-md-9">
              <h5 class="card-title fw-bold mb-3 fs-2"><?php the_author_meta('nickname');?></h5>
              <p class="card-text text-center text-md-start lh-lg fs-5 text-black-75"><?php the_author_meta('description'); ?></p>
            </div>
          </div>
        </div>
        <div class="comments p-sm-5">
          <h3 class="fw-bold fs-3 text-center text-md-start text-white">Comments</h3>
          <p class="text-center text-md-start text-white-50"><?php comments_number() ?></p>
          <?php comments_template() ?>
        </div>
      </div>
      <div class="col-lg-3 ps-sm-0 pe-sm-0 ps-lg-3 pe-lg-3">
        <?php 
          // if(is_active_sidebar('main-sidebar')) {
          //   dynamic_sidebar('main-sidebar');
          // }
          get_sidebar();
        ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>