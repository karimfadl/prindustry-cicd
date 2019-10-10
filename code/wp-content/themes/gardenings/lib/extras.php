<?php
/**
 * Functions hooked to core hooks.
 *
 */

if ( ! function_exists( 'gardenings_customize_search_form' ) ) :

	/** Customize search form.
	 **/
	function gardenings_customize_search_form() {

		$form = '<div class="sidebar-widget search-box"><form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
			 <div class="form-group">
			 	<span class="screen-reader-text">' . esc_html( '', 'label', 'gardenings' ) . '</span>
                <input type="search" class="search-query form-control" placeholder="' . esc_attr_x( 'Search..', 'placeholder', 'gardenings' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'gardenings' ) . '" />
                <button type="submit">
                    <span class="icon fa fa-search"></span>
                </button>
            </div></form></div> ';

		return $form;
    }
	
	endif;
add_filter( 'get_search_form', 'gardenings_customize_search_form', 15 );
?>

