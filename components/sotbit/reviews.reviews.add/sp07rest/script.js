$(document).ready(function(){
	$(document).on('keyup','#add_review  #contentbox',function()
		{
			var MaxInput=$(this).attr('maxlength');
			var box=$(this).val();
			if(box.length <= MaxInput)
			{ 
				$('#add_review').find('.count-now').html(box.length);
			}
			else{}
			return false;
	});


	$(document).on('click',"#add_review > #reset-form",function() {
		$(this).closest('#add_review').find('#review-editor').find('iframe').contents().find('body').empty();
		$('.spoiler-reviews-body').find('.count-now').html(0);
		$('.spoiler-reviews-body').find('#preview-photo').empty();
		$('#add_review')[0].reset();
	});
 

	$(document).on('click','.spoiler',
		function(){
		$(this).parent().next('.spoiler-reviews-body').toggle('normal');
			return false;
	});
	
	$(function(){
		$(document).on('submit',"#add_review, #auth_review, #registration_review",function() {
			var _this=$(this);
			var input = _this.serialize();
			var IdElement=_this.find("input[name='ID_ELEMENT']").attr('value');
			var PrimaryColor=_this.find("input[name='PRIMARY_COLOR']").attr('value');
			var MAX_RATING=_this.find("input[name='MAX_RATING']").attr('value');
			var Moderation=_this.find("input[name='MODERATION']").attr('value');
			var BUTTON_BACKGROUND=_this.find("input[name='BUTTON_BACKGROUND']").attr('value');
			var ADD_REVIEW_PLACE=_this.find("input[name='ADD_REVIEW_PLACE']").attr('value');
			var SiteDir=_this.find("input[name='SITE_DIR']").attr('value');
			var TEMPLATE=_this.find("input[name='TEMPLATE']").attr('value');
			var TextLength=_this.find("#contentbox").attr('maxlength');
			var Action=_this.attr("id");
			if(typeof Action === "undefined")
				return;
			if(Action=='registration_review')
			{
				var register=$("input[name='register_submit_button']").attr('value');
				var arparams=$("#registration_review").attr("data-params");
				input=input+'&register_submit_button='+register;
				input=input+'&arparams='+arparams;
			}
			$.ajax({
				type: 'POST',
				url: SiteDir+'bitrix/components/sotbit/reviews.reviews.add/ajax/'+Action+'.php',
				data: input,
				success: function(data){
					if(data.trim()=='SUCCESS')
					{
						if(Action=='auth_review' || Action=='registration_review')
						{
							location.reload();
						}
						else
						{
							$('#add_review')[0].reset();
							$("#preview-photo").empty();
							var MaxInput=$(_this).children('#contentbox').attr('maxlength');
							$(_this).find('.count-now').html(0);
							$('.add-reviews').find(".success").show();
							//location.reload();
							$('.panel-sport__close').click();
							$('.add-reviews').find('.spoiler-reviews-body').toggle('normal');
							if(Moderation != 'Y')
							{
								var count=Number($('#reviews').html().replace(/[^0-9]/gim,''));
								var newCount=count+1;
								var Html=$('#reviews').html();
								$('#reviews').html(Html.replace(count,newCount));
								$.ajax({
									type: 'POST',
									url: SiteDir+'bitrix/components/sotbit/reviews.reviews.add/ajax/reload_statistics.php',
									data: {IdElement:IdElement,PrimaryColor:PrimaryColor,MAX_RATING:MAX_RATING,BUTTON_BACKGROUND:BUTTON_BACKGROUND,ADD_REVIEW_PLACE:ADD_REVIEW_PLACE,TextLength:TextLength,TEMPLATE:TEMPLATE},
									success: function(data){
										$('#reviews-statistics').html(data);
										
										if($('#captcha-reviews').html()!="")
										{
											
												var CapId = grecaptcha.render($('[data-captcha-review="Y"]').attr('id'), {
													'sitekey' : $('#captcha-reviews').html()
												});
												$('#captcha-ids-reviews').html(CapId);
										}
										
										
									},
									error:  function (jqXHR, exception) {
									}
								});

								BX.showWait();
								$.ajax({
									type: 'POST',
									url: SiteDir+'bitrix/components/sotbit/reviews.reviews.add/ajax/reload_reviews.php',
									data: {IdElement:IdElement,PrimaryColor:PrimaryColor,MAX_RATING:MAX_RATING,BUTTON_BACKGROUND:BUTTON_BACKGROUND,ADD_REVIEW_PLACE:ADD_REVIEW_PLACE,TextLength:TextLength,TEMPLATE:TEMPLATE},
									beforeSend: function(){
									$('#reviews-body').html('<img id="imgcode" src="'+SiteDir+'bitrix/components/sotbit/reviews/images/loading.gif">');
			},
									success: function(data){
										$('#reviews-body').html(data);
										$(".image-review").colorbox();
										BX.closeWait();
									},
									error:  function (jqXHR, exception) {
									}
								});

								
								
							}
							else
							{
								if($('#captcha-reviews').html()!="")
								{
								var CapId = $('#captcha-ids-reviews').html();
								grecaptcha.reset(
										CapId
								);
							}
							}
							return false;
						}
					}
					else
					{
						
						if($('#captcha-reviews').html()!="")
						{
							var CapId = $('#captcha-ids-reviews').html();
							grecaptcha.reset(
									CapId
							);
						}
						
						
						if(Action=='auth_review' || Action=='registration_review')
						{
							$('.spoiler-reviews-body').find("#"+Action+"-check-error").html(data);
							$('.spoiler-reviews-body').find("#"+Action+"-check-error").show();
							if(Action=='registration_review')
								change_captcha(_this,SiteDir);
						}
						else
						{
							$('.spoiler-reviews-body').find(".add-check-error").html(data);
							$('.spoiler-reviews-body').find(".add-check-error").show();
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
			url: SiteDir+'bitrix/components/sotbit/reviews.reviews.add/ajax/change_captcha.php',
			success: function(data){
				e.find("input[name='captcha_sid']").val(data);
				e.find("img").attr({"src":"/bitrix/tools/captcha.php?captcha_sid="+data});
			},
			error:  function(xhr, str){
				alert(xhr.responseCode);
			}
		});
	}


	$(document).on('click', '#add-photo-button', function() {
		$("input[type='file']").trigger('click');
	})

	var MaxCountImages=$('#preview-photo').data('max-count-images');
	var previewWidth = $('#preview-photo').data('thumb-width'), // ширина превью
	previewHeight = $('#preview-photo').data('thumb-height'), // высота превью
	maxFileSize = $('#preview-photo').data('max-size') * 1024 * 1024, // (байт) Максимальный размер файла (2мб)
	selectedFiles = {},// объект, в котором будут храниться выбранные файлы
	queue = [],
	image = new Image(),
	imgLoadHandler,
	isProcessing = false,
	errorMsg, // сообщение об ошибке при валидации файла
	previewPhotoContainer = document.querySelector('#preview-photo'); // контейнер, в котором будут отображаться превью
	// Когда пользователь выбрал файлы, обрабатываем их
	$('input[type=file][id=photo]').on('change', function() {

		var newFiles = $(this)[0].files; // массив с выбранными файлами
		//проверка на максимальное количество картинок
		if(($('#preview-photo > li').size()+newFiles.length)>MaxCountImages)
		{
			alert($('#preview-photo').data('error-max-count')+' - '+MaxCountImages);
			return;
		}
		for (var i = 0; i < newFiles.length; i++) {

			var file = newFiles[i];

			// В качестве "ключей" в объекте selectedFiles используем названия файлов
			// чтобы пользователь не мог добавлять один и тот же файл
			// Если файл с текущим названием уже существует в массиве, переходим к следующему файлу
			if (selectedFiles[file.name] != undefined) continue;

			// Валидация файлов (проверяем формат и размер)
			if ( errorMsg = validateFile(file) ) {
				alert(errorMsg);
				return;
			}

			// Добавляем файл в объект selectedFiles
			selectedFiles[file.name] = file;
			queue.push(file);
		}

		$(this).val('');
		processQueue(); // запускаем процесс создания миниатюр
	});

	// Валидация выбранного файла (формат, размер)
	var validateFile = function(file)
	{
		if ( !file.type.match(/image\/(jpeg|jpg|png)/) ) {
			return $('#preview-photo').data('error-type');
		}

		if ( file.size > maxFileSize ) {
			return $('#preview-photo').data('error-max-size')+' '+$('#preview-photo').data('max-size')+' Mb';
		}

	};

	var listen = function(element, event, fn) {
		return element.addEventListener(event, fn, false);
	};

	// Создание миниатюры
	var processQueue = function()
	{
		// Миниатюры будут создаваться поочередно
		// чтобы в один момент времени не происходило создание нескольких миниатюр
		// проверяем запущен ли процесс
		if (isProcessing) { return; }

		// Если файлы в очереди закончились, завершаем процесс
		if (queue.length == 0) {
			isProcessing = false;
			return;
		}

		isProcessing = true;

		var file = queue.pop(); // Берем один файл из очереди

		var li = document.createElement('LI');
		var span = document.createElement('SPAN');
		var spanDel = document.createElement('SPAN');
		var canvas = document.createElement('CANVAS');
		canvas.setAttribute("width", previewWidth);
		canvas.setAttribute("height", previewHeight);
		var ctx = canvas.getContext('2d');

		span.setAttribute('class', 'img');
		spanDel.setAttribute('class', 'delete');
		spanDel.innerHTML = '<i class="fa fa-times"></i>';

		li.appendChild(span);
		li.appendChild(spanDel);
		li.setAttribute('data-id', file.name);

		image.removeEventListener('load', imgLoadHandler, false);

		// создаем миниатюру
		imgLoadHandler = function() {
			ctx.drawImage(image, 0, 0, previewWidth, previewHeight);
			URL.revokeObjectURL(image.src);
			span.appendChild(canvas);
			isProcessing = false;
			setTimeout(processQueue, 200); // запускаем процесс создания миниатюры для следующего изображения
		};

		// Выводим миниатюру в контейнере previewPhotoContainer
		previewPhotoContainer.appendChild(li);
		listen(image, 'load', imgLoadHandler);
		image.src = URL.createObjectURL(file);

		// Сохраняем содержимое оригинального файла в base64 в отдельном поле формы
		// чтобы при отправке формы файл был передан на сервер
		var fr = new FileReader();
		fr.readAsDataURL(file);
		fr.onload = (function (file) {
			return function (e) {
				$('#preview-photo').append(
					'<input type="hidden" name="photos[]" value="' + e.target.result + '" data-id="' + file.name+ '">'
				);
			}
		}) (file);
	};

	// Удаление фотографии
	$(document).on('click', '#preview-photo li span.delete', function() {
		var fileId = $(this).parents('li').attr('data-id');

		if (selectedFiles[fileId] != undefined) delete selectedFiles[fileId]; // Удаляем файл из объекта selectedFiles
		$(this).parents('li').remove(); // Удаляем превью
		$('input[name^=photo][data-id="' + fileId + '"]').remove(); // Удаляем поле с содержимым файла
	});

});
