<?php
class airvice_Recent_Post_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'airvice_recent_post_widget',
            __('airvice Recent Post', 'airvice'),
            array('description' => __('Display recent blog posts with thumbnail and date.', 'airvice'))
        );
    }

    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $order = $instance['order'] ?? 'DESC';
        $number = $instance['number'] ?? 3;

        echo $args['before_widget'];

        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        $recent_posts = new WP_Query(array(
            'post_type'           => 'post',
            'posts_per_page'      => $number,
            'orderby'             => 'date',
            'order'               => $order,
            'ignore_sticky_posts' => true,
        ));

        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                ?>
                 <div class="widget mb-45 wow fadeInUp"  data-wow-delay=".5s">
                               
                                <div class="sidebar--widget__post mb-20">
                                    <div class="sidebar__post--thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="post__img" ><?php the_post_thumbnail('thumbnail'); ?></div>
                                        </a>
                                    </div>
                                    <div class="sidebar__post--text">
                                        <h4 class="sidebar__post--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>.</a></h4>
                                        <span><?php echo get_the_date(); ?></span>
                                    </div>
                                </div>
                              
                            </div>
                
                <?php
            endwhile;
            wp_reset_postdata();
        endif;

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = $instance['title'] ?? __('Recent Posts', 'airvice');
        $order = $instance['order'] ?? 'DESC';
        $number = $instance['number'] ?? 3;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'airvice'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('order')); ?>"><?php _e('Order:', 'airvice'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('order')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('order')); ?>" class="widefat">
                <option value="DESC" <?php selected($order, 'DESC'); ?>><?php _e('Descending', 'airvice'); ?></option>
                <option value="ASC" <?php selected($order, 'ASC'); ?>><?php _e('Ascending', 'airvice'); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of posts:', 'airvice'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1"
                   value="<?php echo esc_attr($number); ?>" size="3"/>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        return array(
            'title'  => sanitize_text_field($new_instance['title']),
            'order'  => $new_instance['order'] === 'ASC' ? 'ASC' : 'DESC',
            'number' => absint($new_instance['number']),
        );
    }
}

// Register widget
function airvice_register_recent_post_widget() {
    register_widget('airvice_Recent_Post_Widget');
}
add_action('widgets_init', 'airvice_register_recent_post_widget');
