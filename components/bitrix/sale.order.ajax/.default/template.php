<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main,
	Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 * @var $USER CUser
 * @var $component SaleOrderAjax
 */

function PriceWithoutCurrency($value)
{
    return preg_replace('/\sруб\./', '', $value);
}

$context = Main\Application::getInstance()->getContext();
$request = $context->getRequest();
$server = $context->getServer();

if (empty($arParams['TEMPLATE_THEME']))
{
	$arParams['TEMPLATE_THEME'] = Main\ModuleManager::isModuleInstalled('bitrix.eshop') ? 'site' : 'blue';
}

if ($arParams['TEMPLATE_THEME'] == 'site')
{
	$templateId = Main\Config\Option::get('main', 'wizard_template_id', 'eshop_bootstrap', $component->getSiteId());
	$templateId = preg_match('/^eshop_adapt/', $templateId) ? 'eshop_adapt' : $templateId;
	$arParams['TEMPLATE_THEME'] = Main\Config\Option::get('main', 'wizard_'.$templateId.'_theme_id', 'blue', $component->getSiteId());
}

if (!empty($arParams['TEMPLATE_THEME']))
{
	if (!is_file($server->getDocumentRoot().'/bitrix/css/main/themes/'.$arParams['TEMPLATE_THEME'].'/style.css'))
	{
		$arParams['TEMPLATE_THEME'] = 'blue';
	}
}

$arParams['ALLOW_USER_PROFILES'] = $arParams['ALLOW_USER_PROFILES'] === 'Y' ? 'Y' : 'N';
$arParams['SKIP_USELESS_BLOCK'] = $arParams['SKIP_USELESS_BLOCK'] === 'N' ? 'N' : 'Y';

if (!isset($arParams['SHOW_ORDER_BUTTON']))
{
	$arParams['SHOW_ORDER_BUTTON'] = 'final_step';
}

