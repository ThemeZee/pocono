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
		
		
		/* Add Overlay */
		$('body').append('<div id=\"sidebar-overlay\" class=\"sidebar-overlay\"></div>');
			
		/* Setup Selectors */
		var button = $('#sidebar-toggle'),
			sidebar = $('#secondary'),
			overlay = $('#sidebar-overlay');
		
		/* Only do something if sidebar exists */
		if ( sidebar.length > 0 ) {
			
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
				
		/* Add extra styling for default widgets */
		sidebar.find('.widget_archive ul li, .widget_categories ul li.cat-item').each( function () {
			
			// Get Link and Count
			var list_item = $(this).children('a');
			var count = $(this).contents().eq(1).text();
			
			// Remove Count
			$(this).html(list_item);
			
			// Add new Count with span
			count = count.trim().replace(/[()]/g, '');
			$(this).append("<span class=\"item-count\">" + count + "</span>");

		} );
		

	} );

}(jQuery));