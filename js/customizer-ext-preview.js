/**
 * File customizer-ext-preview.js.
 *
 * Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	
	// Header customizer
	wp.customize( 'thorium_ext_header_leadin', function( value ) {
		value.bind( function( to ) {
			$( 'header.front .intro-lead-in' ).text( to )
		});
	});
	
	wp.customize( 'thorium_ext_header_heading', function( value ) {
		value.bind( function( to ) {
			$( 'header.front .intro-heading' ).text( to )
		});
	});
	
	wp.customize( 'thorium_ext_header_show_button', function( value ) {
		value.bind( function( to ) {
			$( 'header.front a.page-scroll' ).toggle( to )
		});
	});
	
	wp.customize( 'thorium_ext_header_button_link', function( value ) {
		value.bind( function( to ) {
			$( 'header.front a.page-scroll' ).attr( 'href', to )
		});
	});
	
	wp.customize( 'thorium_ext_header_button_text', function( value ) {
		value.bind( function( to ) {
			$( 'header.front a.page-scroll' ).text( to )
		});
	});
	
	// About title and description
	wp.customize( 'thorium_ext_about_title', function( value ) {
		value.bind( function( to ) {
			$( '#about .section-heading' ).text( to )
		});
	});
	
	wp.customize( 'thorium_ext_about_description', function( value ) {
		value.bind( function( to ) {
			$( '#about .section-subheading' ).text( to )
		});
	});
	
	wp.customize( 'thorium_ext_about_show_section', function( value ) {
		value.bind( function( to ) {
			$( '#about' ).toggle( to )
		});
	});
	
	wp.customize( 'thorium_ext_about_bg_color', function( value ) {
		value.bind( function( to ) {
			$( 'section#about' ).css({
				'background-color': to
			});
		});
	});
	
	// Client Customizer
	wp.customize( 'thorium_ext_client_show_section', function( value ) {
		value.bind( function( to ) {
			$( 'aside.clients' ).toggle( to )
		});
	});
	
	// Contact title and description
	wp.customize( 'thorium_ext_contact_title', function( value ) {
		value.bind( function( to ) {
			$( '#contact .section-heading' ).text( to )
		});
	});
	
	wp.customize( 'thorium_ext_contact_description', function( value ) {
		value.bind( function( to ) {
			$( '#contact .section-subheading' ).text( to )
		});
	});
	
	wp.customize( 'thorium_ext_contact_bg_color', function( value ) {
		value.bind( function( to ) {
			$( 'section#contact' ).css({
			    'background-color':to 
			});
		});
	});
	
	wp.customize( 'thorium_ext_contact_show_section', function( value ) {
		value.bind( function( to ) {
			$( 'section#contact' ).toggle( to )
		});
	});
	
	// Portfolio title and description
	wp.customize( 'thorium_ext_portfolio_title', function( value ) {
		value.bind( function( to ) {
			$( '#portfolio .section-heading' ).text( to )
		});
	});
	
	wp.customize( 'thorium_ext_portfolio_description', function( value ) {
		value.bind( function( to ) {
			$( '#portfolio .section-subheading' ).text( to )
		});
	});
	
	wp.customize( 'thorium_ext_portfolio_show_section', function( value ) {
		value.bind( function( to ) {
			$( 'section#portfolio' ).toggle( to )
		});
	});
	
	wp.customize( 'thorium_ext_portfolio_bg_color', function( value ) {
		value.bind( function( to ) {
			$( 'section#portfolio' ).css({
				'background-color': to
			});
		});
	});
	
	// Services title and description
	wp.customize( 'thorium_ext_services_title', function( value ) {
		value.bind( function( to ) {
			$( '#services .section-heading' ).text( to )
		});
	});
	
	wp.customize( 'thorium_ext_services_description', function( value ) {
		value.bind( function( to ) {
			$( '#services .section-subheading' ).text( to )
		});
	});
	
	wp.customize( 'thorium_ext_services_show_section', function( value ) {
		value.bind( function( to ) {
			$( 'section#services' ).toggle( to )
		});
	});
	
	wp.customize( 'thorium_ext_services_bg_color', function( value ) {
		value.bind( function( to ) {
			$( 'section#services' ).css({
				'background-color': to
			});
		});
	});
	
	// Team title and description
	wp.customize( 'thorium_ext_team_title', function( value ) {
		value.bind( function( to ) {
			$( '#team .section-heading' ).text( to )
		});
	});
	
	wp.customize( 'thorium_ext_team_description', function( value ) {
		value.bind( function( to ) {
			$( '#team .section-subheading' ).text( to )
		});
	});
	
	wp.customize( 'thorium_ext_team_show_section', function( value ) {
		value.bind( function( to ) {
			$( 'section#team' ).toggle( to )
		});
	});
	
	wp.customize( 'thorium_ext_team_bg_color', function( value ) {
		value.bind( function( to ) {
			$( 'section#team' ).css({
				'background-color': to
			});
		});
	});
	
} )( jQuery );

