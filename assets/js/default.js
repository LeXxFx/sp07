﻿var Main = function () {

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


            $.ajax({
                type: "POST",
                url: "/ajax/searchRow.php",
                data: { q: $(this).val() }
            }).done(function( msg ) {
                $(".search-menu").html(msg);
            });


			var that = $(this);
			var currentVal = that.val();

			if (that.attr('data-val') != currentVal) {
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
			if (e.keyCode == 27) {
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
		$('.masked-phone').mask('9 (999) 999-99-99');
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
		$('.col-catalog').on('mouseenter', function(e) {
			$(this).addClass('col-catalog--open');
		}).on("mouseleave", function () {
			$(this).removeClass('col-catalog--open');
		});

		$('.col-catalog .catalog-menu .has-child').on('mouseenter', function(e) {
			var that = $(this);
			that.addClass('has-child--open');
			that.closest('.catalog-menu').find('.submenu').removeClass('submenu--close');
		}).on("mouseleave", function () {
			$(this).removeClass('has-child--open');
		});

		//ie fix
		//$('.catalog-menu ul').css('min-height', $('.catalog-menu ul').height() - 25);

		$('.catalog-menu').on('click', '.submenu__close', function(e) {
			e.preventDefault();
			var that = $(this);
			//that.closest('.has-child').removeClass('has-child--open');
			that.closest('.col-catalog').removeClass('col-catalog--open1');
		});

		$('#header').on('click', '.col-catalog', function(e) {
			$(this).toggleClass('col-catalog--open');
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

