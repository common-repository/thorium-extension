<?php 
/*
 * Adds the section title and description controls.
 */
 
 $wp_customize->add_section( 'thorium_ext_frontpage_client', array(
  'title' => __( 'Clients', 'thorium-ext' ),
  'panel' => 'thorium_ext_frontpage',
  'priority' => 50,
 ) );
 
 thorium_ext_addedit_control( 
 	'thorium_ext_client_addedit', 
 	'thorium_ext_frontpage_client', 
 	__( 'Add or edit clients', 'thorium-ext' ),
 	'client' 
 );
 
 thorium_checkbox_control( 
 	'thorium_ext_client_show_section', 
 	'thorium_ext_frontpage_client', 
 	__( 'Show this section','thorium-ext' ), 
 	1, 
 	11,
 	'postMessage' 
 );