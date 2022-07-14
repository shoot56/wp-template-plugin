(function($){
	$(document).ready(function(){
		toUpInit();
		$(window).scroll(function(){
			toUpInit();
		});

		$('.show-hide-opener').on('click', function(event) {
			event.preventDefault();
			let $btn = $(this);
			let $item = $btn.closest('.show-hide-wrap');
			let $block = $item.find('.show-hide-block');
			let $url = $btn.data('url');
			let btnHtmlTextMore = '<span class="btn__text">Read More</span><span class="btn__icon"><svg class="svg-icon" width="16" height="16"><use xlink:href="'+$url+'icon-plus"></use></svg></span>';
			let btnHtmlTextLess = '<span class="btn__text">Read Less</span><span class="btn__icon"><svg class="svg-icon" width="16" height="16"><use xlink:href="'+$url+'icon-minus"></use></svg></span>';

			if($item.hasClass('active')){
				$block.slideUp(function(){
					$item.removeClass('active');
					$btn.html(btnHtmlTextMore);
					AOS.refresh();
				});
			}else{
				$block.slideDown(function(){
					$item.addClass('active');
					$btn.html(btnHtmlTextLess);
					AOS.refresh();
				});
			}

		});
		

		



	});
	// end document.ready




	
	

	$('.jump-to').on('click', function(event) {
		event.preventDefault();
		var target = $(this).data('target');
		var indent = $('.site-header--stick').height();
		$.scrollTo(target, -indent);
	});
	$('.to-up').click(function(e){
		$('body,html').animate({'scrollTop':0}, 500);
		e.preventDefault();
	});
	function toUpInit() {
		var wS = $(window).scrollTop();
		if (wS>600){
			$('.to-up').addClass('active');
		} else {
			$('.to-up').removeClass('active');
		}
	}


	

	jQuery.scrollTo = function (target, offset, speed, container) {
		if (isNaN(target)) {
			if (!(target instanceof jQuery))
				target = $(target);
			target = parseInt(target.offset().top);
		}
		container = container || "html, body";
		if (!(container instanceof jQuery))
			container = $(container);
		speed = speed || 500;
		offset = offset || 0;
		container.animate({
			scrollTop: target + offset
		}, speed);
	};


	





}(jQuery));


