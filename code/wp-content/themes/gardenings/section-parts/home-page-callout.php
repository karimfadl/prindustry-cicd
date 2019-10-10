<?php
/**
 * // To display Footer Call Out section on front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gardening
*/
	$gardenings_callouts_section = get_theme_mod( 'gardenings_callout_section_hideshow','hide');
	$gardenings_callout_text_value= get_theme_mod( "gardenings_callout_text_value");
	$gardenings_callout_subtext_value= get_theme_mod( "gardenings_callout_subtext_value");
	$gardenings_callout_number_value= get_theme_mod( "gardenings_callout_number_value");
	$gardenings_callout_button_value= get_theme_mod( "gardenings_callout_button_text");
	$gardenings_callout_button_url= get_theme_mod( "gardenings_callout_button_url");
  
	if( $gardenings_callouts_section == "show" ) :
	?>

	<!--Call To Action-->
        <section class="call-to-action" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8 b-right">
                       <?php if($gardenings_callout_text_value !=""){ ?>
							<h2><?php echo esc_html($gardenings_callout_text_value); ?></h2>
						<?php } ?>
						<?php if($gardenings_callout_subtext_value !=""){ ?>
							<p><?php echo esc_html($gardenings_callout_subtext_value); ?></p>
						<?php } ?> 
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="number-box clearfix">
                            <div class="number">
                            	<?php if($gardenings_callout_number_value !=""){ ?>
                            		 <span><?php echo esc_html($gardenings_callout_number_value); ?> </span>									
								<?php } ?>                               
                            </div>
                            <?php if($gardenings_callout_button_value !="")
							{?>
								<a href="<?php echo esc_url($gardenings_callout_button_url); ?>" class="theme-btn btn-style-two"><?php echo esc_html(get_theme_mod('gardenings_callout_button_text')); ?></a>
							<?php } ?>                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Call To Action-->
	<?php endif; ?>
