var ObjSIze = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};
function sliderAjax(items){
	//var element_blocks = items;
	console.log(items);
	function switchImage(image) {
		//MagicZoomPlus.refresh();
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
			console.log('переключение сработало');
			//MagicZoomPlus.start('#gallery');

		};
		console.log('переключение сработало');
	}
	if(!items.find("#imgs-list").hasClass('slick-initialized')){
		var imageItem = items.on('.imgs-list .item a');
		imageItem.on("click", function (e) {
			e.preventDefault();
			console.log('1');
			switchImage($(this));
		});

		var imgs = items.find(".imgs-list");
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
	}else{
		items.find(".imgs-list").slick('unslick');
		var imageItem = items.find('.imgs-list .item a');
		imageItem.on("click", function (e) {
			e.preventDefault();
			switchImage($(this));
		});

		var imgs = items.find(".imgs-list");
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
	}
}
$(function() {
    // $('.checkout_payment').click();				

    $('.amount .input-number').change(function(){
    	
    	CheckMaxQuantity($(this));

    });

    var checkDelivery = function(el){
        $('.delivary__info').html('<div class="info__heading">'+el.data('name')+'</div>');
        $('.delivary__info').append('<p>'+el.data('desc')+'</p>');
        $('.delivary__info').append('<p>Стоимость: <b>'+el.data('price')+'</b></p>');
    };

    var checkPayment = function(el){
        $('.payment__info').html('<div class="info__heading">'+el.data('name')+'</div>');
        $('.payment__info').append('<p>'+el.data('desc')+'</p>');
    };

	var UpdateCheckoutResult = function(){
		var datatosend = {
			delivery: $('.checkout_delivery:checked').attr('data-price-nf'),
			payment: $('.checkout_payment:checked').data('id'),
			sum: $('.checkout-result .suma-tovar').html(),
			discount: $('.checkout-result .discount').html(),
		};
		$.ajax({
			url: '/bitrix/templates/sp07restail/php/checkout_update.php',
			type: 'GET',
			dataType: 'html',
			data: datatosend,
		})
		.done(function(data) {
			$('.checkout-result').html(data);
		});
	};    



	$('.checkout_delivery').click(function(){
		UpdateCheckoutResult();
		checkDelivery($(this));
	});

	$('.checkout_payment').click(function(){
		checkPayment($(this));
	});
	window.onload = function () {
	var countProduct = $('body').find('.option-panel__cart .num').html();
	$('body').find('.panel__cart .dropdown').empty();
	$('body').find('.panel__cart .dropdown').html('<a href="/personal/cart/"><i class="icon icon-cart-orange shopping-cart"></i><span>Корзина ('+countProduct+')</span></a>');
		
		UpdateCheckoutResult();
		action_update();
	}


 /*
	При переходе с яндекс маркета в строке содержиться якорь,
	но на сайте не выбирается данное торговое предложение.
	Ловим хэш. Ищем в дереве элемент с этим якорем, делаем его активным.
	После чистим hash.
	*/    
    //$(".sku_prop_value").on("click", function () {
    $("body").on("click", "#product_container .sku_prop_value", function () {
		//Ловим hash
		var urlHash = window.location.hash;
		//Чистим его
		urlHash=urlHash.replace('#','');
		//Проверяем есть ли он и запускам скрипт
		if(urlHash !== ''){
			var thisParent = $("#"+urlHash).parent()
			$(thisParent).addClass("active");
			//Чистим hash
			var prop = $(this);
			update_by_sku(prop.closest('#product_container'));
			prop.closest('.product__item').find('.item__input-counter .count').attr('max', prop.data('prop-maxcount'));
			prop.closest('.product-single').find('.item__input-counter .count').attr('max', prop.data('prop-maxcount'));

			CheckMaxQuantity(prop.closest('.product__item').find('.item__input-counter .count'));
			$(window).load(function() {
				var histAPI = !!(window.history && history.pushState);
				if (histAPI && (document.location.hash == "#"+urlHash)) {
					history.replaceState({}, document.title, document.location.pathname + document.location.search)
				}
			});
		}else{
			//В противном случае стандартная работа
			var prop = $(this);
			//vat yandexName = $('.active');
			prop.siblings().removeClass("active");
			prop.addClass("active");
			//update_by_sku(prop.closest('#product_container'));
			update_by_sku(prop.closest('#product_container'));
			prop.closest('.product__item').find('.item__input-counter .count').attr('max', prop.data('prop-maxcount'));
			prop.closest('.product-single').find('.item__input-counter .count').attr('max', prop.data('prop-maxcount'));
			var maxCount = Number(prop.data('prop-maxcount'));
			if(50 <= maxCount){
				prop.closest('.product-single').find('.item__counter').html('<b>Наличие:</b><span><img src="/bitrix/templates/sp07restail/assets/images/cnt-big.png" alt=""></span>');
				prop.closest('.product__item').find('.item__counter').html('<b>Наличие:</b><span><img src="/bitrix/templates/sp07restail/assets/images/cnt-big.png" alt=""></span>');
			}else if(20 <= maxCount && 49 >= maxCount){
				prop.closest('.product-single').find('.item__counter').html('<b>Наличие:</b><span><img src="/bitrix/templates/sp07restail/assets/images/cnt-midle.png" alt=""></span>');
				prop.closest('.product__item').find('.item__counter').html('<b>Наличие:</b><span><img src="/bitrix/templates/sp07restail/assets/images/cnt-midle.png" alt=""></span>');
			}else{
				prop.closest('.product-single').find('.item__counter').html('<b>Наличие:</b><span><img src="/bitrix/templates/sp07restail/assets/images/cnt-little.png" alt=""></span>');
				prop.closest('.product__item').find('.item__counter').html('<b>Наличие:</b><span><img src="/bitrix/templates/sp07restail/assets/images/cnt-little.png" alt=""></span>');
			}
			CheckMaxQuantity(prop.closest('.product__item').find('.item__input-counter .count'));
			MagicZoomPlus.refresh();
		}
    });
	$('body').on('click', '.modal_close', function (e){
		$('#modal_quickby').empty();
	})
	$('body').on('click', '.oneClickBuy', function (e) {
		e.preventDefault();
		var dataForm = $('#modal_quickby');
		var elementId = dataForm.find('#product_container_oneClick').data('id');
		var dataSend2 = {};
		var amount = $('.item_'+elementId+'').find('.addtobasket');
		dataSend2['NAME'] = $('input[name="name"]').val();
		dataSend2['PHONE'] = $('input[name="phone"]').val();
		dataSend2['EMAIl'] = $('input[name="email"]').val();
		dataSend2['IDS'] = $('input[name="id"]').val();
		dataSend2['COUNT'] = $(amount['0']).data('amount');
		dataSend2['PRODUCT_NAME'] = dataForm.find('.product_name').html();
		dataSend2['PRODUCT_PRICE'] = dataForm.find('.new').html();
		//dataSend2['COUNT']  = $('body').find('.item_'+elementId+' .addtobasket').data('amount');
		if(dataSend2['PHONE'] == "" || dataSend2['PHONE'] == " () --" ){
			dataForm.find('.form_required').css({color:"red",fontWeight:"bold"});
			$('input[name="phone"]').attr("placeholder","Укажите номер телефона");
		}else{
			$.ajax({
				type: "POST",
				url: "/bitrix/templates/sp07restail/ajax/quickBuy.php",
				data: dataSend2,
				success: function (data) {
					$('.modalOneClick_'+elementId+' .panel-sport').empty();
					$('.modalOneClick_'+elementId+' .panel-sport').append('<div class="panel-sport__heading">Ваш заказ успешно оформлен!</div><button class="panel-sport__close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" title="Закрыть"><span><i class="fa fa-angle-left"></i></span></button>');
				}
			})
		}
		dataSend2['IDS'] = null;
		dataForm = null;
	});
	$("body").on("click", ".modal-content .sku_prop_value", function () {
			var prop = $(this);
			prop.siblings().removeClass("active");
			prop.addClass("active");
			update_by_sku_oneClick(prop.closest('#product_container_oneClick'));
			prop.closest('.product__item').find('.item__input-counter .count').attr('max', prop.data('prop-maxcount'));
			prop.closest('.product-single').find('.item__input-counter .count').attr('max', prop.data('prop-maxcount'));
			var maxCount = Number(prop.data('prop-maxcount'));
			CheckMaxQuantity(prop.closest('.product__item').find('.item__input-counter .count'));
    });
	
	function update_by_sku_oneClick(element_block) {
        let tree = element_block.data('tree'), prod_id = element_block.data('id'),ind;
        for(ind in tree){}
        if(ObjSIze(tree[ind].TREE)>1){
            //get the largest param
            let max_vals = 0, max_id = 0, pblocks = element_block.find('.prop')
            $.each(pblocks,function(){
                let vals = $(this).find('.value').length;
                if(vals > max_vals){
                    max_vals = vals;
                    max_id = $(this).closest('.prop').data('prop-id')
                }
			})
			// for(let count in tree){
                // let subtree = tree[count].TREE
					// for (let setInteger in subtree){
						// subtree[setInteger] = Number(subtree[setInteger]);
					// }
                // }
			// for(var count2 in tree){
					// tree[count2]["ID"] = Number(tree[count2]["ID"]);
                // }
            //hide all params, without maxparam
            $.each(pblocks,function(){
                if($(this).closest('.prop').data('prop-id')!==max_id){
                    $(this).find('.value').hide();
                }
            })
            //show params, what are compared to max_param
            for(var i in tree){
                var subtree = tree[i].TREE
                if($(".item_oneclick_"+prod_id+" [data-onevalue="+subtree['PROP_'+max_id]+"]").hasClass('active')){//if max_prop isactive
                    for(var j in subtree){
                        if(j !== 'PROP_'+max_id){//if not largest
                            $(".item_oneclick_"+prod_id+" [data-onevalue="+subtree[j]+"]").show()
                        }
                    }
                }
			}
			
			var flagV = false;
            $.each(pblocks,function(){
                if($(this).closest('.prop').data('prop-id')!==max_id){
                    if($(this).find('.value.active').is(':hidden') || !$(this).find('.value.active').length){
                        $(this).find('.value.active').removeClass('active');
                        $.each($(this).find('.value'),function(){
                            if($(this).css('display') !== 'none' && !flagV){
                                flagV = true;
                                $(this) .addClass('active');return;
                            }
                        })
                    }
                }
            })
			
		}
		
		var active_props = {};
        element_block.find(".sku_props .sku_prop").each(function () {
            active_props[$(this).data("prop-id")] = $(this).find(".sku_prop_value.active").data("value-id");
        });
        var data_to_send = {};
        data_to_send["props"] = active_props;
        data_to_send["element_id"] = element_block.find(".sku_props .sku_prop").data("element-id");


        if(typeof element_block.find(".sku_prop_value.active").data("value")!=="undefined"){
            element_block.find(".addtobasket").attr("data-price-id", element_block.find(".sku_prop_value.active:last").attr("data-price-id"));

        }

        $.ajax({
            url: "/bitrix/templates/sp07restail/php/update_element_by_sku.php",
            data: data_to_send,
            success: function (data) {
                if (data != "null") {
                    data = eval("(" + data + ")");
					if (data.price)
						 element_block.find(".item__price .new").text(data.price);
					if (data.id)
						element_block.find(".oneClickBuy").attr("data-id", data.id);
						element_block.find('input[name="id"]').val(data.id);
                    }
                }
        });
	};
		
    function update_by_sku(element_block) {
        let tree = element_block.data('tree'), prod_id = element_block.data('id'),ind;
        for(ind in tree){}
        if(ObjSIze(tree[ind].TREE)>1){
            //get the largest param
            let max_vals = 0, max_id = 0, pblocks = element_block.find('.prop')
            $.each(pblocks,function(){
                let vals = $(this).find('.value').length;
                if(vals > max_vals){
                    max_vals = vals;
                    max_id = $(this).closest('.prop').data('prop-id')
                }
            })
			// for(let count in tree){
                // let subtree = tree[count].TREE
					// for (let setInteger in subtree){
						// subtree[setInteger] = Number(subtree[setInteger]);
					// }
                // }
			// for(var count2 in tree){
					// tree[count2]["ID"] = Number(tree[count2]["ID"]);
                // }
            //hide all params, without maxparam
            $.each(pblocks,function(){
                if($(this).closest('.prop').data('prop-id')!==max_id){
                    $(this).find('.value').hide();
                }
            })
            //show params, what are compared to max_param
            for(var i in tree){
                var subtree = tree[i].TREE
                if($(".item_"+prod_id+" [data-onevalue="+subtree['PROP_'+max_id]+"]").hasClass('active')){//if max_prop isactive
					// for (var setInteger in subtree){
						// subtree[setInteger] = Number(subtree[setInteger]);
					// }
                    for(var j in subtree){
                        if(j !== 'PROP_'+max_id){//if not largest
                            $(".item_"+prod_id+" [data-onevalue="+subtree[j]+"]").show()
                        }
                    }
                }
            }
            //
            var flagV = false;
            $.each(pblocks,function(){
                if($(this).closest('.prop').data('prop-id')!==max_id){
                    if($(this).find('.value.active').is(':hidden') || !$(this).find('.value.active').length){
                        $(this).find('.value.active').removeClass('active');
                        $.each($(this).find('.value'),function(){
                            if($(this).css('display') !== 'none' && !flagV){
                                flagV = true;
                                $(this) .addClass('active');return;
                            }
                        })
                    }
                }
            })
         /*
             $.each(pblocks,function(){
             if($(this).closest('.prop').data('prop-id')!==max_id){
             if($(this).find('.value.active').is(':hidden') || !$(this).find('.value.active').length){
             $(this).find('.value.active').removeClass('active');
             $.each($(this).find('.value'),function(){

             })
             }
             }
             })
             */
        }
        var active_props = {};
        element_block.find(" .sku_props .sku_prop").each(function () {
            active_props[$(this).data("prop-id")] = $(this).find(".sku_prop_value.active").data("value-id");
        });
        var data_to_send = {};
        data_to_send["props"] = active_props;
        data_to_send["element_id"] = element_block.find(".sku_props .sku_prop").data("element-id");


        if(typeof element_block.find(".sku_prop_value.active").data("value")!=="undefined"){
            element_block.find(".addtobasket").attr("data-price-id", element_block.find(".sku_prop_value.active:last").attr("data-price-id"));

        }

        $.ajax({
            url: "/bitrix/templates/sp07restail/php/update_element_by_sku.php",
            data: data_to_send,
            success: function (data) {
                if (data != "null") {
                    data = eval("(" + data + ")");
                   // if (data.price_id)
                     //   element_block.find(".addtobasket").attr("data-price-id", data.price_id);
                    if (data.price)
                        element_block.find(".item__price .new").text(data.price);
                    if (data.old_price)
                        element_block.find(".item__price .old").text(data.old_price);
                    if (data.id)
                        element_block.find(".buy-card-fast").attr("href", "/include/catalog/element/oneclick.php?id=" + data.id + "&priceid=" + data.price_id);
					//Для Руслана. Попутно в кнопке меняем data-id
						element_block.find(".addtobasket").attr("data-id", data.id);
					if (data.section_image && element_block.find(".section-item-image").length > 0)
                        element_block.find(".section-item-image").attr("src", data.section_image);
					if(data.photos_small){
						console.log('попали');
						if(element_block.find('#imgs-lists').hasClass('slick-initialized')){
							element_block.find(".imgs-list").slick('unslick')
						}
						element_block.find(".imgs-list").empty();
						element_block.find(".image__preview").empty();
						$.each(data.photos_small, function (key, value) {
                            // element_block.find("ul.pagination").append('<li><a href="'+data.photos_full[key]+'" class="fancybox detail-small-image" rel="gallery"><img src="'+value+'" alt=""></a></li>');
                            element_block.find(".imgs-list").append('<div class="item"><a onclick="return false;" href="' + data.photos_full[key] + '" data-preview="' + data.photos_full[key] + '" data-source="image"><img src="' + data.photos_full[key] + '" alt=""/></a></div>');
                        });
						$.each(data.photos_full, function (key, value) {
                            if (key == 0) {
                                element_block.find('.image__preview').html('<a href="'+value+'" id="gallery" class="MagicZoomPlus" rel="preload-selectors-small:false;preload-selectors-big:false;initialize-on:mouseover;smoothing-speed:70;fps:40;selectors-effect:false;show-title:false;loading-msg:Загрузка...;background-opacity:10;zoom-width:420;zoom-height:420;zoom-distance:5;hint-text:;selectors-class:current;buttons:hide;caption-source:span;"><img src="'+value+'" alt=""/></a>');
                                if (element_block.find('.item__image_grid'))
                                    element_block.find('.item__image_grid').html('<img src="' + value + '" alt="">');
								}
							});
						element_block.find('.imgs-list').slick({
								slidesToShow: 2,
								slidesToScroll: 2,
								autoplay: false,
								vertical: true,
								verticalSwiping: true,
								prevArrow: '<a class="slick-prev"><i class="fa fa-angle-up"></i></a>',
								nextArrow: '<a class="slick-next"><i class="fa fa-angle-down"></i></a>'
							})
							//MagicZoomPlus.refresh();
					}
					if(!element_block.find('.imgs-list').hasClass('slick-initialized')){
						element_block.find('.imgs-list').slick({
							slidesToShow: 2,
							slidesToScroll: 2,
							autoplay: false,
							vertical: true,
							verticalSwiping: true,
							prevArrow: '<a class="slick-prev"><i class="fa fa-angle-up"></i></a>',
							nextArrow: '<a class="slick-next"><i class="fa fa-angle-down"></i></a>'
						});
					}
					//MagicZoomPlus.refresh();
				}
			}
		});
	}
	$('body').on('click', '.product__item .imgs-list .item a', function (e) {
        	e.preventDefault();
            switchImages($(this));
        });
	function switchImages(image) {
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

            MagicZoomPlus.refresh();

        };
    }
	// Home filter
	
	$(".fast-filter select[name='pol']").change(function() {
		var t_pol = $(this).val();
		$.ajax({
			type: "POST",
			url: "/bitrix/templates/sport07/php/filter_lv2.php",
			data: {
				pol: t_pol,
				pol_name: $(".fast-filter select[name='pol'] option:selected").text()
			},
			success: function(data) {
				$(".fast-filter select[name='kind']").html(data);
				$(".fast-filter select[name='section']").html('<option value="0">РўРѕРІР°СЂ</option>');
				$(".fast-filter select[name='size']").html('<option value="0">Р Р°Р·РјРµСЂ</option>');
			}
		});
	});
	
	$(".fast-filter select[name='kind']").change(function() {
		var t_pol = $(".fast-filter select[name='pol']").val();
		var t_kind = $(this).val();
		$.ajax({
			type: "POST",
			url: "/bitrix/templates/sport07/php/filter_lv3.php",
			data: {
				pol: t_pol,
				kind: t_kind
			},
			success: function(data) {
				$(".fast-filter select[name='section']").html(data);
				$(".fast-filter select[name='size']").html('<option value="0">Р Р°Р·РјРµСЂ</option>');
			}
		});
	});
	
	$(".fast-filter select[name='section']").change(function() {
		var t_pol = $(".fast-filter select[name='pol']").val();
		var t_section = $(this).val();
		$.ajax({
			type: "POST",
			url: "/bitrix/templates/sport07/php/filter_lv4.php?" + t_pol + "=Y&set_filter=РџРѕРєР°Р·Р°С‚СЊ",
			data: {
				section: t_section
			},
			success: function(data) {
				$(".fast-filter select[name='size']").html(data);
			}
		});
	});
	
	$(".fast-filter input[type='submit']").click(function(e) {
		e.preventDefault();
		var e_id = $(".fast-filter select[name='section']").val();
		var t_pol = $(".fast-filter select[name='pol']").val();
		var t_size = $(".fast-filter select[name='size']").val();
		$.ajax({
			type: "POST",
			url: "/bitrix/templates/sport07/php/filter_lv5.php",
			data: {
				id: e_id
			},
			success: function(msg) {
				document.location.href = msg + "?" + t_pol + "=Y&" + t_size + "=Y&set_filter=РџРѕРєР°Р·Р°С‚СЊ";
			}
		});
	});
	
	$('body').on("click", "a.ajax-load", function(e) {
		e.preventDefault();
		var url = $(this).attr('href')+'&view='+$(this).data('type-load');
		var type = $(this).data('catalog-type');
		$('.ajax-pager-wrap').find('.pager-navigation').empty();
		$('.ajax-pager-wrap').find('.pager-navigation').append('<img src="/bitrix/templates/sp07restail/ajax/images/89.gif">');
		$.ajax({
    		url: url,
    		type: 'GET',
    		dataType: 'html',
    	})
		.done(function(data) {
			//$('body').find(".product-list .product__item .imgs-list").slick('unslick'); 
			if(type == 'grid'){
				$('.ajax-pager-wrap').remove();
				$(".product-grid > div:last-child").remove();
				$('.product-grid').append(data);
				//$.getScript('https://anti-vk.com/bitrix/templates/sp07restail/js/other.js');
				setTimeout(function () {
					//Убрано из за задваивания скриптов после
					//Shop.init();
					$('body').find('.sku_prop').each(function(){
						$(this).find('.sku_prop_value:first-child').click();
					});
				}, 2000);
				MagicZoomPlus.refresh();
			}else{
				$('.ajax-pager-wrap').remove();
				$(".product-list > div:last-child").remove();
				$('.product-list').append(data);
				//$.getScript('https://anti-vk.com/bitrix/templates/sp07restail/assets/js/shop.js');
				setTimeout(function () {
					//Убрано из за задваивания скриптов после
					//Shop.init();
					$('body').find('.sku_prop').each(function(){
						$(this).find('.sku_prop_value:first-child').click();
					});
				}, 2000);
				MagicZoomPlus.refresh();
			}
    	});
	});
	
	// Fancybox
	
	//$(".fancybox").fancybox();
	
	// Temp Sidebar
	
	var tmpSidebar = $(".to_sidebar");
	if(tmpSidebar) {
		$("header .header-sidebar nav").html(tmpSidebar.html());
		tmpSidebar.hide();
	}
	
	// Amount
	// $(document).on('click',".amount .minus",function(){
	// 	update_amount("m", $(this));
	// });

	// $(document).on('click',".amount .plus",function(){
	// 	update_amount("p", $(this));
	// });
	function update_amount(type, this_v) {
		var buy_block = this_v.closest('.item__panel');
		var amount = this_v.closest('.amount');
		var value = parseInt(amount.find(".num-amount").attr("data-amount"));
		if(type == "m" && value>=1) value--;
		if(type == "p") value++;
		if(!buy_block.hasClass("small-b") && !buy_block.hasClass("big-b")) {
			buy_block.find(".addtobasket").attr("data-amount", value);
			amount.find(".num-amount").attr("data-amount", value);
			amount.find(".num-amount b:first-child").text(value);
			amount.parent().parent().find(".cover-buy p span").text(value);
		} else {
			var item_id = amount.attr("data-item-id");
			$.ajax({
				url: "/bitrix/templates/sport07/php/change_quantity.php",
				data: {
					id: item_id,
					quantity: value
				},
				success: function(data) {
					small_basket_full_price_update();
					big_basket_update();
				}
			});
			$(".amount[data-item-id='"+ item_id +"']").find(".num-amount").attr("data-amount", value);
			$(".amount[data-item-id='"+ item_id +"']").find(".num-amount b:first-child").text(value);
		}
	}
	
	// Small Basket

	$(document).on('click',".del-p",function(event){
		element = $(this);
		event.preventDefault();
		$.ajax({
			url: "/bitrix/templates/sport07/php/delete_from_cart.php",
			data: {
				id: $(this).attr("data-item-id")
			},
			success: function(data) {
				small_basket_full_price_update();
				element.parent().toggle();
			}
		});
	});
	
	$(document).on('click',".del-bakset-page",function(event){
		element = $(this);
		$.ajax({
			url: "/bitrix/templates/sport07/php/delete_from_cart.php",
			data: {
				id: $(this).attr("data-item-id")
			},
			success: function(data) {
				big_basket_update();
			}
		});
	});
/*
	$(".addtobasket").on("click", function(event) {
		event.preventDefault();
		
		var active_props = [];
		$(document).find(".sku_prop").each(function() {
			active_prop = {}
			active_prop["NAME"] = $(this).find(".sku_prop_name").text().replace(":", "");
			active_prop["CODE"] = $(this).data("prop-code");
			active_prop["VALUE"] = $(this).find(".bx_active").data("value");
			active_props.push(active_prop);
		});
		
		var data_to_send = {};
		data_to_send["props"] = active_props;
		data_to_send["price_id"] = $(this).attr("data-price-id");
		data_to_send["amount"] = $(this).attr("data-amount");
		
		var button = $(this);
		
		$.ajax({
			url: "/bitrix/templates/sport07/php/add_to_cart.php",
			data: data_to_send,
			success: function(data) {
				if(button.hasClass("elementpage")) {
					$.fancybox.open([{
						type: 'ajax',
						href: '/bitrix/templates/sport07/php/add2basket_successful.php'
					}], {
						padding: 20
					});
				}
				small_basket_update();
			}
		});
		$(this).parent().parent().find(".cover-buy").show();
	});
*/	
//Отправка статистики в Яндекс комерцию
	function YaAddSku(){
		var productType = $('.product__type').attr("data-product-type");
		var idOffer = $('.active').attr("data-product-id");
		var idProduct = $('.product__id').attr("data-product-id");
		var productName = $('.item__name').attr("data-product-name");
		var productAmount = $(".count").val();
		var productPrice = $(".product-single__price").find(".new");
		productPrice = $(productPrice).html();
		if(productType == 1){
			var id = idOffer;
		}else{
			var id = idProduct;
		}
		dataLayerSp07.push({
					"ecommerce": {
						"add": {
							"products": [
								{
								"id": id,
								"name" : productName,
								"quantity": productAmount,
								"price": productPrice
								},
							]
						}
					}
				});
	}

	//$(".addtobasket").on("click", function(event) {
		//Для Руслана. Добавил условие 
	$("body").on("click" ,".addtobasket", function(event) {
		event.preventDefault();
		var active_props = [];
		$(this).closest('#product_container').find(".sku_prop").each(function() {
                    if(typeof $(this).find(".sku_prop_value.active").data("value")!=="undefined"){
			active_prop = {}
			active_prop["NAME"] = $(this).find(".name").text().replace(":", "");
			active_prop["CODE"] = $(this).data("prop-code");
			active_prop["VALUE"] = $(this).find(".sku_prop_value.active").data("value");
			active_props.push(active_prop);
                    }
		});
		
		var data_to_send = {};
		data_to_send["props"] = active_props;
		data_to_send["price_id"] = $(this).attr("data-price-id");
		data_to_send["product_id"] = $(this).attr("data-id");
		data_to_send["amount"] = $(this).attr("data-amount");
		var buyUrl = $(this).data("buy-url");
		var send_url_buy = buyUrl+"?&action=BUY&id="+data_to_send["product_id"]+"&quantity="+data_to_send["amount"];
		
		var button = $(this);
		//if(!data_to_send["price_id"]){
		$.ajax({
			url: "/bitrix/templates/sp07restail/php/addToCartNew.php",
			data: data_to_send,
			type: 'POST',
			//dataType: 'json',
			success: function(data){
				UpdateFull.init();
				YaAddSku();
				action_update();
			}
		});
		// }else{
			// $.ajax({
			// url: send_url_buy,
			// type: 'GET',
			// success: function(data) {
				// UpdateFull.init();
				// YaAddSku();
				// action_update();
			// }
		// });
		// }
		$(this).parent().parent().find(".cover-buy").show();
	});

	$(".del-buy").click(function(){
		$(this).parent().hide();
	});

	$(".buy-more").click(function(){
		$(this).parent().hide();
	});

	$(".submit-cupon").on("click", function(event) {
		event.preventDefault();
		$.ajax({
			url: "/bitrix/templates/sport07/php/set_coupon.php",
			data: {
				coupon: $(".input-kupon").val()
			},
			success: function(data) {
				big_basket_update();
			}
		});
	});
	
	function small_basket_update() {
		$.ajax({
			url: "/bitrix/templates/sp07restail/php/basket_small.php",
			success: function(data) {
				$(".small-basket").html(data);
			}
		});
	}
	
	function big_basket_update() {
		$.ajax({
			url: "/bitrix/templates/sp07restail/php/basket_big.php",
			success: function(data) {
				$(".big-basket").html(data);
			}
		});
	}
	
	function alertBasket(){
		idleTimer = null;
		idleState = false; // состояние отсутствия
		idleWait = 150000; // время ожидания в мс. (1/1000 секунды)
		var dateNow = Math.floor(new Date() / 1000);
		function get_cookie(cookie_name){
			var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
				if(results)
					return ( unescape ( results[2] ) );
				else
					return null;
		}
		function delete_cookie ( cookie_name ){
			var cookie_date = new Date ( );  // Текущая дата и время
			cookie_date.setTime ( cookie_date.getTime() - 1 );
			document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
		}
		function set_cookie(name, value, exp_y, exp_m, exp_d, path, domain, secure){
			var cookie_string = name + "=" + escape ( value );
			if(exp_y){
				var expires = new Date ( exp_y, exp_m, exp_d );
				cookie_string += "; expires=" + expires.toGMTString();
				}
				if(path)
					cookie_string += "; path=" + escape ( path );
				if(domain)
					cookie_string += "; domain=" + escape ( domain );
				if(secure)
					cookie_string += "; secure";
				document.cookie = cookie_string;
		}
		//delete_cookie ("alertBasket");
		//set_cookie('alertBasketOpen', 'YES');
		var xx = document.cookie;
		var x = get_cookie('alertBasket');
		var d = get_cookie('alertBasketOpen');
		if(x == null){
			document.cookie = "alertBasket="+dateNow;
		}
		if(dateNow - x < 172800){
				if(dateNow - x <= 300){
				set_cookie('alertBasketOpen', 'YES');
				}else{
					$('.alert-basket').trigger('click');
					document.cookie = "alertBasket="+dateNow;
				};
			//document.cookie = "alertBasketOpen=asdasdasd";
		}
		if(dateNow - x > 172800){
			document.cookie = "alertBasket="+dateNow;
		}
		  $(document).bind('mousemove keydown scroll', function(){
			clearTimeout(idleTimer); // отменяем прежний временной отрезок
			//if(idleState == true){ 
			  // Действия на возвращение пользователя
			   //$("body").append("<p>С возвращением!</p>");
			//}
		 
			idleState = false;
			idleTimer = setTimeout(function(){ 
			  // Действия на отсутствие пользователя
			  $('.alert-basket').trigger('click');
			  //$("body").append("<p>Вы отсутствовали более чем " + idleWait/1000 + " секунд.</p>");
			  idleState = true; 
			}, idleWait);
		  });
		 
		  $("body").trigger("mousemove"); // сгенерируем ложное событие, для запуска скрипта
	}
	
	function action_update(){
		$.ajax({
			url: "/bitrix/templates/sp07restail/php/action_cart.php",
			success: function(data){
				data = eval("(" + data + ")");
				var discountObj;
				if(data["APPLIED_DISCOUNT_LIST"] != null){
				data["APPLIED_DISCOUNT_LIST"].forEach(function(entry){
					if(entry['NAME'] == 'basket')
						discountObj = entry;
				})
				}
				var discountAction = data['PRICE_WITHOUT_DISCOUNT'].replace(/руб./g, '');
				var discountAction = discountAction.replace(/ /g, '');
				if(discountAction <= 3000)
					{
					var sumForAction = 3000 - discountAction;
					var sumForDelivery = 5000 - discountAction;
					$("#product_container").find(".advants__item--red").html('');
					$("#product_container").find(".advants__item--red").append("<span>5%</span><p>До скидки 5% осталось купить на "+sumForAction+" р.</p>");
					$("#product_container").find(".advants__item--green").html('');
					$("#product_container").find(".advants__item--green").append("<span><i class=\"icon icon-car\"></i></span><p>До бесплатной доставки осталось купить на "+sumForDelivery+" р.</p>");
					}
					else{
					$("#product_container").find(".advants__item--red").html('');
					$("#product_container").find(".advants__item--red").append("<span>5%</span><p>Скидка 5 % АКТИВИРОВАНА</p>");
					if(discountAction <= 5000){
						var sumForDelivery = 5000 - discountAction;
						$("#product_container").find(".advants__item--green").html('');
						$("#product_container").find(".advants__item--green").append("<span><i class=\"icon icon-car\"></i></span><p>До бесплатной доставки осталось купить на "+sumForDelivery+" р.</p>");
					}else{
						$("#product_container").find(".advants__item--green").html('');
						$("#product_container").find(".advants__item--green").append("<span><i class=\"icon icon-car\"></i></span><p>Бесплатная доставка активирована</p>");
					}
					}
				}
		});
	}
	
	
	function small_basket_full_price_update() {
		$.ajax({
			url: "/bitrix/templates/sp07restail/php/get_total_price.php",
			success: function(data) {
				var isactive = $(".small-basket .basket").hasClass('active');
				$(".small-basket").html(data)
				if(isactive){
					$(".small-basket .basket").addClass('active');
					$(".small-basket .list-order").show();
				}
			}
		});
	}
	
	// Other
	
	$(document).on('click','header .basket',function(){
		$(this).toggleClass("active");
		$('header .login-link').removeClass("active");
		$('header .list-order').slideToggle('fast');
		$('header .login-sub').slideUp('fast');
	});

	$(".filter-catalog .title-filter span").click(function(){
		$(this).toggleClass("active");
		$('.main-filter').slideToggle('fast');
	});

	$(".select-color-product div span:first").addClass("active");
	$('.select-color-product span').click(function(){
		$(this).addClass('active').siblings().removeClass('active');
	});

	$('.select-size-product.filter span').click(function(){
		var input = $("input[name='"+$(this).attr("id")+"']");
		if($(this).hasClass("active")) {
			input.attr('checked', false);
			$(this).removeClass("active");
		} else {
			input.attr('checked', true);
			$(this).addClass('active');
		}
	});

	$("header .login-link").click(function(){
		$(this).toggleClass("active");
		$('header .basket').removeClass("active");
		$('header .login-sub').slideToggle('fast');
		$('header .list-order').slideUp('fast');
	});
	
	$(document).on('click','.fixed-header .basket',function(){
		$(this).toggleClass("active");
		$('.fixed-header .login-link').removeClass("active");
		$('.fixed-header .list-order').slideToggle('fast');
		$('.fixed-header .login-sub').slideUp('fast');
	});

	$(".fixed-header .login-link").click(function(){
		$(this).toggleClass("active");
		$('.fixed-header .basket').removeClass("active");
		$('.fixed-header .login-sub').slideToggle('fast');
		$('.fixed-header .list-order').slideUp('fast');
	});

	$(".icon-m-1").click(function(){
		$(".phone-mobile").removeClass("active");
		$(this).toggleClass("active").siblings().removeClass("active");
		$('.hidden-nav').slideToggle("fast");
		$('.hidden-search').slideUp("fast");
		$('.hidden-phone').slideUp("fast");
	});

	$(".icon-m-2").click(function(){
		$(".phone-mobile").removeClass("active");
		$(this).toggleClass("active").siblings().removeClass("active");
		$('.hidden-search').slideToggle("fast");
		$('.hidden-nav').slideUp("fast");
		$('.hidden-phone').slideUp("fast");
	});

	$(".icon-m-3").click(function(){
		$(this).toggleClass("active").siblings().removeClass("active");
		$(".search-mobile").removeClass("active");
		$('.hidden-phone').slideToggle("fast");
		$('.hidden-nav').slideUp("fast");
		$('.hidden-search').slideUp("fast");
	});


	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

	$(".tab_content_card").hide(); //Hide all content
	$("ul.tabs_card li:first").addClass("active").show(); //Activate first tab
	$(".tab_content_card:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs_card li").click(function() {
		$("ul.tabs_card li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content_card").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});
        MagicZoomPlus.refresh()
});
$(function() {

	var marquee = $("#marquee"); 
	marquee.css({"overflow": "hidden", "width": "100%"});

	marquee.wrapInner("<span>");
	marquee.find("span").css({ "width": "50%", "display": "inline-block", "text-align":"center" }); 
	marquee.append(marquee.find("span").clone()); 

	marquee.wrapInner("<div>");
	marquee.find("div").css("width", "200%");

	var reset = function() {
		$(this).css("margin-left", "0%");
		$(this).animate({ "margin-left": "-100%" }, 24000, 'linear', reset);
	};

	reset.call(marquee.find("div"));
        
        $(".imgs-list").on('hover, click','.item a', function(){
            var preview = $(this).parent().parent().parent().parent().next();
            var href = $(this).attr('href');
            var src = $(this).find('img').attr('src');
            preview.find('a').attr('href',href);
            preview.find('img').attr('src',src);
            MagicZoomPlus.refresh()
            return false;
        })
});
	var q = new Date;
	var year = q.getFullYear();
	var month = q.getMonth();
	var day = q.getDate()+1;
	var hour = 0;
	var minute = 0;
	var sec = 0;
	delete q;
	dateFuture = new Date(year, month, day, hour, minute, sec);
	function CountBox() {
	dateNow = new Date;
	amount = dateFuture.getTime() - dateNow.getTime();
	delete dateNow;
	if (amount < 0) {
	out = "<div class='countbox-space'></div>" +
	"<div class='countbox-num'><div id='countbox-hours1'><span></span>0</div><div id='countbox-hours2'><span></span>0</div><div id='countbox-hours-text'></div></div>" +
	"<div class='countbox-space'></div>" +
	"<div class='countbox-num'><div id='countbox-mins1'><span></span>0</div><div id='countbox-mins2'><span></span>0</div><div id='countbox-mins-text'></div></div>" +
	"<div class='countbox-space'></div>" +
	"<div class='countbox-num'><div id='countbox-secs1'><span></span>0</div><div id='countbox-secs2'><span></span>0</div><div id='countbox-secs-text'></div></div>";
	document.getElementById("countbox").innerHTML = out
	} else {
	days = 0;
	days1 = 0;
	days2 = 0;
	hours = 0;
	hours1 = 0;
	hours2 = 0;
	mins = 0;
	mins1 = 0;
	mins2 = 0;
	secs = 0;
	secs1 = 0;
	secs2 = 0;
	out = "";
	amount = Math.floor(amount / 1e3);
	days = Math.floor(amount / 86400);
	days1 = (days >= 10) ? days.toString().charAt(0) : '0';
	days2 = (days >= 10) ? days.toString().charAt(1) : days.toString().charAt(0);
	amount = amount % 86400;
	hours = Math.floor(amount / 3600);
	hours1 = (hours >= 10) ? hours.toString().charAt(0) : '0';
	hours2 = (hours >= 10) ? hours.toString().charAt(1) : hours.toString().charAt(0);
	amount = amount % 3600;
	mins = Math.floor(amount / 60);
	mins1 = (mins >= 10) ? mins.toString().charAt(0) : '0';
	mins2 = (mins >= 10) ? mins.toString().charAt(1) : mins.toString().charAt(0);
	amount = amount % 60;
	secs = Math.floor(amount);
	secs1 = (secs >= 10) ? secs.toString().charAt(0) : '0';
	secs2 = (secs >= 10) ? secs.toString().charAt(1) : secs.toString().charAt(0);
	out = "<div class='countbox-num'><div id='countbox-hours1'><span></span>" + hours1 + "</div><div id='countbox-hours2'><span></span>" + hours2 + "</div><div id='countbox-hours-text'></div></div>" +
	"<div class='countbox-space'></div>" +
	"<div class='countbox-num'><div id='countbox-mins1'><span></span>" + mins1 + "</div><div id='countbox-mins2'><span></span>" + mins2 + "</div><div id='countbox-mins-text'></div></div>" +
	"<div class='countbox-space'></div>" +
	"<div class='countbox-num'><div id='countbox-secs1'><span></span>" + secs1 + "</div><div id='countbox-secs2'><span></span>" + secs2 + "</div><div id='countbox-secs-text'></div></div>";
	//document.getElementById("countbox").innerHTML = out;
	setTimeout("CountBox()", 1e3)
	}
	}
	window.onload = function () {
	UpdateCheckoutResult()
}
$('.gotop').on('click', function (e) {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
            e.preventDefault();
        });
		$(window).scroll(function () {
			if ($(this).scrollTop() > 200) {
				$('.gotop').fadeIn();
			} else {
				$('.gotop').fadeOut();
			}
		});
		
var availableTags = [
  "РџСЂРёРјРµСЂ",
  "Р•С‰Рµ РІР°СЂРёР°РЅС‚ РїСЂРёРјРµСЂР°"
];