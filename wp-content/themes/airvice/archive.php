<?php get_header(); ?>

<section class="blog-sidebar-area pt-120 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ablog__sidebar--wrapper mr-50">
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

                            <?php endwhile; else : ?>
                             <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
                           
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="basic-pagination mt-10 wow fadeInUp"  data-wow-delay=".5s">
                          <?php 
                          airvice_pagination();
                          ?>
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>




<?php get_footer();