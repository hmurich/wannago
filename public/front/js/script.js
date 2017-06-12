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
		$('.ints-inner__close').on('click', function () {
			$('.instagram').addClass('ints-inner--none');
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

$(document).ready(function() {

	$('.fancybox').fancybox();

	$(".fancybox-effects-a").fancybox({
		helpers: {
			title : {
				type : 'outside'
			},
			overlay : {
				speedOut : 0
			}
		}
	});

	// Disable opening and closing animations, change title type
	$(".fancybox-effects-b").fancybox({
		openEffect  : 'none',
		closeEffect	: 'none',

		helpers : {
			title : {
				type : 'over'
			}
		}
	});

	// Set custom style, close if clicked, change title type and overlay color
	$(".fancybox-effects-c").fancybox({
		wrapCSS    : 'fancybox-custom',
		closeClick : true,

		openEffect : 'none',

		helpers : {
			title : {
				type : 'inside'
			},
			overlay : {
				css : {
					'background' : 'rgba(238,238,238,0.85)'
				}
			}
		}
	});

	// Remove padding, set opening and closing animations, close if clicked and disable overlay
	$(".fancybox-effects-d").fancybox({
		padding: 0,

		openEffect : 'elastic',
		openSpeed  : 150,

		closeEffect : 'elastic',
		closeSpeed  : 150,

		closeClick : true,

		helpers : {
			overlay : null
		}
	});

	/*
	 *  Button helper. Disable animations, hide close button, change title type and content
	 */

	$('.fancybox-buttons').fancybox({
		openEffect  : 'none',
		closeEffect : 'none',

		prevEffect : 'none',
		nextEffect : 'none',

		closeBtn  : false,

		helpers : {
			title : {
				type : 'inside'
			},
			buttons	: {}
		},

		afterLoad : function() {
			this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
		}
	});


	/*
	 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
	 */

	$('.fancybox-thumbs').fancybox({
		prevEffect : 'none',
		nextEffect : 'none',

		closeBtn  : false,
		arrows    : false,
		nextClick : true,

		helpers : {
			thumbs : {
				width  : 50,
				height : 50
			}
		}
	});

	/*
	 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
	*/
	$('.fancybox-media')
		.attr('rel', 'media-gallery')
		.fancybox({
			openEffect : 'none',
			closeEffect : 'none',
			prevEffect : 'none',
			nextEffect : 'none',

			arrows : false,
			helpers : {
				media : {},
				buttons : {}
			}
		});

	/*
	 *  Open manually
	 */

	$("#fancybox-manual-a").click(function() {
		$.fancybox.open('1_b.jpg');
	});

	$("#fancybox-manual-b").click(function() {
		$.fancybox.open({
			href : 'iframe.html',
			type : 'iframe',
			padding : 5
		});
	});

	$("#fancybox-manual-c").click(function() {
		$.fancybox.open([
			{
				href : '1_b.jpg',
				title : 'My title'
			}, {
				href : '2_b.jpg',
				title : '2nd title'
			}, {
				href : '3_b.jpg'
			}
		], {
			helpers : {
				thumbs : {
					width: 75,
					height: 50
				}
			}
		});
	});

	$('.others a').click(function () {
		location.href = this.rel;
	});

	$( "#datepicker" ).datepicker();

	$("#datepicker_event").datepicker({
	    onSelect: function(dateText, inst) {
			//console.log('asdasd');
			$('#datepicker_event_form').submit();

	    }
	});

	$( "body" ).on( "change", "#anim", function() {
      $( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
    });
});