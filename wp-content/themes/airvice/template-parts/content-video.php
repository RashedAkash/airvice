<?php 
$video = function_exists('get_field')? get_field('post_format'): ' ';
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('ablog ablog-4 mb-55 wow fadeInUp'); ?> data-wow-delay=".4s">
     <div class="ablog__img ablog__img4">
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        <?php endif; ?>
        <?php if ( !empty($video) ) : ?>
            <div class="avideo-btn-4">
                <div class="avideo-btn play_btn">
                    <a class="venobox" data-autoplay="true" data-vbtype="video" href="<?php echo esc_url($video); ?>">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
        <?php endif; ?>
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
