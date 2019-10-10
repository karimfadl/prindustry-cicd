<?php
/**
 * Gardening functions and definitions
  @package Gardening
 *
*/
/* Set the content width in pixels, based on the theme's design and stylesheet.
*/

	function gardenings_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'gardenings_content_width', 980 );
	}
	add_action( 'after_setup_theme', 'gardenings_content_width', 0 );

	if( ! function_exists( 'gardenings_theme_setup' ) ) {	
		
		function gardenings_theme_setup() {
			load_theme_textdomain( 'gardenings', get_template_directory() . '/languages' );
			
			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );
			
			// Add title tag 
			add_theme_support( 'title-tag' );
			
			// Add default logo support		
			add_theme_support( 'custom-logo');

			add_theme_support('post-thumbnails');
		   
			
			 // Add theme support for Semantic Markup
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			) ); 
			
			$defaults = array(
			'default-image'          => get_template_directory_uri() .'/assets/images/header.jpg',
			'width'                  => 1920,
			'height'                 => 600,
			'uploads'                => true,
			'default-text-color'     => "000",
			'wp-head-callback'       => 'gardenings_header_style',
		);
		add_theme_support( 'custom-header', $defaults );

			// Menus
			register_nav_menus(array(
				'primary' => esc_html__('Primary Menu', 'gardenings'),
			));
			// add excerpt support for pages
			add_post_type_support( 'page', 'excerpt' );
			
			if ( is_singular() && comments_open() ) {
				wp_enqueue_script( 'comment-reply' );
			}
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
			
			
			// To use additional css
			add_editor_style( 'assets/css/editor-style.css' );
			
			//Welcome Message 		
			if ( is_admin() ) {
				require( get_template_directory() . '/welcome-message.php');
			}
		}
		add_action( 'after_setup_theme', 'gardenings_theme_setup' );
	}

	/**
	 * Styles the header text color displayed on the page header title
	 *
	 */
	function gardenings_header_style()
	{
		$header_text_color = get_header_textcolor();
		?>
			<style type="text/css">
				<?php
					//Check if user has defined any header image.
					if ( get_header_image() ) :
				?>
					.site-title, .site-description{
						color: #<?php echo esc_attr($header_text_color); ?>;
					}
				<?php endif; ?>	
			</style>
		<?php

	}
	
	
	/**
 * Load Upsell Button In Customizer
 * 2016 &copy; [Justin Tadlock](http://justintadlock.com).
 */

require_once( trailingslashit( get_template_directory() ) . '/lib/upgrade/class-customize.php' );

add_action( 'admin_init', 'gardenings_detect_button' );
	function gardenings_detect_button() {
	wp_enqueue_style( 'gardenings-info-button', get_template_directory_uri() . '/assets/css/import-button.css' );
}

/**
 * admin  JS scripts
 */
