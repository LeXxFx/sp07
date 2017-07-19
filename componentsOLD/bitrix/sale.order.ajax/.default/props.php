<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<p class="title-order info-customer">Информация о покупателе</p>

<?if($arResult["PERSON_TYPE"][1]["CHECKED"]):?>

	<div class="label-block">
		<span class="title-input">Ф.И.О</span>
		<input type="text" name="ORDER_PROP_1" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["1"]["VALUE"]?>">
	</div>
	<div class="label-block label-float">
		<span class="title-input">E-Mail</span>
		<input type="text" name="ORDER_PROP_2" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["2"]["VALUE"]?>">
	</div>
	<div class="label-block label-float">
		<span class="title-input">Телефон<b>*</b></span>
		<input type="tel" name="ORDER_PROP_3" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["3"]["VALUE"]?>">
	</div>
	<div class="label-block">
		<span class="title-input">Город<b>*</b></span>


        <?
        $arPropLoc = $arResult["ORDER_PROP"]["USER_PROPS_Y"]["6"];

        if (is_array($arPropLoc["VARIANTS"]) && count($arPropLoc["VARIANTS"]) > 0)
        {
            foreach ($arPropLoc["VARIANTS"] as $arVariant)
            {
                if ($arVariant["SELECTED"] == "Y")
                {
                    $value = $arVariant["ID"];
                    break;
                }
            }
        }

        // here we can get '' or 'popup'
        // map them, if needed
        if(CSaleLocation::isLocationProMigrated())
        {
            $locationTemplate= 'popup';
            $locationTemplateP = $locationTemplate == 'popup' ? 'search' : 'steps';
            $locationTemplateP = $_REQUEST['PERMANENT_MODE_STEPS'] == 1 ? 'steps' : $locationTemplateP; // force to "steps"
        }
        ?>

        <?if($locationTemplateP == 'steps'):?>
            <input type="hidden" id="LOCATION_ALT_PROP_DISPLAY_MANUAL[<?=intval($arProperties["ID"])?>]" name="LOCATION_ALT_PROP_DISPLAY_MANUAL[<?=intval($arProperties["ID"])?>]" value="<?=($_REQUEST['LOCATION_ALT_PROP_DISPLAY_MANUAL'][intval($arProperties["ID"])] ? '1' : '0')?>" />
        <?endif?>




        <?CSaleLocation::proxySaleAjaxLocationsComponent(array(
                "AJAX_CALL" => "N",
                "COUNTRY_INPUT_NAME" => "COUNTRY",
                "REGION_INPUT_NAME" => "REGION",
                "CITY_INPUT_NAME" => $arPropLoc["FIELD_NAME"],
                "CITY_OUT_LOCATION" => "Y",
                "LOCATION_VALUE" => $value,
                "ORDER_PROPS_ID" => $arPropLoc["ID"],
                "ONCITYCHANGE" => ($arPropLoc["IS_LOCATION"] == "Y" || $arPropLoc["IS_LOCATION4TAX"] == "Y") ? "submitForm()" : "",
                "SIZE1" => $arPropLoc["SIZE1"],
            ),
            array(
                "ID" => $value,
                "CODE" => "",
                "SHOW_DEFAULT_LOCATIONS" => "Y",

                // function called on each location change caused by user or by program
                // it may be replaced with global component dispatch mechanism coming soon
                "JS_CALLBACK" => "submitFormProxy",

                // function window.BX.locationsDeferred['X'] will be created and lately called on each form re-draw.
                // it may be removed when sale.order.ajax will use real ajax form posting with BX.ProcessHTML() and other stuff instead of just simple iframe transfer
                "JS_CONTROL_DEFERRED_INIT" => intval($arPropLoc["ID"]),

                // an instance of this control will be placed to window.BX.locationSelectors['X'] and lately will be available from everywhere
                // it may be replaced with global component dispatch mechanism coming soon
                "JS_CONTROL_GLOBAL_ID" => intval($arPropLoc["ID"]),

                "DISABLE_KEYBOARD_INPUT" => "Y",
                "PRECACHE_LAST_LEVEL" => "Y",
                "PRESELECT_TREE_TRUNK" => "Y",
                "SUPPRESS_ERRORS" => "Y"
            ),
            $locationTemplateP,
            true,
            'location-block-wrapper'
        )?>
        <?
        if (strlen(trim($arPropLoc["DESCRIPTION"])) > 0):
            ?>
            <div class="bx_description">
                <?=$arPropLoc["DESCRIPTION"]?>
            </div>
        <?
        endif;
        ?>

    </div>



        <?
        /*
        $many = $APPLICATION->IncludeComponent("bitrix:sale.location.selector.search", "template1", Array(
                "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                "CACHE_TYPE" => "A",	// Тип кеширования
                "CODE" => "",	// Символьный код местоположения
                "COMPONENT_TEMPLATE" => ".default",
                "FILTER_BY_SITE" => "N",	// Фильтровать по сайту
                "ID" => $value,	// ID местоположения
                "INITIALIZE_BY_GLOBAL_EVENT" => "",	// Инициализировать компонент только при наступлении указанного javascript-события на объекте window.document
                "INPUT_NAME" => "ORDER_PROP_6",	// Имя поля ввода
                "JS_CALLBACK" => "",	// Javascript-функция обратного вызова
                "JS_CONTROL_GLOBAL_ID" => "",	// Идентификатор javascript-контрола
                "PROVIDE_LINK_BY" => "id",	// Сохранять связь через
                "SHOW_DEFAULT_LOCATIONS" => "N",	// Отображать местоположения по-умолчанию
                "SUPPRESS_ERRORS" => "N",	// Не показывать ошибки, если они возникли при загрузке компонента
            ),
            false
        );?>


        <?

*/
/*
        ?>
		<?if(!isset($arResult["ORDER_PROP"]["USER_PROPS_Y"]["6"]["VALUE"])) $arResult["ORDER_PROP"]["USER_PROPS_Y"]["6"]["VALUE"] = 20; ?>
		<select name="ORDER_PROP_6" onchange="submitForm()" id="cityselect" style="width: 262px;" class="chosen-select">
			<?foreach($arResult["ORDER_PROP"]["USER_PROPS_Y"]["6"]["VARIANTS"] as $arCity):?><?if($arCity["CITY_NAME"]):?><option value="<?=$arCity["ID"]?>"<?if($arCity["ID"] == $arResult["ORDER_PROP"]["USER_PROPS_Y"]["6"]["VALUE"]) echo ' selected="selected"';?>><?=$arCity["CITY_NAME"]?></option><?endif?><?endforeach;?>
		</select>

<script>
    if(window.jQuery)
    {

        $(function(){

            $(".chosen-select").chosen();

        });
    }

</script>
<?*/?>


	<span class="title-input-adress">Адрес доставки</span>
	<div class="label-block label-float label-adress">
		<span class="title-input">Улица</span>
		<input id="tags" class="input-street" name="ORDER_PROP_20" type="text" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["20"]["VALUE"]?>">
	</div>
	<div class="label-block label-float label-adress">
		<span class="title-input">Дом/Корп.</span>
		<input class="input-dom" name="ORDER_PROP_21" type="text" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["21"]["VALUE"]?>">
	</div>
	<div class="label-block label-float label-adress">
		<span class="title-input">Кв</span>
		<input class="input-kv" name="ORDER_PROP_22" type="text" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["22"]["VALUE"]?>">
	</div>
	<div class="label-block label-float label-adress">
		<span class="title-input">Метро</span>
		<input class="input-metro" name="ORDER_PROP_23" type="text" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["23"]["VALUE"]?>">
	</div>

	<input class="input-address" name="ORDER_PROP_24" type="hidden" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["24"]["VALUE"]?>">

