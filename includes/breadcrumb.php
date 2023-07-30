<section class="breadcrumb-holder p-0 m-0 mt-5">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-lg-start justify-content-center text-center">
        <li class="breadcrumb-item mb-3"><a href="<?php get_home_url()?>">Home</a></li>
        <li class="breadcrumb-item mb-3">
          <?php the_category(', '); ?>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
      </ol>
    </nav>
  </div>
</section>