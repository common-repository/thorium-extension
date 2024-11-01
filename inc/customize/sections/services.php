<?php 
/*
 * Adds the section title and description controls.
 */
 
 $wp_customize->add_section( 'thorium_ext_frontpage_services', array(
  'title' => __( 'Services', 'thorium-ext' ),
  'panel' => 'thorium_ext_frontpage',
  'priority' => 10,
 ) );
 
		
 thorium_ext_addedit_control( 
 	'thorium_ext_services_addedit', 
 	'thorium_ext_frontpage_services', 
 	__( 'Add or edit services', 'thorium-ext' ),
 	'services' 
 );
 
 thorium_text_control( 
 	'thorium_ext_services_title', 
 	'thorium_ext_frontpage_services', 
 	__( 'Section Title','thorium-ext' ), 
    __( 'Services','thorium-ext' ), 
 	12, 
 	'postMessage' );
 	
 thorium_textarea_control( 
 	'thorium_ext_services_description', 
 	'thorium_ext_frontpage_services', 
 	__( 'Section Description','thorium-ext' ),
 	'', 
    20, 
 	'postMessage' );
 	
 thorium_checkbox_control( 
 	'thorium_ext_services_show_section', 
 	'thorium_ext_frontpage_services', 
 	__( 'Show this section','thorium-ext' ), 
 	1, 
 	11,
 	'postMessage' 
 );
 
 thorium_color_control( 
	'thorium_ext_services_bg_color', 
	'thorium_ext_frontpage_services', 
	esc_html__('Section Background Color','thorium-ext'), 
	'#fff', 
	30, 
	'postMessage'
 );
	
 ?>