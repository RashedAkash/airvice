<?php
$footer_background = get_theme_mod('footer_bg_image_setting',get_template_directory_uri().'/assets/img/footer/footer-bg.jpg');
$footer_copy = get_theme_mod('footer_copyright_text',__('Copyright © 2021 <a href="#">Theme_pure</a>. All Rights Reserved.','arvice'))

?>
<!-- footer area start here -->
    <footer data-background="<?php echo esc_url($footer_background); ?>">
        <section class="footer-area pt-110 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer__widget mb-30 wow fadeInUp"  data-wow-delay=".3s">
                           <?php dynamic_sidebar('footer-widget-1'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer__widget mb-30 pl-80 wow fadeInUp"  data-wow-delay=".6s">
                            <?php dynamic_sidebar('footer-widget-2'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer__widget mb-30 pl-30 wow fadeInUp"  data-wow-delay=".9s">
                            <?php dynamic_sidebar('footer-widget-3'); ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer__widget mb-30 wow fadeInUp"  data-wow-delay="1.2s">
                            <?php dynamic_sidebar('footer-widget-4'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="copyright-area copyright-border">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="copyright__text">
                            <span><?php echo airvice_kses($footer_copy); ?></span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="copyright__social text-end">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-google"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end here -->



    <!-- JS here -->
 <?php wp_footer(); ?>
</body>

</html>