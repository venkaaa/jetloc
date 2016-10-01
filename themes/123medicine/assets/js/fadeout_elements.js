/*global jQuery:false */
jQuery(document).ready(function() {
	"use strict";	
    fadeout_elements();
});

function fadeout_elements() {

	var elements = '.blog-post,.widget,.wpb_row,.footer-meta,#footer-bottom'

    jQuery(elements).each( function(i){
        
        var bottom_of_object = jQuery(this).offset().top;
        var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();
        
        if( bottom_of_window > bottom_of_object ){
            
            jQuery(this).css('opacity','1');
                
        }else{
        
	        jQuery(this).css('opacity','0');
	        
        }
        
    }); 
    
    jQuery(window).scroll( function(){
    
        jQuery(elements).each( function(i){
            
            var bottom_of_object = jQuery(this).offset().top + jQuery(this).outerHeight()/2;
            var bottom_of_window = jQuery(window).scrollTop() + jQuery(window).height();
            
            if( bottom_of_window > bottom_of_object ){
                
                jQuery(this).animate({'opacity':'1'},1000);
                    
            }
            
        }); 
    
    });

};