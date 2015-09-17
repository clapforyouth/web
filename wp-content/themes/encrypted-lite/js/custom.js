(function($) {




    $.fn.parallax = function(options) {




        var windowHeight = $(window).height();




        // Establish default settings
        var settings = $.extend({
            speed        : 0.15
        }, options);




        // Iterate over each object in collection
        return this.each( function() {




        // Save a reference to the element
        var $this = $(this);




        // Set up Scroll Handler
        $(document).scroll(function(){




    var scrollTop = $(window).scrollTop();
            var offset = $this.offset().top;
            var height = $this.outerHeight();




    // Check if above or below viewport
if (offset + height <= scrollTop || offset >= scrollTop + windowHeight) {
return;
}




var yBgPosition = Math.round((offset - scrollTop) * settings.speed);




                // Apply the Y Background Position to Set the Parallax Effect
    $this.css('background-position', 'center ' + yBgPosition + 'px');
                
        });
        });
    }
}(jQuery));

jQuery(document).ready(function($){
	$('.nav-menu').superfish()
	$('.search-icon .search-click').click(function() {
        $('.search-box').addClass('active');
    });

    $('.search-box .close').click(function() {
        $('.search-box').removeClass('active');
    });
    
    $('.testimonial .testimonial-wrap').bxSlider({
        auto:true,
        pager:true,
        controls:false,
        minSlides:1,
        maxSlides:3, 
        slideWidth: 400,
        slideMargin: 10
        
    });
    
    $('.client_logo_wrap').bxSlider({
        auto:true,
        pager:false,
        minSlides:2,
        maxSlides:8, 
        slideWidth: 200,
        slideMargin: 20,
        nextText:'<i class="fa fa-angle-right animated pulse"></i>',
        prevText:'<i class="fa fa-angle-left  animated pulse"></i>'
   });
    
     $('.ticker-wrap-slide').bxSlider({
        auto:true,
        pager:false,
        controls:false
              
    });

    jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
    
           
    $('.dl-menu li ul').addClass('dl-submenu');
   $( '#dl-menu' ).dlmenu();
    
   $('#el-top').fadeOut();
    $(window).scroll(function(){
    if($(this).scrollTop() > 300){
      $('#el-top').fadeIn();
    }else{
      $('#el-top').fadeOut();
    }
  }); 
   $("#el-top").click(function(){
  $('html,body').animate({scrollTop:0},600);
  });
  $('.error404 .number404').addClass('animated bounce');
  $('#el-top').addClass('animated bounce');
  
  $('.pointer').addClass('animated pulse');
  
  $('.testimonial').parallax({
speed : 0.30
});

  $('body').parallax({
speed : 0.50
});
    
     new WOW().init();
});



