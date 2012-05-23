// AJB author slider 
jQuery(document).ready(function(){

        var panels_amount = jQuery('div.slider-item').length;
        var panel_width = (jQuery('div.slider-item').width());
        var panels_width = ((panels_amount * panel_width) * -1) + (panel_width * 5);
        var panels_shift = (panel_width *-1);
        var current_shift = 0;
                
        if(panels_amount > 5){
        if(current_shift == 0){
            
                jQuery('.slider-nav .back').animate({
                    opacity:0 
                },2000,'easeInOutSine')
         }

        jQuery('.slider-nav .next').click(function(){        
	   
            if( current_shift + panels_shift <= panels_width  ) //End
            {
                 current_shift = panels_width;
                 jQuery(this).animate({
                    opacity: 0
                 },2000,'easeInOutSine')
                 jQuery('.slider-nav .back').animate({
                    opacity:1 
                },2000,'easeInOutSine')
			 //alert('1');                
            }     
            else{
                   current_shift = current_shift +  panels_shift;
                   jQuery(this).animate({
                        opacity: 1
                     },1500,'easeInOutSine');
                jQuery('.slider-nav .back').animate({
                    opacity:1 
                },2000,'easeInOutSine');
                //alert('2');
            }

		jQuery(this).parents('.slider-container').children('.slider').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        
        jQuery('.slider-nav .back').click(function(){
        
       
           if( current_shift - panels_shift > 0){
                    current_shift = 0;
                    
                jQuery('.slider-nav .back').animate({
                    opacity:0 
                },2000,'easeInOutSine')   
                jQuery('.slider-nav .next').animate({
                    opacity:1 
                },2000,'easeInOutSine')
                    
                    //alert('3'); 
            }
               else{
                   current_shift = current_shift -  panels_shift;
               jQuery('.slider-nav .next').animate({
                    opacity:1 
                },2000,'easeInOutSine')
               
            if(current_shift == 0){
            
                jQuery('.slider-nav .back').animate({
                    opacity:0 
                },2000,'easeInOutSine') 
         }
                   //alert('4'); 
            } 

       jQuery(this).parents('.slider-container').children('.slider').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        }  
        else {
             jQuery('.slider-nav').hide();
        }     

});

// AJB store slider-1
jQuery(document).ready(function(){

        var panels_amount = jQuery('div.slider-item-1').length;
        var panel_width = (jQuery('div.slider-item-1').width());
        var panels_width = ((panels_amount * panel_width) * -1) + (panel_width * 5);
        var panels_shift = (panel_width *-1);
        var current_shift = 0;
                
        if(panels_amount > 5){
        if(current_shift == 0){
            
                jQuery('.slider-nav-1 .back-1').animate({
                    opacity:0 
                },2000,'easeInOutSine')
         }

        jQuery('.slider-nav-1 .next-1').click(function(){        
	   
            if( current_shift + panels_shift <= panels_width  ) //End
            {
                 current_shift = panels_width;
                 jQuery(this).animate({
                    opacity: 0
                 },2000,'easeInOutSine')
                 jQuery('.slider-nav-1 .back-1').animate({
                    opacity:1 
                },2000,'easeInOutSine')
			 //alert('1');                
            }     
            else{
                   current_shift = current_shift +  panels_shift;
                   jQuery(this).animate({
                        opacity: 1
                     },1500,'easeInOutSine');
                jQuery('.slider-nav-1 .back-1').animate({
                    opacity:1 
                },2000,'easeInOutSine');
                //alert('2');
            }

		jQuery('.slider-1').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        
        jQuery('.slider-nav-1 .back-1').click(function(){
        
       
           if( current_shift - panels_shift > 0){
                    current_shift = 0;
                    
                jQuery('.slider-nav-1 .back-1').animate({
                    opacity:0 
                },2000,'easeInOutSine')   
                jQuery('.slider-nav .next-1').animate({
                    opacity:1 
                },2000,'easeInOutSine')
                    
                    //alert('3'); 
            }
               else{
                   current_shift = current_shift -  panels_shift;
               jQuery('.slider-nav-1 .next-1').animate({
                    opacity:1 
                },2000,'easeInOutSine')
               
            if(current_shift == 0){
            
                jQuery('.slider-nav-1 .back-1').animate({
                    opacity:0 
                },2000,'easeInOutSine') 
         }
                   //alert('4'); 
            } 

       jQuery('.slider-1').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        }  
        else {
             jQuery('.slider-nav-1').hide();
        }     

});

// AJB store slider-2
jQuery(document).ready(function(){

        var panels_amount = jQuery('div.slider-item-2').length;
        var panel_width = (jQuery('div.slider-item-2').width());
        var panels_width = ((panels_amount * panel_width) * -1) + (panel_width * 5);
        var panels_shift = (panel_width *-1);
        var current_shift = 0;
                
        if(panels_amount > 5){
        if(current_shift == 0){
            
                jQuery('.slider-nav-2 .back-2').animate({
                    opacity:0 
                },2000,'easeInOutSine')
         }

        jQuery('.slider-nav-2 .next-2').click(function(){        
	   
            if( current_shift + panels_shift <= panels_width  ) //End
            {
                 current_shift = panels_width;
                 jQuery(this).animate({
                    opacity: 0
                 },2000,'easeInOutSine')
                 jQuery('.slider-nav-2 .back-2').animate({
                    opacity:1 
                },2000,'easeInOutSine')
			 //alert('1');                
            }     
            else{
                   current_shift = current_shift +  panels_shift;
                   jQuery(this).animate({
                        opacity: 1
                     },1500,'easeInOutSine');
                jQuery('.slider-nav-2 .back-2').animate({
                    opacity:1 
                },2000,'easeInOutSine');
                //alert('2');
            }

		jQuery('.slider-2').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        
        jQuery('.slider-nav-2 .back-2').click(function(){
        
       
           if( current_shift - panels_shift > 0){
                    current_shift = 0;
                    
                jQuery('.slider-nav-2 .back-2').animate({
                    opacity:0 
                },2000,'easeInOutSine')   
                jQuery('.slider-nav .next-2').animate({
                    opacity:1 
                },2000,'easeInOutSine')
                    
                    //alert('3'); 
            }
               else{
                   current_shift = current_shift -  panels_shift;
               jQuery('.slider-nav-2 .next-2').animate({
                    opacity:1 
                },2000,'easeInOutSine')
               
            if(current_shift == 0){
            
                jQuery('.slider-nav-2 .back-2').animate({
                    opacity:0 
                },2000,'easeInOutSine') 
         }
                   //alert('4'); 
            } 

       jQuery('.slider-2').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        }  
        else {
             jQuery('.slider-nav-2').hide();
        }     

});

// AJB store slider-3
jQuery(document).ready(function(){

        var panels_amount = jQuery('div.slider-item-3').length;
        var panel_width = (jQuery('div.slider-item-3').width());
        var panels_width = ((panels_amount * panel_width) * -1) + (panel_width * 5);
        var panels_shift = (panel_width *-1);
        var current_shift = 0;
                
        if(panels_amount > 5){
        if(current_shift == 0){
            
                jQuery('.slider-nav-3 .back-3').animate({
                    opacity:0 
                },2000,'easeInOutSine')
         }

        jQuery('.slider-nav-3 .next-3').click(function(){        
	   
            if( current_shift + panels_shift <= panels_width  ) //End
            {
                 current_shift = panels_width;
                 jQuery(this).animate({
                    opacity: 0
                 },2000,'easeInOutSine')
                 jQuery('.slider-nav-3 .back-3').animate({
                    opacity:1 
                },2000,'easeInOutSine')
			 //alert('1');                
            }     
            else{
                   current_shift = current_shift +  panels_shift;
                   jQuery(this).animate({
                        opacity: 1
                     },1500,'easeInOutSine');
                jQuery('.slider-nav-3 .back-3').animate({
                    opacity:1 
                },2000,'easeInOutSine');
                //alert('2');
            }

		jQuery('.slider-3').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        
        jQuery('.slider-nav-3 .back-3').click(function(){
        
       
           if( current_shift - panels_shift > 0){
                    current_shift = 0;
                    
                jQuery('.slider-nav-3 .back-3').animate({
                    opacity:0 
                },2000,'easeInOutSine')   
                jQuery('.slider-nav .next-3').animate({
                    opacity:1 
                },2000,'easeInOutSine')
                    
                    //alert('3'); 
            }
               else{
                   current_shift = current_shift -  panels_shift;
               jQuery('.slider-nav-3 .next-3').animate({
                    opacity:1 
                },2000,'easeInOutSine')
               
            if(current_shift == 0){
            
                jQuery('.slider-nav-3 .back-3').animate({
                    opacity:0 
                },2000,'easeInOutSine') 
         }
                   //alert('4'); 
            } 

       jQuery('.slider-3').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        }  
        else {
             jQuery('.slider-nav-3').hide();
        }     

});

// AJB store slider-4
jQuery(document).ready(function(){

        var panels_amount = jQuery('div.slider-item-4').length;
        var panel_width = (jQuery('div.slider-item-4').width());
        var panels_width = ((panels_amount * panel_width) * -1) + (panel_width * 5);
        var panels_shift = (panel_width *-1);
        var current_shift = 0;
                
        if(panels_amount > 5){
        if(current_shift == 0){
            
                jQuery('.slider-nav-4 .back-4').animate({
                    opacity:0 
                },2000,'easeInOutSine')
         }

        jQuery('.slider-nav-4 .next-4').click(function(){        
	   
            if( current_shift + panels_shift <= panels_width  ) //End
            {
                 current_shift = panels_width;
                 jQuery(this).animate({
                    opacity: 0
                 },2000,'easeInOutSine')
                 jQuery('.slider-nav-4 .back-4').animate({
                    opacity:1 
                },2000,'easeInOutSine')
			 //alert('1');                
            }     
            else{
                   current_shift = current_shift +  panels_shift;
                   jQuery(this).animate({
                        opacity: 1
                     },1500,'easeInOutSine');
                jQuery('.slider-nav-4 .back-4').animate({
                    opacity:1 
                },2000,'easeInOutSine');
                //alert('2');
            }

		jQuery('.slider-4').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        
        jQuery('.slider-nav-4 .back-4').click(function(){
        
       
           if( current_shift - panels_shift > 0){
                    current_shift = 0;
                    
                jQuery('.slider-nav-4 .back-4').animate({
                    opacity:0 
                },2000,'easeInOutSine')   
                jQuery('.slider-nav .next-4').animate({
                    opacity:1 
                },2000,'easeInOutSine')
                    
                    //alert('3'); 
            }
               else{
                   current_shift = current_shift -  panels_shift;
               jQuery('.slider-nav-4 .next-4').animate({
                    opacity:1 
                },2000,'easeInOutSine')
               
            if(current_shift == 0){
            
                jQuery('.slider-nav-4 .back-4').animate({
                    opacity:0 
                },2000,'easeInOutSine') 
         }
                   //alert('4'); 
            } 

       jQuery('.slider-4').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        }  
        else {
             jQuery('.slider-nav-4').hide();
        }     

});

// AJB store slider-5
jQuery(document).ready(function(){

        var panels_amount = jQuery('div.slider-item-5').length;
        var panel_width = (jQuery('div.slider-item-5').width());
        var panels_width = ((panels_amount * panel_width) * -1) + (panel_width * 5);
        var panels_shift = (panel_width *-1);
        var current_shift = 0;
                
        if(panels_amount > 5){
        if(current_shift == 0){
            
                jQuery('.slider-nav-5 .back-5').animate({
                    opacity:0 
                },2000,'easeInOutSine')
         }

        jQuery('.slider-nav-5 .next-5').click(function(){        
	   
            if( current_shift + panels_shift <= panels_width  ) //End
            {
                 current_shift = panels_width;
                 jQuery(this).animate({
                    opacity: 0
                 },2000,'easeInOutSine')
                 jQuery('.slider-nav-5 .back-5').animate({
                    opacity:1 
                },2000,'easeInOutSine')
			 //alert('1');                
            }     
            else{
                   current_shift = current_shift +  panels_shift;
                   jQuery(this).animate({
                        opacity: 1
                     },1500,'easeInOutSine');
                jQuery('.slider-nav-5 .back-5').animate({
                    opacity:1 
                },2000,'easeInOutSine');
                //alert('2');
            }

		jQuery('.slider-5').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        
        jQuery('.slider-nav-5 .back-5').click(function(){
        
       
           if( current_shift - panels_shift > 0){
                    current_shift = 0;
                    
                jQuery('.slider-nav-5 .back-5').animate({
                    opacity:0 
                },2000,'easeInOutSine')   
                jQuery('.slider-nav .next-5').animate({
                    opacity:1 
                },2000,'easeInOutSine')
                    
                    //alert('3'); 
            }
               else{
                   current_shift = current_shift -  panels_shift;
               jQuery('.slider-nav-5 .next-5').animate({
                    opacity:1 
                },2000,'easeInOutSine')
               
            if(current_shift == 0){
            
                jQuery('.slider-nav-5 .back-5').animate({
                    opacity:0 
                },2000,'easeInOutSine') 
         }
                   //alert('4'); 
            } 

       jQuery('.slider-5').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        }  
        else {
             jQuery('.slider-nav-5').hide();
        }     

});

// AJB store slider-6
jQuery(document).ready(function(){

        var panels_amount = jQuery('div.slider-item-6').length;
        var panel_width = (jQuery('div.slider-item-6').width());
        var panels_width = ((panels_amount * panel_width) * -1) + (panel_width * 5);
        var panels_shift = (panel_width *-1);
        var current_shift = 0;
                
        if(panels_amount > 5){
        if(current_shift == 0){
            
                jQuery('.slider-nav-6 .back-6').animate({
                    opacity:0 
                },2000,'easeInOutSine')
         }

        jQuery('.slider-nav-6 .next-6').click(function(){        
	   
            if( current_shift + panels_shift <= panels_width  ) //End
            {
                 current_shift = panels_width;
                 jQuery(this).animate({
                    opacity: 0
                 },2000,'easeInOutSine')
                 jQuery('.slider-nav-6 .back-6').animate({
                    opacity:1 
                },2000,'easeInOutSine')
			 //alert('1');                
            }     
            else{
                   current_shift = current_shift +  panels_shift;
                   jQuery(this).animate({
                        opacity: 1
                     },1500,'easeInOutSine');
                jQuery('.slider-nav-6 .back-6').animate({
                    opacity:1 
                },2000,'easeInOutSine');
                //alert('2');
            }

		jQuery('.slider-6').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        
        jQuery('.slider-nav-6 .back-6').click(function(){
        
       
           if( current_shift - panels_shift > 0){
                    current_shift = 0;
                    
                jQuery('.slider-nav-6 .back-6').animate({
                    opacity:0 
                },2000,'easeInOutSine')   
                jQuery('.slider-nav .next-6').animate({
                    opacity:1 
                },2000,'easeInOutSine')
                    
                    //alert('3'); 
            }
               else{
                   current_shift = current_shift -  panels_shift;
               jQuery('.slider-nav-6 .next-6').animate({
                    opacity:1 
                },2000,'easeInOutSine')
               
            if(current_shift == 0){
            
                jQuery('.slider-nav-6 .back-6').animate({
                    opacity:0 
                },2000,'easeInOutSine') 
         }
                   //alert('4'); 
            } 

       jQuery('.slider-6').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        }  
        else {
             jQuery('.slider-nav-6').hide();
        }     

});

// AJB store slider-7
jQuery(document).ready(function(){

        var panels_amount = jQuery('div.slider-item-7').length;
        var panel_width = (jQuery('div.slider-item-7').width());
        var panels_width = ((panels_amount * panel_width) * -1) + (panel_width * 5);
        var panels_shift = (panel_width *-1);
        var current_shift = 0;
                
        if(panels_amount > 5){
        if(current_shift == 0){
            
                jQuery('.slider-nav-7 .back-7').animate({
                    opacity:0 
                },2000,'easeInOutSine')
         }

        jQuery('.slider-nav-7 .next-7').click(function(){        
	   
            if( current_shift + panels_shift <= panels_width  ) //End
            {
                 current_shift = panels_width;
                 jQuery(this).animate({
                    opacity: 0
                 },2000,'easeInOutSine')
                 jQuery('.slider-nav-7 .back-7').animate({
                    opacity:1 
                },2000,'easeInOutSine')
			 //alert('1');                
            }     
            else{
                   current_shift = current_shift +  panels_shift;
                   jQuery(this).animate({
                        opacity: 1
                     },1500,'easeInOutSine');
                jQuery('.slider-nav-7 .back-7').animate({
                    opacity:1 
                },2000,'easeInOutSine');
                //alert('2');
            }

		jQuery('.slider-7').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        
        jQuery('.slider-nav-7 .back-7').click(function(){
        
       
           if( current_shift - panels_shift > 0){
                    current_shift = 0;
                    
                jQuery('.slider-nav-7 .back-7').animate({
                    opacity:0 
                },2000,'easeInOutSine')   
                jQuery('.slider-nav .next-7').animate({
                    opacity:1 
                },2000,'easeInOutSine')
                    
                    //alert('3'); 
            }
               else{
                   current_shift = current_shift -  panels_shift;
               jQuery('.slider-nav-7 .next-7').animate({
                    opacity:1 
                },2000,'easeInOutSine')
               
            if(current_shift == 0){
            
                jQuery('.slider-nav-7 .back-7').animate({
                    opacity:0 
                },2000,'easeInOutSine') 
         }
                   //alert('4'); 
            } 

       jQuery('.slider-7').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        }  
        else {
             jQuery('.slider-nav-7').hide();
        }     

});

// AJB store slider-8
jQuery(document).ready(function(){

        var panels_amount = jQuery('div.slider-item-8').length;
        var panel_width = (jQuery('div.slider-item-8').width());
        var panels_width = ((panels_amount * panel_width) * -1) + (panel_width * 5);
        var panels_shift = (panel_width *-1);
        var current_shift = 0;
                
        if(panels_amount > 5){
        if(current_shift == 0){
            
                jQuery('.slider-nav-8 .back-8').animate({
                    opacity:0 
                },2000,'easeInOutSine')
         }

        jQuery('.slider-nav-8 .next-8').click(function(){        
	   
            if( current_shift + panels_shift <= panels_width  ) //End
            {
                 current_shift = panels_width;
                 jQuery(this).animate({
                    opacity: 0
                 },2000,'easeInOutSine')
                 jQuery('.slider-nav-8 .back-8').animate({
                    opacity:1 
                },2000,'easeInOutSine')
			 //alert('1');                
            }     
            else{
                   current_shift = current_shift +  panels_shift;
                   jQuery(this).animate({
                        opacity: 1
                     },1500,'easeInOutSine');
                jQuery('.slider-nav-8 .back-8').animate({
                    opacity:1 
                },2000,'easeInOutSine');
                //alert('2');
            }

		jQuery('.slider-8').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        
        jQuery('.slider-nav-8 .back-8').click(function(){
        
       
           if( current_shift - panels_shift > 0){
                    current_shift = 0;
                    
                jQuery('.slider-nav-8 .back-8').animate({
                    opacity:0 
                },2000,'easeInOutSine')   
                jQuery('.slider-nav .next-8').animate({
                    opacity:1 
                },2000,'easeInOutSine')
                    
                    //alert('3'); 
            }
               else{
                   current_shift = current_shift -  panels_shift;
               jQuery('.slider-nav-8 .next-8').animate({
                    opacity:1 
                },2000,'easeInOutSine')
               
            if(current_shift == 0){
            
                jQuery('.slider-nav-8 .back-8').animate({
                    opacity:0 
                },2000,'easeInOutSine') 
         }
                   //alert('4'); 
            } 

       jQuery('.slider-8').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        }  
        else {
             jQuery('.slider-nav-8').hide();
        }     

});

// AJB store slider-9
jQuery(document).ready(function(){

        var panels_amount = jQuery('div.slider-item-9').length;
        var panel_width = (jQuery('div.slider-item-9').width());
        var panels_width = ((panels_amount * panel_width) * -1) + (panel_width * 5);
        var panels_shift = (panel_width *-1);
        var current_shift = 0;
                
        if(panels_amount > 5){
        if(current_shift == 0){
            
                jQuery('.slider-nav-9 .back-9').animate({
                    opacity:0 
                },2000,'easeInOutSine')
         }

        jQuery('.slider-nav-9 .next-9').click(function(){        
	   
            if( current_shift + panels_shift <= panels_width  ) //End
            {
                 current_shift = panels_width;
                 jQuery(this).animate({
                    opacity: 0
                 },2000,'easeInOutSine')
                 jQuery('.slider-nav-9 .back-9').animate({
                    opacity:1 
                },2000,'easeInOutSine')
			 //alert('1');                
            }     
            else{
                   current_shift = current_shift +  panels_shift;
                   jQuery(this).animate({
                        opacity: 1
                     },1500,'easeInOutSine');
                jQuery('.slider-nav-9 .back-9').animate({
                    opacity:1 
                },2000,'easeInOutSine');
                //alert('2');
            }

		jQuery('.slider-9').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        
        jQuery('.slider-nav-9 .back-9').click(function(){
        
       
           if( current_shift - panels_shift > 0){
                    current_shift = 0;
                    
                jQuery('.slider-nav-9 .back-9').animate({
                    opacity:0 
                },2000,'easeInOutSine')   
                jQuery('.slider-nav .next-9').animate({
                    opacity:1 
                },2000,'easeInOutSine')
                    
                    //alert('3'); 
            }
               else{
                   current_shift = current_shift -  panels_shift;
               jQuery('.slider-nav-9 .next-9').animate({
                    opacity:1 
                },2000,'easeInOutSine')
               
            if(current_shift == 0){
            
                jQuery('.slider-nav-9 .back-9').animate({
                    opacity:0 
                },2000,'easeInOutSine') 
         }
                   //alert('4'); 
            } 

       jQuery('.slider-9').animate({ marginLeft: current_shift }, 1500,'easeInOutSine'); //Action

        });
        }  
        else {
             jQuery('.slider-nav-9').hide();
        }     

});

// fancybox local script
jQuery(document).ready(function() {
	jQuery("a#poem").fancybox({
		'hideOnContentClick': true,
		'autoDimensions': true,
	});
	
});