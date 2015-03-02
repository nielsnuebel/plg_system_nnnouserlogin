$(function(){
	$('#nnnouserlogin_button').on('click',function(){
		if($(this).hasClass('open'))
		{
			$(this).removeClass('open').addClass('close');
			$('#nnnouserlogin_wrapper').removeClass('close').addClass('open').slideDown();
		}
		else {
			$(this).removeClass('close').addClass('open');
			$('#nnnouserlogin_wrapper').removeClass('open').addClass('close').slideUp();
		}
	})
})