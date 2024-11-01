<?php 
/*
 * Adds the section title and description controls.
 */
 
 $wp_customize->add_section( 'thorium_ext_frontpage_team', array(
  'title' => __( 'Team', 'thorium-ext' ),
  'panel' => 'thorium_ext_frontpage',
  'priority' => 40,
 ) );
 
 thorium_ext_addedit_control( 
 	'thorium_ext_team_addedit', 
 	'thorium_ext_frontpage_team', 
 	__( 'Add or edit team members', 'thorium-ext' ),
 	'team' 
 );
 
 thorium_text_control( 
 	'thorium_ext_team_title', 
 	'thorium_ext_frontpage_team', 
 	__( 'Section Title','thorium-ext' ), 
    __( 'Our Amazing Team','thorium-ext' ), 
 	12, 
 	'postMessage' );
 	
  thorium_textarea_control( 
 	'thorium_ext_team_description', 
 	'thorium_ext_frontpage_team', 
 	__( 'Section Description','thorium-ext' ),
 	'', 
    20, 
 	'postMessage' );
 	
 thorium_checkbox_control( 
 	'thorium_ext_team_show_section', 
 	'thorium_ext_frontpage_team', 
 	__( 'Show this section','thorium-ext' ), 
 	1, 
 	11,
 	'postMessage' 
 );
 
 thorium_color_control( 
	'thorium_ext_team_bg_color', 
	'thorium_ext_frontpage_team', 
	esc_html__('Section Background Color','thorium-ext'), 
	'#eee', 
	30, 
	'postMessage'
 );
 