<?php 
/*
 * Adds the section title and description controls.
 */
 
 $wp_customize->add_section( 'thorium_ext_frontpage_portfolio', array(
  'title' => __( 'Portfolio', 'thorium-ext' ),
  'panel' => 'thorium_ext_frontpage',
  'priority' => 20,
 ) );
 
 thorium_ext_addedit_control( 
 	'thorium_ext_portfolio_addedit', 
 	'thorium_ext_frontpage_portfolio', 
 	__( 'Add or edit portfolio', 'thorium-ext' ),
 	'portfolio' 
 );
 
 thorium_text_control( 
 	'thorium_ext_portfolio_title', 
 	'thorium_ext_frontpage_portfolio', 
 	__( 'Section Title','thorium-ext' ), 
    __( 'Portfolio','thorium-ext' ), 
 	12, 
 	'postMessage' );
 	
  thorium_textarea_control( 
 	'thorium_ext_portfolio_description', 
 	'thorium_ext_frontpage_portfolio', 
 	__( 'Section Description','thorium-ext' ),
 	'', 
    20, 
 	'postMessage' );
 	
 thorium_checkbox_control( 
 	'thorium_ext_portfolio_show_section', 
 	'thorium_ext_frontpage_portfolio', 
 	__( 'Show this section','thorium-ext' ), 
 	1, 
 	11,
 	'postMessage' 
 ); 
 
 thorium_color_control( 
	'thorium_ext_portfolio_bg_color', 
	'thorium_ext_frontpage_portfolio', 
	esc_html__('Section Background Color','thorium-ext'), 
	'#eee', 
	30, 
	'postMessage'
 );
	