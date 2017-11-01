$(document).ready(function(){
	
	//Actions
	$(document).on('click','#questions-body .actions',
			function(){
				$(this).closest('.menu').toggleClass('open');
		});
	$(document).on('click','#questions-body .menu ul li',
			function(){
				
				var _this= $(this);
				var Action=$(this).data('action');
				if(Action=='ban')
					var r = confirm($(_this).closest('.menu').find('#ban-confirm-text').html());
				
				if (r != true)
					return;
				var ID=$(this).closest('.item').data('id');
				var SiteDir=$(this).closest('.item').data('site-dir');
				$.ajax({
					type: 'POST',
					url: SiteDir+'bitrix/components/sotbit/reviews.questions.list/ajax/'+Action+'.php',
					data: {ID:ID},
					success: function(data) {
						var Top=_this.position().top;
						Top-=9;
						var Left=_this.position().left;
						Left-=26;
						if(data.trim()=='SUCCESS')
						{

							if(Action=='ban')
							{
								$(_this).closest('.menu').find('.ban-message-success').css({'top':Top,'left':Left,'z-index':2});
								$(_this).closest('.menu').find('.ban-message-success').animate({
									    opacity: 1,
									  }, 500, function() {
										  
										  setTimeout(function() {
											  $(_this).closest('.menu').find('.ban-message-success').animate({
												    opacity: 0,
												  }, 500, function(){
													  $(_this).closest('.menu').find('.ban-message-success').css({'top':'25px','left':'0','z-index':0});
												  });
											  }, 2000);
									  });
							}
						}
						else
						{
							if(Action=='ban')
							{
								$(_this).closest('.menu').find('.ban-message-error').css({'top':Top,'left':Left,'z-index':2});
								$(_this).closest('.menu').find('.ban-message-error').animate({
									    opacity: 1,
									  }, 500, function() {
										  
										  setTimeout(function() {
											  $(_this).closest('.menu').find('.ban-message-error').animate({
												    opacity: 0,
												  }, 500, function(){
													  $(_this).closest('.menu').find('.ban-message-error').css({'top':'25px','left':'0','z-index':0});
												  });
											  }, 1000);
									  });
							}
						}
					},
					error:  function(xhr, str){
						alert(xhr.responseCode);
					}
				});
	});
	
	
}); 