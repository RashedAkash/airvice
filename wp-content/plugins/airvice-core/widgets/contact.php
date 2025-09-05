<?php
namespace AirviceCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Airvice_contact extends Widget_Base {

	public function get_name() {
		return 'airvice-contact';
	}

	public function get_title() {
		return __( 'Airvice Contact', 'airvice-core' );
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
			'contact_style',
			[
				'label' => esc_html__( 'Border Style', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'contact1',
				'options' => [
					
					'contact1' => esc_html__( 'Contact1', 'textdomain' ),
					'contact2' => esc_html__( 'Contact2', 'textdomain' ),
				],
				
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
	<?php if ( $settings['contact_style'] === 'contact1' ) :
?>

    <div class="contact__inner--form service__contact--form">
        <div class="section-title-wrapper mb-40">
            <h6 class="subtitle mb-20">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/icon/subtitle-icon.png' ); ?>" 
                     class="img-fluid" alt="img"> 
                Get in Touch
            </h6>
            <h2 class="section-title">Have any question</h2>
        </div>
        
        <?php
        // Contact Form 7 Shortcode render
        echo do_shortcode('[contact-form-7 id="a8e9a8c" title="contact form"]');
        ?>
    </div>



	<?php else: ?>
	 <div class="acontact__form mr-70 wow fadeInUp" data-wow-delay=".3s">
		<h3 class="acontact__form--title">Free Estimate</h3>
		 <?php
        // Contact Form 7 Shortcode render
        echo do_shortcode('[contact-form-7 id="a8e9a8c" title="contact form"]');
        ?>
	</div>
	<?php endif; ?>

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

$widgets_manager->register( new Airvice_contact() );
