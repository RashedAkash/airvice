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
                        <div class="ablog__sidebar">
                            <div class="widget wow fadeInUp"  data-wow-delay=".3s">
                                <div class="sidebar--widget__search mb-45">
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="widget mb-45 wow fadeInUp"  data-wow-delay=".5s">
                                <h3 class="sidebar__widget--title mb-30">Recent News </h3>
                                <div class="sidebar--widget__post mb-20">
                                    <div class="sidebar__post--thumb">
                                        <a href="blog-details.html">
                                            <div class="post__img" data-background="assets/img/blog/b1.jpg"></div>
                                        </a>
                                    </div>
                                    <div class="sidebar__post--text">
                                        <h4 class="sidebar__post--title"><a href="blog-details.html">Businesses Are Thriving Societies Are Not.</a></h4>
                                        <span>January 15, 2021</span>
                                    </div>
                                </div>
                                <div class="sidebar--widget__post mb-20">
                                    <div class="sidebar__post--thumb">
                                        <a href="blog-details.html">
                                            <div class="post__img" data-background="assets/img/blog/b2.jpg"></div>
                                        </a>
                                    </div>
                                    <div class="sidebar__post--text">
                                        <h4 class="sidebar__post--title"><a href="blog-details.html">The Importance of Instagram Metrics and</a></h4>
                                        <span>January 15, 2021</span>
                                    </div>
                                </div>
                                <div class="sidebar--widget__post mb-20">
                                    <div class="sidebar__post--thumb">
                                        <a href="blog-details.html">
                                            <div class="post__img" data-background="assets/img/blog/b7.jpg"></div>
                                        </a>
                                    </div>
                                    <div class="sidebar__post--text">
                                        <h4 class="sidebar__post--title"><a href="blog-details.html">TikTok Influencer Marketing: How to Work</a></h4>
                                        <span>January 15, 2021</span>
                                    </div>
                                </div>
                            </div>

                            <div class="widget mb-40 wow fadeInUp"  data-wow-delay=".7s">
                                <h3 class="sidebar__widget--title mb-25">Categories</h3>
                                <div class="sidebar--widget__cat mb-20">
                                    <ul>
                                        <li><a href="blog.html">App & Saas</a></li>
                                        <li><a href="blog.html">Fresh Products</a></li>
                                        <li><a href="blog.html">Graphics</a></li>
                                        <li><a href="blog.html">IOS/Android Design</a></li>
                                        <li><a href="blog.html">Saas Design</a></li>
                                        <li><a href="blog.html">Web Design</a></li>
                                        <li><a href="blog.html">Web Development</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget mb-25 wow fadeInUp"  data-wow-delay=".9s">
                                <h3 class="sidebar__widget--title mb-30">Tags</h3>
                                <div class="sidebar--widget__tag mb-20">
                                    <a href="blog.html">Animation</a>
                                    <a href="blog.html">Branding</a>
                                    <a href="blog.html">Design</a>
                                    <a href="blog.html">Ideas</a>
                                    <a href="blog.html">Landing</a>
                                    <a href="blog.html">Pix Saas Blog</a>
                                    <a href="blog.html">The Saas</a>
                                    <a href="blog.html">UI/UX</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="basic-pagination mt-10 wow fadeInUp"  data-wow-delay=".5s">
                            <ul>
                                <li><span aria-current="page" class="page-numbers current">1</span></li>
                                <li><a class="page-numbers" href="#">2</a></li>
                                <li><a class="page-numbers" href="#">3</a></li>
                                <li><a class="next page-numbers" href="#">
                                        <i class="fal fa-long-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>




<?php get_footer();