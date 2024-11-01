/**
 * Customizer and Widgets page JS
 */

var $ = window.jQuery;

window.ThoriumExtWidgets = {
	/**
	 * Initiazlie
	 *
	 * @since 1.0.4.3
	 * @return {Void}
	 */
	init : function() {
		var self = this;

		self.hideSidebars();
	},
	
	/**
	 * Hide our section widgets and sidebars if we are on
	 * the Widgets page in the Administrator panel
	 *
	 * @return {Void}
	 */
	hideSidebars : function() {
		// Hide sidebars on the right page
		if( ! $( 'body' ).hasClass( 'widgets-php' ) ) return;

		// Hide the section sidebars
		$( 'div[id*=section-]' ).each( function( i, s ) {
			$( s ).parent( '.widgets-holder-wrap' ).hide();
		});
		
		/**
		 * Show the right sidebars to select from when a widget
		 * title is clicked
		 */
		$( '#available-widgets .widget .widget-top' ).on( 'click', function( e ) {
			var list = $( '.widgets-chooser > ul > li' ),
			    current = $( this ).parent( '.widget' ).find( list );

			current.each( function( i, element ) {
				var elm = $( element );
				if( elm.text().indexOf( 'Section' ) >= 0 ) { elm.remove(); }
			});

			var newlist = list;
			newlist.first().addClass( 'widgets-chooser-selected' );
		});
		
		// Remove our section widgets from the available widgets list.
		$( '#available-widgets .widget' ).each( function( i, w ) {
			var widget = $( w );
			    thisID = widget.attr( 'id' );

			if( thisID.indexOf( 'thorium_ext_' ) >= 0 ) { widget.remove(); }
		});
	},
	
}

$( document ).ready( function ( $ ) {
	var thoriumextwidgets = window.ThoriumExtWidgets;

	/**
	 * Initialise ThoriumExtWidgets
	 */
	thoriumextwidgets.init();

});
