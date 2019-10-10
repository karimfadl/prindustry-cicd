<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: Use this page template to remove the sidebar from any page.
 * @package Gardening
 */
?>
	<?php
	  get_header(); 
      gardenings_breadcrumbs();
	?>
    <div class="bg-w sp-100">
        <div class="container">
            <div class="row clearfix">              
                <!--Content Side / Our Blog-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
            </div>
        </div>
    </div>
<?php get_footer(); ?>