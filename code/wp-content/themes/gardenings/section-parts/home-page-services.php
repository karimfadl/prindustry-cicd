<?php
/**
 * Template part - Service Section of HomePage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gardening
*/
	$gardenings_services_title = get_theme_mod('gardenings-services_title');
	$gardenings_services_subtitle    = get_theme_mod( 'gardenings-services_subtitle' );
	$gardenings_services_section     = get_theme_mod( 'gardenings_services_section_hideshow','hide');
	
	$gardenings_services_no        = 6;
	$gardenings_services_pages      = array();
		for( $i = 1; $i <= $gardenings_services_no; $i++ ) {
			$gardenings_services_pages[]    =  get_theme_mod( "gardenings_service_page_$i", 1 );
			$gardenings_services_btntext[]    = get_theme_mod( "gardenings_service_page_btntext_$i", '' );
		}

		$gardenings_services_args  = array(
		  'post_type' => 'page',
		  'post__in' => array_map( 'absint', $gardenings_services_pages ),
		  'posts_per_page' => absint($gardenings_services_no),
		  'orderby' => 'post__in'
		 
		); 
		$gardenings_services_query = new   wp_Query( $gardenings_services_args );
		if( $gardenings_services_section == "show") :
		?>

		   <!--Services Section Three-->
        <section class="services-section-three bg-w">
            <div class="container">
                <!--Sec Title-->
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="sec-title">
                            <?php if($gardenings_services_title != "")   {  ?>
								<h2><?php echo esc_html(get_theme_mod('gardenings-services_title')); ?></h2>
							<?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="four-item-carousel owl-carousel owl-theme">
                		<?php
						$count = 0;
						while($gardenings_services_query->have_posts()) :
						$gardenings_services_query->the_post();
						?>
                            <!--Services Block-->
                            <div class="services-block-three style-two">
                                <div class="inner-box">
                                    <div class="image">
                                        <?php the_post_thumbnail(); ?>
                                        <div class="overlay-box">
                                            <h3><?php the_title(); ?></h3>
                                        </div>
                                        <div class="content-overlay">
                                            <div class="overlay-inner">
                                                <div class="content-box">
                                                	<h4>
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h4>              
                                                    <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__( 'Read More', 'gardenings' ); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
						$count = $count + 1;
						endwhile;
						wp_reset_postdata();
						?> 

                    </div>
                </div>
            </div>
        </section>
        <!--End Services Section Three-->
	<?php endif; ?>
