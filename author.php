<?php get_header(); ?>
<section class="author-page">
  <div class="container">

    <div class="author-meta text-center">
      <?php echo get_avatar(get_the_author_meta('ID'), 180) ?>
      <h3 class="text-white mt-5 mb-5"><?php the_author_meta('nickname');?></h3>
      <div class="text-white-50 d-flex justify-content-center">
        <p class="text-start mb-5"><?php the_author_meta('description'); ?></p>
      </div>
    </div>

    <div class="author-stats row text-center fs-5 mt-3 lh-lg text-white mb-5">

      <div class="col-lg-3 mb-3 col-md-6 ">
        <div class="rounded p-3">
          <span><i class="fa-solid fa-pen-to-square"></i>Blogs</span>
          <span>
            <?php echo count_user_posts(get_the_author_meta('ID'));?>
          </span>
        </div>
      </div>

      <div class="col-lg-3 mb-3 col-md-6 ">
        <div class="rounded p-3">
          <span><i class="fa-solid fa-comment"></i>Comments</span>
          <span><?php echo get_comments(array (
            'user_id' => get_the_author_meta('ID'),
            'count' => true
          ))?></span>
        </div>
      </div>

    </div>

    <div class="author-blogs row text-center text-md-start">
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

              <div class="author-blog col-lg-4 col-md-6 mb-5">
                <div class="img-holder mb-3">
                  <?php the_post_thumbnail('', ['class' => 'img-fluid rounded', 'alt' => 'Feature blog image']); ?>
                </div>
                <div class="author-blog-body text-white mb-3">
                  <h5 class="fs-5 lh-base text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                </div>
                <div class="author-blog-infos text-white-50 text-center">
                  <span><i class="fa-solid fa-pen"></i><?php the_author(); ?></span>
                  <span><i class="fa-solid fa-clock"></i><?php the_time('F j, Y'); ?></span>
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