$(document).ready(function() {
	console.log('hello from main');
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

        console.log(option.val());
    });

});
