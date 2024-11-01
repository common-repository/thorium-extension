/* Customizer Settings Manager */
( function( $, api ) {
        var api = wp.customize;
        
        /**
	 	* Add edit items button control
	 	*
	 	* @since 1.0.0
	 	* @type  {Object}
	 	*/        
        api.controlConstructor['add-edit'] = api.Control.extend( {
        /**
		 * When the control is ready, initialize it
		 *
		 * @return {Void}
		 */
		ready: function() {
			var control = this,
			    type    = control.id.replace( '-addedititems', '' ),
			    section = control.params.section_type

			/**
			 * When the button is clicked focus the sidebar
			 */
			control.container.click( function( e ) {
				api.section( 'sidebar-widgets-thorium-ext-section-' + section ).focus();
				e.preventDefault();
			});
		}
		} );
		
	/**
	 * On document ready
	 *
	 * @since 1.0.4.3
	 */
	$( document ).ready( function( $ ) {

		/**
		 * Show the right sidebars & widgets if related
		 * to a front page section.
		 *
		 * @since  1.0.0
		 * @return {Void}
		 */
		var bxShowRightSidebars = function() {
			var panel         = api.panel( 'thorium_ext_sections_items' ),
			    sections      = panel.sections(),
			    searchWidgets = 'thorium-ext-search-change',
			    displayWidget = 'thorium-ext-display-block',
			    panelWidgets  = 'thorium-ext-display-widgets';
			    
			_.each( sections, function( section ) {
				var type = section.id.replace( 'sidebar-widgets-thorium-ext-section-', '' );

				/**
				 * Get back to the Front Page section instead of sidebar, when the
				 * back button is clicked.
				 */
				section.container.find( '.accordion-section-title, .customize-section-back' ).on( 'click keydown', function( e ) {
					if ( api.utils.isKeydownButNotEnterEvent( e ) ) {
						return;
					}
					e.preventDefault();

					if( api.panel( 'thorium_ext_frontpage' ).active() ) {
						api.section( 'thorium_ext_frontpage_' + type ).focus();
					} else {
						alert( options.msgs.wrong_page );
						api.section( 'title_tagline' ).focus();
					}
				});

				/**
				 * Display the right widgets and sidebar
				 */
				section.expanded.bind( 'toggleSidebarSectionExpansion', function( e, c ) {
					var widgetsFilter  = $( '#available-widgets-filter' ),
					    sectionWidgets = $( '#available-widgets-list' ),
					    widgetTmpl     = $( 'div[id*=widget-tpl-thorium_ext_' + type +'-]' );

					if( e ) {
						widgetsFilter.addClass( searchWidgets ).find( 'input' ).attr( 'disabled', true );
						sectionWidgets.addClass( panelWidgets );
						widgetTmpl.show().addClass( displayWidget );
					}
					if( c ) {
						widgetsFilter.removeClass( searchWidgets ).find( 'input' ).attr( 'disabled', false );
						sectionWidgets.removeClass( panelWidgets );
						widgetTmpl.hide().removeClass( displayWidget );
					}
				});
			}, panel );
		}();
	});
	
	
} )( jQuery, wp.customize );

wp.customize.bind( 'ready', function() { // Ready?

    var customize = this; // Customize object alias.
    
    // Toggle header button control
    customize( 'thorium_ext_header_show_button', function( value ) {
 
        var colorControls = [
            'thorium_ext_header_button_link',
            'thorium_ext_header_button_text'
        ];
 
        $.each( colorControls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );
    } );
    
    // Toggle about controls
    customize( 'thorium_ext_about_show_section', function( value ) {
 
        var colorControls = [
            'thorium_ext_about_addedit',
            'thorium_ext_about_title',
            'thorium_ext_about_description'
        ];
 
        $.each( colorControls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );
    } );
    
    // Toggle client controls
    customize( 'thorium_ext_client_show_section', function( value ) {
 
        var colorControls = [
            'thorium_ext_client_addedit'
        ];
 
        $.each( colorControls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );
    } );
    
    // Toggle contact controls
    customize( 'thorium_ext_contact_show_section', function( value ) {
 
        var colorControls = [
            'thorium_ext_contact_form',
            'thorium_contact_bg_color',
            'thorium_ext_contact_description',
            'thorium_ext_contact_title'
        ];
 
        $.each( colorControls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );
    } );
    
    // Toggle portfolio controls
    customize( 'thorium_ext_portfolio_show_section', function( value ) {
 
        var colorControls = [
            'thorium_ext_portfolio_description',
            'thorium_ext_portfolio_title',
            'thorium_ext_portfolio_addedit'
        ];
 
        $.each( colorControls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );
    } );
    
    // Toggle services controls
    customize( 'thorium_ext_services_show_section', function( value ) {
 
        var colorControls = [
            'thorium_ext_services_description',
            'thorium_ext_services_title',
            'thorium_ext_services_addedit'
        ];
 
        $.each( colorControls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );
    } );
    
    // Toggle team controls
    customize( 'thorium_ext_team_show_section', function( value ) {
 
        var colorControls = [
            'thorium_ext_team_description',
            'thorium_ext_team_title',
            'thorium_ext_team_addedit'
        ];
 
        $.each( colorControls, function( index, id ) {
            customize.control( id, function( control ) {
                /**
                 * Toggling function
                 */
                var toggle = function( to ) {
                    control.toggle( to );
                };
 
                // 1. On loading.
                toggle( value.get() );
 
                // 2. On value change.
                value.bind( toggle );
            } );
        } );
    } );
//end
} );
