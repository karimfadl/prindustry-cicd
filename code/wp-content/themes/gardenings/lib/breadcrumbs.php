<?php
/**
 * @package Gardening
 */

if( !function_exists('gardenings_breadcrumbs') ):
    function gardenings_breadcrumbs() { 
    ?>

    <!--Page Title-->
    <section class="page-title" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
        <div class="container">
            <?php if (is_home() || is_front_page()) { ?>                        
                <h1 class="sub-title"><?php the_title(); ?></h1>
            <?php } else { ?>
                <h1 class="sub-title"><?php wp_title(''); ?></h1>                   
            <?php } ?>  
            <ul class="page-breadcrumb">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'gardenings' ); ?></a></li>
                <li><?php wp_title(''); ?></li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
    <?php }
endif
?>