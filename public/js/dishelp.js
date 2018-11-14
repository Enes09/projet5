
$(".burgerButton").click(function (){
	$('.menuLink').fadeToggle();
	$('.menuLink').css('display', 'inline-flex');
});




$(function() { 

	var windowWidth = $(window).width();

	if(windowWidth<768){
		
		$('.logout').html('<i class="fas fa-sign-out-alt"></i>');
		$('.login').html('<i class="fas fa-sign-in-alt"></i>');
		$('.register').html('<i class="far fa-clipboard"></i>');
		$('.register').css('font-size', '1.2em');



		$('.show').html('<i class="far fa-eye"></i>');
		
		$('.deleteTd').css('display', 'none');
		$('.contactTd').css('display', 'none');
	}

});