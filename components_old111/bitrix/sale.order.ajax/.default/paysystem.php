<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<p class="title-order info-pay">Платежная система</p>
<?foreach($arResult["PAY_SYSTEM"] as $arPaySystem):?>
<label class="col-pay-sysmet icon-nal">
	<input type="radio" name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>" <?if ($arPaySystem["CHECKED"]=="Y" && !($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y" && $arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")) echo " checked=\"checked\"";?>>
	<span class="pay-title"><?=$arPaySystem["NAME"]?></span>
	<?if($arPaySystem["DESCRIPTION"]):?><span class="pay-t"><?=$arPaySystem["DESCRIPTION"]?></span><?endif;?>
</label>
<?endforeach;?>