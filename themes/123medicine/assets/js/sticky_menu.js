/*global jQuery:false */
jQuery(document).ready(function() {
	"use strict";	
    sticky_menu();
});

function sticky_menu() {
    
    jQuery('.header-menu').affix({
        offset: { top: jQuery('#title-breadcrumb,.front-sticky').offset().top+100}
    });
    
    jQuery('.header-bottom').affix({
        offset: { top: jQuery('#title-breadcrumb,.front-sticky').offset().top+150}
    });

};