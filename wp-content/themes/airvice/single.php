<?php get_header(); ?>
 <!-- blog area start here -->
        <section class="blog-details-area pt-120 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog__details--wrapper mr-50 mb-50">
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'template-parts/content', get_post_format() ); ?>

                            <?php endwhile; else : ?>
                             <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>

                         <?php get_template_part('template-parts/biography'); ?>

                            <?php if ( comments_open() || get_comments_number() ) :
                            comments_template();
                    endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog area end here -->






<?php get_footer();