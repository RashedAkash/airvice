<?php if(is_single()): ?>
    <?php 
$gallery = function_exists('get_field')? get_field('image_url'): ' ';
// var_dump($gallery)
?>
  <div class="ablog ablog-4 mb-55">
                        <div class="ablog__img">
                        <div class="ablog__img--active swiper-container">
                            <div class="swiper-wrapper">
                            <?php if ( !empty($gallery) && is_array($gallery) ) : ?>
                        <?php foreach( $gallery as $image ) : ?>
                            <div class="ablog__img--item swiper-slide">
                                <img src="<?php echo esc_url($image['full_image_url']); ?>" 
                                    alt="img" 
                                    class="img-fluid">
                            </div>
                        <?php endforeach; ?>
                        <?php endif; ?>

                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev slide-prev"><i class="far fa-chevron-left"></i></div>
                            <div class="swiper-button-next slide-next"><i class="far fa-chevron-right"></i></div>
                        </div>
                    </div>
    <div class="ablog__text ablog__text4">
        <div class="ablog__meta ablog__meta4">
            <ul>
                <li><a href="<?php the_permalink(); ?>"><i class="far fa-calendar-check"></i>  <?php echo get_the_date(); ?> </a></li>
                <li><a href="<?php the_permalink(); ?>"><i class="far fa-user"></i> <?php the_author(); ?> </a></li>
                <li>  <a href="<?php comments_link(); ?>">
                <i class="fal fa-comments"></i> 
                <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?>
            </a></li>
            </ul>
        </div>
        <h3 class="ablog__text--title4 mb-20"><?php the_title(); ?></h3>
        <div class='mb-30'>
            <?php the_content(); ?>
        </div>
        <div class="blog__deatails--tag wow fadeInUp">
            <span><?php echo esc_html__('Post Tags :') ?></span>
            <?php airvice_tags(); ?>
        </div>
    </div>
</div>

<?php else: ?>
<?php 
$gallery = function_exists('get_field')? get_field('image_url'): ' ';
// var_dump($gallery)
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('ablog ablog-4 mb-55 wow fadeInUp'); ?> data-wow-delay=".4s">
<div class="ablog__img">
    <div class="ablog__img--active swiper-container">
        <div class="swiper-wrapper">
           <?php if ( !empty($gallery) && is_array($gallery) ) : ?>
    <?php foreach( $gallery as $image ) : ?>
        <div class="ablog__img--item swiper-slide">
            <img src="<?php echo esc_url($image['full_image_url']); ?>" 
                 alt="img" 
                 class="img-fluid">
        </div>
    <?php endforeach; ?>
<?php endif; ?>

        </div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev slide-prev"><i class="far fa-chevron-left"></i></div>
        <div class="swiper-button-next slide-next"><i class="far fa-chevron-right"></i></div>
    </div>
</div>
    
    <div class="ablog__text ablog__text4">
        <div class="ablog__meta ablog__meta4">
            <ul>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <i class="far fa-calendar-check"></i> 
                        <?php echo get_the_date(); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>">
                        <i class="far fa-user"></i> 
                        <?php the_author(); ?>
                    </a>
                </li>
                <li>
                    <a href="<?php comments_link(); ?>">
                        <i class="fal fa-comments"></i> 
                        <?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?>
                    </a>
                </li>
            </ul>
        </div>

        <h3 class="ablog__text--title4 mb-20">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <?php the_excerpt(); ?>

        <div class="ablog__btn4">
            <a href="<?php the_permalink(); ?>" class="theme-btn">
                <?php echo esc_html__('Read More', 'airvice'); ?>
            </a>
        </div>
    </div>
</div>
<?php endif; ?>