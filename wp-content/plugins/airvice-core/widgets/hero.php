<?php
namespace AirviceCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Airvice_hero extends Widget_Base {

	public function get_name() {
		return 'airvice-hero';
	}

	public function get_title() {
		return __( 'Airvice Hero', 'airvice-core' );
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
			'image',
			[
				'label' => esc_html__( 'Image', 'airvice-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'airvice-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Default Text', 'airvice-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'airvice-core' ),
				'type' => Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'video_text',
			[
				'label' => esc_html__( 'Video Text', 'airvice-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Watch Video' , 'airvice-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'video_link',
			[
				'label' => esc_html__( 'Video Link', 'airvice-core' ),
				'type' => Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => true,
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'hero_list',
			[
				'label' => esc_html__( 'Hero List', 'airvice-core' ),
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

		<!-- hero area start here -->
		<section class="slider-area fix">
			<div class="slider-active swiper-container">
				<div class="swiper-wrapper">
					<?php foreach ( $settings['hero_list'] as $item ) : ?>
						<div class="single-slider slider-height d-flex align-items-center swiper-slide" data-swiper-autoplay="5000">
							<?php if ( !empty($item['image']['url']) ) : ?>
								<div class="slide-bg" data-background="<?php echo esc_url($item['image']['url']); ?>"></div>
							<?php endif; ?>
							<div class="custom-container">
								<div class="row">
									<div class="col-lg-12">
										<div class="aslider z-index">

											<?php if ( !empty($item['video_link']['url']) ) : ?>
												<div class="aslider--video mb-20" data-animation="fadeInUp" data-delay=".3s">
													<a class="venobox aslider--video__wrapper" data-autoplay="true" data-vbtype="video" href="<?php echo esc_url($item['video_link']['url']); ?>">
														<i class="fas fa-play aslider--video__icon"></i>
														<?php if ( !empty($item['video_text']) ) : ?>
															<h4 class="aslider--video__title"><?php echo esc_html($item['video_text']); ?></h4>
														<?php endif; ?>
													</a>
												</div>
											<?php endif; ?>

											<?php if ( !empty($item['list_title']) ) : ?>
												<h2 class="aslider--title mb-30" data-animation="fadeInUp" data-delay=".5s">
													<?php echo airvice_kses_function($item['list_title']); ?>
												</h2>
											<?php endif; ?>

											<?php if ( !empty($item['list_content']) ) : ?>
												<h3 class="aslider--subtitle mb-50" data-animation="fadeInUp" data-delay=".7s">
													<?php echo airvice_kses_function($item['list_content']); ?>
												</h3>
											<?php endif; ?>

											<?php if ( !empty($item['button_text']) && !empty($item['button_link']['url']) ) : 
												$this->add_link_attributes( 'button_arg_'.$item['_id'], $item['button_link'] );
												$this->add_render_attribute('button_arg_'.$item['_id'], 'class', 'theme-btn theme-btn-blue');
											?>
												<div class="aslider--btn" data-animation="fadeInUp" data-delay=".9s">
													<a <?php echo $this->get_render_attribute_string( 'button_arg_'.$item['_id'] ); ?>>
														<?php echo esc_html($item['button_text']); ?>
													</a>
												</div>
											<?php endif; ?>

										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev slide-prev"><i class="far fa-long-arrow-left"></i></div>
				<div class="swiper-button-next slide-next"><i class="far fa-long-arrow-right"></i></div>
			</div>
		</section>
		<!-- hero area end here -->

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

$widgets_manager->register( new Airvice_hero() );
