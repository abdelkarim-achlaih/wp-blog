<div class="sidebar card">
  <div class="card-header mb-5 rounded">
    <h3 class="fw-bold text-white fs-4">More Articles</h3>
  </div>
  <?php
    $categories = get_the_category(get_the_ID());
    $args = array(
      'category__in' => $categories[0]->term_id,
      'post_type' => 'post',
      'posts_per_page' => 5,
      'orderby' => 'rand',
      'post__not_in' => array(get_the_ID())
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();
        ?>
          <div class="card-body mb-3 rounded">
            <h5 class="card-title fw-bold lh-base"><?php the_title(); ?></h5>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="btn rounded-pill">Read more</a>
          </div>
          <?php
        }
      }
    ?>
</div>