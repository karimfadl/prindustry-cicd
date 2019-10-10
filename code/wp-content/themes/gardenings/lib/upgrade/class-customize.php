<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Gardenings_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . '/lib/upgrade/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'gardenings_Customize_Section_Pro' );

		// doc sections.
		$manager->add_section(
			new gardenings_Customize_Section_Pro(
				$manager,
				'gardenings',
				array(
					'title'    => esc_html__( 'Theme Documentation', 'gardenings' ),
					'pro_text' => esc_html__( 'Click Here', 'gardenings' ),
					'pro_url'  => 'http://wpthemedaddy.com/docs/gardening/index.html',
					'priority'  => 1
				)
			)
		);
	 
		// upgrade sections.
		$manager->add_section(
			new gardenings_Customize_Section_Pro(
				$manager,
				'upgrade-pro',
				array(
					'title'    => esc_html__( 'Upgrade To Pro', 'gardenings'),
					'pro_text' => esc_html__( 'View Pro', 'gardenings'),
					'pro_url'  => 'http://wpthemedaddy.com/lp/gardning/preview.html',
					'priority'  => 2
				)
			)
		);
		
		// upgrade sections.
		$manager->add_section(
			new gardenings_Customize_Section_Pro(
				$manager,
				'upgrade-pross',
				array(
					'title'    => esc_html__( 'More Detail', 'gardenings'),
					'pro_text' => esc_html__( 'More Detail', 'gardenings'),
					'pro_url'  => 'http://wpthemedaddy.com/lp/gardning/preview.html',
					'priority'  => 500
				)
			)
		);
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'gardenings-customize-controls', trailingslashit( get_template_directory_uri() ) . '/lib/upgrade/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'gardenings-customize-controls', trailingslashit( get_template_directory_uri() ) . '/lib/upgrade/customize-controls.css' );
	}
}

// Doing this customizer thang!
Gardenings_Customize::get_instance();
