$(function() {
	$('.sku_prop').each(function(){
		$(this).find('.sku_prop_value:first-child').click();
	});

	$('.next-step').click(function(){
		$(this).closest('.checkout-step__item').next().find('.checkout-step__heading a').click();
		return false;
	});

	$('.prev-step').click(function(){
		$(this).closest('.checkout-step__item').prev().find('.checkout-step__heading a').click();
		return false;
	});	
});

var CheckMaxQuantity = function(el){
		if (+(el.val().trim())>el.attr('max')) {
    		// console.log('fail max changed!',$(this).val(),$(this).attr('max'));
    		el.val(el.attr('max'));
    	}
    	if (+(el.val().trim())<el.attr('min'))  {
    		// console.log('fail min changed!',$(this).val(),$(this).attr('min'));
    		el.val(el.attr('min'));
    	}
    	el.closest('.product__item').find('.addtobasket').each(function(){
    		$(this).attr('data-amount',el.val());
			console.log("Change3");
    	});
		el.closest('.product-single__price').find('.addtobasket').each(function(){
    		$(this).attr('data-amount',el.val());
			console.log("Change3");
    	});

		if(parseInt(el.val()) >= el.attr('max')) {
			el.parent().find('.btn-plus').attr('disabled', true);
		}else{
			el.parent().find('.btn-plus').removeAttr('disabled');
		}

		if(parseInt(el.val()) <= el.attr('min')) {
			el.parent().find('.btn-minus').attr('disabled', true);
		}else{
			el.parent().find('.btn-minus').removeAttr('disabled');
		}
};

