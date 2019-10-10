<?php
/**
 * The template for displaying search results pages.
 *
 * @package Gardening
 */
	get_header();
	?>
		 <!--Page Title-->
    <section class="page-title" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
        <div class="container">
             <?php if ( have_posts() ) : ?>
                <h1 class="title">
                    <?php 
                        /* translators: %s: search term */
                        printf( esc_html__( 'Search Results for: %s', 'gardenings' ), '<span>' . get_search_query() . '</span>' ); 
                    ?>
                </h1>
            <?php else : ?>
                <h1 class="title">
                    <?php
                        /* translators: %s: nothing found term */
                        printf( esc_html__( 'Nothing Found for: %s', 'gardenings' ), '<span>' . get_search_query() . '</span>' ); 
                    ?>
                </h1>
            <?php endif; ?>
            <ul class="page-breadcrumb">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'gardenings' ); ?></a></li>
                <li><?php wp_title(''); ?></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
        <!--Sidebar Page Container-->
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
<?php get_footer(); ?>