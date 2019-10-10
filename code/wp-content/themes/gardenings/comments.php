<?php
/**
 * The template for displaying comments
 */
	if ( post_password_required() ) {
		return;
	}
	?>                  
	<?php if ( have_comments() ) : ?>
		<div class="user-comments">
            <div class="sec-title type-2">
				<h2>
					<?php
						$comments_number = get_comments_number();
						if ( 1 === $comments_number ) {
							/* translators: %s: post title */
							printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','gardenings' ), get_the_title() );
						} 	else {
							echo esc_html (number_format_i18n( $comments_number ));
							echo number_format_i18n( $comments_number ) > 1  ?  esc_html__( ' Comments Found','gardenings' ) : esc_html__( ' Comment','gardenings' );
							}
					?>
				</h2>
			</div>
			<?php the_comments_navigation(); ?>
			<?php
				wp_list_comments( array(
					'style'       => '',
					'short_ping'  => true,
					'avatar_size' => 42,
					'callback' => 'gardenings_comments',
				) );
			?>
			<!-- .comment-list -->
			<?php the_comments_navigation(); ?>
		</div>
	<?php endif; // Check for have_comments(). ?>
	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'gardenings' ) ) : ?>
			<p class="no-comments"><?php esc_html__( 'Comments are closed.', 'gardenings' ); ?></p> 
		<?php endif; ?>
	<?php 
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $comments_args = array
    (
        'submit_button' => __('<div class="comment-form"><input  name="%1$s" type="submit" id="%2$s" class="theme-btn btn-style-one" value="post comment" /></div>','gardenings'),
        'title_reply'  =>  __( '<div class="sec-title type-2"><h2>Leave Comment</h2></div>', 'gardenings'  ), 
        'comment_notes_after' => '',  
            
        'comment_field' => '<div class="form-group">'.
            '<textarea class="form-control" id="comment" name="comment" placeholder="' . esc_attr__( 'Comment here', 'gardenings' ) . '" rows="7" aria-required="true" '. $aria_req . '>' .
            '</textarea></div>',
        'fields' => apply_filters( 'comment_form_default_fields', array (
            'author' => '<div class="form-group">'.               
                '<input id="author" class="form-control" name="author" placeholder="' . esc_attr__( 'Name', 'gardenings' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' /></div>',
            'email' =>'<div class="form-group">'.
                '<input id="email" class="form-control" name="email" placeholder="' . esc_attr__( 'Email Address', 'gardenings' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' /></div>',
        ) ),
    );
    ?>
    <div class="comment-form">
        <?php comment_form($comments_args); ?>
    </div> <!-- /.inner-box -->