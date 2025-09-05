<?php
namespace AirviceCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Recent_Blog extends Widget_Base {

	public function get_name() {
		return 'airvice-recent-blog';
	}

	public function get_title() {
		return __( 'Airvice Recent Blog', 'airvice-core' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'airvice-widget-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'airvice-core' ),
			]
		);

		$this->add_control(
			'post_per_page',
			[
				'label'   => __( 'Post Per Page', 'airvice-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => __( 'Order', 'airvice-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC'  => __( 'ASC', 'airvice-core' ),
					'DESC' => __( 'DESC', 'airvice-core' ),
				],
			]
		);

		$this->add_control(
			'order_by',
			[
				'label'   => __( 'Order By', 'airvice-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date'          => 'Date',
					'title'         => 'Title',
					'ID'            => 'ID',
					'author'        => 'Author',
					'rand'          => 'Random',
					'comment_count' => 'Comment Count',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$args = [
			'post_type'      => 'recent_blogs', // <-- নিশ্চিত হও তোমার CPT slug
			'post_status'    => 'publish',
			'posts_per_page' => $settings['post_per_page'],
			'order'          => $settings['order'],
			'orderby'        => $settings['order_by'],
		];

		$query = new \WP_Query($args);

		if ( $query->have_posts() ) :
			?>
			<section class="blog-area pt-115 pb-60">
				<div class="container">
					<div class="row">
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<div class="col-lg-4 col-md-6">
								<div class="ablog ablog-2 ablog-3 mb-30 wow fadeInUp" data-wow-delay=".6s">
									<div class="ablog__img ablog__img3">
										<?php the_post_thumbnail(); ?>
										<div class="blog__date blog__date2 blog__date3">
											<h3 class="text-white"><?php echo get_the_date('d'); ?></h3>
											<span class="text-white"><?php echo get_the_date('M'); ?></span>
										</div>
									</div>
									<div class="ablog__text ablog__text2 ablog__text3 text-center">
										<div class="ablog__meta ablog__meta3">
											<ul>
												<li><i class="far fa-bookmark"></i> <?php the_category(', '); ?></li>
												<li><i class="far fa-comments"></i> <?php comments_number('0 Comment', '1 Comment', '% Comments'); ?></li>
											</ul>
										</div>
										<h4 class="ablog__text--title ablog__text--title2 ablog__text--title3">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h4>
										<p><?php the_excerpt(); ?></p>
										<div class="ablog__text3--btn">
											<a href="<?php the_permalink(); ?>" class="theme-btn grey-btn">Read More</a>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</section>
			<?php
		endif;
	}
}

$widgets_manager->register( new Recent_Blog() );
