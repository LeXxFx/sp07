var UpdateFull = function () {

	var updatepanel = function(){
		$.ajax({
    		url: '/bitrix/templates/sp07restail/ajax/PanelBasketUpdate.php',
    		type: 'GET',
    		dataType: 'html',
    	})
    	.done(function(data) {
			//console.log(data);
    		$('.option-panel__cart').html(data);
			var countProduct = $('body').find('.option-panel__cart .num').html();
			$('body').find('.panel__cart .dropdown').empty();
			$('body').find('.panel__cart .dropdown').html('<a href="/personal/cart/"><i class="icon icon-cart-orange shopping-cart"></i><span>Корзина ('+countProduct+')</span></a>');
    	});
		//console.log("updateBasketPanelSucces");
	};
	
	var alertBasket = function(){
		$.ajax({
    		url: '/bitrix/templates/sp07restail/ajax/CountBasket.php',
    		type: 'GET',
    		dataType: 'html',
    	})
    	.done(function(data) {
			data = eval("(" + data + ")");
			if(data['COUNT'] > 0){
				//console.log("updateBasketPanelSucces");
		var BasketProductCount = $('body').find('.option-panel__cart .num').html();
		console.log(BasketProductCount);
		idleTimer = null;
		idleState = false; // состояние отсутствия
		idleWait = 60000; // время ожидания в мс. (1/1000 секунды)
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
		//console.log(xx);
		//console.log(dateNow);
		if(x == null){
			//document.cookie = "alertBasket="+dateNow;
			set_cookie("alertBasket", dateNow);
			x = dateNow;
		}
		var exDate = dateNow - x;
		//console.log(exDate);
		if(exDate < 172800){
				if(exDate <= 300){
				set_cookie('alertBasketOpen', 'YES');
				set_cookie("alertBasket", dateNow);
				}else{
					set_cookie("alertBasket", dateNow);
					set_cookie('alertBasketOpen', 'NO');
					$('.alert-basket').trigger('click');
					//document.cookie = "alertBasket="+dateNow;
				};
			//document.cookie = "alertBasketOpen=asdasdasd";
		}
		if(exDate > 172800){
			console.log('меньше');
			document.cookie = "alertBasket="+dateNow;
		}
		//console.log(x);
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
    	});
	}


	return {
        init: function () {
			updatepanel();
			//alertBasket();
        }
    };
}();

