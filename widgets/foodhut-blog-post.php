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
class Foodhut_Blog_Post extends Widget_Base {

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
		return 'foodhut-blog-post';
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
		return __( 'Foodhut Blog Post', 'foodhut-core' );
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
			'blog_section',
			[
				'label' => esc_html__( 'Blog Section', 'foodhut-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_per_page',
			[
				'label' => esc_html__( 'Post Per Page', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'cat_list',
			[
				'label' => esc_html__( 'Category', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => post_cat(),
			]
		);

		$this->add_control(
			'cat_exclude',
			[
				'label' => esc_html__( 'Category Exclude', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => post_cat(),
			]
		);

		$this->add_control(
			'post_exclude',
			[
				'label' => esc_html__( 'Post Exclude', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => get_all_post(),
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC' => esc_html__( 'ASC', 'foodhut-core' ),
					'DFESC'  => esc_html__( 'DESC', 'foodhut-core' ),
				],
			]
		);

		$this->add_control(
			'order_by',
			[
				'label' => esc_html__( 'Order By', 'foodhut-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'name' => esc_html__( 'Name', 'foodhut-core' ),
					'date'  => esc_html__( 'Date', 'foodhut-core' ),
					'title'  => esc_html__( 'Title', 'foodhut-core' ),
					'rand'  => esc_html__( 'Rand', 'foodhut-core' ),
					'id'  => esc_html__( 'ID', 'foodhut-core' ),
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

		$args = array(
			'post_type' => 'post',
			'order' => $settings['order'],
			'orderby' => $settings['order_by'],
			'posts_per_page' => !empty($settings['post_per_page']) ? $settings['post_per_page'] : -1,
			'post__not_in'=> $settings['post_exclude'],
		);

		if(!empty($settings['cat_list'] || $settings['cat_exclude'] )){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => !empty($settings['cat_exclude']) ?  $settings['cat_exclude'] : $settings['cat_list'],
					'operator' => !empty($settings['cat_exclude']) ? 'NOT IN' : 'IN',
				),
			);
		}

		$query = new \WP_Query( $args );
		?>
    <!-- BLOG Section  -->
    <div id="" class="container-fluid bg-dark text-light text-center wow fadeIn">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">

					<?php if ( $query->have_posts() ) : ?>
						<?php while ( $query->have_posts() ) : $query->the_post();
						$price = get_post_meta(get_the_ID(), 'price', true);
						?>
                    <div class="col-md-4 my-3 my-md-0">
                        <a href="<?php the_permalink(); ?>"class="card bg-transparent border">
							<?php the_post_thumbnail(); ?>
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="<?php the_title(); ?>" class="badge badge-primary">$<?php echo esc_html($price); ?></a></h1>
                                <h4 class="pt20 pb20"><?php the_title(); ?></h4>
                                <p class="text-white"><?php the_excerpt(); ?></p>
                            </div>
                        </a>
                    </div>
					<?php endwhile; wp_reset_postdata(); endif;  ?> 

                </div>
            </div>
        </div>
    </div>
		<?php
	}
}
