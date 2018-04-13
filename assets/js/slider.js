/**
 * Flexslider Setup
 *
 * Adds the Flexslider Plugin for the Featured Post Slideshow
 *
 * @package Pocono
 */

jQuery( document ).ready(function($) {

	/* Add flexslider to #post-slider div */
	$( "#post-slider" ).flexslider({
		animation: pocono_slider_params.animation,
		slideshowSpeed: pocono_slider_params.speed,
		namespace: "zeeflex-",
		selector: ".zeeslides > li",
		smoothHeight: true,
		pauseOnHover: true,
		controlsContainer: ".post-slider-controls"
	});

});
