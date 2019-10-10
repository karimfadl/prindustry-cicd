<?php
/**
 * Template part - Intro Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gardening
 */
	$gardenings_image_section_hideshow = get_theme_mod("gardenings_image_section_hideshow",'hide');
	$gardenings_image_more = get_theme_mod("gardenings_image_more",'');
	$gardenings_b_image = get_theme_mod("gardenings_b_image",''); 
	$gardenings_image_heading = get_theme_mod("gardenings_image_heading",'');
	$gardenings_image_subheading = get_theme_mod("gardenings_image_subheading",'');

	if( $gardenings_image_section_hideshow == "show") {
	?>


        <!--Main Slider-->
        <section class="theme-banner" style="background: url('<?php echo esc_url($gardenings_b_image); ?>') no-repeat center center; ">
            <div class="slide-table">
                <div class="slide-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="banner-content">
                                   <?php if ($gardenings_image_heading !=""){ ?>
        							<h2 class="wow fadeInUp animated" data-wow-delay="0.2s">
        								<?php echo esc_html($gardenings_image_heading); ?>
        							</h2>
        						<?php } if ($gardenings_image_subheading !=""){ ?>
                                    <p><?php echo esc_html(get_theme_mod('gardenings_image_subheading')); ?></p>
                                <?php } ?>
                                <?php if (!empty($gardenings_image_more)) { ?>
        							<a href="<?php echo esc_url(get_theme_mod('gardenings_image_more_url')); ?>" class="theme-btn btn-style-one"><?php echo esc_html($gardenings_image_more); ?></a>
        						<?php } ?>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Main Slider-->
    <?php
   }
	else
	{
		 gardenings_breadcrumbs();
	}
?>