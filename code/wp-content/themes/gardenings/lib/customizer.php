<?php
/**
 * Gardening Theme Customizer
 *
 * @package Gardenings
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function gardenings_customize_register( $wp_customize ) {	
	 
	// Gardening theme choice options
	if (!function_exists('gardenings_section_choice_option')) :
		function gardenings_section_choice_option()
		{
			$gardenings_section_choice_option = array(
				'show' => esc_html__('Show', 'gardenings'),
				'hide' => esc_html__('Hide', 'gardenings')
			);
			return apply_filters('gardenings_section_choice_option', $gardenings_section_choice_option);
		}
	endif;

	// Gardening theme search options
	if (!function_exists('gardenings_section_search_option')) :
		function gardenings_section_search_option()
		{
			$gardenings_section_search_option = array(
				'show' => esc_html__('Show', 'gardenings'),
				'hide' => esc_html__('Hide', 'gardenings')
			);
			return apply_filters('gardenings_section_search_option', $gardenings_section_search_option);
		}
	endif;

	//// Gardening service column choice options
	if (!function_exists('gardenings_services_section_columnshow')) :
		function gardenings_services_section_columnshow()
		{
			$gardenings_services_section_columnshow = array(
				'6' => esc_html__('2 COLUMN', 'gardenings'),
				'4' => esc_html__('3 COLUMN', 'gardenings'),
				'3' => esc_html__('4 COLUMN', 'gardenings')
			);
			return apply_filters('gardenings_services_section_columnshow', $gardenings_services_section_columnshow);
		}
	endif;

	//// Gardening blog column choice options
	if (!function_exists('gardenings_blog_section_columnshow')) :
		function gardenings_blog_section_columnshow()
		{
			$gardenings_blog_section_columnshow = array(
				'6' => esc_html__('2 COLUMN', 'gardenings'),
				'4' => esc_html__('3 COLUMN', 'gardenings'),
				'3' => esc_html__('4 COLUMN', 'gardenings')
			);
			return apply_filters('gardenings_blog_section_columnshow', $gardenings_blog_section_columnshow);
		}
	endif;


	/**
	 * Sanitizing the select callback example
	 *
	 */
	if ( !function_exists('gardenings_sanitize_select') ) :
		function gardenings_sanitize_select( $input, $setting ) {

			// Ensure input is a slug.
			$input = sanitize_text_field( $input );

			// Get list of choices from the control associated with the setting.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}
	endif;

	/**
	 * Important Link
	*/
	 class gardenings_theme_info_text extends WP_Customize_Control{
        public function render_content(){  ?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>
            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php }
        }
    }
	
	 
	
	$wp_customize->add_section( 'gardenings_implink_section', array(
	  'title'       => esc_html__( 'Important Links', 'gardenings' ),
	  'priority'      => 200
	) );

	    $wp_customize->add_setting( 'gardenings_imp_links', array(
	      'sanitize_callback' => 'gardenings_text_sanitize'
	    ));

	    $wp_customize->add_control( new gardenings_theme_info_text( $wp_customize,'gardenings_imp_links', array(
	        'settings'    => 'gardenings_imp_links',
	        'section'   => 'gardenings_implink_section',
	        'description' => '<a class="implink" href="http://wpthemedaddy.com/docs/gardening/index.html" target="_blank">'.esc_html__('Documentation', 'gardenings').'</a><a class="implink" href="http://wpthemedaddy.com/lp/gardning/preview.html" target="_blank">'.esc_html__('Live Demo', 'gardenings').'</a><a class="implink" href="https://wordpress.org/support/theme/gardenings" target="_blank">'.esc_html__('Support Forum', 'gardenings').'</a>',
	      )
	    ));

	    $wp_customize->add_setting( 'gardenings_rate_us', array(
	      'sanitize_callback' => 'gardenings_text_sanitize'
	    ));

	    $wp_customize->add_control( new gardenings_theme_info_text( $wp_customize, 'gardenings_rate_us', array(
	          'settings'    => 'gardenings_rate_us',
	          'section'   => 'gardenings_implink_section',
              /* translators: 1.text 2.theme */
	          'description' => sprintf(__( 'Please do rate our theme if you liked it %1$s', 'gardenings'), '<a class="implink" href="https://wordpress.org/support/theme/gardenings/reviews/?filter=5" target="_blank">'.esc_html__('Rate/Review','gardenings').'</a>' ),
	        )
	    ));
	
	/**
	 * Drop-down Pages sanitization callback example.
	 *
	 * - Sanitization: dropdown-pages
	 * - Control: dropdown-pages
	 * 
	 * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
	 * as an absolute integer, and then validates that $input is the ID of a published page.
	 * 
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
	 *
	 * @param int                  $page    Page ID.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 */
	function gardenings_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );
		
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
	
	
	/** Front Page Section Settings starts **/	

	$wp_customize->add_panel(
		'frontpage', 
		array(
			'title' => esc_html__('Gardening Options', 'gardenings'),        
			'description' => '',                                        
			'priority' => 3,
		)
	);
	
	// Image Info
	
    $wp_customize->add_section('gardenings_image_info', array(
      'title'   => esc_html__('Home Intro', 'gardenings'),
      'description' => '',
	  'panel' => 'frontpage',
      'priority'    => 151
    ));
	
	$wp_customize->add_setting(
    'gardenings_image_section_hideshow',
    array(
        'default' => 'hide',
        'sanitize_callback' => 'gardenings_sanitize_select',
    )
    );
    $gardenings_section_choice_option = gardenings_section_choice_option();
    $wp_customize->add_control(
    'gardenings_image_section_hideshow',
    array(
        'type' => 'radio',
        'label' => esc_html__('Show/hide option for Image Section.', 'gardenings'),
        'description' => '',
        'section' => 'gardenings_image_info',
        'choices' => $gardenings_section_choice_option,
        'priority' => 1
    )
    );
	
	$wp_customize->add_setting('gardenings_b_image', array(     
	'default'   => '',
    'type'      => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'gardenings_b_image', array(
      'label'   => esc_html__('Image', 'gardenings'),
      'section' => 'gardenings_image_info',
      'settings' => 'gardenings_b_image',
      'priority'  => 2
    )));
	
	$wp_customize->add_setting('gardenings_image_heading', array(
     'default'   => '',
      'type'      => 'theme_mod',
	  'sanitize_callback'	=> 'sanitize_text_field'
    ));

    $wp_customize->add_control('gardenings_image_heading', array(
      'label'   => esc_html__('Heading', 'gardenings'),
      'section' => 'gardenings_image_info',
      'priority'  => 4
    ));	
	
	$wp_customize->add_setting('gardenings_image_subheading', array(
     'default'   => '',
      'type'      => 'theme_mod',
	  'sanitize_callback'	=> 'sanitize_text_field'
    ));

    $wp_customize->add_control('gardenings_image_subheading', array(
      'label'   => esc_html__('Sub Heading', 'gardenings'),
      'section' => 'gardenings_image_info',
      'priority'  => 4
    ));
	
	$wp_customize->add_setting('gardenings_image_more', array(
      'default'   =>'',
      'type'      => 'theme_mod',
	  'sanitize_callback'	=> 'sanitize_text_field'
    ));

    $wp_customize->add_control('gardenings_image_more', array(
      'label'   => esc_html__('Button - Text', 'gardenings'),
      'section' => 'gardenings_image_info',
      'priority'  => 7
    ));
	
	$wp_customize->add_setting('gardenings_image_more_url', array(
     'default'   =>  '',
      'type'      => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('gardenings_image_more_url', array(
      'label'   => esc_html__('Button - URL', 'gardenings'),
      'section' => 'gardenings_image_info',
      'priority'  => 8
    ));

	// Header info
	$wp_customize->add_section(
		'gardenings_header_section', 
		array(
			'title'   => esc_html__('Top Header Info Section', 'gardenings'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 130
		)
	);

	$wp_customize->add_setting(
		'gardenings_header_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'gardenings_sanitize_select',
		)
	);

	$gardenings_section_choice_option = gardenings_section_choice_option();
	$wp_customize->add_control(
		'gardenings_header_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Header Info Option', 'gardenings'),
			'description' => esc_html__('Show/hide option for Header Section.', 'gardenings'),
			'section' => 'gardenings_header_section',
			'choices' => $gardenings_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'gardenings_search_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'gardenings_sanitize_select',
		)
	);

	$gardenings_section_search_option = gardenings_section_choice_option();
	$wp_customize->add_control(
		'gardenings_search_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Search Info Option', 'gardenings'),
			'description' => esc_html__('Do you want to show show/hide search option.', 'gardenings'),
			'section' => 'gardenings_header_section',
			'choices' => $gardenings_section_search_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'gardenings_header_address_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'gardenings_header_address_value', 
		array(
			'label'   => esc_html__('Address', 'gardenings'),
			'section' => 'gardenings_header_section',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'gardenings_header_contact_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'gardenings_header_contact_value', 
		array(
			'label'   => esc_html__('Contact', 'gardenings'),
			'section' => 'gardenings_header_section',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'gardenings_header_button_value',
			array(
				'default'           => '',
				'type'      		=> 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'gardenings_header_button_value',
			array(
				'label'    			=> esc_html__( 'Header Button Text','gardenings' ),
				'section'  			=> 'gardenings_header_section',
				'priority' 			=> 3
			)
		);

		$wp_customize->add_setting( 
			'gardenings_header_btnurl',
			array(
				'default'           => '',
				'type'      		=> 'theme_mod',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( 
			'gardenings_header_btnurl',
			array(
				'label'    			=> esc_html__( 'Header Button URL', 'gardenings' ),
				'section'  			=> 'gardenings_header_section',
				'priority' 			=> 3,
			)
		);

		$wp_customize->add_setting(
		'gardenings_header_social_link_1',
		array(
			'default'   =>  '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'gardenings_header_social_link_1',
		array(
			'label'   => esc_html__('Facebook URL', 'gardenings'),
			'section' => 'gardenings_header_section',
			'priority'  => 7
		)
	);

	$wp_customize->add_setting(
		'gardenings_header_social_link_2',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'gardenings_header_social_link_2',
		array(
			'label'   => esc_html__('Twitter URL', 'gardenings'),
			'section' => 'gardenings_header_section',
			'priority'  => 9
		)
	);

	$wp_customize->add_setting(
		'gardenings_header_social_link_3',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'gardenings_header_social_link_3',
		array(
			'label'   => esc_html__('Linkedin URL', 'gardenings'),
			'section' => 'gardenings_header_section',
			'priority'  => 11
		)
	);

	$wp_customize->add_setting(
		'gardenings_header_social_link_4',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw'
		)
	);

	$wp_customize->add_control(
		'gardenings_header_social_link_4',
		array(
			'label'   => esc_html__('Google+ URL', 'gardenings'),
			'section' => 'gardenings_header_section',
			'priority'  => 11
		)
	);

		////End Header info Section

	////Start About info Section
	$wp_customize->add_section(
		'about', 
		array(
			'title'   => esc_html__('About Section', 'gardenings'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'gardenings_about_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'gardenings_sanitize_select',
		)
	);

	$gardenings_section_choice_option = gardenings_section_choice_option();
	$wp_customize->add_control(
		'gardenings_about_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'gardenings'),
			'description' => esc_html__('Show/hide option for Header Section.', 'gardenings'),
			'section' => 'about',
			'choices' => $gardenings_section_choice_option,
			'priority' => 1
		)
	);

    $about_no = 1;
	for( $i = 1; $i <= $about_no; $i++ ) {
		$gardenings_aboutpage = 'gardenings_about_page_' . $i;
	// Setting - About page
	$wp_customize->add_setting( 
			$gardenings_aboutpage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'gardenings_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( 
			$gardenings_aboutpage,
			array(
				'label'    			=> esc_html__( 'About Page ', 'gardenings' ),
				'section'  			=> 'about',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
	}
	////End about info Section

	////Start Service info Section
		$wp_customize->add_section(
		'services', 
		array(
			'title'   => esc_html__('Service Section', 'gardenings'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'gardenings_services_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'gardenings_sanitize_select',
		)
	);

	$gardenings_section_choice_option = gardenings_section_choice_option();
	$wp_customize->add_control(
		'gardenings_services_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'gardenings'),
			'description' => esc_html__('Show/hide option for Header Section.', 'gardenings'),
			'section' => 'services',
			'choices' => $gardenings_section_choice_option,
			'priority' => 1
		)
	);
 
	$wp_customize->add_setting(
		'gardenings-services_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'gardenings-services_title',
		array(
			'label'   => esc_html__('Services Section Title', 'gardenings'),
			'section' => 'services',
			'priority'  => 3
		)
	);

    $service_no = 6;
	for( $i = 1; $i <= $service_no; $i++ ) {
		$gardenings_servicepage = 'gardenings_service_page_' . $i;
		$gardenings_servicepage_btntext = 'gardenings_service_page_btntext_' . $i;

	// Setting - Service page
	$wp_customize->add_setting( 
			$gardenings_servicepage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'gardenings_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( 
			$gardenings_servicepage,
			array(
				'label'    			=> esc_html__( 'Service Page ', 'gardenings' ) .$i,
				'section'  			=> 'services',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
	}
	////End Service info Section

	////Start Blog info Section
		$wp_customize->add_section(
		'blog', 
		array(
			'title'   => esc_html__('Blog Section', 'gardenings'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'gardenings_blog_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'gardenings_sanitize_select',
		)
	);

	$gardenings_section_choice_option = gardenings_section_choice_option();
	$wp_customize->add_control(
		'gardenings_blog_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'gardenings'),
			'description' => esc_html__('Show/hide option for Blog Section.', 'gardenings'),
			'section' => 'blog',
			'choices' => $gardenings_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'gardenings_blog_section_columnshow',
		array(
			'default' => '4',
			'sanitize_callback' => 'gardenings_sanitize_select',
		)
	);

	$gardenings_blog_section_columnshow = gardenings_blog_section_columnshow();
    $wp_customize->add_control(
    'gardenings_blog_section_columnshow',
    array(
        'type' => 'radio',
        'label' => esc_html__('Select Column', 'gardenings'),
        'description' => esc_html__('Select Service Column option for Service.', 'gardenings'),
        'section' => 'blog',
        'choices' => $gardenings_blog_section_columnshow,
        'priority' => 3
    )
    );

    $wp_customize->add_setting(
		'gardenings-blog_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'gardenings-blog_title',
		array(
			'label'   => esc_html__('Blog Section Title', 'gardenings'),
			'section' => 'blog',
			'priority'  => 3
		)
	);

	////Start callout info Section
	$wp_customize->add_section(
		'callout', 
		array(
			'title'   => esc_html__('Callout Section', 'gardenings'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'gardenings_callout_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'gardenings_sanitize_select',
		)
	);

	$gardenings_section_choice_option = gardenings_section_choice_option();
	$wp_customize->add_control(
		'gardenings_callout_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'gardenings'),
			'description' => esc_html__('Show/hide option for Header Section.', 'gardenings'),
			'section' => 'callout',
			'choices' => $gardenings_section_choice_option,
			'priority' => 1
		)
	);



	$wp_customize->add_setting(
		'gardenings_callout_text_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'gardenings_callout_text_value', 
		array(
			'label'   => esc_html__('Callout Text', 'gardenings'),
			'section' => 'callout',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'gardenings_callout_subtext_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'gardenings_callout_subtext_value', 
		array(
			'label'   => esc_html__('Callout Sub Text', 'gardenings'),
			'section' => 'callout',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'gardenings_callout_number_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'gardenings_callout_number_value', 
		array(
			'label'   => esc_html__('Callout Number Text', 'gardenings'),
			'section' => 'callout',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'gardenings_callout_button_text',
			array(
				'default'           => '',
				'type'      		=> 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'gardenings_callout_button_text',
			array(
				'label'    			=> esc_html__( 'Callout Button Text','gardenings' ),
				'section'  			=> 'callout',
				'priority' 			=> 3
			)
		);

		$wp_customize->add_setting( 
			'gardenings_callout_button_url',
			array(
				'default'           => '',
				'type'      		=> 'theme_mod',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( 
			'gardenings_callout_button_url',
			array(
				'label'    			=> esc_html__( 'Button URL', 'gardenings' ),
				'section'  			=> 'callout',
				'priority' 			=> 3,
			)
		);
	
	////End callout info Section

	
    ////Start footer Section
	
	$wp_customize->add_section(
		'footer',
		array(
			'title'   => esc_html__('Footer Section', 'gardenings'),
			'description' => '',
			'panel' => 'frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'gardenings_footer_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'gardenings_sanitize_select',
		)
	);
	$gardenings_section_choice_option = gardenings_section_choice_option();
	$wp_customize->add_control(
		'gardenings_footer_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Footer Option', 'gardenings'),
			'description' => esc_html__('Show/hide option for Footer Section.', 'gardenings'),
			'section' => 'footer',
			'choices' => $gardenings_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'gardenings-footer_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'wp_kses_post'
		)
	);

	$wp_customize->add_control(
		'gardenings-footer_title',
		array(
			'label'   => esc_html__('Copyright', 'gardenings'),
			'section' => 'footer',
			'type'      => 'textarea',
			'priority'  => 1
		)
	);
}
add_action( 'customize_register', 'gardenings_customize_register' );
