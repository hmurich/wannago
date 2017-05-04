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
  		arrow:true,
  		  responsive: [
    {
      breakpoint: 1120,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
		});
		$('.zaved-slider').slick({
  		slidesToShow: 1,
  		slidesToScroll: 1,
  		autoplay: false,
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



    //   $('.js-min').click(function () {
    //   	var count = $(this).siblings('.count').children('.js-count').html();

    //   	console.log(count);

    //   	 if(count <= 0){
    //   	 	return
    //   	 }else{
    //   	 	count--;
  	 // 		$(this).siblings('.count').children('.js-count').html(count);
    //     	$(this).siblings('.count').children('.js-count-input').val(count);
    //   	 }
    // });
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
		

		// calculate margin size
		

		// set css
		
		// $('.feature li').hover( function(){
		// 	$(this) 
		// 	var width = $(this).children().width();
		// 	var marginLeft = width / 2;
		// 	$(this).children().css('margin-left',-marginLeft / 1.5);
		// });
 });