$(document).ready(function() {
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
