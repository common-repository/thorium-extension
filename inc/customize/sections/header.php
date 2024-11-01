<?php 
/*
 * Adds the section title and description controls.
 */
 
 $wp_customize->add_section( 'thorium_ext_frontpage_header', array(
  'title' => __( 'Header', 'thorium-ext' ),
  'panel' => 'thorium_ext_frontpage',
  'priority' => 5,
 ) );
 
 thorium_text_control( 
 	'thorium_ext_header_leadin', 
 	'thorium_ext_frontpage_header', 
 	__( 'Intro Lead in','thorium-ext' ), 
    __( 'Welcome To Our Studio!','thorium-ext' ), 
 	10, 
 	'postMessage' 
 );
 
 thorium_text_control( 
 	'thorium_ext_header_heading', 
 	'thorium_ext_frontpage_header', 
 	__( 'Intro Heading','thorium-ext' ), 
    __( 'It\'s nice to meet you','thorium-ext' ), 
 	20, 
 	'postMessage' 
 );
 
 thorium_checkbox_control( 
 	'thorium_ext_header_show_button', 
 	'thorium_ext_frontpage_header', 
 	__( 'Add a Button','thorium-ext' ), 
 	1, 
 	30,
 	'postMessage' 
 );
 
 thorium_link_control( 
 	'thorium_ext_header_button_link', 
 	'thorium_ext_frontpage_header', 
 	__( 'Button Link','thorium-ext' ), 
 	'', 
 	'',
 	50,
 	'postMessage' 
  );
 
 thorium_text_control( 
 	'thorium_ext_header_button_text', 
 	'thorium_ext_frontpage_header', 
 	__( 'Button Text','thorium-ext' ), 
    __( 'Tell Me More','thorium-ext' ), 
 	40, 
 	'postMessage' 
 );
 
 
 	