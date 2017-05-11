$(document).ready(function(){ 	
   $(document).click(function (e)
				{
		    var container = $('.filtr-select');
		    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
		    {
		       $('.filtr-select').removeClass('filtr-select--active');
		       $('.filtr-area').removeClass('filtr-area--active');
		    }
		});
	
		$('.filtr-select').click(function(e) {
		if($(this).hasClass('filtr-select--active')){	 				 		
				 $(this).removeClass('filtr-select--active');
				 event.stopPropagation();				
		}
		else{
				$('.filtr-select').removeClass('filtr-select--active');
				$('.filtr-area').addClass('filtr-area--active');
				$(this).addClass('filtr-select--active');
		}
		 
		});

		$('.w-slider').slick({
  		slidesToShow: 6,
  		slidesToScroll: 1,
  		autoplay: true,
  		autoplaySpeed: 2500,
  		arrows:true,
  		  responsive: [
    {
      breakpoint: 1140,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows:false
      }
    },
     {
      breakpoint: 900,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows:false
      }
    },
    {
      breakpoint: 760,
      settings: {
        slidesToShow: 3,
        arrows:false                
      }
    },
    {
      breakpoint: 460,
      settings: {
        slidesToShow: 2,
        arrows:false               
      }
    },
    {
      breakpoint: 371,
      settings: {
        slidesToShow: 1,
        arrows:false               
      }
    }
  ]
		});
		$('.zaved-slider').slick({
  		slidesToShow: 1,
  		slidesToScroll: 1,
  		autoplay: false,
  		arrow:true
		});		
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
				 
		}
		else{
				$(this).addClass('city--active');				
		}
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
		$(document).click(function (e)
	  	{
			    var container3 = $(".city-select__part");
			    if (container3.has(e.target).length === 0)
			    {
			       $('.city-select').removeClass('city-select--active');	
			    }
			});

			$('.city-select').click(function(e) 
			{
			if($(this).hasClass('city-select--active')){
		 				$(this).removeClass('city-select--active');	
					 event.stopPropagation();
			}
			else{
					$(this).addClass('city-select--active');				
			}
			  
		});
		$('.checkbox').on('click', function () {
		 	if($(this).hasClass('checkbox--active')){
		 				$(this).removeClass('checkbox--active');	
			}
			else{
					$(this).addClass('checkbox--active');				
			}	 
		});
		$('.others a').click(function () {
        location.href = this.rel;
    });
		$('.big-slider').slick({
		  slidesToShow: 1,
		  speed: 800,
		  slidesToScroll: 1,
		  arrows: true,
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
		   $(document).click(function (e)
				{
		    var container = $('.zaved-select');
		    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
		    {
		       $('.zaved-select').removeClass('zaved-select--active');
		    }
		});
	
		$('.zaved-select').click(function(e) {
		if($(this).hasClass('zaved-select--active')){	 				 		
				 $(this).removeClass('zaved-select--active');
				 event.stopPropagation();				
		}
		else{
				$(this).addClass('zaved-select--active');
		}
		 
		});
		$('.book-time__item').on('click', function () {
		 	if($(this).hasClass('book-time__item--active')){
		 				$(this).removeClass('book-time__item--active');	
			}
			else{
					$('.book-time__item').removeClass('book-time__item--active')
					$(this).addClass('book-time__item--active');				
			}	 
		});



    $('.pnumber__add--plus').click(function () {
    		var count = $(this).siblings('.pnumber__input').val();
    		count++               
    		$(this).siblings('.pnumber__input').val(count);
    });
    $('.pnumber__add--minus').click(function () {
      	var count = $(this).siblings('.pnumber__input').val();

      	

      	 if(count <= 1){
      	 	return
      	 }else{
      	 	count--;
  	 		$(this).siblings('.pnumber__input').val(count);
      	 }
    });
     $('.mob-menu').on('click', function () {
        if($('.mob-menu').hasClass('mob-menu--active')){
            $('.mob-menu').removeClass('mob-menu--active');
            $('.header-bot').removeClass('header-bot--active');            
        }else{
            $('.mob-menu').addClass('mob-menu--active');
            $('.header-bot').addClass('header-bot--active');
        }                             
    });
  
	
		$('.search-type__left').click(function(e) {
		if($(this).hasClass('search-type__left--acitve')){	 				 		
				 $(this).removeClass('search-type__left--acitve');
		}
		else{
				$(this).addClass('search-type__left--acitve');
		}
		});
 });