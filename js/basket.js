    $(function() {
    	var updatepanel = function(){
    		$.ajax({
        		url: '/bitrix/templates/sp07restail/ajax/PanelBasketUpdate.php',
        		type: 'GET',
        		dataType: 'html',
        	})
        	.done(function(data) {
        		$('.option-panel__cart').html(data);
			});
    	};

        // $('.btn-quick-buy, .btn-add-to-cart').click(function(){
        // 	var parentbtn = $(this);
        // 	data2send = {
        // 			action: '', 
        // 			product_id: parentbtn.data('price-id'), 
        // 			count: +parentbtn.closest('.item__wrap').find('.input-area.count').val()
        // 		};
        // 	if (parentbtn.hasClass('btn-quick-buy')) data2send['action']='BUY';
        // 	if (parentbtn.hasClass('btn-add-to-cart')) data2send['action']='ADD2BASKET';
        // 	console.log(data2send);
        // 	$.ajax({
        // 		url: '/bitrix/templates/sp07restail/ajax/add2cart.php',
        // 		type: 'GET',
        // 		dataType: 'json',
        // 		data: data2send,
        // 	})
        // 	.done(function(data) {
        // 		// console.log("success",data);
        		
        // 		if (parentbtn.hasClass('btn-quick-buy'))
        // 			window.location.href = ("/personal/cart/");
        // 		else
        // 			updatepanel();

        // 	})
        // 	.fail(function(data) {
        // 		// console.log("error",data);
        // 	});
       	// });
        //btn-quick-buy
        //btn-add-to-cart
    });