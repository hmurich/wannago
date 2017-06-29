$(document).ready(function(){$(document).click(function(e){var container=$('.filtr-select');if(!container.is(e.target)&&container.has(e.target).length===0){$('.filtr-select').removeClass('filtr-select--active');$('.filtr-area').removeClass('filtr-area--active');}});$('.filtr-select').click(function(e){if($(this).hasClass('filtr-select--active')){$(this).removeClass('filtr-select--active');event.stopPropagation();}else{$('.filtr-select').removeClass('filtr-select--active');$('.filtr-area').addClass('filtr-area--active');$(this).addClass('filtr-select--active');}});$('.main-slider').slick({slidesToShow:1,slidesToScroll:1,autoplay:true,autoplaySpeed:100500,arrows:true});$('.m-arrow--left').click(function(){$('.main-slider .slick-prev').click();});$('.m-arrow--right').click(function(){$('.main-slider .slick-next').click();});$('.new-ul').slick({slidesToShow:4,slidesToScroll:1,infinite:true,autoplay:true,autoplaySpeed:4000,arrows:true,responsive:[{breakpoint:940,settings:{slidesToShow:3}},{breakpoint:680,settings:{slidesToShow:2}},{breakpoint:500,settings:{slidesToShow:1}}]});$('.event-c').slick({slidesToShow:4,slidesToScroll:1,infinite:true,autoplay:true,autoplaySpeed:4000,arrows:true,responsive:[{breakpoint:940,settings:{slidesToShow:3}},{breakpoint:680,settings:{slidesToShow:2}}]});$('.rec-left').click(function(){$('.new-ul .slick-prev').click();});$('.rec-right').click(function(){$('.new-ul .slick-next').click();});$('.event-left').click(function(){$('.event-c .slick-prev').click();});$('.event-right').click(function(){$('.event-c .slick-next').click();});$('.new-left').click(function(){$('.akcii-ul .slick-prev').click();});$('.new-right').click(function(){$('.akcii-ul .slick-next').click();});$('.zaved-slider').slick({slidesToShow:1,slidesToScroll:1,autoplay:false,arrow:true});$(document).click(function(e){var container2=$(".city");if(container2.has(e.target).length===0){$('.city').removeClass('city--active');}});$('.city').click(function(e){if($(this).hasClass('city--active')){$(this).removeClass('city--active');}else{$(this).addClass('city--active');}});$(document).click(function(e){var container3=$(".others");if(container3.has(e.target).length===0){$('.others').removeClass('others--active');}});$('.others').click(function(e){if($(this).hasClass('others--active')){$(this).removeClass('others--active');event.stopPropagation();}else{$(this).addClass('others--active');}return false;});$(document).click(function(e){var container3=$(".city-select__part");if(container3.has(e.target).length===0){$('.city-select').removeClass('city-select--active');}});$('.city-select').click(function(e){if($(this).hasClass('city-select--active')){$(this).removeClass('city-select--active');event.stopPropagation();}else{$(this).addClass('city-select--active');}});$('.checkbox').on('click',function(){if($(this).hasClass('checkbox--active')){$(this).removeClass('checkbox--active');}else{$(this).addClass('checkbox--active');}});$('.others a').click(function(){location.href=this.rel;});$('.big-slider').slick({slidesToShow:1,speed:800,slidesToScroll:1,arrows:true,fade:true});$(document).click(function(e){var container=$('.zaved-select');if(!container.is(e.target)&&container.has(e.target).length===0){$('.zaved-select').removeClass('zaved-select--active');}});$('.zaved-select').click(function(e){if($(this).hasClass('zaved-select--active')){$(this).removeClass('zaved-select--active');event.stopPropagation();}else{$(this).addClass('zaved-select--active');}});$('.book-time__item').on('click',function(){if($(this).hasClass('book-time__item--active')){$(this).removeClass('book-time__item--active');}else{$('.book-time__item').removeClass('book-time__item--active')
$(this).addClass('book-time__item--active');}});$('.pnumber__add--plus').click(function(){var count=$(this).siblings('.pnumber__input').val();count++
$(this).siblings('.pnumber__input').val(count);});$('.pnumber__add--minus').click(function(){var count=$(this).siblings('.pnumber__input').val();if(count<=1){return}else{count--;$(this).siblings('.pnumber__input').val(count);}});$('.mob-menu').on('click',function(){if($('.mob-menu').hasClass('mob-menu--active')){$('.mob-menu').removeClass('mob-menu--active');$('.zaved-nav').removeClass('zaved-nav--active');}else{$('.mob-menu').addClass('mob-menu--active');$('.zaved-nav').addClass('zaved-nav--active');}});$('.step1').click(function(){$('.step-item--1').click();});$('.step2').click(function(){$('.step-item--2').click();});$('.step3').click(function(){$('.step-item--3').click();});$('.step4').click(function(){$('.step-item--4').click();});$('.search-type__left').click(function(e){if($(this).hasClass('search-type__left--acitve')){$(this).removeClass('search-type__left--acitve');}else{$(this).addClass('search-type__left--acitve');}});});
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
if (jQuery("#map").length > 0){
    var myMap;
    ymaps.ready(init);

    function init()
    {
        lng = jQuery("#map").data('lng');
        lat = jQuery("#map").data('lat');

        console.log(lng);
        console.log(lat);

        myMap = new ymaps.Map("map",{
            center: [lng, lat],
            zoom: 12,
            behaviors: ["default", "scrollZoom"]
        },
        {
            balloonMaxWidth: 300
        });



        myPlacemark = new ymaps.Placemark([lng, lat]);
        myMap.geoObjects.add(myPlacemark);


        myMap.controls.add("zoomControl");
        myMap.controls.add("mapTools");
        myMap.controls.add("typeSelector");
    }
}
$(document).ready(function() {
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
	$('.js_upload_file').change(function(){
		var data = new FormData();
		data.append('image', $('.js_upload_file')[0].files[0]);
			
		$.ajax({
			url: "/anketa/img",
			type: "POST",            
			data: data, 
			contentType: false,       
			enctype: 'multipart/form-data',
			cache: false,             
			processData:false,  
			beforeSend: function(){
				$('.pre_loader').addClass('pre_loader--active');
			},
			success: function(data)   
			{	
				$('.pre_loader').removeClass('pre_loader--active');
				if (data != '0'){
					$('.js_img_blocks').append("<div class='js_img_block'>"+
													"<img src='" + data + "' style='width: 100%'>"+
													"<input type='hidden' name='ar_photo_img[]' value='" + data + "'>"+
												"</div>");
					console.log(data);
				}
				console.log(data);
			}
		});
	});
	
	
    $('.js_option_select').click(function(){
        var id = $(this).data('id');
        var option = $(this).parent().children('.js_option_' + $(this).data('type'));
        var title = $(this).parent().parent().children('.js_option_title');

        if (id == option.val()){
            option.val(0);
            title.html(title.data('def'));
        }
        else{
            option.val(id);
            title.html($(this).html());
        }
    });

	$('.js_select_type').click(function(){
		var id = $(this).data('id');
		$('.js_special_all').hide();
		$('.js_special_' + id).show();

		var option = $('.js_option_spec_option');
        var title = $('.js_special_title');

		option.val(0);
		title.html(title.data('def'));

		var form = $(this).closest('form');
		var action = form.data('action');
		action = action.replace("0", id);
		form.attr('action', action);
	});

	$('.js_send_event_data').change(function(){
		console.log($(this).val());
	});
});