<?endif;?>

<?if($arResult["PERSON_TYPE"][2]["CHECKED"]):?>

	<div class="label-block">
		<span class="title-input">Название компании<b>*</b></span>
		<input type="text" name="ORDER_PROP_8" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["8"]["VALUE"]?>">
	</div>
	<div class="label-block">
		<span class="title-input">Юридический адрес</span>
		<input type="text" name="ORDER_PROP_9" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["9"]["VALUE"]?>">
	</div>
	<div class="label-block label-float">
		<span class="title-input">ИНН</span>
		<input type="text" name="ORDER_PROP_10" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["10"]["VALUE"]?>">
	</div>
	<div class="label-block label-float">
		<span class="title-input">КПП</span>
		<input type="tel" name="ORDER_PROP_11" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["11"]["VALUE"]?>">
	</div>
	<div class="label-block">
		<span class="title-input">Контактное лицо<b>*</b></span>
		<input type="text" name="ORDER_PROP_12" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["12"]["VALUE"]?>">
	</div>
	<div class="label-block label-float">
		<span class="title-input">E-Mail<b>*</b></span>
		<input type="text" name="ORDER_PROP_13" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["13"]["VALUE"]?>">
	</div>
	<div class="label-block label-float">
		<span class="title-input">Телефон<b>*</b></span>
		<input type="tel" name="ORDER_PROP_14" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["14"]["VALUE"]?>">
	</div>
	<div class="label-block">
		<span class="title-input">Город<b>*</b></span>
		<?if(!isset($arResult["ORDER_PROP"]["USER_PROPS_Y"]["18"]["VALUE"])) $arResult["ORDER_PROP"]["USER_PROPS_Y"]["18"]["VALUE"] = 20; ?>
		<select name="ORDER_PROP_18" onchange="submitForm()" id="cityselect" style="width: 262px;">
			<?foreach($arResult["ORDER_PROP"]["USER_PROPS_Y"]["18"]["VARIANTS"] as $arCity):?><?if($arCity["CITY_NAME"]):?><option value="<?=$arCity["ID"]?>"<?if($arCity["ID"] == $arResult["ORDER_PROP"]["USER_PROPS_Y"]["18"]["VALUE"]) echo ' selected="selected"';?>><?=$arCity["CITY_NAME"]?></option><?endif?><?endforeach;?>
		</select>
	</div>
	<span class="title-input-adress">Адрес доставки</span>
	<div class="label-block label-float label-adress">
		<span class="title-input">Улица</span>
		<input id="tags" class="input-street" name="ORDER_PROP_28" type="text" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["28"]["VALUE"]?>">
	</div>
	<div class="label-block label-float label-adress">
		<span class="title-input">Дом/Корп.</span>
		<input class="input-dom" name="ORDER_PROP_29" type="text" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["29"]["VALUE"]?>">
	</div>
	<div class="label-block label-float label-adress">
		<span class="title-input">Кв</span>
		<input class="input-kv" name="ORDER_PROP_30" type="text" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["30"]["VALUE"]?>">
	</div>
	<div class="label-block label-float label-adress">
		<span class="title-input">Метро</span>
		<input class="input-metro" name="ORDER_PROP_31" type="text" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["31"]["VALUE"]?>">
	</div>

	<input class="input-address" name="ORDER_PROP_19" type="hidden" value="<?=$arResult["ORDER_PROP"]["USER_PROPS_Y"]["19"]["VALUE"]?>">

