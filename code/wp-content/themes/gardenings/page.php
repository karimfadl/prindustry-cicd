<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Gardening
*/
	get_header(); ?>
	 <?php gardenings_breadcrumbs(); ?>		
	  <!--Sidebar Page Container-->
    <div class="bg-w sp-100">
    	<div class="container">
        	<div class="row clearfix">            	
                <!--Content Side / Our Blog-->
                <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
                	<div class="blog-single blog-detail padding-right">
                		<?php if(have_posts()) : ?>
							<?php while(have_posts()) : the_post(); ?>
						<div class="inner-box">
                        	<div class="image">
                            	<?php if(has_post_thumbnail()) : ?>
									<?php the_post_thumbnail(); ?>
								<?php endif; ?>
                            </div>
                            <div class="lower-content">
                                <div class="text">
                                	<?php the_content(); ?>
                                    <?php the_post_navigation(); ?>
                                </div>               
                            </div>
                        </div>
                        <div class="comment-form">
							<?php 
								if ( comments_open() || get_comments_number() ) :
										comments_template();
								endif; 
							?> 
						</div>
                        	<?php endwhile; ?>
							<?php else :  
							   get_template_part( 'content-parts/content', 'none' );
						endif; ?>
                    </div>
                    <?php
						wp_link_pages( array(
							'before' => '<div class="styled-pagination">' . esc_html__( 'Pages: ', 'gardenings' ),
							'after'  => '</div>',
							) );
					?>
                </div>
                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
                	<aside class="sidebar default-sidebar">
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>