jQuery(document).ready(function($){

	$('body').removeClass('preload');

	// Set Preview link
	var previewLink = $('header .preview').attr('href');
	$('nav li:nth-child(4) a').attr('href', previewLink);

	// Searchform
	var search = $('#search');
	$('nav li:last-child').html(search);
	search.removeClass('hidden');

	// Open/close read more on home page	
	function openClose (){
		$this = $(this);
		var entry = $(this).prev('.entry-content');
		entry.find('.content').toggle();
		entry.find('.excerpt.short').toggle();
		var text = $this.text() == 'More' ? 'Less' : 'More';
		$this.text(text);
	}
	$('.read-more').on('click',openClose);

	// Share
	function shareOn(){
		$(this).find('#share').fadeIn().css('right',.5*$(this).width()-50);
	}	
	function shareOff(){
		$(this).find('#share').fadeOut();
	}
	$('.no-touch .share').on('mouseover',shareOn).on('mouseleave',shareOff);
	$('.touch .share').on('click',shareOn);

	// Show player when hover over play button
	function showPlayer(){
		$(this).prev('.wpaudio-container').find('.wpaudio-slide').fadeIn();
	}	
		// Weird stuff happening in IE7...
		$('.lt-ie8 .home article').first().addClass('featured').siblings('article').addClass('non');
		function showPlayerIE7 (){
			$(this).prev('.wpaudio-container').find('.wpaudio-slide').fadeIn();
			$(this).closest('.podcast').next('.entry-content').css({
				'margin-bottom': 47,
				'top': 47
			});
		}
		function showPlayerIE7feat (){
			$(this).prev('.wpaudio-container').find('.wpaudio-slide').fadeIn();
			$(this).closest('.podcast').css({
				'bottom': 52
			});
		}
	$('.home .play').on('mouseover',showPlayer);
	$('.lt-ie8 .home .non .play').on('mouseover',showPlayerIE7);
	$('.lt-ie8 .home .featured .play').on('mouseover',showPlayerIE7feat);

	// Load more posts with AJAX
	var loader = 0;
	$('.home .load-more a').on('click', function(e){
        e.preventDefault();
        $(this).html('Loading...');
        $.ajax({
            type: "GET",
            url: $(this).attr('href'),
            dataType: 'html',
            success: function(out){
            	loader++;
                result = $(out).find('article');
                nextlink = $(out).find('.load-more a').attr('href');

                // Add new1, new2, etc. classes for new rows
                result.find('.wpaudio').addClass('new'+loader);
                $('#content').append(result.fadeIn(300));
                $('.load-more a').html('Load More');
                if (nextlink != undefined) {
                    $('.load-more a').attr('href', nextlink);
                } else {
                    $('.load-more').remove();
                }
                $('.new'+loader).each(function(i,v){
					v.wpaudio = new Wpaudio(v);
				});
				$('.home .play').off('mouseover',showPlayer).on('mouseover',showPlayer);
				$('.lt-ie8 .home .non .play').off('mouseover',showPlayerIE7).on('mouseover',showPlayerIE7);
	        }
        });
	}).ajaxSuccess(function(){
		$('.read-more').off('click',openClose).on('click',openClose);
		$('.share')
			.off('mouseover',shareOn).off('mouseleave',shareOff)
			.on('mouseover',shareOn).on('mouseleave',shareOff);
		$('.home .play').off('mouseover',showPlayer).on('mouseover',showPlayer);
		$('.lt-ie8 .home .non .play').off('mouseover',showPlayerIE7).on('mouseover',showPlayerIE7);

		// Tooltips
		$('#main .podcast a[title]').tooltips();

	});

	// Load more on news pages
	$('.page-template-pg-news-php .load-more a').on('click', function(e){
        e.preventDefault();
        $(this).html('Loading...');
        $.ajax({
            type: "GET",
            url: $(this).attr('href'),
            dataType: 'html',
            success: function(out){
                result = $(out).find('article');
                nextlink = $(out).find('.load-more a').attr('href');
                $('#content').append(result.fadeIn(300));
                $('.load-more a').html('Load More');
                if (nextlink != undefined) {
                    $('.load-more a').attr('href', nextlink);
                } else {
                    $('.load-more').remove();
                }
	        }
        });
	});

	// Load more on search page
	$('.search .load-more a').on('click', function(e){
        e.preventDefault();
        $(this).html('Loading...');
        $.ajax({
            type: "GET",
            url: $(this).attr('href'),
            dataType: 'html',
            success: function(out){
                result = $(out).find('article');
                nextlink = $(out).find('.load-more a').attr('href');
                $('#content').append(result.fadeIn(300));
                $('.load-more a').html('Load More');
                if (nextlink != undefined) {
                    $('.load-more a').attr('href', nextlink);
                } else {
                    $('.load-more').remove();
                }
	        }
        });
	});

	// Normalize heights on the About page
	var hosts = ['jonah','mike','steven','brad'];
	var hostHeights = function(){
		for (var i = 0; i < hosts.length; i++) {
			var host = $('section.' + hosts[i] + ' p'),
				prevHost = $('section.' + hosts[i - 1] + ' p');
			// Reset host heights
			host.css('height', 'auto');
			// Then dynamically set if one is taller than the others
			if ( host.height() < prevHost.height() ) {
				host.height(prevHost.height());
			} else {
				prevHost.height(host.height());
			}
		}
	}
	hostHeights();
	$(window).resize(hostHeights);

	// Get Twitter statuses
	twitterFetcher('366934472437927936', 'tweet-jonah', 1, true, false, false);
	twitterFetcher('366935562965377024', 'tweet-steven', 1, true, false, false);
	twitterFetcher('366935629218594817', 'tweet-brad', 1, true, false, false);

	// Slider for Twitter statuses
	$('.twitter').flexslider({
		animation: 'slide',
		controlNav: false,
		directionNav: true,
		prevText: '<span class="icon-triangle-2"></span>',
		nextText: '<span class="icon-triangle"></span>'
	});
});