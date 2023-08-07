<footer class="pt-5">
    <div class="container">
        <div class="row text-white text-md-start text-center">
            <div class="col-lg-4 col-md-6 mb-4">
                <a href="<?php echo home_url( '/' )?>"><img src="<?php echo get_stylesheet_directory_uri() . '/imgs/logo.png' ?>" alt="logo" class="mb-3"></a>
                <p class="lh-lg">Unleash the potential of your online presence with my web development expertise. Together, we'll create a captivating digital experience that leaves a lasting impact on your audience. Let's build something amazing!</p>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <h2 class="fw-bold mb-3">Our Articles</h2>
                <?php footer_section_2() ?>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <h2 class="fw-bold">Contact Us</h2>
                <p class="mb-5 mt-3 lh-lg">Contact us via e-mail or telephone. We look forward to hearing from you</p>
                <a href="mailto:abdelkarima46@gmail.com" class="btn main-btn rounded-pill w-100">abdelkarima46@gmail.com</a>
                <ul class="social d-flex list-unstyled gap-5 mt-5 justify-content-center justify-content-md-start">
                    <li>
                        <a href=""><i class="fa-brands fa-facebook facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-twitter twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-linkedin linkedin"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-brands fa-youtube youtube"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
    <?php wp_footer(); ?>
</body>

</html>