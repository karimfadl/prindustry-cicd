<?php 
/**
 * Template Name: Home Page
 * @package Gardening
*/

	get_header();
		get_template_part( 'section-parts/home-page-baner' );
		get_template_part( 'section-parts/home-page-about' );
		get_template_part( 'section-parts/home-page-thecontent' );
		get_template_part( 'section-parts/home-page-services' );		
		get_template_part( 'section-parts/home-page-blog' );
		get_template_part( 'section-parts/home-page-callout' );
	get_footer(); 
	?>