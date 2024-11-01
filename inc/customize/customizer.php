<?php
/**
 * Thorium Extension FrontPage Customizer Settings
 *
 * @package Thorium Extension
 */

if( ! function_exists( 'thorium_ext_customize_register' ) ) {

	function thorium_ext_customize_register( $wp_customize ) {
 		/**
  		* Custom control
  		*/
  	
 		// Contact Form 7
 		require_once ( dirname( __FILE__ ) . '/controls/contact-form.php' );
 		// Add Edit
 		require_once ( dirname( __FILE__ ) . '/controls/add-edit.php' );

 		/**
  		* All section customizer functions
  		*/
  
 		// Services
 		require_once ( dirname( __FILE__ ) . '/sections/services.php' );
 		// Portfolio
 		require_once ( dirname( __FILE__ ) . '/sections/portfolio.php' );
 		// About
 		require_once ( dirname( __FILE__ ) . '/sections/about.php' );
 		// Team
 		require_once ( dirname( __FILE__ ) . '/sections/team.php' );
 		// Client
 		require_once ( dirname( __FILE__ ) . '/sections/client.php' );
 		// Contact
 		require_once ( dirname( __FILE__ ) . '/sections/contact.php' );
 		// Header
 		require_once ( dirname( __FILE__ ) . '/sections/header.php' );
 		
 		// Add FrontPage panel
 		$wp_customize->add_panel( 'thorium_ext_frontpage',
    		array(
        		'priority'          => 37,
        		'capability'        => 'edit_theme_options',
        		'theme_supports'    => '',
        		'title'             => __( 'Front Page', 'thorium-ext-ext' ),
    		)
 		);
 		$wp_customize->add_panel( 'thorium_ext_sections_items', 
 			array(
		  		'title' 				=> __( 'Sections Items', 'thorium-ext' ),
		  		'priority'			=> 38,
				) 
 		);
 
 		// Move section sidebars to another panel
 		foreach ( $wp_customize->sections() as $id => $section ) {
			$sections_items = thorium_ext_sections_items();
			foreach( $sections_items as $section_name ) {
					$needle = 'sidebar-widgets-thorium-ext-section-' . $section_name;
					if( $needle === $id ) {
						$section->panel = 'thorium_ext_sections_items';
					}
			}
 		}

	}
}
add_action( 'customize_register', 'thorium_ext_customize_register', 11 );

if( ! function_exists( 'thorium_ext_customizer_css_load' ) ) {
	function thorium_ext_customizer_css_load() {
		wp_enqueue_style( 'thorium-ext-customizer-css', THORIUM_EXTS_URL . '/css/customizer.css' );
	}
}
add_action( 'customize_controls_print_styles', 'thorium_ext_customizer_css_load' );

if( ! function_exists( 'thorium_ext_customizer_control_js' ) ) {
	function thorium_ext_customizer_control_js() {
			// Settings Manager
			wp_enqueue_script( 'thorium-ext-customizer-settings', THORIUM_EXTS_URL . '/js/customizer-ext.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), THORIUM_EXTS_VERSION, true );
	}
}
add_action( 'customize_controls_enqueue_scripts', 'thorium_ext_customizer_control_js' );

if( ! function_exists( 'thorium_ext_customize_preview_js' ) ) {
	function thorium_ext_customize_preview_js() {
		/**
 		* Binds JS handlers to make Customizer preview reload changes asynchronously.
 		*/
		wp_enqueue_script( 'thorium-ext-customizer-preview', THORIUM_EXTS_URL . '/js/customizer-ext-preview.js', array( 'customize-preview' ), THORIUM_EXTS_VERSION, true );
	}
}
add_action( 'customize_preview_init', 'thorium_ext_customize_preview_js' );