<?endif;?>

<script type="text/javascript">
	function update_address() {
		var value;
		if($("input.input-street").val())
			value = $("input.input-street").val();
		if($("input.input-dom").val())
			value = value + " " + $("input.input-dom").val();
		if($("input.input-kv").val())
			value = value + "/" + $("input.input-kv").val();

		$("input.input-address").val(value);
	}

	$("input.input-street").change(update_address);
	$("input.input-dom").change(update_address);
	$("input.input-kv").change(update_address);
</script>




<?if(CSaleLocation::isLocationProEnabled()):?>

    <?
    $propertyAttributes = array(
        'type' => $arPropLoc["TYPE"],
        'valueSource' => $arPropLoc['SOURCE'] == 'DEFAULT' ? 'default' : 'form' // value taken from property DEFAULT_VALUE or it`s a user-typed value?
    );

    if(intval($arPropLoc['IS_ALTERNATE_LOCATION_FOR']))
        $propertyAttributes['isAltLocationFor'] = intval($arPropLoc['IS_ALTERNATE_LOCATION_FOR']);

    if(intval($arProperties['CAN_HAVE_ALTERNATE_LOCATION']))
        $propertyAttributes['altLocationPropId'] = intval($arPropLoc['CAN_HAVE_ALTERNATE_LOCATION']);

    if($arPropLoc['IS_ZIP'] == 'Y')
        $propertyAttributes['isZip'] = true;
    ?>

    <script>

        <?// add property info to have client-side control on it?>
        (window.top.BX || BX).saleOrderAjax.addPropertyDesc(<?=CUtil::PhpToJSObject(array(
									'id' => intval($arPropLoc["ID"]),
									'attributes' => $propertyAttributes
		))?>);

    </script>
