<?php
class Solub_Recent_Post_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'solub_recent_post_widget',
            __('Solub Recent Post', 'solub'),
            array('description' => __('Display recent blog posts with thumbnail and date.', 'solub'))
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
                <div class="tp-recent-post-item d-flex align-items-center">
                    <div class="tp-recent-post-thumb mr-20">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                    </div>
                    <div class="tp-recent-post-content">
                        <h3 class="tp-recent-post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="tp-recent-post-meta">
                            <span><i class="fa-regular fa-clock"></i> <?php echo get_the_date(); ?></span>
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
        $title = $instance['title'] ?? __('Recent Posts', 'solub');
        $order = $instance['order'] ?? 'DESC';
        $number = $instance['number'] ?? 3;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'solub'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('order')); ?>"><?php _e('Order:', 'solub'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('order')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('order')); ?>" class="widefat">
                <option value="DESC" <?php selected($order, 'DESC'); ?>><?php _e('Descending', 'solub'); ?></option>
                <option value="ASC" <?php selected($order, 'ASC'); ?>><?php _e('Ascending', 'solub'); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of posts:', 'solub'); ?></label>
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
function solub_register_recent_post_widget() {
    register_widget('Solub_Recent_Post_Widget');
}
add_action('widgets_init', 'solub_register_recent_post_widget');
