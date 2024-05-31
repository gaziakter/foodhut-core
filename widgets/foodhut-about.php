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
class Foodhut_About extends Widget_Base {

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
		return 'foodhut-about';
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
		return __( 'Foodhut About', 'foodhut-core' );
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

		$this->start_controls_section(
			'foodhut_about',
			[
				'label' => esc_html__( 'Foodhut About', 'foodhut-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'foohut_title',
			[
				'label' => esc_html__( 'Hero Title', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'About Us', 'foodhut-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'foodhut-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'foohut_content',
			[
				'label' => esc_html__( 'About Content', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Type your about content here', 'foodhut-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
            'about_image',
            [
                'label' => __( 'About Image', 'foodhut-core' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
    <!--  About Section  -->
    <div id="about" class="container-fluid wow fadeIn" id="about"data-wow-duration="1.5s">
        <div class="row">
			<?php if(!empty($settings['about_image'])): ?>
            <div class="col-lg-6 has-img-bg" style="background-image: url(<?php echo esc_url( $settings['about_image']['url']);?>);"></div>
			<?php endif; ?>

			<div class="col-lg-6">
                <div class="row justify-content-center">
                    <div class="col-sm-8 py-5 my-5">
						<?php if(!empty($settings['foohut_title'])): ?>
                        <h2 class="mb-4"><?php echo esc_html( $settings['foohut_title'] ); ?></h2>
						<?php endif; ?>

						<?php if(!empty($settings['foohut_content'])): ?>
                        <?php echo wp_kses_post($settings['foohut_content'] ); ?>
						<?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

	<?php
	}
}