<?endif?>





<script type="text/javascript">
    function fGetBuyerProps(el)
    {
        var show = '<?=GetMessageJS('SOA_TEMPL_BUYER_SHOW')?>';
        var hide = '<?=GetMessageJS('SOA_TEMPL_BUYER_HIDE')?>';
        var status = BX('sale_order_props').style.display;
        var startVal = 0;
        var startHeight = 0;
        var endVal = 0;
        var endHeight = 0;
        var pFormCont = BX('sale_order_props');
        pFormCont.style.display = "block";
        pFormCont.style.overflow = "hidden";
        pFormCont.style.height = 0;
        var display = "";

        if (status == 'none')
        {
            el.text = '<?=GetMessageJS('SOA_TEMPL_BUYER_HIDE');?>';

            startVal = 0;
            startHeight = 0;
            endVal = 100;
            endHeight = pFormCont.scrollHeight;
            display = 'block';
            BX('showProps').value = "Y";
            el.innerHTML = hide;
        }
        else
        {
            el.text = '<?=GetMessageJS('SOA_TEMPL_BUYER_SHOW');?>';

            startVal = 100;
            startHeight = pFormCont.scrollHeight;
            endVal = 0;
            endHeight = 0;
            display = 'none';
            BX('showProps').value = "N";
            pFormCont.style.height = startHeight+'px';
            el.innerHTML = show;
        }

        (new BX.easing({
            duration : 700,
            start : { opacity : startVal, height : startHeight},
            finish : { opacity: endVal, height : endHeight},
            transition : BX.easing.makeEaseOut(BX.easing.transitions.quart),
            step : function(state){
                pFormCont.style.height = state.height + "px";
                pFormCont.style.opacity = state.opacity / 100;
            },
            complete : function(){
                BX('sale_order_props').style.display = display;
                BX('sale_order_props').style.height = '';

                pFormCont.style.overflow = "visible";
            }
        })).animate();
    }
</script>

<?if(!CSaleLocation::isLocationProEnabled()):?>
    <div style="display:none;">

        <?$APPLICATION->IncludeComponent(
            "bitrix:sale.ajax.locations",
            $arParams["TEMPLATE_LOCATION"],
            array(
                "AJAX_CALL" => "N",
                "COUNTRY_INPUT_NAME" => "COUNTRY_tmp",
                "REGION_INPUT_NAME" => "REGION_tmp",
                "CITY_INPUT_NAME" => "tmp",
                "CITY_OUT_LOCATION" => "Y",
                "LOCATION_VALUE" => "",
                "ONCITYCHANGE" => "submitForm()",
            ),
            null,
            array('HIDE_ICONS' => 'Y')
        );?>

    </div>
<?endif?>

