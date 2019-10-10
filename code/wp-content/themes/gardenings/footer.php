<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Gardening
 */
	$gardenings_footer_section = get_theme_mod('gardenings_footer_section_hideshow','show');
	if ($gardenings_footer_section =='show') { 
	?>

	 <!--Main Footer-->
        <footer class="main-footer">
            <div class="container">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row clearfix">

                        <!--big column-->
                        <div class="big-column col-md-6 col-sm-12 col-xs-12">
                            <div class="row clearfix">

                                <!--Footer Column-->
                                <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                    <div class="footer-widget logo-widget">
                                        <?php dynamic_sidebar('gardenings-footer-widget-area-1'); ?>
                                    </div>
                                </div>

                                <!--Footer Column-->
                                <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                      <?php dynamic_sidebar('gardenings-footer-widget-area-2'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--big column-->
                        <div class="big-column col-md-6 col-sm-12 col-xs-12">
                            <div class="row clearfix">

                                <!--Footer Column-->
                                <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                       <?php dynamic_sidebar('gardenings-footer-widget-area-3'); ?>
                                    </div>
                                </div>

                                <!--Footer Column-->
                                <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                    <div class="footer-widget info-widget">
                                        <?php dynamic_sidebar('gardenings-footer-widget-area-4'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!--Footer Bottom-->
                <div class="footer-bottom clearfix" align="center">
                   <?php if( get_theme_mod('gardenings-footer_title') ) : ?>
							<p><?php echo wp_kses_post( html_entity_decode(get_theme_mod('gardenings-footer_title'))); ?></p>
							<?php else : 
							/* translators: 1: poweredby, 2: link, 3: span tag closed  */
							printf( esc_html__( ' %1$sPowered by %2$s%3$s', 'gardenings' ), '<span>', '<a href="'. esc_url( __( 'https://wordpress.org/', 'gardenings' ) ) .'" target="_blank">WordPress.</a>', '</span>' );
							/* translators: 1: poweredby, 2: link, 3: span tag closed  */
							printf( esc_html__( ' Theme: Gardening by: %1$sDesign By %2$s%3$s', 'gardenings' ), '<span>', '<a href="'. esc_url( __( 'Wpthemedaddy', 'gardenings' ) ) .'" target="_blank">"'.esc_html__('Wpthemedaddy','gardenings').'"</a>', '</span>' );
						endif;  
					?>
                </div>

            </div>

        </footer>
    
        <!--End Main Footer-->
	<?php } ?>
<?php wp_footer(); ?>
</div>
</body>
</html>