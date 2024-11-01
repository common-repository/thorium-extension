<?php 

if( ! function_exists( 'thorium_ext_sections_items' ) ) {
	/**
	 * Returns an array with names of sections
	 * that can add items
	 *
	 * @since  1.0.0
	 * @return array
	 */
	function thorium_ext_sections_items() {
		$sections = apply_filters( 'thorium_ext_sections_items_filter', array(
			'services',
			'portfolio',
			'about',
			'team',
			'client',
		) );

		return array_map( 'sanitize_key', array_unique( $sections ) );
	}
}

if ( ! function_exists( 'thorium_ext_about_widget_classes' ) ) {
	/**
 	* Adds class to even widgets in about.
 	* -----------------------------------
 	*/
	function thorium_ext_about_widget_classes($params) {

		global $thorium_ext_widget_num; // Global a counter array
		$this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
		$arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets
		$class = '';	

		if(!$thorium_ext_widget_num) { // If the counter array doesn't exist, create it
			$thorium_ext_widget_num = array();
		}

		if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
			return $params; // No widgets in this sidebar... bail early.
		}

		if(isset($thorium_ext_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
			$thorium_ext_widget_num[$this_id] ++;
		} else { // If not, create it starting with 1
			$thorium_ext_widget_num[$this_id] = 1;
		}

		if( $thorium_ext_widget_num[$this_id] % 2 == 0 ) { // If this an even numbered widget
			$class = 'class="timeline-inverted"';
		}
	
		$params[0]['before_widget'] = str_replace('<li>', '<li '.$class.'>', $params[0]['before_widget']); // Insert our new classes into "before widget"

		return $params;

	}
}
add_filter('dynamic_sidebar_params','thorium_ext_about_widget_classes');

if ( ! function_exists( 'thorium_ext_dynamic_styles' ) ) {

	/**
	* gets the Contact background color css and displays it in header.
	*
	* since 1.0.0
 	*/
	function thorium_ext_dynamic_styles(){ 
	?>
		<style>
			section#contact {
  				background-color: <?php echo get_theme_mod('thorium_ext_contact_bg_color', '#222222' ); ?>;
			}
			section#about {
  				background-color: <?php echo get_theme_mod('thorium_ext_about_bg_color', '#fff' ); ?>;
			}
			section#services {
  				background-color: <?php echo get_theme_mod('thorium_ext_services_bg_color', '#fff' ); ?>;
			}
			section#portfolio {
  				background-color: <?php echo get_theme_mod('thorium_ext_portfolio_bg_color', '#eee' ); ?>;
			}
			section#team {
  				background-color: <?php echo get_theme_mod('thorium_ext_team_bg_color', '#eee' ); ?>;
			}

		</style>
	<?php
	}
}
add_action( 'wp_head','thorium_ext_dynamic_styles' );


if ( ! function_exists( 'thorium_ext_addedit_control' ) ) {

	/*
	 * Add edit controller
	 * v1.0.0
	 */
	function thorium_ext_addedit_control( $setting_id, $section_id, $label = '', $type ){
    	global $wp_customize;
		$wp_customize->add_setting( $setting_id, array() );
  	
  		$wp_customize->add_control( new Thorium_Ext_Control_AddEdit( $wp_customize, $setting_id, array(
				'section'      => $section_id,
				'type'         => 'add-edit',
				'section_type' => $type,
				'label'    => $label
			) ) );

	}
}

if ( ! function_exists( 'thorium_ext_contact_form_control' ) ) {
	
	/*
	 * Contact Form controller
	 * v1.0.0
	 */
	function thorium_ext_contact_form_control( $setting_id, $section_id, $label = '', $priority = 10 ){
    	global $wp_customize;
		$wp_customize->add_setting( $setting_id,
    	array(
        	'sanitize_callback' => 'sanitize_key'
    	) );
  	
  		$wp_customize->add_control( new Thorium_Ext_CF7_Custom_Control(
    	$wp_customize,
    	$setting_id,
        	array(
            	'label'             => $label,
            	'section'           => $section_id,
            	'priority'          => $priority,
            	'type'              => 'thorium_ext_contact_form_7'
        	) ) );

	}
}

/* ------------------------------------------------------------------------- *
 *  Enqueues scripts for Administration area
/* ------------------------------------------------------------------------- */

if ( ! function_exists( 'thorium_ext_admin_scripts' ) ) {
	function thorium_ext_admin_scripts() {
		global $wp_customize;
		$current_screen    = get_current_screen();

		if( $current_screen->id === "widgets" || isset( $wp_customize ) ) : // Show only on the Widgets page and Customizer

			// JS Scripts
			wp_enqueue_script(
				'thorium-ext-widgets-customizer',
				THORIUM_EXTS_URL . 'js/widgets-admin.js',
				array( 'jquery', 'underscore', 'backbone', 'jquery-ui-sortable', 'jquery-ui-autocomplete', 'wp-color-picker' ),
				THORIUM_EXTS_VERSION, FALSE
			);

		endif;

	}
}
add_action( 'admin_enqueue_scripts', 'thorium_ext_admin_scripts' );

if ( ! function_exists( 'thorium_ext_register_menu' ) ) {

	function thorium_ext_register_menu(){
		register_nav_menus( array(
		'front' => esc_html__( 'Front Page Menu', 'thorium-ext' ),
	) );
	}

}
add_action( 'init', 'thorium_ext_register_menu' );

/*
 * To Get the image id from url
 */
function thorium_ext_get_image_id_from_image_url($image_url) {
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}

 ?>