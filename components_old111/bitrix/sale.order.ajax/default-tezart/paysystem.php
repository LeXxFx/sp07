<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if ($_REQUEST["deliveryLoad"] || $_SERVER["REQUEST_METHOD"] != "GET") {?>

<p class="title-order info-pay">Платежная система</p>
<?foreach($arResult["PAY_SYSTEM"] as $arPaySystem):?>
<label class="col-pay-sysmet">
	<input type="radio" name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>" <?if ($arPaySystem["CHECKED"]=="Y" && !($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y" && $arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")) echo " checked=\"checked\"";?>>
	<img src="<?=$arPaySystem['PSA_LOGOTIP']['SRC'];?>">
	<span class="pay-title"><?=$arPaySystem["NAME"]?></span>
	<?if($arPaySystem["DESCRIPTION"]):?><span class="pay-t"><?=$arPaySystem["DESCRIPTION"]?></span><?endif;?>
</label>
<?endforeach;?>

<?} else {?>
	<div class="cssload-container" style="position: relative; top: -15px; left: -10px;">
		<div class="cssload-zenith"></div>
	</div>
	<script>loadDelivery();</script>
<?}?>
<!--</div>-->
