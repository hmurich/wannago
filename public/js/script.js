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
		$('.main-slider').slick({
   		slidesToShow: 1,
   		slidesToScroll: 1,
   		autoplay: true,
  		autoplaySpeed: 100500,
  		arrows:true
		});
		$('.m-arrow--left').click(function() {
			$('.main-slider .slick-prev').click();
		});
		$('.m-arrow--right').click(function() {
			$('.main-slider .slick-next').click();
		});
		$('.new-ul').slick({
  		slidesToShow: 4,
  		slidesToScroll: 1,
  		infinite:true,
  		autoplay: true,
  		autoplaySpeed: 4000,
  		arrows:true,
  		  responsive: [
    {
      breakpoint: 940,
      settings: {
        slidesToShow: 3
      }
    },
     {
      breakpoint: 680,
      settings: {
        slidesToShow: 2
      }
    },
     {
      breakpoint: 500,
      settings: {
        slidesToShow: 1
      }
    }
  ]
		});
$('.event-c').slick({
  		slidesToShow: 4,
  		slidesToScroll: 1,
  		infinite:true,
  		autoplay: true,
  		autoplaySpeed: 4000,
  		arrows:true,
  			  responsive: [
    {
      breakpoint: 940,
      settings: {
        slidesToShow: 3
      }
    },
     {
      breakpoint: 680,
      settings: {
        slidesToShow: 2
      }
    }
  ]
		});		
		$('.rec-left').click(function() {
			$('.new-ul .slick-prev').click();
		});
		$('.rec-right').click(function() {
			$('.new-ul .slick-next').click();
		});
		$('.event-left').click(function() {
			$('.event-c .slick-prev').click();
		});
		$('.event-right').click(function() {
			$('.event-c .slick-next').click();
		});
		$('.new-left').click(function() {
			$('.akcii-ul .slick-prev').click();
		});
		$('.new-right').click(function() {
			$('.akcii-ul .slick-next').click();
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
		  fade: true
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
            $('.zaved-nav').removeClass('zaved-nav--active');            
        }else{
            $('.mob-menu').addClass('mob-menu--active');
            $('.zaved-nav').addClass('zaved-nav--active');
        }                             
    });
  	$('.step1').click(function() {
			$('.step-item--1').click();
		});
  	$('.step2').click(function() {
			$('.step-item--2').click();
		});
		$('.step3').click(function() {
			$('.step-item--3').click();
		});
		$('.step4').click(function() {
			$('.step-item--4').click();
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