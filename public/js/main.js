$(document).ready(function(){
	$(window).resize(function(){
		var h = $(window).height();
		$('.height').css({'min-height':h});
	});
	$(window).trigger('resize');
   $('.fa-search').click(function(){
    $('.pull-right>form>input').toggleClass('active');
   });    
})