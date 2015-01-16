(function($) {

	var settings = {
		
		// Header (homepage only)
			header: {
				fullScreen: true,
				fadeIn: true,
				fadeDelay: 500
			},

		// Carousels
			carousels: {
				speed: 4,
				fadeIn: true,
				fadeDelay: 250
			},
	
	};
	
	skel.init({
		reset: 'full',
		breakpoints: {
			'global':	{ range: '*', href: 'css/style.css', containers: 1400, grid: { gutters: 48 } },
			'wide':		{ range: '-1680', href: 'css/style-wide.css', containers: 1200 },
			'normal':	{ range: '-1280', href: 'css/style-normal.css', containers: '100%', grid: { gutters: 36 } },
			'narrow':	{ range: '-960', href: 'css/style-narrow.css', grid: { gutters: 32 } },
			'narrower': { range: '-840', href: 'css/style-narrower.css', containers: '100%!', grid: { collapse: true } },
			'mobile':	{ range: '-736', href: 'css/style-mobile.css', grid: { gutters: 20 }, viewport: { scalable: false } }
		},
		plugins: {
			layers: {
				config: {
					transformTest: function() { return skel.vars.isMobile; }
				},
				navPanel: {
					hidden: true,
					breakpoints: 'mobile',
					position: 'top-left',
					side: 'top',
					width: '100%',
					height: 250,
					animation: 'pushY',
					clickToHide: true,
					swipeToHide: false,
					html: '<div data-action="navList" data-args="nav"></div>',
					orientation: 'vertical'
				},
				navButton: {
					breakpoints: 'mobile',
					position: 'top-center',
					side: 'top',
					width: 100,
					height: 50,
					html: '<div class="toggle" data-action="toggleLayer" data-args="navPanel"></div>'
				}
			}
		}
	});

	$(function() {

		var	$window = $(window),
			$body = $('body'),
			$header =  $('#header');
			
		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');
			
			$window.on('load', function() {
				$body.removeClass('is-loading');
			});
			
		// CSS polyfills (IE<9).
			if (skel.vars.IEVersion < 9)
				$(':last-child').addClass('last-child');
		

		// Carousels.
			$('.carousel').each(function() {
				
				var	$t = $(this),
					$forward = $('<span class="forward"></span>'),
					$backward = $('<span class="backward"></span>'),
					$reel = $t.children('.reel'),
					$items = $reel.children('article');
				
				var	pos = 0,
					leftLimit,
					rightLimit,
					itemWidth,
					reelWidth,
					timerId;

				// Items.
					if (settings.carousels.fadeIn) {
						
						$items.addClass('loading');

						$t.onVisible(function() {
							var	timerId,
								limit = $items.length - Math.ceil($window.width() / itemWidth);
							
							timerId = window.setInterval(function() {
								var x = $items.filter('.loading'), xf = x.first();
								
								if (x.length <= limit) {
									
									window.clearInterval(timerId);
									$items.removeClass('loading');
									return;
								
								}
								
								if (skel.vars.IEVersion < 10) {
									
									xf.fadeTo(750, 1.0);
									window.setTimeout(function() {
										xf.removeClass('loading');
									}, 50);
								
								}
								else
									xf.removeClass('loading');
								
							}, settings.carousels.fadeDelay);
						}, 50);
					}
				
				// Main.
					$t._update = function() {
						pos = 0;
						rightLimit = (-1 * reelWidth) + $window.width();
						leftLimit = 0;
						$t._updatePos();
					};
				
					if (skel.vars.IEVersion < 9)
						$t._updatePos = function() { $reel.css('left', pos); };
					else
						$t._updatePos = function() { $reel.css('transform', 'translate(' + pos + 'px, 0)'); };
					
				// Forward.
					$forward
						.appendTo($t)
						.hide()
						.mouseenter(function(e) {
							timerId = window.setInterval(function() {
								pos -= settings.carousels.speed;

								if (pos <= rightLimit)
								{
									window.clearInterval(timerId);
									pos = rightLimit;
								}
								
								$t._updatePos();
							}, 10);
						})
						.mouseleave(function(e) {
							window.clearInterval(timerId);
						});
				
				// Backward.
					$backward
						.appendTo($t)
						.hide()
						.mouseenter(function(e) {
							timerId = window.setInterval(function() {
								pos += settings.carousels.speed;

								if (pos >= leftLimit) {
									
									window.clearInterval(timerId);
									pos = leftLimit;
								
								}
								
								$t._updatePos();
							}, 10);
						})
						.mouseleave(function(e) {
							window.clearInterval(timerId);
						});
						
				// Init.
					$window.load(function() {

						reelWidth = $reel[0].scrollWidth;

						skel.change(function() {
				
							if (skel.vars.isTouch) {
								
								$reel
									.css('overflow-y', 'hidden')
									.css('overflow-x', 'scroll')
									.scrollLeft(0);
								$forward.hide();
								$backward.hide();
							
							}
							else {
								
								$reel
									.css('overflow', 'visible')
									.scrollLeft(0);
								$forward.show();
								$backward.show();
							
							}

							$t._update();
						});

						$window.resize(function() {
							reelWidth = $reel[0].scrollWidth;
							$t._update();
						}).trigger('resize');

					});
				
			});
		
		
	});

})(jQuery);