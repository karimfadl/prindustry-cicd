<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Gardening
 */

    get_header(); ?>
    
	
	 <!--Error Section-->
	<section class="error-section" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
		<div class="container">
			<div class="content">
				<h1><?php echo esc_html__( '404', 'gardenings' ); ?></h1>
				<h2><?php echo esc_html__( 'Oops! That page can&rsquo;t be found', 'gardenings' ); ?></h2>
				<div class="text"><?php echo esc_html__( 'Sorry, but the page you are looking for does not existing', 'gardenings' ); ?></div>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="theme-btn btn-style-one"><?php echo esc_html__( 'Get In Touch', 'gardenings' ); ?></a>
			</div>
		</div>
	</section>
	<!--End Error Section-->  
	<?php get_footer(); ?>	