var Shop = function () {
	var isMobile = false;

	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
		|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

	var inputCounter = function () {
		jQuery('.btn-number').on('click', function(e){
			var self = jQuery(this);
			e.preventDefault();
			fieldName = self.attr('data-field');
			type      = self.attr('data-type');
			var input = jQuery("input[name='"+fieldName+"']");
			var currentVal = parseInt(input.val().split(" ")[0]);
			if (!isNaN(currentVal)) {
				var unit = '';
				if (input.data('unit')) unit = input.data('unit');
				if (type == 'minus') {
					self.closest('.input-counter').find('.btn-plus').attr('disabled', false);
					if(currentVal > input.attr('min')) {
						input.val(currentVal - input.data('step') + " " + unit).change();
						console.log("CHange");
					}
				} else if(type == 'plus') {
					self.closest('.input-counter').find('.btn-minus').attr('disabled', false);
					if(currentVal < input.attr('max')) {
						input.val(currentVal + input.data('step') + " " + unit).change();
						console.log("CHange2");
					}
				}
				CheckMaxQuantity(input);

			} else {
				input.val(0);
			}
			$(this).closest('.amount').parent().find('.addtobasket').each(function(){
				$(this).attr('data-amount',input.val().split(" ")[0]);
				console.log($(this));
			});
			// console.log($(this).closest('.amount').parent().find('.addtobasket').attr('data-amount'));
		});
	};

	var addToCart = function () {
		$('.btn-add-to-cart').on('click', function () {
			var that = $(this);

			var cart = $('.panel__cart .shopping-cart');
			if ($('.option_panel--open').length > 0) {
				cart = $('.option-panel__cart .shopping-cart');
			};

			var itemImg = $(this).closest('.product__item').find(".item__image img").eq(0);
			if ($('.product-single').length > 0) {
				itemImg = $('.image__preview').find("img").eq(0);
			}

			flyToElement($(itemImg), cart);
		});

		function flyToElement(flyer, flyingTo) {
			var $func = $(this);
			var divider = 3;
			var flyerClone = $(flyer).clone();
			$(flyerClone).css({
				position: 'absolute',
				top: $(flyer).offset().top + "px",
				left: $(flyer).offset().left + "px",
				opacity: 1,
				'z-index': 1000,
				'max-width': 250
			});
			$('body').append($(flyerClone));
			var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width() / divider) / 2;
			var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 2) - ($(flyer).height() / divider) / 2;

			$(flyerClone).animate({
				opacity: 0.4,
				left: gotoX,
				top: gotoY,
				width: $(flyer).width() / divider,
				height: $(flyer).height() / divider
			}, 700,
			function () {
				$(flyingTo).fadeOut('fast', function () {
					$(flyingTo).fadeIn('fast', function () {
						$(flyerClone).fadeOut('fast', function () {
							$(flyerClone).remove();
						});
					});
				});
			});
		}
	};

	var quickBuy = function () {
		$('.btn-quick-buy').on('click', function (e) {
			e.preventDefault();
			// $('#modal_quickby').modal('show');
		});
	}

	var showMore = function () {
		$('.link-show-more').on('click', '> a', function (e) {
			e.preventDefault();
			var that = $(this);
			var target = that.data('target');

			$(target).slideToggle('fast');
			$(target).toggleClass('list-open');
			that.parent().toggleClass('collapsed');
		});
	};

	var productsCatalog = function () {
		var imageItem = $('.product__item .imgs-list .item a');
      /*  imageItem.on("mouseenter", function () {
            switchImage($(this));
		});*/
        imageItem.on("click", function (e) {
        	e.preventDefault();
            switchImage($(this));
        });

		var imgs = $(".product-list .product__item .imgs-list");
		if (imgs.length) {
			imgs.slick({
				slidesToShow: 2,
				slidesToScroll: 1,
				autoplay: false,
				vertical: true,
				verticalSwiping: true,
				prevArrow: '<a class="slick-prev"><i class="fa fa-angle-up"></i></a>',
				nextArrow: '<a class="slick-next"><i class="fa fa-angle-down"></i></a>'
			});
            imgs.on('afterChange', function(event, slick, currentSlide, nextSlide){
                var slide = slick.$slides.get(currentSlide);
                switchImage($(slide.children[0]));
            });
		}
	};


    function switchImage(image) {
        var that = image;
        var target = that.closest('.item__image').find('.image__preview');
        var newSrc = that.attr('href');

        that.closest('.imgs-list').find('.item').removeClass("current");
        that.parent().addClass("current");

      //  target.height(target.height());
        target.removeClass('image__preview--init').html('').addClass('image__preview--loading');

        if (that.data('source') == 'image') {
            target.html('<a id="gallery" class="MagicZoomPlus" rel="preload-selectors-small:false;preload-selectors-big:false;initialize-on:mouseover;smoothing-speed:70;fps:40;selectors-effect:false;show-title:false;loading-msg:Загрузка...;background-opacity:10;zoom-width:420;zoom-height:420;zoom-distance:5;hint-text:;selectors-class:current;buttons:hide;caption-source:span;" ' +
                'href="'+newSrc+'"><img /></a>').find('img').attr('src', newSrc).load(function () {
                target.removeClass('image__preview--loading');
                target.find('img').fadeIn('fast');
            });

            MagicZoomPlus.start('gallery');

        };
    }

	var productGallery = function () {
		var gallery = $('#product-gallery').find('.imgs-list');
		if (gallery.length > 0) {
            gallery.slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                vertical: true,
                verticalSwiping: true,
                prevArrow: '<a class="slick-prev"><i class="fa fa-angle-up"></i></a>',
                nextArrow: '<a class="slick-next"><i class="fa fa-angle-down"></i></a>',
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 478,
                        settings: {
                            slidesToShow: 3
                        }
                    }
                ]
            });
            gallery.on('afterChange', function(event, slick, currentSlide, nextSlide){
                var slide = slick.$slides.get(currentSlide);
                switchImage($(slide.children[0]));
            });
        };
	};
	//Правки от верстальщика
	var stickInfoPanel = function() {
		if (!isMobile && $(window).width() > 768)
			$('.product-single .item__panel').stick_in_parent();
	};
	//конец
	//var stickInfoPanel = function() {
		//$('.product-single .item__panel').stick_in_parent();
	//};

	var complectSlick = function() {
		var complectList = $("#complect .catalog__list");
		if (complectList.find('.catalog__item').length > 1) {
			complectList.slick({
				slidesToShow: 4,
				slidesToScroll: 4,
				autoplay: false,
				arrows: true,
				prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="icon icon-prev-dark"></i></button>',
				nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="icon icon-next-dark"></i></button>',
				responsive: [
					{
						breakpoint: 1380,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 3
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
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
				]
			});
		};
	};

	var checkoutStep = function() {
		$('.checkout-step__heading > a').on('click', function (e) {
			var that = $(this);
			var steps = that.closest('.checkout-step');
			steps.find('.checkout-step__item--open').removeClass('checkout-step__item--open').addClass('checkout-step__item--complete');
			that.closest('.checkout-step__item').removeClass('checkout-step__item--complete').addClass('checkout-step__item--open');
		});
	};

    return {
        init: function () {
			inputCounter();
			addToCart();
			showMore();
			productsCatalog();
			quickBuy();
			productGallery();
			stickInfoPanel();
			complectSlick();
			checkoutStep();
        }
    };
}();

