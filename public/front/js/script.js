$(document).ready(function(){ 	
   $(document).click(function (e)
		{
		    var container = $(".filtr-select");
		    if (container.has(e.target).length === 0)
		    {
		       $('.filtr-select').removeClass('filtr-select--active');	
		    }
		});

		$('.filtr-select').click(function(e) 
		{
		if($(this).hasClass('filtr-select--active')){
	 				$(this).removeClass('filtr-select--active');	
				 event.stopPropagation();
		}
		else{
				$('.filtr-select--active').removeClass('filtr-select--active');	
				$(this).addClass('filtr-select--active');
				$('.filtr-area').addClass('filtr-area--active');
		}
		    return false;
		});
		$('.w-slider').slick({
  		slidesToShow: 6,
  		slidesToScroll: 1,
  		autoplay: true,
  		autoplaySpeed: 2500,
  		arrow:true
		});
		$( function() {
    	$( "#tabs" ).tabs();
  	} );
  	$(document).click(function (e)
  	{
		    var container2 = $(".city");
		    if (container2.has(e.target).length === 0)
		    {
		       $('.city').removeClass('city--active');	
		    }
		});

		$('.city').click(function(e) 
		{
		if($(this).hasClass('city--active')){
	 				$(this).removeClass('city--active');	
				 event.stopPropagation();
		}
		else{
				$(this).addClass('city--active');				
		}
		    return false;
		});
		$(document).click(function (e)
	  	{
			    var container3 = $(".others");
			    if (container3.has(e.target).length === 0)
			    {
			       $('.others').removeClass('others--active');	
			    }
			});

			$('.others').click(function(e) 
			{
			if($(this).hasClass('others--active')){
		 				$(this).removeClass('others--active');	
					 event.stopPropagation();
			}
			else{
					$(this).addClass('others--active');				
			}
			    return false;
		});
		$('.big-slider').slick({
		  slidesToShow: 1,
		  speed: 800,
		  slidesToScroll: 1,
		  arrows: false,
		  fade: true,
		  asNavFor: '.mini-slider'
		});
		$('.mini-slider').slick({
		  slidesToShow: 6,
		  slidesToScroll: 1,
		  asNavFor: '.big-slider',
		  arrows: true,
		  focusOnSelect: true
		});	
 });