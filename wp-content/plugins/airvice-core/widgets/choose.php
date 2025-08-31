<?php
namespace AirviceCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Airvice_choose extends Widget_Base {

	public function get_name() {
		return 'airvice-choose';
	}

	public function get_title() {
		return __( 'Airvice Choose', 'airvice-core' );
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
			'background_image1',
			[
				'label' => esc_html__( 'Background Image', 'airvice-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'background_image2',
			[
				'label' => esc_html__( 'Background Image', 'airvice-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'background_image3',
			[
				'label' => esc_html__( 'Background Image', 'airvice-core' ),
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
		$this->add_control(
			'content',
			[
				'label' => esc_html__( 'content', 'airvice-core' ),
				'type' => Controls_Manager::TEXTAREA,
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
			'icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					
					'icon' => esc_html__( 'Icon', 'textdomain' ),
					'svg' => esc_html__( 'Svg', 'textdomain' ),
					'image' => esc_html__( 'Image', 'textdomain' ),
				],
				'selectors' => [
					'{{WRAPPER}} .your-class' => 'border-style: {{VALUE}};',
				],
			]
		);
			$repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'condition' => [
			'icon_style' => 'icon',
		],
				
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( ' Image', 'airvice-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
			'icon_style' => 'image',
		],
			]
		);

		$repeater->add_control(
			'svg',
			[
				'label' => esc_html__( 'SVG', 'airvice-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( '#', 'airvice-core' ),
				'label_block' => true,
				'condition' => [
			'icon_style' => 'svg',
		],
			]
		);

		

		$this->add_control(
			'choose_list',
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

		 <!-- choose us area start here -->
        <section class="position-relative">
            <div class="why__choose--bg d-lg-none">
                <img src="<?php echo esc_url($settings['background_image1']['url']); ?>" class="img-fluid z-index" alt="img">
            </div>
            <div class="choose-area" data-background="<?php echo esc_url($settings['background_image2']['url']); ?>">
                <div class="choose-bg-right" data-background="<?php echo esc_url($settings['background_image3']['url']); ?>"></div>
                <div class="choose--content__wrapper z-index">
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-lg-7">
                                <div class="choose--content">
                                    <div class="section-title-wrapper mb-35 wow fadeInUp" data-wow-delay=".3s">
                                        <h6 class="subtitle mb-20"><img src="<?php echo esc_url($settings['logo']['url']); ?>" class="img-fluid" alt="img"><?php echo esc_html($settings['logo_title']); ?></h6>
                                        <h2 class="section-title"><?php echo airvice_kses_function($settings['title']); ?></h2>
                                    </div>
                                    <p class="mb-40 wow fadeInUp" data-wow-delay=".6s"><?php echo airvice_kses_function($settings['content']); ?></p>

									<?php foreach ( $settings['choose_list'] as $item ) : ?>
    <div class="achoose mb-40 wow fadeInUp" data-wow-delay=".9s">
        <div class="achoose__icon theme-bg-blue">
            <?php if ( $item['icon_style'] === 'icon' && !empty($item['icon']['value']) ) : ?>
                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>

            <?php elseif ( $item['icon_style'] === 'image' && !empty($item['image']['url']) ) : ?>
                <img src="<?php echo esc_url($item['image']['url']); ?>" alt="icon" />

            <?php elseif ( $item['icon_style'] === 'svg' && !empty($item['svg']) ) : ?>
                <?php echo $item['svg']; ?>

            <?php endif; ?>
        </div>
        <div class="achoose__text">
            <h4 class="achoose__text--title"><?php echo airvice_kses_function($item['list_title']); ?></h4>
            <p><?php echo airvice_kses_function($item['list_content']); ?></p>
        </div>
    </div>
<?php endforeach; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- choose us area end here -->
		
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

$widgets_manager->register( new Airvice_choose() );
