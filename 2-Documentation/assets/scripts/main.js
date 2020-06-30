(function($) {
	'use strict';

	$('pre code').each(function(i, block) {
		hljs.highlightBlock(block);
	});

	$('a[href^="#"]').on('click', function(event) {
	    event.preventDefault();

	    var target = this.hash,
	    	$target = $(target);

	    	$('html, body').stop().animate({
	    	    'scrollTop': $target.offset().top
	    	});
	});

	var All_Panels = $('.accordion > dd').hide();
	All_Panels.first().slideDown(300);

	$('.accordion > dt > a').first().addClass('active');
	$('.accordion > dt > a').on('click', function(){

		if( !$(this).hasClass('direct-link') ) {
			var current = $(this).parent().next('dd');

			$('.accordion > dt > a').removeClass('active');
			$(this).addClass('active');

			All_Panels.not(current).slideUp(300);
			$(this).parent().next().slideDown(300);
		}

		return false;

	});

})(jQuery);