/**
 * Navigation Plugin
 *
 * Adds a toggle icon with slide animation for the menu
 *
 * Copyright 2016 ThemeZee
 * Free to use under the GPLv2 and later license.
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Author: Thomas Weichselbaumer (themezee.com)
 *
 * @package Pocono
 */

(function($) {

	/**--------------------------------------------------------------
	# Setup Navigation Menu
	--------------------------------------------------------------*/
	$( document ).ready( function() {

		/* Show menu and fade content area */
		function showMenu() {

			menu.show();
			menu.animate( { 'margin-left' : '0' }, 300 );
			overlay.show();

		}

		/* Hide menu and show full content area */
		function hideMenu() {

			menu.animate({ 'margin-left': '-350px' },  300, function(){
				menu.hide();
			});
			overlay.hide();

		}

		/* Add Overlay */
		$( 'body' ).append( '<div id=\"content-overlay\" class=\"content-overlay\"></div>' );

		/* Setup Selectors */
		var button = $( '#sidebar-navigation-toggle' ),
			menu = $( '#sidebar-navigation' ),
			overlay = $( '#content-overlay' );

		/* Only do something if menu exists */
		if ( menu.length > 0 ) {

			/* Add menu toggle effect */
			button.on('click', function(){
				if ( menu.is( ':visible' ) ) {
					hideMenu();
				} else {
					showMenu();
				}
			});

			/* Hide Menu when Content Area is clicked */
			overlay.on('click', function(e){
				if ( menu.is( ':visible' ) ) {
					e.preventDefault();
					hideMenu();
				}
			});

		}

		/* Add extra styling for default widgets */
		$( '.widget-area' ).find( '.widget_archive ul li, .widget_categories ul li.cat-item' ).each( function () {

			// Get Link and Count.
			var list_item = $( this ).children( 'a' );
			var count = $( this ).contents().eq( 1 ).text();

			// Remove Count.
			$( this ).html( list_item );

			// Add new Count with span.
			count = count.trim().replace( /[()]/g, '' );
			$( this ).append( "<span class=\"item-count\">" + count + "</span>" );

		} );

	} );

}(jQuery));
