(function($) {
	'use strict';

	var post_slider = $('.post-slider'),
		post_gallery = $('.post-gallery'),
		masonry_container = $('.masonry'),
		nav_trigger = $('.menu-trigger'),
		to_top = $('#back-to-top'), num;

	if( $('.adD-gallery').length ) {
		$('.adD-gallery').justifiedGallery({
			rowHeight: 300
		});
	}

	nav_trigger.on('click', function() {
		$('.navbar-mobile').slideToggle();
		return false;
	});

	$('.justified-gallery a, .popup').magnificPopup({
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		},
		gallery: {
			enabled: true,
			tPrev: 'Previous',
			tNext: 'Next',
			tCounter: ''
		},
		zoom: {
			enabled: true,
			duration: 300,
			opener: function(element) {
				return element.find('img');
			}
		}
	});
	
	$(document).ready(function() {

		if( $('#post-map').length ) {

			var map = new google.maps.Map(document.getElementById('post-map'), {
			    zoom: 4,
			    scrollwheel: false,
			    center: {
			        lat: parseFloat($('#post-map').attr('data-lat')),
			        lng: parseFloat( $('#post-map').attr('data-long'))
			    }
			});
			
			var marker;
			marker = new google.maps.Marker( {
			    position : new google.maps.LatLng(
			        parseFloat($('#post-map').attr('data-lat')),
			        parseFloat( $('#post-map').attr('data-long'))
			    ),
			    icon: $('#post-map').attr('data-marker'),
			    map: map
			});

		}
	});

	if( post_slider.length ) {
		
		if( post_slider.hasClass('multiple-slider') ) {
			num = 4;
		}
		else {
			num = 1;
		}

		post_slider.owlCarousel({
			navigation: true,
			rewindNav: false,
			items: num,
			navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
		});
	}
	if( post_gallery.length ) {
		post_gallery.owlCarousel({
			items: 1,
			navigation: true,
			rewindNav: false,
			responsive: false,
			responsiveRefreshRate: 200,
			responsiveBaseWidth: window,
			itemsDesktop:[1199,1],
			itemsDesktopSmall:[979,1],
			itemsTablet:[768,1],
			navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
		});
	}

	if( to_top.length ) {
		var scroller = 500,
			scoller_position = function() {

				if( $(window).scrollTop() > scroller ) {
					to_top.addClass('visible');
				}
				else {
					to_top.removeClass('visible');
				}

			};
		scoller_position();
		$(window).on('scroll', function() {
			scoller_position();
		});
		to_top.on('click', function() {
			$('body, html').animate({ scrollTop: '0' }, 700 );
			return false;
		});
	}

	$(window).load(function() {
		if( masonry_container.length ) {
			masonry_container.masonry({
				itemsSelector: '.block',
				columnWidth: '.block',
				isAnimated: false
			});
		}
	});

})(jQuery);