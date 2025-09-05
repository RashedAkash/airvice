<?php
namespace AirviceCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Airvice_Service extends Widget_Base {

	public function get_name() {
		return 'airvice-service';
	}

	public function get_title() {
		return __( 'Airvice service', 'airvice-core' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'airvice-widget-category' ];
	}

	public function get_script_depends() {
		return [ 'airvice-core' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'airvice-core' ),
			]
		);

		

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'airvice-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'airvice-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'post_per_page',
			[
				'label' => __( 'Post Per Page', 'airvice-core' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'post_in',
			[
				'label' => esc_html__( 'Post Include', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => tp_all_post('service'),
			]
		);

		$this->add_control(
			'post_not_in',
			[
				'label' => esc_html__( 'Post Exclude', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => tp_all_post('service'),
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'asc',
				'options' => [
					'asc' => esc_html__( 'ASC', 'textdomain' ),
					'desc' => esc_html__( 'DESC', 'textdomain' ),
				]
			]
		);

		$this->add_control(
			'order_by',
			[
				'label' => esc_html__( 'Order By', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'title',
				'options' => [
			        'ID' => 'Post ID',
			        'author' => 'Post Author',
			        'title' => 'Title',
			        'date' => 'Date',
			        'modified' => 'Last Modified Date',
			        'parent' => 'Parent Id',
			        'rand' => 'Random',
			        'comment_count' => 'Comment Count',
			        'menu_order' => 'Menu Order',
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// WP_Query arguments
		$args = array(
			'post_type'      => 'service',
			'post_status'    => 'publish',
			'posts_per_page' => !empty($settings['post_per_page']) ? $settings['post_per_page'] : 3,
			'order'          => !empty($settings['order']) ? $settings['order'] : 'ASC',
			'orderby'        => !empty($settings['order_by']) ? $settings['order_by'] : 'date',
			'post__in'       => !empty($settings['post_in']) ? $settings['post_in'] : [],
			'post__not_in'   => !empty($settings['post_not_in']) ? $settings['post_not_in'] : [],
		);

		$query = new \WP_Query($args);
		$icon = function_exists("get_field") ? get_field('services_icon'): '';
		?>

		  <section class="blog-area pt-110 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title-wrapper text-center mb-70 wow fadeInUp" data-wow-delay=".3s">
                            <h2 class="section-title"><?php echo airvice_kses_function($settings['title']) ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
    <?php 
        $icon = function_exists("get_field") ? get_field('services_icon') : ''; 
    ?>
    <div class="col-lg-4 col-md-6">
        <div class="ablog mb-55 wow fadeInUp" data-wow-delay=".3s">
            <div class="ablog__img">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="ablog__text ablog__text--service">
                <?php if($icon): ?>
                <div class="blog__date blog__date--service__icon">
                    <i class="<?php echo esc_attr($icon); ?>"></i>
                </div>
                <?php endif; ?>
                <h4 class="ablog__text--title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
                <?php the_excerpt(); ?>
                <div class="ablog__btn">
                    <a href="<?php the_permalink(); ?>" class="theme-btn"><?php echo esc_html__('Read More','airvice-core'); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; wp_reset_postdata(); endif; ?>

                </div>
            </div>
        </section>
		
		<?php
	}

	protected function content_template() {
		?>
		<div class="title">
			{{{ settings.title }}}
		</div>
		<?php
	}
}

$widgets_manager->register( new Airvice_Service() );
