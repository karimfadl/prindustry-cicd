<?php
/**
 * @package Gardening
 */
?>		
	<div class="inner-box">
        <div class="image">
            <?php if(has_post_thumbnail()) : ?>
				<div>
			   		<?php the_post_thumbnail(); ?>
		    	</div>
			<?php endif; ?>
       	</div>
        <div class="lower-content">
            <ul class="post-info">
                <li>
                    <?php echo esc_html__( 'By :', 'gardenings' ); ?>  <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author();?></a>
                </li>
                <li><?php echo get_the_date(); ?></li>
                <li>
                    <?php echo esc_html__( 'Comments ', 'gardenings' ); ?> <?php comments_number( __(': 0', 'gardenings'), __(': 1', 'gardenings'), __(': %', 'gardenings') ); ?>
                </li>
				 <?php if (has_tag()) : ?>
					<li>
						<?php echo esc_html__( 'Tags : ', 'gardenings' ); ?> <?php the_tags(); ?>
					</li>
				 <?php endif; ?> 
            </ul>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>  
            <a href="<?php the_permalink(); ?>" class="theme-btn btn-style-one"><?php echo esc_html__( 'Read More', 'gardenings' ); ?></a>                              
        </div>                            
    </div>	