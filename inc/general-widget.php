<?php
/**
 * register all sidebar area  for frontPage.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Thorium Extension
 */
if( ! function_exists( 'thorium_ext_sections_items' ) ) {

	function thorium_ext_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Services Section', 'thorium-ext' ),
			'id'            => 'thorium-ext-section-services',
			'before_widget' => '<div class="col-md-4">',
			'after_widget'  => '</div>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Portfolio Section', 'thorium-ext' ),
			'id'            => 'thorium-ext-section-portfolio',
			'before_widget' => '<div class="col-md-4 col-sm-6 portfolio-item">',
			'after_widget'  => '</div>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'About Section', 'thorium-ext' ),
			'id'            => 'thorium-ext-section-about',
			'before_widget' => '<li>',
			'after_widget'  => '</li>',
		) );
	
	
		register_sidebar( array(
			'name'          => esc_html__( 'Team Section', 'thorium-ext' ),
			'id'            => 'thorium-ext-section-team',
			'before_widget' => '<div class="col-sm-4">',
		'after_widget'  => '</div>',
		) );
	
		register_sidebar( array(
			'name'          => esc_html__( 'Client Section', 'thorium-ext' ),
			'id'            => 'thorium-ext-section-client',
			'before_widget' => '<div class="col-md-3 col-sm-6">',
			'after_widget'  => '</div>',
		) );

	}
}
add_action( 'widgets_init', 'thorium_ext_widgets_init' );




/**
 * loads all widgets for frontPage.
 *
 * @package Thorium Extension
 */

    /**
	 * Section - Services
	 */
	 require_once ( dirname( __FILE__ ) . '/widgets/class-widget-services.php' );
	 
	/**
	 * Section - Portfolio
	 */
	 require_once ( dirname( __FILE__ ) . '/widgets/class-widget-project.php' );
	 
	/**
	 * Section - About
	 */
	 require_once ( dirname( __FILE__ ) . '/widgets/class-widget-about.php' );
	 
	/**
	 * Section - Team
	 */
	 require_once ( dirname( __FILE__ ) . '/widgets/class-widget-team.php' );
	 
	/**
	 * Section - Client
	 */
	 require_once ( dirname( __FILE__ ) . '/widgets/class-widget-client.php' );
