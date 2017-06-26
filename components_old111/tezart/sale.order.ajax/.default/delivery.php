<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


    <input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?= $arResult["BUYER_STORE"] ?>">
    <p class="title-order info-delivery">Служба доставки</p>
<!--<div id="delivery-container">-->
<?
if ($_SERVER['REMOTE_ADDR'] == "31.28.243.138") {
    session_start();
    //$_SESSION["g"] = $_SERVER['QUERY_STRING'];
    pp($_REQUEST);
    pp($_SESSION["g"]);
}
?>
<?if ($_REQUEST["deliveryLoad"] || $_SERVER["REQUEST_METHOD"] != "GET") {?>

<? foreach ($arResult["DELIVERY"] as $delivery_id => $arDelivery): ?>
    <div class="col-order-delivery">
        <label onClick="submitForm()" id="delivery_<?= $arDelivery["ID"] ?>">
            <input type="radio" id="delivery_<?= $arDelivery["ID"] ?>" name="<?= htmlspecialcharsbx($arDelivery["FIELD_NAME"]) ?>"
                   value="<?= $arDelivery["ID"] ?>"<? if ($arDelivery["CHECKED"] == "Y") echo " checked"; ?>>
            <?= $arDelivery["NAME"] ?>
        </label>
        <br/>
            <?
            $APPLICATION->IncludeComponent('bitrix:sale.ajax.delivery.calculator', 'custom', array(
                "NO_AJAX" => $arParams["DELIVERY_NO_AJAX"],
                "DELIVERY_ID" => $delivery_id,
                "ORDER_WEIGHT" => $arResult["ORDER_WEIGHT"],
                "ORDER_PRICE" => $arResult["ORDER_PRICE"],
                "LOCATION_TO" => $arResult["USER_VALS"]["DELIVERY_LOCATION"],
                "LOCATION_ZIP" => $arResult["USER_VALS"]["DELIVERY_LOCATION_ZIP"],
                "CURRENCY" => $arResult["BASE_LANG_CURRENCY"],
                "ITEMS" => $arResult["BASKET_ITEMS"],
                "EXTRA_PARAMS_CALLBACK" => $extraParams
            ), null, array('HIDE_ICONS' => 'Y'));
            ?>
    </div>
<? endforeach; ?>
<?}?>

