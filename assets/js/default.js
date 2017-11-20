var Main = function () {
    var isMobile = false;

    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

	var runGoTop = function () {
        jQuery('#gotop').on('click', function (e) {
            jQuery("html, body").animate({
                scrollTop: 0
            }, "slow");
            e.preventDefault();
        });
	};

	var searchBox = function () {
		$('.col-search .search-input .form-control').on("keyup", function (e) {
			var that = $(this);
			var currentVal = that.val();

			if (that.attr('data-val') !== currentVal) {
				that.attr('data-val', currentVal);
				that.closest('.col-search').addClass('col-search--open');
			}
		});
		$(document).mouseup(function (e) {
			var container = $('.col-search--open');
			if (!container.is(e.target)
				&& container.has(e.target).length === 0) {
				$(".col-search").removeClass('col-search--open')
			}
		});
		$(document).keyup(function(e) {
			if (e.keyCode === 27) {
				$(".col-search").removeClass('col-search--open')
			}
		});
	};

	var collapser = function () {
		jQuery('.show_more').on('click', '.btn', function () {
			var btn = jQuery(this);
			var titleInit = 'Подробнее';
			var titleCollapsed = 'Свернуть';
			if (!btn.hasClass('collapsed')) {
				if (btn.data('title-init')) {
					titleInit = btn.data('title-init');
				}
				btn.find('span').html(titleInit);
			} else {
				if (btn.data('title-collapsed')) {
					titleCollapsed = btn.data('title-collapsed');
				}
				btn.find('span').html(titleCollapsed);
			}
		});
	};

	var maskedInput = function() {
		$('input[autocomplete=tel]').mask('0 (000) 000-00-00');
	};

	var bfSliders = function() {
		var sl = jQuery(".bf-slider .list");
		sl.each(function( index ) {
			if ($(this).find('.sl-item').length > 3) {
				$(this).slick({
					slidesToShow: 3,
					slidesToScroll: 3,
					autoplay: false,
					arrows: true,
					prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="icon icon-prev-dark"></i></button>',
					nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="icon icon-next-dark"></i></button>'
				});
			}
		});
	};

	var ToolTip = function () {
		$('[data-toggle="tooltip"]').on("mouseleave", function () {
			$(this).find('.hint-popup').hide();
		});

		var windowWidth = window.innerWidth;

		if (windowWidth > 920) {
			$('[data-toggle="tooltip"]').on('mouseenter', function(e) {
				var that = $(this);
				that.addClass('show-tooltip');
				that.data('title', that.attr('title'));
				that.removeAttr('title');

				var qtipPos = 'left';
				if (windowWidth < 1400) {
					qtipPos = 'right';
				}

				if (that.attr('data-tooltip-width')) {
					that.append('<div class="hints '+qtipPos+'" style="width: '+ that.data('tooltip-width') +'"><div>'+that.data('title')+'</div></div>');
				} else {
					that.append('<div class="hints '+qtipPos+'"><div>'+that.data('title')+'</div></div>');
				}
				timer = setTimeout($.proxy(function(){
					that.find('.hints').fadeIn('fast');
				}, this),100);
			}).on("mouseleave", function () {
				var that = $(this);
				clearTimeout(timer);
				that.find('.hints').remove();
				that.removeClass('show-tooltip');
			});
		}
	};

	var CatalogNavigation = function () {
        var timer,
			timeIn = [],
			timeOut = [];

        if (!isMobile && $(window).width() > 768) {
            $('.col-catalog').on('mouseenter', function (e) {
                clearTimeout(timer);
                $(this).addClass('col-catalog--open');
            }).on("mouseleave", function () {
                timer = setTimeout(function () {
                    $('.col-catalog').removeClass('col-catalog--open');
                }, 200);
            });
        } else {
            $('#header').on('click', '.col-catalog', function(e) {
                $(this).toggleClass('col-catalog--open');
            });
		}

		$(".col-catalog .catalog-menu .has-child").hover(function() {
			var that = $(this),
				uid = that.index();
			
			timeIn[uid] = setTimeout(function(){ 
				that.addClass('has-child--open');
			}, 200);

			if (timeOut[uid] !== undefined) {
				clearTimeout(timeOut[uid]);      
			}

		}, function(){
			var that = $(this),
				uid = that.index();
				
            if (timeIn[uid] !== undefined) {
				clearTimeout(timeIn[uid]);      
			}

			timeOut[uid] = setTimeout(function(){ 
				that.removeClass('has-child--open'); 
			}, 200);
        });
		
		$('.catalog-menu').on('click', '.submenu__close', function(e) {
			e.preventDefault();
			var that = $(this);
			that.closest('.col-catalog').removeClass('col-catalog--open');
		});

	}

	var optionPanel = function() {
		var viewedProducts = document.querySelector('#option_panel .option-panel__viewed');
		var searchResult = document.querySelector('#option_panel .option-panel__search .col-search');

		$(window).scroll(function (e) {
			var height = $(window).scrollTop();

			if (height > $('#header').height()) {
				$('#option_panel').addClass('option_panel--open');
			} else {
				$('#option_panel').removeClass('option_panel--open');
				viewedProducts.classList.remove('option-panel__viewed--open');
				searchResult.classList.remove('col-search--open');
			}

		});

		document.querySelector('#option_panel .option-panel__viewed-link').addEventListener('click', function(e) {
			e.preventDefault();
			viewedProducts.classList.toggle('option-panel__viewed--open');
		});
		document.querySelector('#option_panel .option-panel__viewed .panel-sport__close').addEventListener('click', function(e) {
			e.preventDefault();
			viewedProducts.classList.remove('option-panel__viewed--open');
		});

		var viewdList = jQuery(".viewed-list .product-grid");

		if (viewdList.length > 0) {
			if (viewdList.find('.product-grid__item').length > 1) {
				viewdList.slick({
					slidesToShow: 3,
					slidesToScroll: 3,
					arrows: false,
					responsive: [
						{
							breakpoint: 1380,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 2
							}
						},
						{
							breakpoint: 992,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 2
							}
						},
						{
							breakpoint: 767,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}
					]
				});
				$('.viewed-list__button-next a').on('click', function(e){
					e.preventDefault();
					viewdList.slick('slickNext');
				});
			}
		}
	};

	var stickSidebar = function() {
		$('#sidebar aside').stick_in_parent();
		$('.sticky').stick_in_parent();
		// $('.catalog-menu .submenu').stick_in_parent();
	};

	var masonryList = function() {
		$(window).load(function() {
			var list = jQuery(".masonry-list");

			if (list.length > 0) {
				list.masonry({itemSelector: 'article'});
			}
		});
	};

	return {
        init: function () {
			runGoTop();
			searchBox();
			collapser();
			maskedInput();
			bfSliders();
			ToolTip();
			CatalogNavigation();
			optionPanel();
			stickSidebar();
			masonryList();
        }
    };
}();

