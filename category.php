<?php get_header(); ?>
<section class="category">
  <div class="container">
    <div class="title text-center mb-5">
      <h1 class="mb-5"><?php single_cat_title();?></h1>
      <?php echo category_description(); ?>
    </div>

    <div class="category-stats row text-center fs-5 mt-3 lh-lg text-white mb-5 justify-content-center">

      <div class="col-lg-5 mb-3 col-md-6 ">
        <div class="rounded p-3">
          <span><i class="fa-solid fa-pen-to-square"></i>Articles</span>
          <span>
            <?php
              $obj = get_queried_object();
              echo $obj->count;
            ?>
          </span>
        </div>
      </div>

      <div class="col-lg-5 mb-3 col-md-6 ">
        <div class="rounded p-3">
          <span><i class="fa-solid fa-comment"></i>Comments</span>
          <span>
            <?php
              $comments_count_in_category = 0;
              $comments = get_comments(array(
                'status' => 'approve',
              ));
              foreach($comments as $comment) {
                if (! in_category(the_category_ID(false), $comment->comment_post_ID)) {
                  continue;
                }
                else {
                  $comments_count_in_category++;
                }
              }
              echo $comments_count_in_category;
            ?>
          </span>
        </div>
      </div>

    </div>

    <div class="row text-center text-md-start justify-content-center">
      <?php
        $args = array(
          'post_type' => 'post', // Set the post type to 'post' to retrieve blog posts
          'posts_per_page' => 5, // Set the number of posts to display per page
        );
        if (have_posts()) {
          while (have_posts()) {
            the_post();
            ?>
              <div class="col-lg-6 col-md-12 mb-3">
                <div class="card">
                  <div class="row g-0">
                    <div class="img-holder col-md-6">
                      <?php the_post_thumbnail('', ['class' => 'card-img-top img-fluid', 'alt' => 'Feature blog image']); ?>
                    </div>
                    <div class="col-md-6 p-2 row align-content-between">
                      
                        <div class="card-infos text-white ps-3">
                          <span><i class="fa-solid fa-pen"></i><?php the_author_posts_link(); ?></span>
                          <span><i class="fa-solid fa-clock"></i><?php the_time('F j, Y'); ?></span>
                          <h5 class="card-title lh-base mt-2"><?php the_title(); ?></h5>
                        </div>
                        <div class="card-body text-white">
                          <div class="m-card-footer">
                            <a href="<?php the_permalink(); ?>" class="btn rounded-pill">Read the article</a>
                          </div>
                      </div>
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