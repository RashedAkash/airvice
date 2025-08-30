<?php
namespace AirviceCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Airvice_Blog extends Widget_Base {

	public function get_name() {
		return 'airvice-blog';
	}

	public function get_title() {
		return __( 'Airvice blog', 'airvice-core' );
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
			'logo',
			[
				'label' => esc_html__( 'Logo', 'airvice-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'logo_title',
			[
				'label' => esc_html__( 'Logo Title', 'airvice-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'airvice-core' ),
				'label_block' => true,
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
				'options' => tp_all_post(),
			]
		);

		$this->add_control(
			'post_not_in',
			[
				'label' => esc_html__( 'Post Exclude', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => tp_all_post(),
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
			'post_type'      => 'post',
			'post_status'    => 'publish',
			'posts_per_page' => !empty($settings['post_per_page']) ? $settings['post_per_page'] : 3,
			'order'          => !empty($settings['order']) ? $settings['order'] : 'ASC',
			'orderby'        => !empty($settings['order_by']) ? $settings['order_by'] : 'date',
			'post__in'       => !empty($settings['post_in']) ? $settings['post_in'] : [],
			'post__not_in'   => !empty($settings['post_not_in']) ? $settings['post_not_in'] : [],
		);

		$query = new \WP_Query($args);
		?>
		  <!-- blog area start here -->
        <section class="blog-area pt-120 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title-wrapper text-center mb-70 wow fadeInUp" data-wow-delay=".3s">
                            <h6 class="subtitle mb-20">
								<?php if ( !empty($settings['logo']['url']) ) : ?>
									<img src="<?php echo esc_url($settings['logo']['url']); ?>" class="img-fluid" alt="img">
								<?php endif; ?>
								<?php echo airvice_kses_function($settings['logo_title']); ?>
							</h6>
                            <h2 class="section-title"><?php echo airvice_kses_function($settings['title']); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
					<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="col-lg-4 col-md-6">
							<div class="ablog mb-55 wow fadeInUp" data-wow-delay=".3s">
								<div class="ablog__img">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail('medium');
									} ?>
								</div>
								<div class="ablog__text">
									<div class="blog__date">
										<h3><?php echo get_the_date('d'); ?></h3>
										<span><?php echo get_the_date('M'); ?></span>
									</div>

									<div class="ablog__meta">
										<ul>
											<li>
												<i class="far fa-bookmark"></i>
												<?php the_category(', '); ?>
											</li>
											<li>
												<i class="far fa-comments"></i>
												<?php comments_popup_link('0 Comment', '1 Comment', '% Comments'); ?>
											</li>
										</ul>
									</div>
								</div>

								<h4 class="ablog__text--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<div class="ablog__btn">
									<a href="<?php the_permalink(); ?>" class="theme-btn"><?php echo esc_html('Read More'); ?></a>
								</div>
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); endif; ?>
                </div>
            </div>
        </section>
        <!-- blog area end here -->
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

$widgets_manager->register( new Airvice_Blog() );
