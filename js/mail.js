$(function() {
    	//$(".addtobasket").on("click", function(event) {
	$("body").on("click" ,".send_mail", function(event) {
		event.preventDefault();
		var message = $('#modal_callback').find('input[name=message]').val();
		var phone = $('#modal_callback').find('input[name=phone]').val();
		var data_to_send = {};
		data_to_send["message"] = message;
		data_to_send["phone"] = phone;
		$.ajax({
			url: "/bitrix/templates/sp07restail/php/send_mail.php",
			data: data_to_send,
			type: 'POST',
			dataType: 'json',
			success: function(data) {
				$("#modal_callback").find('.panel-sport').empty('');
				$("#modal_callback").find('.panel-sport').html('<div class="panel-sport__heading">Ваше сообщение успешно отправлено</div>,<button class="panel-sport__close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" title="Закрыть"><span><i class="fa fa-angle-left"></i></span></button>');
			}
		});
		$(this).parent().parent().find(".cover-buy").show();
	});
});