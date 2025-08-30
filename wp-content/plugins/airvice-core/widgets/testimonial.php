<?php
namespace AirviceCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Airvice_testimonial extends Widget_Base {

	public function get_name() {
		return 'airvice-testimonial';
	}

	public function get_title() {
		return __( 'Airvice Testimonial', 'airvice-core' );
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
			'background_image',
			[
				'label' => esc_html__( 'Background Image', 'airvice-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'testimonial_image',
			[
				'label' => esc_html__( 'Testimonial Image', 'airvice-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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

		// Repeater
		$repeater = new Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Title', 'airvice-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'airvice-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__( 'Content', 'airvice-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Your testimonial text goes here.', 'airvice-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'author_image',
			[
				'label' => esc_html__( 'Author Image', 'airvice-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'author_name',
			[
				'label' => esc_html__( 'Author Name', 'airvice-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe' , 'airvice-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'author_designation',
			[
				'label' => esc_html__( 'Author Designation', 'airvice-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'CEO, Company' , 'airvice-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'testimonial_list',
			[
				'label' => esc_html__( 'Testimonial List', 'airvice-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'airvice-core' ),
						'list_content' => esc_html__( 'Our tools are easy to use and affordable, so you can start improving your website SEO today.', 'airvice-core' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'airvice-core' ),
						'list_content' => esc_html__( 'Our tools are easy to use and affordable, so you can start improving your website SEO today.', 'airvice-core' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();

		// Style
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'airvice-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'airvice-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'airvice-core' ),
					'uppercase' => __( 'UPPERCASE', 'airvice-core' ),
					'lowercase' => __( 'lowercase', 'airvice-core' ),
					'capitalize' => __( 'Capitalize', 'airvice-core' ),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<!-- testimonial area start here -->
		<section class="testimonial-area" 
			<?php if ( !empty($settings['background_image']['url']) ) : ?>
				data-background="<?php echo esc_url($settings['background_image']['url']); ?>"
			<?php endif; ?>
		>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="atestimonial__img wow fadeInUp" data-wow-delay=".5s">
							<?php if ( !empty($settings['testimonial_image']['url']) ) : ?>
								<img src="<?php echo esc_url($settings['testimonial_image']['url']); ?>" alt="testimonial">
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="atestimonial__text wow fadeInUp" data-wow-delay="1s">
							<div class="section-title-wrapper mb-20">
								<h6 class="subtitle mb-20">
									<?php if ( !empty($settings['logo']['url']) ) : ?>
										<img src="<?php echo esc_url($settings['logo']['url']); ?>" class="img-fluid" alt="logo">
									<?php endif; ?>
									<?php if ( !empty($settings['logo_title']) ) : ?>
										<?php echo esc_html($settings['logo_title']); ?>
									<?php endif; ?>
								</h6>
								<?php if ( !empty($settings['title']) ) : ?>
									<h2 class="section-title text-white"><?php echo airvice_kses_function($settings['title']); ?></h2>
								<?php endif; ?>
							</div>
							<div class="atestimonial-active swiper-container">
								<div class="swiper-wrapper">
									<?php foreach ( $settings['testimonial_list'] as $item ) : ?>
										<div class="atestimonial swiper-slide">
											<?php if ( !empty($item['list_content']) ) : ?>
												<p class="text-white mb-40"><?php echo airvice_kses_function($item['list_content']); ?></p>
											<?php endif; ?>
											<div class="atestimonial__client d-flex align-items-center">
												<?php if ( !empty($item['author_image']['url']) ) : ?>
													<div class="atestimonial__client--img">
														<img src="<?php echo esc_url($item['author_image']['url']); ?>" class="img-fluid" alt="author">
													</div>
												<?php endif; ?>
												<div class="atestimonial__client--text">
													<?php if ( !empty($item['author_name']) ) : ?>
														<h4 class="atestimonial__client--text__title">
															<?php echo airvice_kses_function($item['author_name']); ?>
														</h4>
													<?php endif; ?>
													<?php if ( !empty($item['author_designation']) ) : ?>
														<span class="text-white"><?php echo airvice_kses_function($item['author_designation']); ?></span>
													<?php endif; ?>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="swiper-button-prev slide-prev"><i class="far fa-long-arrow-alt-left"></i></div>
								<div class="swiper-button-next slide-next"><i class="far fa-long-arrow-alt-right"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- testimonial area end here -->
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

$widgets_manager->register( new Airvice_testimonial() );
