var Index = function () {

	var homeSlider = function () {
		var sl = jQuery("#sl .slider");

		if (sl.length > 0) {
			if (sl.find('.slider__slide').length > 1) {
				sl.slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: true,
					arrows: true,
					dots: true,
					prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="icon icon-prev"></i></button>',
					nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="icon icon-next"></i></button>'
				});
			}
		}
	};

	var brandsCarousel= function () {
		var brands = jQuery(".brands__list");

		if (brands.length > 0) {
			if (brands.find('.item').length > 3) {
				brands.slick({
					slidesToShow: 3,
					slidesToScroll: 3,
					prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="icon icon-prev-dark"></i></button>',
					nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="icon icon-next-dark"></i></button>',
					responsive: [
						{
							breakpoint: 992,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 2
							}
						},
						{
							breakpoint: 478,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}
					]
				});
			}
		}
	};

	var newsCarousel= function () {
		var news = jQuery(".news-slider__list");

		if (news.length > 0) {
			if (news.find('.item').length > 1) {
				news.slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="icon icon-prev-dark"></i></button>',
					nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="icon icon-next-dark"></i></button>'
				});
			}
		}
	};

	var testimonialsCarousel= function () {
		var testimonials = jQuery(".testimonials__list");

		if (testimonials.length > 0) {
			if (testimonials.find('.item').length > 1) {
				testimonials.slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="icon icon-prev-dark"></i></button>',
					nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="icon icon-next-dark"></i></button>'
				});
				$('.testimonials__button-next').on('click', function(e){
					e.preventDefault();
					testimonials.slick('slickNext');
				});
			}
		}
	};

    return {
        init: function () {
			homeSlider();
			brandsCarousel();
			newsCarousel();
			testimonialsCarousel();
        }
    };
}();