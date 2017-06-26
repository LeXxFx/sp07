<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
    <input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?= $arResult["BUYER_STORE"] ?>">
    <p class="title-order info-delivery">Служба доставки</p>

<? foreach ($arResult["DELIVERY"] as $delivery_id => $arDelivery): ?>
    <div class="col-order-delivery">
        <label onClick="submitForm()" id="delivery_<?= $arDelivery["ID"] ?>">
            <input type="radio" id="delivery_<?= $arDelivery["ID"] ?>" name="<?= htmlspecialcharsbx($arDelivery["FIELD_NAME"]) ?>"
                   value="<?= $arDelivery["ID"] ?>"<? if ($arDelivery["CHECKED"] == "Y") echo " checked"; ?>>
            <?= $arDelivery["NAME"] ?>
        </label>
        
        <br/>
        <?
            if($USER->IsAdmin()){
             //echo "<pre>";print_r($delivery_id);echo "</pre>";
            }
        ?>

        <p class="adress-delivery">              
                        Цена доставки
                        <b><?= $arDelivery["PRICE_FORMATED"] ?>
                        </b>                  
                    <br>
                    <?= $arDelivery["DESCRIPTION"] ?>
                    <?if($USER->IsAdmin()):?>
                        
                        <?/*<a onclick="callSLpvz(187626);">Выбрать другой ПВЗ</a>*/?>
                        
                        
                    <?endif;?>
                    <?if(strpos($arResult["RESULT"]["TRANSIT"],'пункт самовывоза') > 0):?>
                        <?/*= $arResult["RESULT"]["TRANSIT"];*/ ?>
                    <?endif;?>
                </p>
        
            <?/*
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
            */?>
    </div>
<? endforeach; ?>
