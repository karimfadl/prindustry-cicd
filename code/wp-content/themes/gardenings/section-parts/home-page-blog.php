<?php
/**
 * // To display Blog Post section on front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gardening
*/
	$gardenings_blog_title = get_theme_mod('gardenings-blog_title');
	$gardenings_blog_url    = get_theme_mod( 'gardenings-blog_url' );
	$gardenings_blog_section     = get_theme_mod( 'gardenings_blog_section_hideshow','show');
	$gardenings_blog_section_column = get_theme_mod( 'gardenings_blog_section_columnshow',2);

	if ($gardenings_blog_section =='show') { 
	?>

	<!--News Section-->
        <section class="news-section sp-100-70">
            <div class="container">
                <div class="row clearfix">
                    <!--Title Column-->
                    <div class="col-sm-12">
                        <div class="sec-title mb-55">
                            <?php if($gardenings_blog_title != "")   {  ?>
								<h2><?php echo esc_html(get_theme_mod('gardenings-blog_title')); ?></h2>
							<?php }?>					
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <!--News Block-->
                    <?php 
						$latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
						if ( $latest_blog_posts->have_posts() ) : 
							while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); 
					?>
		                    <div class="news-block col-md-<?php echo esc_attr(get_theme_mod('gardenings_blog_section_columnshow')); ?> col-sm-<?php echo esc_attr(get_theme_mod('gardenings_blog_section_columnshow')); ?> col-xs-<?php echo esc_attr(get_theme_mod('gardenings_blog_section_columnshow')); ?>">
		                        <div class="inner-box">
		                            <figure class="image">
		                                <a href="<?php the_permalink(); ?>">
		                                    <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
		                                </a>
		                            </figure>
		                            <div class="lower-box">
		                                <ul class="post-info">
		                                    <li>
		                                    	<?php echo esc_html__( 'By:', 'gardenings' ); ?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
		                                    </li>
		                                    <li><?php echo get_the_date();?></li>
		                                    <li><?php echo esc_html__( 'Comments', 'gardenings' ); ?><?php comments_number( __(': 0', 'gardenings'), __(': 1', 'gardenings'), __(': %', 'gardenings') ); ?>
		                                    </li>
		                                </ul>
		                                <h3>
		                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		                                </h3>
		                                <?php the_excerpt(); ?>
		                                <a href="<?php the_permalink(); ?>" class="theme-btn read-more"><?php echo esc_html__( 'Read More', 'gardenings' ); ?></a>                              
		                            </div>
		                        </div>
		                    </div>
	                    <?php 
						endwhile; 
						 wp_reset_postdata();
					endif; ?>
                </div>
            </div>
        </section>
        <!--End News Section-->
    <?php } ?>