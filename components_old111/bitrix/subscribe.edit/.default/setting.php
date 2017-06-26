<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="edit-subsribe-left">
	<form action="<?=$arResult["FORM_ACTION"]?>" method="post">
		<?echo bitrix_sessid_post();?>
		<div class="label-block">
			<span class="title-input">Ваш e-mail<b>*</b></span>
			<input type="text" name="EMAIL" value="<?=$arResult["SUBSCRIPTION"]["EMAIL"]!=""?$arResult["SUBSCRIPTION"]["EMAIL"]:$arResult["REQUEST"]["EMAIL"];?>">
		</div>
		<div class="label-block label-float">
			<span class="title-input">Рубрики подписки<b>*</b></span>
			<label>
				<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
					<input type="checkbox" name="RUB_ID[]" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo " checked"?>>
					<span class="checkbox-title">Новости магазина</span>
				<?endforeach;?>
			</label>
		</div>
		<div class="label-block label-float">
			<span class="title-input">Предпочтительный формат</span>
			<form>
				<label class="radio-col">
					<input type="radio" name="FORMAT" value="text"<?if($arResult["SUBSCRIPTION"]["FORMAT"] == "text") echo " checked"?>>Текст
				</label>
				<label class="radio-col">
					<input type="radio" name="FORMAT" value="html"<?if($arResult["SUBSCRIPTION"]["FORMAT"] == "html") echo " checked"?>>HTML
				</label>
			</form>
		</div>
		<div class="edit-subsribe-bottom">
			<p class="title">*Поля, обязательные для заполнения.</p>
			<input type="submit" name="Save" value="Добавить">
			<span class="reset-edit">Сброс</span>
		</div>
		<input type="hidden" name="PostAction" value="<?echo ($arResult["ID"]>0? "Update":"Add")?>" />
		<input type="hidden" name="ID" value="<?echo $arResult["SUBSCRIPTION"]["ID"];?>" />
		<?if($_REQUEST["register"] == "YES"):?>
			<input type="hidden" name="register" value="YES" />
		<?endif;?>
		<?if($_REQUEST["authorize"]=="YES"):?>
			<input type="hidden" name="authorize" value="YES" />
		<?endif;?>
	</form>
</div>