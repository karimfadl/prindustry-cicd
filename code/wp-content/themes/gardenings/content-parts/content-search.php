<?php 
/* For Search Results
*/
?>
    
	<div class="bg-w sp-100">
	<div class="container">
		<div class="row clearfix">
			<!--Content Side / Our Blog-->
			<div class="content-side col-md-9 col-sm-12 col-xs-12">
				<div class="blog-classic">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<!--News Block Three-->
						<div class="news-block-three">
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php get_template_part('content-parts/content', get_post_format()); ?>
							</div>
						</div> <!-- /.single-blog -->
					<?php 
					endwhile;
					else :
					   get_template_part( 'content-parts/content', 'none' );
					endif; ?> 
					<!--Styled Pagination-->
					<ul class="styled-pagination">
						<?php the_posts_pagination(
							  array(
									'prev_text' =>esc_html__('&laquo;','gardenings'),
									'next_text' =>esc_html__('&raquo;','gardenings')
								)
							); 
						?>    
					</ul>
					<!--End Styled Pagination-->
				</div>
			</div>
			<!--Sidebar Side-->
			<div class="sidebar-side col-md-3 col-sm-12 col-xs-12">
				<aside class="sidebar default-sidebar">
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</div>
	</div>
</div>