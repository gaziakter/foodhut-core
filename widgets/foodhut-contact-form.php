<?php
namespace FoodHut\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Foodhut_Contact_Form extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'foodhut-contact-form';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Foodhut  Contact Form', 'foodhut-core' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'foodhut-category' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'elementor-hello-world' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {

		/** Contact form section */
		$this->start_controls_section(
			'foodhut_contact_form',
			[
				'label' => esc_html__( 'Foodhut Contact Form', 'foodhut-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'form_title',
			[
				'label' => esc_html__( 'Title', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'BOOK A TABLE', 'foodhut-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'foodhut-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'shortcode',
			[
				'label' => esc_html__( 'Shortcode', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( '', 'foodhut-core' ),
				'placeholder' => esc_html__( 'shortcode here', 'foodhut-core' ),
			]
		);

		$this->add_control(
            'contact_bacgroud_image',
            [
                'label' => __( 'Background Image', 'foodhut-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

		$this->end_controls_section();

		/** Contact info section */
		$this->start_controls_section(
			'foodhut_contact_info',
			[
				'label' => esc_html__( 'Foodhut Contact Info', 'foodhut-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'contact_info_title',
			[
				'label' => esc_html__( 'Info Title', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'FIND US', 'foodhut-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'foodhut-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'contact_info_content',
			[
				'label' => esc_html__( 'Info Content', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( '', 'foodhut-core' ),
				'placeholder' => esc_html__( 'Content here', 'foodhut-core' ),
			]
		);

		$this->add_control(
			'contact_location',
			[
				'label' => esc_html__( 'Contact Location', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '12345 Fake ST NoWhere, AB Country', 'foodhut-core' ),
				'placeholder' => esc_html__( 'Type your adress here', 'foodhut-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'contact_phone',
			[
				'label' => esc_html__( 'Contact Phone', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '(123) 456-7890', 'foodhut-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'foodhut-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'contact_email',
			[
				'label' => esc_html__( 'Contact Email', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'info@website.com', 'foodhut-core' ),
				'placeholder' => esc_html__( 'Type your Email here', 'foodhut-core' ),
				'label_block' => true,
			]
		);



		$this->end_controls_section();

		/** Contact Google map section */
		$this->start_controls_section(
			'foodhut_google-map',
			[
				'label' => esc_html__( 'Foodhut Google Map', 'foodhut-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'latitude',
			[
				'label' => esc_html__( 'Latitude', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '40.712776', 'foodhut-core' ),
				'placeholder' => esc_html__( 'Inter latitude here', 'foodhut-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'longitude',
			[
				'label' => esc_html__( 'Longitude', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '74.005974', 'foodhut-core' ),
				'placeholder' => esc_html__( 'Enter longitude here', 'foodhut-core' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

    <!-- book a table Section  -->
    <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" style="background-image: url(<?php echo esc_url( $settings['contact_bacgroud_image']['url']);?>);" id="book-table">
        <div class="">
			<?php if(!empty($settings['form_title'])) : ?>
            <h2 class="section-title mb-5"><?php echo esc_html( $settings['form_title'] ); ?></h2>
			<?php endif; ?>

			<div class="row">
			<?php if(!empty($settings['shortcode'])) : ?>
			<?php echo do_shortcode($settings['shortcode']); ?>
			<?php endif; ?>
			</div>

        </div>
    </div>

	    <!-- CONTACT Section  -->
		<div id="contact" class="container-fluid bg-dark text-light border-top wow fadeIn">
        <div class="row">
            <div class="col-md-6 px-0">
				<div id="google-map" style="width: 100%; height: 400px;"></div>

				<script>
            var map;
            function initMap() {
                var location = { lat: parseFloat('<?php echo $settings['latitude']; ?>'), lng: parseFloat('<?php echo $settings['longitude']; ?>') };
                map = new google.maps.Map(document.getElementById('google-map'), {
                    center: location,
                    zoom: 14
                });
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }
            jQuery(document).ready(function($) {
                if (typeof google === 'object' && typeof google.maps === 'object') {
                    initMap();
                } else {
                    var script = document.createElement('script');
                    script.src = 'https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap';
                    document.head.appendChild(script);
                }
            });
        </script>

            </div>
            <div class="col-md-6 px-5 has-height-lg middle-items">

				<?php if(!empty($settings['contact_info_title'])) : ?>
                <h3><?php echo esc_html( $settings['contact_info_title'] ); ?></h3>
				<?php endif; ?>

				<?php if(!empty($settings['contact_info_content'])) : ?>
                <p><?php echo esc_html( $settings['contact_info_content'] ); ?></p>
				<?php endif; ?>

                <div class="text-muted">
					<?php if(!empty($settings['contact_location'])) : ?>
                    <p><span class="ti-location-pin pr-3"></span><?php echo esc_html( $settings['contact_location'] ); ?></p>
					<?php endif; ?>

					<?php if(!empty($settings['contact_phone'])) : ?>
                    <p><span class="ti-support pr-3"></span><?php echo esc_html( $settings['contact_phone'] ); ?></p>
					<?php endif; ?>

					<?php if(!empty($settings['contact_email'])) : ?>
                    <p><span class="ti-email pr-3"></span><?php echo esc_html( $settings['contact_email'] ); ?></p>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
	<?php
	}
}