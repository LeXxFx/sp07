$(document).ready(function(){

	//обработчик форм
	$(function(){
		$(document).on('submit',".registration_anonymous",function() {
			var _this=$(this);
			var input = _this.serialize();

				var register=$(this).find("input[name='register_anonymous_submit_button']").attr('value');//добавление значения кнопки для модуля
				var arparams=$(this).attr("data-params");
				input=input+'&register_submit_button='+register;
				input=input+'&arparams='+arparams;
				var SiteDir=_this.data('site-dir');
			$.ajax({
				type: 'POST',
				url: SiteDir+'bitrix/components/sotbit/reviews.anonymregister/ajax/registration.php',
				data: input,
				success: function(data){
					if(data.trim()=='SUCCESS')
					{
						//location.reload();
					}
					else
					{
						_this.find('.anonym_registration_error').html(data);
						_this.find('.anonym_registration_error').show();
						change_captcha(_this,SiteDir);
					}
				},
				error:  function (jqXHR, exception) {
				}
			});
		});
	});



	function change_captcha(e,SiteDir)
	{
		$.ajax({
			type: 'POST',
			url: SiteDir+'bitrix/components/sotbit/reviews.anonymregister/ajax/change_captcha.php',
			success: function(data){
				e.find("input[name='captcha_sid']").val(data);
				e.find("img").attr({"src":"/bitrix/tools/captcha.php?captcha_sid="+data});
			},
			error:  function(xhr, str){
				alert(xhr.responseCode);
			}
		});
	}


});
