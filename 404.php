<?php get_header(); ?>
<section class="not_found text-white">
  <div class="container">
    <div class="title text-center mb-5">
      <h1 class="text-white-50"><span class="fw-bold">404</span> Error - Page Not Found</h1>
      <p class="text-center text-white-50 mb-5">Oops! It seems like you've ventured into uncharted territory. The page you were looking for has vanished into the digital abyss.</p>
    </div>
    <div class="sugg mt-5 mb-5">
      <ul>
        <li class="mb-4">You can try double-checking the URL for any typos or errors.</li>
        <li class="mb-4">Use the navigation menu above to find what you were looking for..</li>
        <li class="mb-4">Or, you can return to the <a href="<?php echo home_url( '/' )?>">Home Page</a> to explore from there.</li>
      </ul>
    </div>
    <div class="quotes">
      <p class="mt-5 mb-5">
        In the meantime, feel free to enjoy some inspirational quotes:
      </p>
      <div class="row text-center mb-5">
        <div class="col-lg-4 mb-4">
          <i class="fa-solid fa-quote-left"></i>
          Programs must be written for people to read, and only incidentally for machines to execute.
          <i class="fa-solid fa-quote-right"></i>
          <span class="quote-author">- Harold Abelson</span></div>
        <div class="col-lg-4 mb-4">
          <i class="fa-solid fa-quote-left"></i>
          The best code is no code at all.
          <i class="fa-solid fa-quote-right"></i>
          <span class="quote-author">- Jeff Atwood</span></div>
        <div class="col-lg-4 mb-4">
          <i class="fa-solid fa-quote-left"></i>
          Any fool can write code that a computer can understand. Good programmers write code that humans can understand.
          <i class="fa-solid fa-quote-right"></i>
          <span class="quote-author">- Martin Fowler</span></div>
      </ul>
      <p class="text-center text-white-50 mt-5">
        Thanks for your understanding !
        <?php bloginfo('name'); ?> Team
      </p>
    </div>
  </div>
</section>
<?php get_footer(); ?>

<span class="quote-author"></span>