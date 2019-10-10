<?php
/**
 * The template part for displaying Single posts
 *
 * @package WordPress
 * @subpackage Gardening
 */
?>
<!--Sidebar Page Container-->
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="inner-box">
        	<div class="image">
            	<?php if(has_post_thumbnail()) : ?>
					<div href="<?php the_permalink(); ?>">
   						<?php the_post_thumbnail(); ?>
					</div>
				<?php endif; ?>
            </div>
            <div class="lower-content">
                <ul class="post-info">
                    <li>
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html__('By', 'gardenings' ); ?> : <?php the_author();?></a>
                    </li>
                    <li><?php echo get_the_date(); ?></li>
                    <li>
                       <?php echo esc_html__('Comments :', 'gardenings' ); ?>
                       <?php comments_number( __('0', 'gardenings'), __('1', 'gardenings'), __('%', 'gardenings') ); ?>
                    </li> 
                                  
                 </ul>
                 <h3><?php the_title(); ?></h3>
	                    
                <div class="text">
                	<?php the_content(); ?>
                </div>
                <?php
					wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'gardenings' ),
					'after'  => '</div>',
					) );
				?>                        
            </div>
        </div> 
	</div>