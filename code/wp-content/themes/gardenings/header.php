<?php 
/**
 * The header for our theme.
 *
 * Displays all of the <head> section 
 *
 * @package gardening
 */
?>
	 <!DOCTYPE html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head> 
	<body <?php body_class(); ?>>



		<div class="page-wrapper">
        
        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target="html">
            <span class="icon fa fa-angle-double-up"></span>
        </div>

        <!-- Preloader -->
        <div class="preloader"></div>
        <!--main header-->
        <header class="main-header header-style-one">
            <!--Header Top-->
            <?php
				$gardenings_header_section = get_theme_mod('gardenings_header_section_hideshow' , 'show');
                $gardenings_header_search_section = get_theme_mod('gardenings_search_section_hideshow' , 'hide');
				if ($gardenings_header_section =='show') {  
					$gardenings_header_address_value = get_theme_mod('gardenings_header_address_value');  
					$gardenings_header_contact_value = get_theme_mod('gardenings_header_contact_value');
					$gardenings_header_button_value = get_theme_mod('gardenings_header_button_value');
					$gardenings_header_btnurl = get_theme_mod('gardenings_header_btnurl');
					$gardenings_header_social_link_1 = get_theme_mod('gardenings_header_social_link_1');
					$gardenings_header_social_link_2 = get_theme_mod('gardenings_header_social_link_2');
					$gardenings_header_social_link_3 = get_theme_mod('gardenings_header_social_link_3');
					$gardenings_header_social_link_4 = get_theme_mod('gardenings_header_social_link_4');
	
			?>
            <div class="header-top">
                <div class="container">
                    <div class="top-inner"> 
                        <div class="clearfix">   
                        <?php if (!empty($gardenings_header_address_value)) { ?>                     	
                            <div class="top-left">                            	
                                <ul class="clearfix">                                	
                                    <li>
                                        <span class="fa fa-map-marker"></span><?php echo esc_html($gardenings_header_address_value);  ?>
                                    </li>                                    
                                </ul>
                            </div>
                            <?php } ?>
                            <div class="top-right clearfix">
                            	<?php if (!empty($gardenings_header_contact_value)) { ?>
                                <ul class="clearfix">
                                    <li class="number"><?php echo esc_html__('Call Us Today :','gardenings'); ?>
                                        <span><?php echo esc_html($gardenings_header_contact_value);  ?></span>
                                    </li>
                                </ul>
                            	<?php } ?>
                                <!--social-icon-->
                                <div class="social-icon">
                                    <ul class="clearfix">
                                    	<?php if (!empty($gardenings_header_social_link_1)) { ?>
                                        <li>
                                            <a href="<?php echo esc_url(get_theme_mod('gardenings_header_social_link_1')); ?>">
                                                <span class="fa fa-facebook"></span>
                                            </a>
                                        </li>
                                    	<?php } if (!empty($gardenings_header_social_link_2)) { ?>
                                        <li>
                                            <a href="<?php echo esc_url(get_theme_mod('gardenings_header_social_link_2')); ?>">
                                                <span class="fa fa-twitter"></span>
                                            </a>
                                        </li>
                                        
                                    	<?php } if (!empty($gardenings_header_social_link_3)) { ?>
                                        <li>
                                            <a href="<?php echo esc_url(get_theme_mod('gardenings_header_social_link_3')); ?>">
                                                <span class="fa fa-linkedin"></span>
                                            </a>
                                        </li>
                                    	<?php } if (!empty($gardenings_header_social_link_4)) { ?>
                                        <li>
                                            <a href="<?php echo esc_url(get_theme_mod('gardenings_header_social_link_4')); ?>">
                                                <span class="fa fa-google-plus"></span>
                                            </a>
                                        </li>
                                    	<?php } ?>
                                    </ul>
                                </div>
                            </div>                           
                        </div>
                   
                    </div>
                </div>
            </div>
             <?php }else{ echo ""; } ?>
            <!--Header-Upper-->
            <div class="header-upper">
                <div class="container clearfix">
                    <div class="pull-left logo-outer">
                         <div class="logo">
                            <?php if (has_custom_logo()) :
                            ?> 
                                <span><?php the_custom_logo(); ?></span>
                             <?php  
                             else :
                            if (display_header_text()==true){ ?>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <span class="site-title"><?php bloginfo( 'title' ); ?></span>
                                </a>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="tagc">
                                    <span class="site-description"><?php bloginfo( 'description' ); ?></span>
                                </a>                                
                            <?php }
                            endif; ?>
                        </div>
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                    </div>

                    <div class="pull-right upper-right clearfix">
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-collapse collapse clearfix">
                                   
                                        <?php wp_nav_menu( array
									(
									'container'        => 'ul', 
									'theme_location'    => 'primary', 
									'menu_class'        => 'menu', 
									'items_wrap'        => '<ul class="navigation clearfix">%3$s</ul>',
									'fallback_cb'       => 'gardenings_wp_bootstrap_navwalker::fallback',
									'walker'            => new gardenings_wp_bootstrap_navwalker()
									)); 
									?>         
                                    
                                </div>
                            </nav>

                            <!-- Main Menu End-->
                            <div class="outer-box">
                                <?php if($gardenings_header_search_section=='show'){ ?>
                                <!--Search Box-->
                                <div class="search-box-outer">
                                    <div class="dropdown">
                                        <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <span class="fa fa-search"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                            <li class="panel-outer">
                                                <div class="form-container">
                                                    <form method="get" action=" <?php esc_url( home_url( '/' ) ); ?>">
                                                        <div class="form-group">
															<?php get_search_form(); ?>	
														</div>
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php } if (!empty($gardenings_header_button_value)) { ?>
                                <a href="<?php echo esc_url($gardenings_header_btnurl); ?>" class="theme-btn btn-style-one"><?php echo esc_html($gardenings_header_button_value); ?></a>
                            	<?php } ?>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!--End Header Upper-->
        </header>