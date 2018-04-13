/**
 * Sticky Header Feature
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
	# Sticky Header
	--------------------------------------------------------------*/
	function stickyHeader() {

		var window_top = $( window ).scrollTop(),
			top_position = $( '.site' ).offset().top ,
			sticky_header = $( '.site-header' );

		if ( window_top > top_position ) {

			sticky_header.addClass( 'fixed-header' );

		} else {

			sticky_header.removeClass( 'fixed-header' );

		}
	};

	/**--------------------------------------------------------------
	# Setup Sticky Header
	--------------------------------------------------------------*/
	$( document ).ready( function() {

		/* Add Sticky Header feature */
		$( window ).scroll( stickyHeader );
		stickyHeader();

	} );

}(jQuery));
