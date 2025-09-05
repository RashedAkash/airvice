<?php
namespace AirviceCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Airvice_Faq extends Widget_Base {

	public function get_name() {
		return 'airvice-faq';
	}

	public function get_title() {
		return __( 'Airvice faq', 'airvice-core' );
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
				'default' => esc_html__( 'Your faq text goes here.', 'airvice-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'faq_list',
			[
				'label' => esc_html__( 'FAQ List', 'airvice-core' ),
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
					'{{WRAPPER}} .accordion-button' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<!-- faq area start here -->
		<section class="faq-area-3 pt-120 pb-105">
			<div class="custom-container">
				<div class="row">
					<div class="col-xl-6 col-lg-9">
						<div class="afaq__text afaq__text--3 mb-30 mr-165 wow fadeInUp" data-wow-delay=".6s">
							<div class="section-title-wrapper mb-50">
								<h6 class="subtitle mb-20">Asked Question</h6>
								<h2 class="section-title">Solutions for an every <br>repair problem</h2>
							</div>
							<div class="accordion" id="accordionExample">
								<?php foreach ( $settings['faq_list'] as $index => $item ): 
									$is_active   = ($index === 0);
									$collapse_id = 'collapse-' . $index;
									$heading_id  = 'heading-' . $index;
								?>
									<div class="accordion-item">
										<h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
											<button class="accordion-button <?php echo $is_active ? '' : 'collapsed'; ?>" 
													type="button" 
													data-bs-toggle="collapse" 
													data-bs-target="#<?php echo esc_attr($collapse_id); ?>" 
													aria-expanded="<?php echo $is_active ? 'true' : 'false'; ?>" 
													aria-controls="<?php echo esc_attr($collapse_id); ?>">
												<?php echo esc_html( $item['list_title'] ); ?>
											</button>
										</h2>
										<div id="<?php echo esc_attr($collapse_id); ?>" 
											 class="accordion-collapse collapse <?php echo $is_active ? 'show' : ''; ?>" 
											 aria-labelledby="<?php echo esc_attr($heading_id); ?>" 
											 data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<?php echo esc_html( $item['list_content'] ); ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- faq area end here -->
		<?php
	}

	protected function content_template() {
		?>
		<div class="title">
			{{{ settings.list_title }}}
		</div>
		<?php
	}
}

$widgets_manager->register( new Airvice_Faq() );
