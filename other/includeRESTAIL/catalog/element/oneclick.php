<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<script type="text/javascript">
jQuery(function($){
   $("#phone").mask("+7 (999) 999-9999");
});
</script>
<?
	CModule::IncludeModule("catalog");
	$id = intval($_GET['id']);
	$ar_res = CCatalogProduct::GetByIDEx($id);
	if(is_array($ar_res)){
		global $USER;            
		$rsUser = CUser::GetByID($USER->GetID()); 
		$arUser = $rsUser->Fetch();            
?>
		<div class="oneclick-buy-form">
			<div class="title">Купить в 1 клик</div>
			<p>Вы собираетесь заказать товар <a href="<?=$ar_res['DETAIL_PAGE_URL']?>"><?=$ar_res['NAME']?></a></p>
			<form id="one_click_form" name="one_click_form" action="/bitrix/templates/sport07/php/oneclick.php" method="POST">
				<input type="hidden" name="product_id" value="<?=$id?>">
				<p>
					<label for="name">ФИО:</label>
					<input type="text" name="name" id="name" value="<?=$USER->GetFullName()?> "required>
				</p>
				<p>
					<label for="phone">Телефон:<span class="req">*</span></label>
					<input type="text" name="phone" id="phone" value="<?=$arUser['PERSONAL_PHONE']?>"required>
				</p>
				<p>
					<label for="email">Email:</label>
					<input type="text" name="email" id="email" value="<?=$USER->GetEmail()?>">
				</p>
				<p>
					<label for="message">Комментарий к заказу:</label>
					<textarea name="message" id="message"></textarea>
				</p>
				<input type="submit" value="Купить">        
			</form>
		</div>
		<script type="text/javascript">
			$('#one_click_form').ajaxForm(function(data) { 
				$('.oneclick-buy-form').html('<div class="title">Купить в 1 клик</div><p>'+data+'</p>')
			});
		</script>
<?
    }
?>