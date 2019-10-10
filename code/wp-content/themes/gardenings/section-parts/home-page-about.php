<?php
/**
 * // To display About Us section on front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gardening
*/
	$gardenings_abouts_section = get_theme_mod( 'gardenings_about_section_hideshow','hide');
	$gardenings_about_no        = 1;
	$gardenings_about_pages      = array();
	for( $i = 1; $i <= $gardenings_about_no; $i++ ) {
		$gardenings_about_pages[]    =  get_theme_mod( "gardenings_about_page_$i", 1 );
	}

	$about_args  = array(
      'post_type' => 'page',
      'post__in' => array_map( 'absint', $gardenings_about_pages ),
      'posts_per_page' => absint($gardenings_about_no),
      'orderby' => 'post__in'
     
	); 
	$about_query = new wp_Query( $about_args );
	if( $gardenings_abouts_section == "show" && $about_query->have_posts() ) :
	?>


		<section class="services-section sp-100-70">
			<div class="container">
				<?php
			$count = 0;
			while($about_query->have_posts()) :
			$about_query->the_post();
			?>
			<?php if(has_post_thumbnail()){ ?>
                <div class="row clearfix">	
                <!--Services Column-->
                    <div class="services-column col-md-5 col-sm-6 col-xs-12">
                        <div class="image">
                           <?php the_post_thumbnail(); ?>
                        </div>
                    </div>	
                    <!--Title Column-->
                    <div class="title-column col-md-7 col-sm-6 col-xs-12">
                        <div class="inner-column">
                        	<h2><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="theme-btn btn-style-one"><?php echo esc_html__( 'Get In Touch', 'gardenings' ); ?></a>
                        </div>
                    </div>	
				</div> <!-- /.row -->
				<?php } else { ?>
					<div class="row clearfix">	               
                    <!--Title Column-->
                    <div class="title-column col-md-12 col-sm-12 col-xs-12">
                        <div class="inner-column">
                        	<h2><?php the_title(); ?></h2>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="theme-btn btn-style-one"><?php echo esc_html__( 'Get In Touch', 'gardenings' ); ?></a>
                        </div>
                    </div>	
				</div> <!-- /.row -->
				<?php } ?>
				<?php
			$count = $count + 1;
			endwhile;
			wp_reset_postdata();
			?> 
				</div> <!-- /.container -->
			</section>
	<?php endif; ?>