$arParams['SHOW_TOTAL_ORDER_BUTTON'] = $arParams['SHOW_TOTAL_ORDER_BUTTON'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] = $arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_PAY_SYSTEM_INFO_NAME'] = $arParams['SHOW_PAY_SYSTEM_INFO_NAME'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_LIST_NAMES'] = $arParams['SHOW_DELIVERY_LIST_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_INFO_NAME'] = $arParams['SHOW_DELIVERY_INFO_NAME'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_PARENT_NAMES'] = $arParams['SHOW_DELIVERY_PARENT_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_STORES_IMAGES'] = $arParams['SHOW_STORES_IMAGES'] === 'N' ? 'N' : 'Y';

if (!isset($arParams['BASKET_POSITION']))
{
	$arParams['BASKET_POSITION'] = 'after';
}

$arParams['SHOW_BASKET_HEADERS'] = $arParams['SHOW_BASKET_HEADERS'] === 'Y' ? 'Y' : 'N';
$arParams['DELIVERY_FADE_EXTRA_SERVICES'] = $arParams['DELIVERY_FADE_EXTRA_SERVICES'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_COUPONS_BASKET'] = $arParams['SHOW_COUPONS_BASKET'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_COUPONS_DELIVERY'] = $arParams['SHOW_COUPONS_DELIVERY'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_COUPONS_PAY_SYSTEM'] = $arParams['SHOW_COUPONS_PAY_SYSTEM'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_NEAREST_PICKUP'] = $arParams['SHOW_NEAREST_PICKUP'] === 'Y' ? 'Y' : 'N';
$arParams['DELIVERIES_PER_PAGE'] = isset($arParams['DELIVERIES_PER_PAGE']) ? intval($arParams['DELIVERIES_PER_PAGE']) : 8;
$arParams['PAY_SYSTEMS_PER_PAGE'] = isset($arParams['PAY_SYSTEMS_PER_PAGE']) ? intval($arParams['PAY_SYSTEMS_PER_PAGE']) : 8;
$arParams['PICKUPS_PER_PAGE'] = isset($arParams['PICKUPS_PER_PAGE']) ? intval($arParams['PICKUPS_PER_PAGE']) : 5;
$arParams['SHOW_MAP_IN_PROPS'] = $arParams['SHOW_MAP_IN_PROPS'] === 'Y' ? 'Y' : 'N';
$arParams['USE_YM_GOALS'] = $arParams['USE_YM_GOALS'] === 'Y' ? 'Y' : 'N';

if ($arParams['USE_CUSTOM_MAIN_MESSAGES'] != 'Y')
{
	$arParams['MESS_AUTH_BLOCK_NAME'] = Loc::getMessage('AUTH_BLOCK_NAME_DEFAULT');
	$arParams['MESS_REG_BLOCK_NAME'] = Loc::getMessage('REG_BLOCK_NAME_DEFAULT');
	$arParams['MESS_BASKET_BLOCK_NAME'] = Loc::getMessage('BASKET_BLOCK_NAME_DEFAULT');
	$arParams['MESS_REGION_BLOCK_NAME'] = Loc::getMessage('REGION_BLOCK_NAME_DEFAULT');
	$arParams['MESS_PAYMENT_BLOCK_NAME'] = Loc::getMessage('PAYMENT_BLOCK_NAME_DEFAULT');
	$arParams['MESS_DELIVERY_BLOCK_NAME'] = Loc::getMessage('DELIVERY_BLOCK_NAME_DEFAULT');
	$arParams['MESS_BUYER_BLOCK_NAME'] = Loc::getMessage('BUYER_BLOCK_NAME_DEFAULT');
	$arParams['MESS_BACK'] = Loc::getMessage('BACK_DEFAULT');
	$arParams['MESS_FURTHER'] = Loc::getMessage('FURTHER_DEFAULT');
	$arParams['MESS_EDIT'] = Loc::getMessage('EDIT_DEFAULT');
	$arParams['MESS_ORDER'] = Loc::getMessage('ORDER_DEFAULT');
	$arParams['MESS_PRICE'] = Loc::getMessage('PRICE_DEFAULT');
	$arParams['MESS_PERIOD'] = Loc::getMessage('PERIOD_DEFAULT');
	$arParams['MESS_NAV_BACK'] = Loc::getMessage('NAV_BACK_DEFAULT');
	$arParams['MESS_NAV_FORWARD'] = Loc::getMessage('NAV_FORWARD_DEFAULT');
}

if ($arParams['USE_CUSTOM_ADDITIONAL_MESSAGES'] != 'Y')
{
	$arParams['MESS_REGISTRATION_REFERENCE'] = Loc::getMessage('REGISTRATION_REFERENCE_DEFAULT');
	$arParams['MESS_AUTH_REFERENCE_1'] = Loc::getMessage('AUTH_REFERENCE_1_DEFAULT');
	$arParams['MESS_AUTH_REFERENCE_2'] = Loc::getMessage('AUTH_REFERENCE_2_DEFAULT');
	$arParams['MESS_AUTH_REFERENCE_3'] = Loc::getMessage('AUTH_REFERENCE_3_DEFAULT');
	$arParams['MESS_ADDITIONAL_PROPS'] = Loc::getMessage('ADDITIONAL_PROPS_DEFAULT');
	$arParams['MESS_USE_COUPON'] = Loc::getMessage('USE_COUPON_DEFAULT');
	$arParams['MESS_COUPON'] = Loc::getMessage('COUPON_DEFAULT');
	$arParams['MESS_PERSON_TYPE'] = Loc::getMessage('PERSON_TYPE_DEFAULT');
	$arParams['MESS_SELECT_PROFILE'] = Loc::getMessage('SELECT_PROFILE_DEFAULT');
	$arParams['MESS_REGION_REFERENCE'] = Loc::getMessage('REGION_REFERENCE_DEFAULT');
	$arParams['MESS_PICKUP_LIST'] = Loc::getMessage('PICKUP_LIST_DEFAULT');
	$arParams['MESS_NEAREST_PICKUP_LIST'] = Loc::getMessage('NEAREST_PICKUP_LIST_DEFAULT');
	$arParams['MESS_SELECT_PICKUP'] = Loc::getMessage('SELECT_PICKUP_DEFAULT');
	$arParams['MESS_INNER_PS_BALANCE'] = Loc::getMessage('INNER_PS_BALANCE_DEFAULT');
	$arParams['MESS_ORDER_DESC'] = Loc::getMessage('ORDER_DESC_DEFAULT');
}

if ($arParams['USE_CUSTOM_ERROR_MESSAGES'] != 'Y')
{
	$arParams['MESS_PRELOAD_ORDER_TITLE'] = Loc::getMessage('PRELOAD_ORDER_TITLE_DEFAULT');
	$arParams['MESS_SUCCESS_PRELOAD_TEXT'] = Loc::getMessage('SUCCESS_PRELOAD_TEXT_DEFAULT');
	$arParams['MESS_FAIL_PRELOAD_TEXT'] = Loc::getMessage('FAIL_PRELOAD_TEXT_DEFAULT');
	$arParams['MESS_DELIVERY_CALC_ERROR_TITLE'] = Loc::getMessage('DELIVERY_CALC_ERROR_TITLE_DEFAULT');
	$arParams['MESS_DELIVERY_CALC_ERROR_TEXT'] = Loc::getMessage('DELIVERY_CALC_ERROR_TEXT_DEFAULT');
}

$scheme = $request->isHttps() ? 'https' : 'http';
switch (LANGUAGE_ID)
{
	case 'ru':
		$locale = 'ru-RU'; break;
	case 'ua':
		$locale = 'ru-UA'; break;
	case 'tk':
		$locale = 'tr-TR'; break;
	default:
		$locale = 'en-US'; break;
}

$this->addExternalCss('/bitrix/css/main/bootstrap.css');
$APPLICATION->SetAdditionalCSS('/bitrix/css/main/themes/'.$arParams['TEMPLATE_THEME'].'/style.css', true);
$APPLICATION->SetAdditionalCSS($templateFolder.'/style.css', true);
// $this->addExternalJs($templateFolder.'/order_ajax.js');
\Bitrix\Sale\PropertyValueCollection::initJs();

$this->addExternalJs($templateFolder.'/script.js');
$this->addExternalJs($scheme.'://api-maps.yandex.ru/2.1.34/?load=package.full&lang='.$locale);

?>
<NOSCRIPT>
	<div style="color:red"><?=Loc::getMessage('SOA_NO_JS')?></div>
</NOSCRIPT>
<script>
    var BXFormPosting = false;
    function submitForm2(val)
    {
        //return false;
        if (BXFormPosting === true)
            return true;

        BXFormPosting = true;
        if(val != 'Y')
            BX('confirmorder').value = 'N';

        var orderForm = BX('ORDER_FORM');
        BX.showWait();

        <?if(CSaleLocation::isLocationProEnabled()):?>
        BX.saleOrderAjax.cleanUp();
        <?endif?>

        BX.ajax.submit(orderForm, ajaxResult);
        // console.log(orderForm);

        return false;
    }

    function decodeUnicode(x)
    {
        var r = /\\u([\d\w]{4})/gi;
        x = x.replace(r, function (match, grp) {
            return String.fromCharCode(parseInt(grp, 16)); } );
        return unescape(x);       
    }

    function ajaxResult(res)
    {
        var orderForm = BX('ORDER_FORM');
        // if json came, it obviously a successfull order submit
        var json = JSON.parse(res);
        BX.closeWait();
         
        if (json.error)
        {
            // $('#error_field').html(json.error);
            BXFormPosting = false;
            return;
        }
        else if (json.order.REDIRECT_URL)
        {
            window.top.location.href = json.order.REDIRECT_URL;
        }else if (json.order.ERROR)
        {
            $('#error_field').html('');
            $.each(json.order.ERROR,function(index, str){
                $('#error_field').append(str);
            });
            $('#error_field').show().fadeOut(5000);
            BXFormPosting = false;
        }
    }        
</script>
<?$this->addExternalJS("/bitrix/templates/sp07restail/js/other.js");?>
<?

if (strlen($request->get('ORDER_ID')) > 0)
{
	include($server->getDocumentRoot().$templateFolder.'/confirm.php');
}
elseif ($arParams['DISABLE_BASKET_REDIRECT'] === 'Y' && $arResult['SHOW_EMPTY_BASKET'])
{
	include($server->getDocumentRoot().$templateFolder.'/empty.php');
}
else
{
	$hideDelivery = empty($arResult['DELIVERY']);
	?>
<!-- bx-soa-order-form  -->
	<form action="<?=$APPLICATION->GetCurPage();?>" method="POST" name="ORDER_FORM" id="ORDER_FORM" enctype="multipart/form-data">
		<?
		echo bitrix_sessid_post();

		if (strlen($arResult['PREPAY_ADIT_FIELDS']) > 0)
		{
			echo $arResult['PREPAY_ADIT_FIELDS'];
		}
		?>
		<input type="hidden" name="action" value="saveOrderAjax">
		<input type="hidden" name="location_type" value="code">
		<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?=$arResult['BUYER_STORE']?>">


        <style>
            TD, TH {
                border: 0 !important;
            }
        </style>

        <div id="checkout">
                        <div class="checkout-step">
                            <div id="checkout_step1" class="checkout-step__item checkout-step__item--open">
                                <div class="checkout-step__heading clearfix">
                                    <a href="#">Изменить</a>
                                    <span>1</span>
                                    Товары в заказе 
                                </div>
                                <div class="checkout-step__body">
                                    <div class="cart-table">
                                        <table>
                                            <tbody><tr>
                                                <th class="th-product">
                                                    Наименование
                                                </th>
                                                <th>
                                                    Количество
                                                </th>
                                                <th>
                                                    Сумма
                                                </th>
                                            </tr>
                                            <?foreach($arResult['BASKET_ITEMS'] as $arItem):?>
                                            <tr>
                                                <td>
                                                    <div class="product-info">
                                                        <a class="img" href="product.html">
                                                            <img src="<?=$arItem['DETAIL_PICTURE_SRC'];?>" alt="">
                                                        </a>
                                                        <div class="name">
                                                            <a href="product.html">
                                                                <?=$arItem['NAME'];?>
                                                            </a>
                                                            <div class="prop">
                                                                <?foreach($arItem['PROPS'] as $arProps):?>
                                                                    <div class="prop__item">
                                                                        <div class="name"><?=$arProps['NAME'];?>: </div>
                                                                        <div class="value">
                                                                            <span><?=$arProps['VALUE'];?></span>
                                                                        </div>
                                                                    </div>
                                                                <?endforeach;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="item__count"><?=$arItem['QUANTITY'];?></div>
                                                </td>
                                                <td>
                                                    <div class="item__price">
                                                        <span class="new"><?=PriceWithoutCurrency($arItem['PRICE_FORMATED']);?></span>
                                                        <span class="currency">руб.</span>
                                                    </div>
                                                </td>
                                            </tr>

                                            <?endforeach;?>
                                        </tbody></table>
                                        <div class="bx-soa-section-content container-fluid"></div>
                                    </div>
                                    <div class="buttons clearfix">
                                        <button class="btn btn-primary next-step">Следующий шаг</button>
                                    </div>
                                </div>
                            </div>
                            <div id="checkout_step2" class="checkout-step__item">
                                <div class="checkout-step__heading clearfix">
                                    <a href="#">Изменить</a>
                                    <span>2</span>
                                    Тип плательщика
                                </div>
                                <div class="checkout-step__body">
                                    <div class="body_inner">
                                        <div class="body__info">
                                            Выберите нужное:
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="checkout-radio-list">
                                                    <?foreach($arResult["PERSON_TYPE"] as $v):?>
                                                        <div class="item">
                                                            <label class="col-lico" onClick="submitForm()">
                                                                <input type="radio" id="PERSON_TYPE_<?=$v["ID"]?>" name="PERSON_TYPE" value="<?=$v["ID"]?>"<?if ($v["CHECKED"]=="Y") echo " checked=\"checked\"";?>>
                                                                <b><?=$v["NAME"]?></b>
                                                            </label>
                                                        </div>
                                                    <?endforeach;?>
                                                    <!-- <div class="item">
                                                        <label>
                                                            <input type="radio" name="PERSON_TYPE" checked="checked">
                                                            <b>Физическое лицо</b>
                                                        </label>
                                                    </div>
                                                    <div class="item">
                                                        <label>
                                                            <input type="radio" name="PERSON_TYPE">
                                                            <b>Юридическое лицо</b>
                                                        </label>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons clearfix">
                                        <button class="btn btn-default prev-step">Предыдущий шаг</button>
                                        <button class="btn btn-primary next-step">Следующий шаг</button>
                                    </div>
                                </div>
                            </div>
                            <div id="checkout_step3" class="checkout-step__item">
                                <div class="checkout-step__heading clearfix">
                                    <a href="#">Изменить</a>
                                    <span>3</span>
                                    Доставка
                                </div>
                                <div class="checkout-step__body">
                                    <div class="body_inner">
                                        <div class="body__info">
                                            Выберите нужное:
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="checkout-radio-list">
                                                    <?$i=0?>
													<?//echo "<pre>"; print_r($arResult["DELIVERY"]); echo "</pre>";?>
                                                    <?foreach($arResult['DELIVERY'] as $key => $arDelivery):?>
													<?//echo "<pre>";print_r($arDelivery);echo "</pre>";?>
														<?
														$arDeliv = CSaleDelivery::GetByID($arDelivery["ID"]);
														?>
                                                        <!--<div class="item">
                                                            <label>
                                                                <input type="radio" <?//=($i==0)?'checked="checked"':'';?> name="<?//= htmlspecialcharsbx($arDelivery["FIELD_NAME"]) ?>" value="<?//= $arDelivery["ID"] ?>" class="checkout_delivery" data-price-nf="<?//=$arDelivery['PRICE']?>" data-desc="<?//=$arDelivery['DESCRIPTION'];?>" data-name="<?//=$arDelivery['NAME'];?>" data-price="<?//=$arDelivery['PRICE_FORMATED'];?>" />
                                                                <b><?//=$arDelivery['NAME'];?></b> (<?//=$arDelivery['PRICE_FORMATED'];?>)
                                                            </label>
                                                        </div>-->
														<div class="item">
                                                            <label>
                                                                <input type="radio" <?=($i==0)?'checked="checked"':'';?> name="<?= htmlspecialcharsbx($arDelivery["FIELD_NAME"]) ?>" value="<?= $arDelivery["ID"] ?>" class="checkout_delivery" data-price-nf="<?=$arDeliv["PRICE"]//=$arDelivery['PRICE']?>" data-desc="<?=$arDelivery['DESCRIPTION'];?>" data-name="<?=$arDelivery['NAME'];?>" data-price="<?=$arDeliv["PRICE"]." руб"//=$arDelivery['PRICE_FORMATED'];?>" />
                                                                <b><?=$arDelivery['NAME'];?></b> (<?=$arDeliv["PRICE"]." руб"//=$arDelivery['PRICE_FORMATED'];?>)
                                                            </label>
                                                        </div>
                                                        <?
                                                            if ($i==0){
                                                                $capt=$arDelivery;
                                                            }
                                                            $i++;
                                                        ?>
                                                    <?endforeach;?>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="delivary__info">
                                                    <div class="info__heading"><?=$capt['NAME']?></div>
                                                    <p><?=$capt['DESCRIPTION']?></p>
                                                    <p>Стоимость: <b><?=$capt['PRICE_FORMATED']?></b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons clearfix">
                                        <button class="btn btn-default prev-step">Предыдущий шаг</button>
                                        <button class="btn btn-primary next-step">Следующий шаг</button>
                                    </div>
                                </div>
                            </div>
                            <div id="checkout_step4" class="checkout-step__item">
                                <div class="checkout-step__heading clearfix">
                                    <a href="#">Изменить</a>
                                    <span>4</span>
                                    Оплата
                                </div>
                                <div class="checkout-step__body">
                                    <div class="body_inner">
                                        <div class="body__info">
                                            Выберите нужное:
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="checkout-radio-list">
                                                    <?$i=0?>
                                                    <script>
                                                        console.log(<?=CUtil::PhpToJSObject($arResult['PAY_SYSTEM'])?>);
                                                    </script>
                                                    <?foreach($arResult['PAY_SYSTEM'] as $arPay):?>
                                                        <div class="item">
                                                            <label>
                                                                <input type="radio" <?=(($i)==0)?'checked="checked"':'';?> data-name="<?=$arPay['NAME']?>" data-desc="<?=$arPay['DESCRIPTION']?>" class="checkout_payment" name="PAY_SYSTEM_ID" value="<?=$arPay["ID"]?>" data-id="<?=$arPay['ID']?>" value="<?=$arPay['ID']?>">
                                                                <b><?=$arPay['NAME']?></b>
                                                            </label>
                                                        </div>
                                                        <?
                                                            if ($i==0){
                                                                $pay_capt=$arPay;
                                                            }
                                                            $i++;
                                                        ?>
                                                    <?endforeach;?>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="payment__info">
                                                    <div class="info__heading"><?=$pay_capt['NAME']?></div>
                                                    <p><?=$pay_capt['DESCRIPTION']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons clearfix">
                                        <button class="btn btn-default prev-step">Предыдущий шаг</button>
                                        <button class="btn btn-primary next-step">Следующий шаг</button>
                                    </div>
                                </div>
                            </div>
                            <div id="checkout_step5" class="checkout-step__item">
                                <div class="checkout-step__heading clearfix">
                                    <a href="#">Изменить</a>
                                    <span>5</span>
                                    Покупатель
                                </div>
                                <div class="checkout-step__body">
                                    <div class="body_inner">
                                        <div class="body__info">
                                            Ваши данные:
                                        </div>
                                        <div class="form-info">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                <?//include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/props.php");?>
                                                    <div class="row form-group">
                                                        <div class="col-sm-4">
                                                            <label class="control-label">Фамилия, Имя, Отчество: <span class="req">*</span></label>
                                                        </div>

                                                        <div class="col-sm-8">
                                                            <div style="width:100%; height: 0px; overflow:visible; position: absolute;"><div style="display: none; float: right; color: red; margin-right: 40px;" class="err_empty">Поле "ФИО" должно быть заполненно.</div></div>
                                                            <input type="text" name="ORDER_PROP_1" class="form-control suggestions-input not_empty" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-sm-4">
                                                            <label class="control-label">Ваш номер телефона: <span class="req">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div style="width:100%; height: 0px; overflow:visible; position: absolute;"><div style="display: none; float: right; color: red; margin-right: 40px;" class="err_empty">Поле "Телефон" должно быть заполненно.</div></div>
                                                            <input type="tel" name="ORDER_PROP_3" class="form-control masked-phone suggestions-input not_empty" placeholder="8 (900) 000-00-00">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-sm-4">
                                                            <label class="control-label">E-mail: <span class="req">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div style="width:100%; height: 0px; overflow:visible; position: absolute;"><div style="display: none; float: right; color: red; margin-right: 40px;" class="err_empty">Поле "E-mail" должно быть заполненно.</div></div>
                                                            <input type="email" name="ORDER_PROP_2" class="form-control suggestions-input not_empty" placeholder="ivanov_ivan@mail.ru">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-sm-4">
                                                            <label class="control-label">Адрес доставки: <span class="req">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div style="width:100%; height: 0px; overflow:visible; position: absolute;"><div style="display: none; float: right; color: red; margin-right: 40px;" class="err_empty">Поле "Адрес" должно быть заполненно.</div></div>
                                                            <input type="text" name="ORDER_PROP_24" class="form-control suggestions-input not_empty" placeholder="г. Москва, ул. Алтуфьевское ш., д. 32, к. 1, кв. 154">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-sm-4">
                                                            <label class="control-label">Комментарий:</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" name="ORDER_DESCRIPTION" class="form-control" placeholder="Привезти до 18.00, второй подъезд.">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="error_field" style="display: none;"></div>
                                    <div class="buttons clearfix">

                                        <button class="btn btn-default prev-step">Предыдущий шаг</button> 
                                        <!-- <button class="btn btn-primary">Оформить заказ</button> --><!-- class="submit-order" -->
                                        <button class="btn btn-primary Checkout_Order" type=button>Оформить заказ</button> 

                                        <input type="hidden" name="confirmorder" id="confirmorder" value="Y">
                                        <input type="hidden" name="profile_change" id="profile_change" value="N">
                                        <input type="hidden" name="is_ajax_post" id="is_ajax_post" value="Y">
                                        <input type="hidden" name="json" value="Y">                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-result">
                            <div class="checkout-result__top">Сводная информация</div>
                            <table class="checkout-result__suma">
                                <tbody><tr>
                                    <td>Товаров на</td>
                                    <td class="suma-value suma-tovar"><?=$arResult['PRICE_WITHOUT_DISCOUNT'];?></td>
                                </tr>
                                <!-- <tr>
                                    <td><span>Бонус 5%</span></td>
                                    <td class="suma-value label-alert">234 руб.</td>
                                </tr>
                                <tr>
                                    <td><span>Скидка 5%</span></td>
                                    <td class="suma-value label-alert">-327 руб.</td>
                                </tr> -->
                                <tr>
                                    <td>Доставка</td>
                                    <td class="suma-value sum-delivery">0 руб.</td>
                                </tr>
                                <tr><td colspan="2"><hr></td></tr>
                                <tr>
                                    <td>Всего:</td>
                                    <td class="suma-value"><?=$arResult['PRICE_WITHOUT_DISCOUNT'];?>
                                        
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>










		
		
	</form>

	<div id="bx-soa-saved-files" style="display:none"></div>
	<div id="bx-soa-soc-auth-services" style="display:none">
		<?
		$arServices = false;
		$arResult['ALLOW_SOCSERV_AUTHORIZATION'] = Main\Config\Option::get('main', 'allow_socserv_authorization', 'Y') != 'N' ? 'Y' : 'N';
		$arResult['FOR_INTRANET'] = false;

		if (Main\ModuleManager::isModuleInstalled('intranet') || Main\ModuleManager::isModuleInstalled('rest'))
			$arResult['FOR_INTRANET'] = true;

		if (Main\Loader::includeModule('socialservices') && $arResult['ALLOW_SOCSERV_AUTHORIZATION'] === 'Y')
		{
			$oAuthManager = new CSocServAuthManager();
			$arServices = $oAuthManager->GetActiveAuthServices(array(
				'BACKURL' => $this->arParams['~CURRENT_PAGE'],
				'FOR_INTRANET' => $arResult['FOR_INTRANET'],
			));

			if (!empty($arServices))
			{
				$APPLICATION->IncludeComponent(
					'bitrix:socserv.auth.form',
					'flat',
					array(
						'AUTH_SERVICES' => $arServices,
						'AUTH_URL' => $arParams['~CURRENT_PAGE'],
						'POST' => $arResult['POST'],
					),
					$component,
					array('HIDE_ICONS' => 'Y')
				);
			}
		}
		?>
	</div>

	<div style="display: none">
		<?
		// we need to have all styles for sale.location.selector.steps, but RestartBuffer() cuts off document head with styles in it
		$APPLICATION->IncludeComponent(
			'bitrix:sale.location.selector.steps',
			'.default',
			array(),
			false
		);
		$APPLICATION->IncludeComponent(
			'bitrix:sale.location.selector.search',
			'.default',
			array(),
			false
		);
		?>
	</div>

	<?
	$signer = new Main\Security\Sign\Signer;
	$signedParams = $signer->sign(base64_encode(serialize($arParams)), 'sale.order.ajax');
	$messages = Loc::loadLanguageFile(__FILE__);
	?>

	<script type="text/javascript">
		// BX.message(<?=CUtil::PhpToJSObject($messages)?>);
		// BX.Sale.OrderAjaxComponent.init({
		// 	result: <?=CUtil::PhpToJSObject($arResult['JS_DATA'])?>,
		// 	locations: <?=CUtil::PhpToJSObject($arResult['LOCATIONS'])?>,
		// 	params: <?=CUtil::PhpToJSObject($arParams)?>,
		// 	signedParamsString: '<?=CUtil::JSEscape($signedParams)?>',
		// 	siteID: '<?=CUtil::JSEscape($component->getSiteId())?>',
		// 	ajaxUrl: '<?=CUtil::JSEscape($component->getPath().'/ajax.php')?>',
		// 	templateFolder: '<?=CUtil::JSEscape($templateFolder)?>',
		// 	propertyValidation: true,
		// 	showWarnings: true,
		// 	pickUpMap: {
		// 		defaultMapPosition: {
		// 			lat: 55.76,
		// 			lon: 37.64,
		// 			zoom: 7
		// 		},
		// 		secureGeoLocation: false,
		// 		geoLocationMaxTime: 5000,
		// 		minToShowNearestBlock: 3,
		// 		nearestPickUpsToShow: 3
		// 	},
		// 	propertyMap: {
		// 		defaultMapPosition: {
		// 			lat: 55.76,
		// 			lon: 37.64,
		// 			zoom: 7
		// 		}
		// 	},
		// 	orderBlockId: 'bx-soa-order',
		// 	authBlockId: 'bx-soa-auth',
		// 	basketBlockId: 'bx-soa-basket',
		// 	regionBlockId: 'bx-soa-region',
		// 	paySystemBlockId: 'bx-soa-paysystem',
		// 	deliveryBlockId: 'bx-soa-delivery',
		// 	pickUpBlockId: 'bx-soa-pickup',
		// 	propsBlockId: 'bx-soa-properties',
		// 	totalBlockId: 'bx-soa-total'
		// });
	</script>

	<script type="text/javascript">
		<?
		// spike: for children of cities we place this prompt
		// $city = \Bitrix\Sale\Location\TypeTable::getList(array('filter' => array('=CODE' => 'CITY'), 'select' => array('ID')))->fetch();
		?>
		BX.saleOrderAjax.init(<?=CUtil::PhpToJSObject(array(
			'source' => $component->getPath().'/get.php',
			'cityTypeId' => intval($city['ID']),
			'messages' => array(
				'otherLocation' => '--- '.Loc::getMessage('SOA_OTHER_LOCATION'),
				'moreInfoLocation' => '--- '.Loc::getMessage('SOA_NOT_SELECTED_ALT'), // spike: for children of cities we place this prompt
				'notFoundPrompt' => '<div class="-bx-popup-special-prompt">'.Loc::getMessage('SOA_LOCATION_NOT_FOUND').'.<br />'.Loc::getMessage('SOA_LOCATION_NOT_FOUND_PROMPT', array(
						'#ANCHOR#' => '<a href="javascript:void(0)" class="-bx-popup-set-mode-add-loc">',
						'#ANCHOR_END#' => '</a>'
					)).'</div>'
			)
		))?>);
	</script>
	<script>
		// (function bx_ymaps_waiter(){
		// 	if (typeof ymaps !== 'undefined')
		// 		ymaps.ready(BX.proxy(BX.Sale.OrderAjaxComponent.initMaps, BX.Sale.OrderAjaxComponent));
		// 	else
		// 		setTimeout(bx_ymaps_waiter, 100);
		// })();
		// <? if ($arParams['USE_YM_GOALS'] === 'Y'): ?>
		// (function bx_counter_waiter(i){
		// 	i = i || 0;
		// 	if (i > 50)
		// 		return;

		// 	if (typeof window['yaCounter<?=$arParams['YM_GOALS_COUNTER']?>'] !== 'undefined')
		// 		BX.Sale.OrderAjaxComponent.reachGoal('initialization');
		// 	else
		// 		setTimeout(function(){bx_counter_waiter(++i)}, 100);
		// })();
		// <? endif ?>
	</script>
	<?
}
?>