$(document).ready(function(){
	//Подсчет количества символов в тексте
	$(document).on('keyup','#add_question  #contentbox',function()
		{
			var MaxInput=$(this).attr('maxlength');
			var box=$(this).val();
			if(box.length <= MaxInput)
			{
				$('#add_question').find('.count-now').html(box.length);
			}
			else{}
			return false;
	});
	 
	$(document).on('click',"#add_question  #reset-form",function() {
		$(this).closest('#add_question').find('iframe').contents().find('body').empty();
		$('.spoiler-questions-body').find('.count-now').html(0);
		$('#add_question')[0].reset();
	});
	 
	//Quote
	$(document).on('click','#questions-body .item .quote',
			function(){
				$(this).closest('.tabs-content').parent().find('.spoiler-questions-body').show('normal');
				var text=$(this).closest('.item').find('.text').html();
				$(this).closest('.tabs-content').parent().find('#question-editor').find('iframe').contents().find('body').append('<blockquote class="bxhtmled-quote">'+text+'</blockquote>');
			    $('html, body').animate({
			        scrollTop: $(".spoiler-questions-body").offset().top
			    }, 2000);
				return false;
		});
	
	
	//Спойлер
	$(document).on('click','.spoiler',
		function(){
			$(this).next('.spoiler-questions-body').toggle('normal');
			return false;
	});

	//обработчик форм
	$(function(){
		$(document).on('submit',"#add_question, #auth_question, #registration_question",function() {
			var _this=$(this);
			var input = _this.serialize();
			var IdElement=_this.find("input[name='ID_ELEMENT']").attr('value');
			var Moderation=_this.find("input[name='MODERATION']").attr('value');
			var SiteDir=_this.find("input[name='SITE_DIR']").attr('value');
			var TEMPLATE=_this.find("input[name='TEMPLATE']").attr('value');
			var Action=_this.attr("id");//Определяет в какой ajax отправить данные
			if(typeof Action === "undefined")//завершаем если нет Action
				return;
			if(Action=='registration_question')
			{
				var register=$("input[name='register_submit_button']").attr('value');//добавление значения кнопки для модуля
				var arparams=$("#registration_question").attr("data-params");
				input=input+'&register_submit_button='+register;
				input=input+'&arparams='+arparams;
			}
			$.ajax({
				type: 'POST',
				url: SiteDir+'bitrix/components/sotbit/reviews.questions.add/ajax/'+Action+'.php',
				data: input,
				success: function(data){
					if(data.trim()=='SUCCESS')
					{
						if(Action=='auth_question' || Action=='registration_question')
						{
							location.reload();
						}
						else
						{
							$(_this)[0].reset();
							var MaxInput=$(_this).children('#contentbox').attr('maxlength');
							$(_this).find('.count-now').html(0);
							$('div.success').show();
							console.log("Good");
							$('#questions-body').find('.spoiler-questions-body').toggle('normal');
							if(Moderation != 'Y')
							{
								var count=Number($('#questions').html().replace(/[^0-9]/gim,''));
								var newCount=count+1;
								var Html=$('#questions').html();
								$('#questions').html(Html.replace(count,newCount));
								BX.showWait();
								$.ajax({
									type: 'POST',
									url: '/bitrix/components/sotbit/reviews.questions.add/ajax/reload_questions.php',
									data: {IdElement:IdElement,TEMPLATE:TEMPLATE},
									success: function(data){
										$('#questions-body').find('.list').html(data);
										BX.closeWait();
									},
									error:  function (jqXHR, exception) {
									}
								});
								
								if($('#captcha-questions').html()!="")
								{
									var CapId = $('#captcha-ids-questions').html();
									grecaptcha.reset(
											CapId
									);
								}
								
							console.log("Good");	
							}
							return false;
						}
					}
					else
					{
						
						if($('#captcha-questions').html()!="")
						{
							var CapId = $('#captcha-ids-questions').html();
							grecaptcha.reset(
									CapId
							);
						}
						
						
						if(Action=='auth_question' || Action=='registration_question')
						{
							$('#questions-body').find("#"+Action+"-check-error").html(data);
							$('#questions-body').find("#"+Action+"-check-error").show();
							if(Action=='registration_question')
								change_captcha(_this,SiteDir);
						}
						else
						{
							$('#questions-body').find(".add-check-error").html(data);
							$('#questions-body').find(".add-check-error").show();
						}
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
			url: SiteDir+'bitrix/components/sotbit/reviews.questions.add/ajax/change_captcha.php',
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
