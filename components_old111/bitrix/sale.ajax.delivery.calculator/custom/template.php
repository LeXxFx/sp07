<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if (is_array($arResult["RESULT"])) {
    if ($arResult["RESULT"]["RESULT"] == "ERROR")
        echo ShowError($arResult["RESULT"]["TEXT"]);
    elseif ($arResult["RESULT"]["RESULT"] == "NOTE")
        echo ShowNote($arResult["RESULT"]["TEXT"]);
    elseif ($arResult["RESULT"]["RESULT"] == "OK") {
        ?>
        <p class="adress-delivery">
            <? if ($arResult["RESULT"]["VALUE_FORMATTED"]): ?>
                Цена доставки
                <b><?= (strlen($arResult["RESULT"]["VALUE_FORMATTED"]) > 0 ? $arResult["RESULT"]["VALUE_FORMATTED"] : number_format($arResult["RESULT"]["VALUE"], 2, ',', ' ')) ?>
                </b>
            <? endif; ?>
            <br>
            <?if(strpos($arResult["RESULT"]["TRANSIT"],'пункт самовывоза') > 0):?>
                <?= $arResult["RESULT"]["TRANSIT"]; ?>
            <?endif;?>
        </p>
<?
           
        global $USER;
        if ($USER->IsAdmin()):
            echo "<pre>";
           //print_r($arResult);
            echo "</pre>";
        endif;


    }

}
?>

<!--
<p class="adress-delivery">
    <? if ($arDelivery["PRICE"]): ?>
        Цена доставки <b><?= $arDelivery["PRICE"] ?>руб.</b>
    <? endif; ?>
    <?if ($arDelivery['PERIOD_TEXT'] && $arDelivery['ID'] == 16):?>
        <?=$arDelivery['PERIOD_TEXT'];?>
    <?endif;?>
</p>
-->