function gardenings_admin_enqueue_scripts( $hook ) { 
	wp_enqueue_style( 
		'font-awesome', 
		get_template_directory_uri() . '/assets/css/font-awesome/css/font-awesome.css', 
		array(), 
		'4.7.0', 
		'all' 
	);
	wp_enqueue_style( 
		'erzen-admin', 
		get_template_directory_uri() . '/assets/admin/css/admin.css', 
		array(), 
		'1.0.0', 
		'all' 
	);
 
}
add_action( 'admin_enqueue_scripts', 'gardenings_admin_enqueue_scripts' );



	// Register Nav Walker class_alias
	require get_template_directory(). '/lib/class-wp-bootstrap-navwalker.php';
	require get_template_directory(). '/lib/extras.php';
	 require get_template_directory(). '/pro-feat.php';
	/**
	 * Enqueue CSS stylesheets
	 */		
	if( ! function_exists( 'gardenings_enqueue_styles' ) ) {
		function gardenings_enqueue_styles() {	
		
			wp_enqueue_style('gardenings-font', 'https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700|Roboto:300,400,500,700','');
			wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css','');
			
			wp_enqueue_style('font-awesome', get_template_directory_uri() .'/assets/css/font-awesome/css/font-awesome.css','');
			wp_enqueue_style('jquery-owl-css', get_template_directory_uri() .'/assets/css/owl.css','');
			// main style
			wp_enqueue_style( 'gardenings-style', get_stylesheet_uri() );
			wp_enqueue_style('gardenings-responsive', get_template_directory_uri() . '/assets/css/responsive.css','');
			
		}
		add_action( 'wp_enqueue_scripts', 'gardenings_enqueue_styles' );
	}

	/**
	 * Enqueue JS scripts
	 */

	if( ! function_exists( 'gardenings_enqueue_scripts' ) ) {
		function gardenings_enqueue_scripts() {   
			wp_enqueue_script('jquery');			
			wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js',array(),'', true);
			wp_enqueue_script('jquery-owl-js', get_template_directory_uri() . '/assets/js/owl.js',array(),'', true);
			wp_enqueue_script('gardenings-script-js', get_template_directory_uri() . '/assets/js/script.js',array(),'', true);		
		}
		add_action( 'wp_enqueue_scripts', 'gardenings_enqueue_scripts' );
	}
	/**
	 * Register sidebars for gardening
	*/
	function gardenings_sidebars() {

		// Blog Sidebar
		
		register_sidebar(array(
			'name' => esc_html__( 'Blog Sidebar', "gardenings"),
			'id' => 'blog-sidebar',
			'description' => esc_html__( 'Sidebar on the blog layout.', "gardenings"),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="sidebar-title">',
			'after_title' => '</h2>',
		));
  	

		// Footer Sidebar
		
		register_sidebar(array(
			'name' => esc_html__( 'Footer Widget Area 1', "gardenings"),
			'id' => 'gardenings-footer-widget-area-1',
			'description' => esc_html__( 'The footer widget area 1', "gardenings"),
			'before_widget' => ' <div class="widget %2$s">',
			'after_widget' => '</div> ',
			'before_title' => '<h2 class="widget-title ">',
			'after_title' => '</h2>',
		));	
		
		register_sidebar(array(
			'name' => esc_html__( 'Footer Widget Area 2', "gardenings"),
			'id' => 'gardenings-footer-widget-area-2',
			'description' => esc_html__( 'The footer widget area 2', "gardenings"),
			'before_widget' => '<div class="widget %2$s"> ',
			'after_widget' => ' </div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));	
		
		register_sidebar(array(
			'name' => esc_html__( 'Footer Widget Area 3', "gardenings"),
			'id' => 'gardenings-footer-widget-area-3',
			'description' => esc_html__( 'The footer widget area 3', "gardenings"),
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));	
		
		register_sidebar(array(
			'name' => esc_html__( 'Footer Widget Area 4', "gardenings"),
			'id' => 'gardenings-footer-widget-area-4',
			'description' => esc_html__( 'The footer widget area 4', "gardenings"),
			'before_widget' => '<div class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));		
	}

	add_action( 'widgets_init', 'gardenings_sidebars' );

	/**
	 * Comment layout
	 */
	function gardenings_comments( $comment, $args, $depth ) { ?>
		<div <?php comment_class('comments'); ?> id="<?php comment_ID() ?>">
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
				  <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'gardenings' ) ?></p>
				</div>
			<?php endif; ?>
			<div class="comment-block">
				<?php echo get_avatar( $comment,'88', null,'User', array( 'class' => array( 'media-object','' ) )); ?>
				<div class="user-post-content">
					<h4>
						<?php 
								/* translators: '%1$s %2$s: edit term */
						printf(esc_html__( '%1$s %2$s', 'gardenings' ), get_comment_author_link(), edit_comment_link(esc_html__( '(Edit)', 'gardenings' ),'  ','') ) ?>
					</h4>
					<span datetime="<?php comment_time('g:i a'); ?>">
						<?php echo get_comment_date(). esc_html__(' at ', 'gardenings').get_comment_time(); ?>
					</span>
					<?php comment_text() ;?>
					<a class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
				</div>
			</div>
		</div>
	<?php
	}
	/**
	 * Customizer additions.
	 */
		require get_template_directory(). '/lib/customizer.php';
	  require get_template_directory(). '/lib/breadcrumbs.php';
	  
	//post excerpt
function gardenings_excerpt_global_length( $length ) {
	return 10;
}

function gardenings_service_excerpt(){
	add_filter( 'excerpt_length', 'gardenings_excerpt_global_length', 999 );
	echo the_excerpt();
} 