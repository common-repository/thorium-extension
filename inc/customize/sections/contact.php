<?php 
/*
 * Adds the section title and description controls and contact form.
 */
 
 $wp_customize->add_section( 'thorium_ext_frontpage_contact', array(
  'title' => __( 'Contact', 'thorium-ext' ),
  'panel' => 'thorium_ext_frontpage',
  'priority' => 60,
 ) );
 
 thorium_text_control( 
 	'thorium_ext_contact_title', 
 	'thorium_ext_frontpage_contact', 
 	__( 'Section Title','thorium-ext' ), 
    __( 'Contact Us','thorium-ext' ), 
 	12, 
 	'postMessage' );
 	
 thorium_textarea_control( 
 	'thorium_ext_contact_description', 
 	'thorium_ext_frontpage_contact', 
 	__( 'Section Description','thorium-ext' ),
 	'', 
    20, 
 	'postMessage' );
  
 thorium_color_control( 
 	'thorium_ext_contact_bg_color',
 	'thorium_ext_frontpage_contact', 
 	__( 'Section Background Color','thorium' ), 
 	'#222222', 
 	40, 
 	'postMessage', 
 	'' 
 );
  	
 thorium_ext_contact_form_control( 
 	'thorium_ext_contact_form',
 	'thorium_ext_frontpage_contact',
 	__( 'Select the contact form you\'d like to display (powered by Contact Form 7)', 'thorium-ext' ),
 	30 );
 	
 thorium_checkbox_control( 
 	'thorium_ext_contact_show_section', 
 	'thorium_ext_frontpage_contact', 
 	__( 'Show this section','thorium-ext' ), 
 	1, 
 	11,
 	'postMessage' 
 );
 	
