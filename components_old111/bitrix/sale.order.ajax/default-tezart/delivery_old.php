<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
	<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?= $arResult["BUYER_STORE"] ?>">
	<p class="title-order info-delivery">Служба доставки</p>
<? foreach ($arResult["DELIVERY"] as $delivery_id => $arDelivery): ?>
	<div class="col-order-delivery">
		<label onClick="submitForm()">
			<input type="radio" name="<?= htmlspecialcharsbx($arDelivery["FIELD_NAME"]) ?>"
				   value="<?= $arDelivery["ID"] ?>"<? if ($arDelivery["CHECKED"] == "Y") echo " checked"; ?>>
			<?= $arDelivery["NAME"] ?>
		</label>
		<br/>
		<p class="adress-delivery">
			<? if ($arDelivery["PRICE"]): ?>
				Цена доставки <b><?= $arDelivery["PRICE"] ?>руб.</b>
			<? endif; ?>
		<?if ($arDelivery['PERIOD_TEXT'] && $arDelivery['ID'] == 16):?>
			<?=$arDelivery['PERIOD_TEXT'];?>
		<?endif;?>

		</p>
	</div>
<? endforeach; ?>