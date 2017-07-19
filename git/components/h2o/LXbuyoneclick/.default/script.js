function buy_one_click_popup_start(){
	/**
	 * Описываем модальное окно
	 * https://dev.1c-bitrix.ru/api_help/main/js_lib/popup/index.php
	 */
	   var oPopupBuy = new BX.PopupWindow('call_feedback',
	    null, 
		{
		  content: BX( 'buy_one_click_ajaxwrap'), 	
	      autoHide : true,
	      /*titleBar: {content: BX.create("span", {html: '<b>Покупка</b>', 'props': {'className': 'access-title-bar'}})},*/ 
	      offsetTop : 1,
	      offsetLeft : 0,
	      lightShadow : true,
	      closeIcon : true,
	      closeByEsc : true,
	      draggable: {restrict: false},
	      overlay: {
	         backgroundColor: 'grey', opacity: '80'
	      },
          /**
          * Если понадобятся стандартные кнопки битрикса со стандартным аяксом
          */
          /*buttons: [   //это кнопка отправления, на последнем шаге будем удалять ее (другого решения пока нет)
               new BX.PopupWindowButton({
                  text: "Текст кнопки" ,
                  className: "popup-window-button-accept" ,
                  events: {click: function(){
                     BX.ajax.submit(BX("buy_one_click_form"), function(data){ // отправка данных из формы с id="myForm" в файл из action="..."
                     BX( 'buy_one_click_ajaxwrap').innerHTML = data;
                    obSuccess = BX.findChild(BX("buy_one_click_form"), {"class" : "SUCCESS"},true);       //поиск инпута о оспушном создании заказа             
                    obButton = BX.findChild(BX("call_feedback"), {"class" : "popup-window-button-accept"},true); //поиск кнопки отправления
                    if(obSuccess!=null){
                        if(obSuccess.value=='Y'){
                            BX.remove(obButton);  //удаление кнопки
                        }
                    }
                      
                      
	                });

                  }}
               })
               
            ]*/
	   });




	/**
	 * При нажатии на элемент с классом buy_one_click_popup открываем модальное окно oPopupBuy
	 */

	$(document).on('click','.buy_one_click_popup', function(e){
		e.preventDefault();
		var link;
		/*if($(this).data('ajax_id')){
			link = '?AJAX_CALL_BUY_ONE_CLICK='+$(this).data('ajax_id');
		}else{
			link = '?AJAX_CALL_BUY_ONE_CLICK=Y';
		}*/

		var postArray = {
			'H2O_B1C_ELEMENT_ID': $(this).data('id'),
			'AJAX_CALL_BUY_ONE_CLICK': 'Y'
		};
		if($(this).data('ajax_id')){
			postArray.AJAX_CALL_BUY_ONE_CLICK = $(this).data('ajax_id');
		}
    var offer_id = $(this).attr("data-offer-id");
    if ( offer_id !== undefined && offer_id !== false){
      postArray.H2O_B1C_OFFER_ID  = offer_id;
    }
    var quantity = $(this).attr("data-quantity");
    if ( quantity !== undefined && quantity !== false){
      postArray.quantity_b1c  = quantity;
    }
		$.ajax({
			type: "POST",
			data: postArray,
			success: function (data) {
				var obj = $("<div />").html(data);
				$(".buy_one_click_container").html(obj.find(".buy_one_click_container").html());
				/**
				 * Кнопки количества
				 */
				$(".button_set_quantity").on('click', function(e){
					e.preventDefault();
					console.log("click")
					if($(this).hasClass('minus')){
						var cur_val = $(this).parent().find('input[name=quantity_b1c]').val();
						if(cur_val > 1){
							cur_val--;
						}
						$(this).parent().find('input[name=quantity_b1c]').val(cur_val);
					}
					if($(this).hasClass('plus')){
						var cur_val = $(this).parent().find('input[name=quantity_b1c]').val();
						cur_val++;

						$(this).parent().find('input[name=quantity_b1c]').val(cur_val);
					}
					/** Заполнение контейнера с ценой */
					var price_container = $(this).closest("form").find(".item_current_price");
					if(price_container.size() > 0) {
						var start_price = price_container.data('start-price');
						var currency = price_container.data('currency');
						var cur_price = start_price * cur_val;
						price_container.html(BX.Currency.currencyFormat(cur_price, currency, true));
					}



				})
				console.log('show');
				oPopupBuy.show();
			},
			dataType: "html"
		});
	})

	/**
	 * При нажатии на элемент с классом buy_one_click_popup_order открываем модальное окно oPopupBuy
	 */

	$(document).on('click','.buy_one_click_popup_order', function(e){
		e.preventDefault();
		var link;
		var postArray = {
			'AJAX_CALL_BUY_ONE_CLICK': 'Y'
		};
		if($(this).data('ajax_id')){
			postArray.AJAX_CALL_BUY_ONE_CLICK = $(this).data('ajax_id');
		}
		/*if($(this).data('ajax_id')){
			link = '?AJAX_CALL_BUY_ONE_CLICK='+$(this).data('ajax_id');
		}else{
			link = '?AJAX_CALL_BUY_ONE_CLICK=Y';
		}*/
		$.ajax({
			type: "POST",
			data: postArray,
			success: function (data) {
				var obj = $("<div />").html(data);
				$(".buy_one_click_container").html(obj.find(".buy_one_click_container").html());
				/**
				 * Кнопки количества
				 */
				$(".button_set_quantity").on('click', function(e){
					e.preventDefault();
					console.log("click")
					if($(this).hasClass('minus')){
						var cur_val = $(this).parent().find('input[name=quantity_b1c]').val();
						if(cur_val > 1){
							cur_val--;
						}
						$(this).parent().find('input[name=quantity_b1c]').val(cur_val);
					}
					if($(this).hasClass('plus')){
						var cur_val = $(this).parent().find('input[name=quantity_b1c]').val();
						cur_val++;

						$(this).parent().find('input[name=quantity_b1c]').val(cur_val);
					}
					/** Заполнение контейнера с ценой */
					var price_container = $(this).closest("form").find(".item_current_price");
					if(price_container.size() > 0) {
						var start_price = price_container.data('start-price');
						var currency = price_container.data('currency');
						var cur_price = start_price * cur_val;
						price_container.html(BX.Currency.currencyFormat(cur_price, currency, true));
					}
				})
				console.log('show');
				oPopupBuy.show();
			},
			dataType: "html"
		});
	})
   
   
   /**
    * Перехватываем событие отправки формы с классом buy_one_click_form и отправляем ajax запрос
	*/ 
    $(document).on('submit', '.buy_one_click_form', function(e){
    	e.preventDefault();
			var link;
			var postArray = $(this).serialize();
			if($(this).find(".input_ajax_id").size() > 0){
				postArray = postArray + '&AJAX_CALL_BUY_ONE_CLICK='+$(this).find(".input_ajax_id").val();
			}else{
				postArray = postArray + '&AJAX_CALL_BUY_ONE_CLICK=Y';
			}

			$.ajax({
				type: "POST",
				data: postArray,
				success: function (data) {
					var obj = $("<div />").html(data);
									/** если офрмили заказ, то удаляем кнопку отправки формы */
									if(obj.find(".SUCCESS").val()=='Y'){
											obj.find("#buy_one_click_form input.submit").remove();
									}
					$(".buy_one_click_container").html(obj.find(".buy_one_click_container").html());
					/**
						 * Кнопки количества
						 */
						$(".button_set_quantity").on('click', function(e){
							e.preventDefault();
							console.log("click")
							if($(this).hasClass('minus')){
								var cur_val = $(this).parent().find('input[name=quantity_b1c]').val();
								if(cur_val > 1){
									cur_val--;
								}
								$(this).parent().find('input[name=quantity_b1c]').val(cur_val);
							}
							if($(this).hasClass('plus')){
								var cur_val = $(this).parent().find('input[name=quantity_b1c]').val();
								cur_val++;

								$(this).parent().find('input[name=quantity_b1c]').val(cur_val);
							}
							/** Заполнение контейнера с ценой */
							var price_container = $(this).closest("form").find(".item_current_price");
							if(price_container.size() > 0) {
								var start_price = price_container.data('start-price');
								var currency = price_container.data('currency');
								var cur_price = start_price * cur_val;
								price_container.html(BX.Currency.currencyFormat(cur_price, currency, true));
							}
						})
				},
				dataType: "html"
			});
    })

	/** При смене торгового предложения меняем цену */
  $(document).on('change', 'input[name=H2O_B1C_OFFER_ID]', function(){
    var price_container = $(this).closest("form").find(".item_current_price");
    var cur_val = $(this).find("input[name=transparent_input]");
    if(price_container.size()>0){
      var start_price = $(this).data('start-price')
      var currency = $(this).data('currency');
      /*var cur_price = start_price * cur_val;*/
      price_container.html(BX.Currency.currencyFormat(start_price, currency, true));
      price_container.data('start-price', start_price);
      price_container.data('currency', currency);
    }


  })

  /** При смене торгового предложения (select) меняем цену */
  $(document).on('change', 'select[name=H2O_B1C_OFFER_ID]', function(){
    var $this = $(this).find(':selected');
    var price_container = $this.closest("form").find(".item_current_price");
    var cur_val = $this.find("input[name=transparent_input]");
    if(price_container.size()>0){
      var start_price = $this.data('start-price')
      var currency = $this.data('currency');

      price_container.html(BX.Currency.currencyFormat(start_price, currency, true));
      price_container.data('start-price', start_price);
      price_container.data('currency', currency);
    }


  })
    
  /** для шаблона sale.ajax.location popup */
	if(typeof(TCJsUtils) == 'object'){
		TCJsUtils.show = function(oDiv, iLeft, iTop)
		{
			console.log('mod show');
			console.log(oDiv);
			if (typeof oDiv != 'object')
				return;
			//document.getElementById("buy_one_click_ajaxwrap").appendChild(oDiv);
			$("#buy_one_click_ajaxwrap .modal-body").append(oDiv);
			var zIndex = parseInt(oDiv.style.zIndex);
			if(zIndex <= 0 || isNaN(zIndex))
				zIndex = 10000;
			oDiv.style.zIndex = zIndex;
			oDiv.style.left = iLeft + "px";
			oDiv.style.top = iTop + "px";

			return oDiv;
		}
		TCJsUtils.GetRealPos = function(el)
		{
			if(!el || !el.offsetParent)
				return false;
			var res=Array();
			var objParent = el.offsetParent;
			console.log('objParent');
			console.log(objParent);
			res["left"] = el.offsetLeft;
			res["top"] = el.offsetTop;
			/*while(objParent && objParent.id != "buy_one_click_ajaxwrap")
			{
				res["left"] += objParent.offsetLeft;
				res["top"] += objParent.offsetTop;
				objParent = objParent.offsetParent;
			}*/
			res["right"]=res["left"] + el.offsetWidth;
			res["bottom"]=res["top"] + el.offsetHeight;
			res["width"]=el.offsetWidth;
			res["height"]=el.offsetHeight;
			return res;
		}
	}
}
/**
 * Проверка композитности
 */
if (window.frameCacheVars !== undefined) 
{
        BX.addCustomEvent("onFrameDataReceived" , function(json) {
            buy_one_click_popup_start();
        });
} else {
        $(function() {
            buy_one_click_popup_start();
        });
}

