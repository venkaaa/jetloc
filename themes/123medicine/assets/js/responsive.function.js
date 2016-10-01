/*global jQuery:false */
jQuery(document).ready(function() {
	"use strict";	
    responsive_functions();
});
function responsive_functions() {

    if ( jQuery(window).width() > 991) {
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(1n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(2n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(3n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(4n)");
    } else{
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-1 section:nth-child(1n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-2 section:nth-child(2n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-3 section:nth-child(2n)");
	    jQuery('<div class="clearfix fluid"></div>').insertAfter(".mega-dd-4 section:nth-child(2n)");

    }
    
    if ( jQuery(window).width() > 1024) {
    	jQuery('.nav.navbar-nav').find('.dropdown-toggle').addClass('disabled');
    }
	
}