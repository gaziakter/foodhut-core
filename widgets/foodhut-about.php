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
				'default' => esc_html__( 'Food Hut', 'foodhut-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'foodhut-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'foohut_content',
			[
				'label' => esc_html__( 'About Content', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Type your about content here', 'foodhut-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
            'hero_bacgroud_image',
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
    <!-- header -->
    <header id="home" class="header" style="background-image: url(<?php echo esc_url( $settings['hero_bacgroud_image']['url']);?>);">
        <div class="overlay text-white text-center">
			<?php if(!empty($settings['foohut_title'])): ?>
            <h1 class="display-2 font-weight-bold my-3"><?php echo esc_html( $settings['foohut_title'] ); ?></h1>
			<?php endif; ?>

			<?php if(!empty($settings['foohut_sub_title'])): ?>
            <h2 class="display-4 mb-5"><?php echo esc_html( $settings['foohut_sub_title'] ); ?></h2>
			<?php endif; ?>

			<?php if(!empty($settings['foohut_button_text'])): ?>
            <a class="btn btn-lg btn-primary" <?php $this->print_render_attribute_string( 'foohut_button_url' ); ?>><?php echo esc_html( $settings['foohut_button_text'] ); ?></a>
			<?php endif; ?>
		</div>
    </header>

	<?php
	}
}
