<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( esc_html__( 'Ready to publish your first post? Get started here.', 'gardenings' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

<?php elseif ( is_search() ) : ?>

	<h4 class="ex"><?php printf( esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gardenings' ), '<span>' . get_search_query() . '</span>' ); ?>
	</h4>
	<div class="sidebar default-sidebar">
	<div class="sidebar-widget search-box">
		 <?php get_search_form(); ?>
	</div>
	</div>

<?php else : ?>

	<p><?php echo(esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'gardenings' )); ?></p>
	<div class="sidebar default-sidebar">
	<div class="sidebar-widget search-box">
		 <?php get_search_form(); ?>
	</div>
	</div>

<?php endif; ?>