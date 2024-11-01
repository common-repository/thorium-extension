<?php
/**
 * ------------------------------
 * Include partials
 * ------------------------------
 */
 
 	/**
	 * Section - Services
	 */
	 
 	require_once ( dirname( __FILE__ ) . '/sections/section-services.php' );
 	
 	/**
	 * Section - Portfolio
	 */
	 
 	require_once ( dirname( __FILE__ ) . '/sections/section-portfolio.php' );
 	
 	/**
	 * Section - About
	 */
	 
 	require_once ( dirname( __FILE__ ) . '/sections/section-about.php' );
 	
 	/**
	 * Section - Team
	 */
	 
 	require_once ( dirname( __FILE__ ) . '/sections/section-team.php' );
 	
 	/**
	 * Section - Client
	 */
	 
 	require_once ( dirname( __FILE__ ) . '/sections/section-client.php' );
 	
 	/**
	 * Section - Contact
	 */
	 
 	require_once ( dirname( __FILE__ ) . '/sections/section-contact.php' );
 	
 /**
 * ------------------------------
 * Hook the partials
 * ------------------------------
 */
  	
 	add_action('thorium_frontpage_sections','thorium_ext_services_template', 10);
 	add_action('thorium_frontpage_sections','thorium_ext_portfolio_template', 20);
	add_action('thorium_frontpage_sections','thorium_ext_about_template', 30);
	add_action('thorium_frontpage_sections','thorium_ext_team_template', 40);
	add_action('thorium_frontpage_sections','thorium_ext_client_template', 50);
	add_action('thorium_frontpage_sections','thorium_ext_contact_template', 60);

 	
 	
 	
