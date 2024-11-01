<?php 
/*
 * Adds the section title and description controls.
 */
 
 $wp_customize->add_section( 'thorium_ext_frontpage_about', array(
  'title' => __( 'About', 'thorium-ext' ),
  'panel' => 'thorium_ext_frontpage',
  'priority' => 30,
 ) );
 
 thorium_ext_addedit_control( 
 	'thorium_ext_about_addedit', 
 	'thorium_ext_frontpage_about', 
 	__( 'Add or edit about detail', 'thorium-ext' ),
 	'about' 
 );
 
 thorium_text_control( 
 	'thorium_ext_about_title', 
 	'thorium_ext_frontpage_about', 
 	__( 'Section Title','thorium-ext' ), 
    __( 'About','thorium-ext' ), 
 	12, 
 	'postMessage' );
 
 thorium_textarea_control( 
 	'thorium_ext_about_description', 
 	'thorium_ext_frontpage_about', 
 	__( 'Section Description','thorium-ext' ),
 	'', 
    20, 
 	'postMessage' );
 	
 thorium_checkbox_control( 
 	'thorium_ext_about_show_section', 
 	'thorium_ext_frontpage_about', 
 	__( 'Show this section','thorium-ext' ), 
 	1, 
 	11,
 	'postMessage' 
 );
 
 thorium_color_control( 
	'thorium_ext_about_bg_color', 
	'thorium_ext_frontpage_about', 
	esc_html__('Section Background Color','thorium-ext'), 
	'#fff', 
	30, 
	'postMessage'
 );
