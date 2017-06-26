<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

    <input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?= $arResult["BUYER_STORE"] ?>">
    <p class="title-order info-delivery">Служба доставки</p>
  
<?if ($_REQUEST["deliveryLoad"] || $_SERVER["REQUEST_METHOD"] != "GET") {?>
<? foreach ($arResult["DELIVERY"] as $delivery_id => $arDelivery): ?>
    
         <div class="col-order-delivery">
            <label onClick="submitForm()" id="delivery_<?= $arDelivery["ID"] ?>">
                <input type="radio" id="delivery_<?= $arDelivery["ID"] ?>" name="<?= htmlspecialcharsbx($arDelivery["FIELD_NAME"]) ?>"
                       value="<?= $arDelivery["ID"] ?>"<? if ($arDelivery["CHECKED"] == "Y") echo " checked"; ?>>
                <?= $arDelivery["NAME"] ?>
            </label>
            <br>

                <p class="adress-delivery">              
                        Цена доставки
                        <b><?= $arDelivery["PRICE_FORMATED"] ?>
                        </b>                  
                    <br>
                    
                    <?if(strpos($arResult["RESULT"]["TRANSIT"],'пункт самовывоза') > 0):?>
                    <?endif;?>
                </p>
        </div>
<? endforeach; ?>
<?}?>