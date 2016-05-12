/**
 * jQuery Sidebar JS
 *
 * Adds a toggle icon with slide animation for the sidebar
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
	# Setup Sidebar Menu
	--------------------------------------------------------------*/
	$( document ).ready( function() {
		
		/* Show sidebar and fade content area */
		function showSidebar() {
			
			sidebar.show();
			sidebar.animate({ 'margin-left' : '0' }, 300 );
			overlay.show();
			
		}
		
		/* Hide sidebar and show full content area */
		function hideSidebar() {
			
			sidebar.animate({ 'margin-left': '-350px' },  300, function(){
				sidebar.hide();
			});
			overlay.hide();
			
		}
		
		/* Only do something if sidebar exists */
		if ( $( '#secondary' ).length > 0 ) {
		
			/* Add Overlay */
			$('body').append('<div id=\"sidebar-overlay\" class=\"sidebar-overlay\"></div>');
			
			/* Setup Selectors */
			var button = $('#sidebar-toggle'),
				sidebar = $('#secondary'),
				overlay = $('#sidebar-overlay');
			
			/* Add sidebar toggle effect */
			button.on('click', function(){
				if( sidebar.is(':visible') ) {
					hideSidebar();
				}
				else {
					showSidebar();
				}
			});
			
			/* Hide Sidebar when Content Area is clicked */
			overlay.on('click', function(e){
				if( sidebar.is(':visible') ) {
					e.preventDefault();
					hideSidebar();
				}
			});
					
		}

	} );

}(jQuery));