<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$this->setFrameMode(true);
if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] == 'Y')
{
	$basketAction = (isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? array($arParams['COMMON_ADD_TO_BASKET_ACTION']) : array());
}
else
{
	$basketAction = (isset($arParams['DETAIL_ADD_TO_BASKET_ACTION']) ? $arParams['DETAIL_ADD_TO_BASKET_ACTION'] : array());
}
?>
<?$APPLICATION->IncludeComponent(
	"h2o:buyoneclick", 
	"LXtemplate", 
	array(
		"ALLOW_ORDER_FOR_EXISTING_EMAIL" => "N",
		"CACHE_TIME" => "86400",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DEFAULT_DELIVERY" => "1",
		"DEFAULT_PAY_SYSTEM" => "1",
		"GENERATE_EMAIL_FROM_PHONE" => "N",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "1c_catalog",
		"MODE_EXTENDED" => "Y",
		"NEW_USER_GROUP_ID" => array(
			0 => "5",
		),
		"NOT_AUTHORIZE_USER" => "Y",
		"SEND_MAIL" => "N",
		"SEND_MAIL_REQ" => "N",
		"SHOW_OFFERS_FIRST_STEP" => "Y",
		"SHOW_PROPERTIES" => array(
		),
		"SHOW_PROPERTIES_REQUIRED" => array(
		),
		"SHOW_USER_DESCRIPTION" => "Y",
		"USER_DATA_FIELDS" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "PERSONAL_PHONE",
		),
		"USER_DATA_FIELDS_REQUIRED" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "PERSONAL_PHONE",
		),
		"USE_CAPTCHA" => "N",
		"USE_OLD_CLASS" => "N",
		"COMPONENT_TEMPLATE" => "LXtemplate",
		"SHOW_QUANTITY" => "Y",
		"PERSON_TYPE_ID" => "1",
		"PATH_TO_PAYMENT" => "/personal/order/payment/",
		"SHOW_PAY_SYSTEM" => "N",
		"SHOW_DELIVERY" => "N",
		"PRICE_CODE" => array(
			0 => "Для сайта (САЙТ цена)",
		),
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "_KHARAKTERISTIKI_NOMENKLATURY",
			1 => "AMORTIZATR",
			2 => "AMORTIZATR_1",
			3 => "BAGAZHNIK",
			4 => "MATERIAL",
			5 => "BREND",
			6 => "VAYVAYVA",
			7 => "VES",
			8 => "VILKA_PEREDNYAYA",
			9 => "DIAMETR_KOLES",
			10 => "RAZMER_GOLOVNOGO_UBORA",
			11 => "VTULKA_ZADNYAYA",
			12 => "RAZMER_OBUVI",
			13 => "CML2_ARTICLE",
			14 => "CML2_BASE_UNIT",
			15 => "VTULKA_PEREDNYAYA",
			16 => "MORE_PHOTO",
			17 => "CML2_MANUFACTURER",
			18 => "RAZMER_PERCHATOK",
			19 => "CML2_TRAITS",
			20 => "CML2_TAXES",
			21 => "FILES",
			22 => "CML2_ATTRIBUTES",
			23 => "CML2_BAR_CODE",
			24 => "VTORAYA",
			25 => "DLINA",
			26 => "SEZON",
			27 => "VYSOTA",
			28 => "GEOMETRIYA",
			29 => "DETSKIY_RAZMER",
			30 => "ZADNIY_PEREKLYUCHATEL_SKOROSTEY",
			31 => "SOOTVETSTVUET_RAZMERU",
			32 => "DIAMETR_VKLADYSHA",
			33 => "ZVYEZDOCHKA",
			34 => "DIAMETR",
			35 => "DLINA_PALOK",
			36 => "KARETKA",
			37 => "DLYA_TARELKI",
			38 => "KASSETA_TRESHCHOTKA",
			39 => "LEVAYA_PRAVAYA",
			40 => "KOLICHESTVO_KAMER",
			41 => "KOLICHESTVO_SKOROSTEY",
			42 => "MOSHCHNOST",
			43 => "DLINA_1",
			44 => "ISPOLZOVANIE",
			45 => "KOLLICHESTVO_PROGRAMM",
			46 => "KOLICHESTVO",
			47 => "KRYLYA",
			48 => "DLINA_2",
			49 => "KARKAS",
			50 => "OBODA",
			51 => "MAKSIMALNYY_UROVEN_VODY",
			52 => "PEDALI",
			53 => "RAZMER_GETR",
			54 => "KUPOL",
			55 => "PEREDNIY_PEREKLYUCHATEL_SKOROSTEY",
			56 => "RAZMER_GIMN_MYACHEY",
			57 => "PLOSHCHAD_GRAVIROVANNOY_TABLICHKI",
			58 => "POKRYSHKI",
			59 => "POL",
			60 => "RAZMER_OLD",
			61 => "RAZMER",
			62 => "RAZMER_3",
			63 => "FORMA",
			64 => "NAGRUZKA",
			65 => "PROIZVODITELNOST_NASOSA",
			66 => "RAZMER_RAMY",
			67 => "RULEVAYA_KOLONKA",
			68 => "RAZMER_PLAKETKI",
			69 => "SEDLO",
			70 => "SISTEMA",
			71 => "RAZMER_FORMY",
			72 => "TORMOZA",
			73 => "RAZMER_FUTBOLKI",
			74 => "ROST",
			75 => "UPRAVLENIE_SKOROSTYU_I_NAKLONOM_NA_PORUCHNYAKH",
			76 => "PROVERKA_PROVERKI",
			77 => "RAZMER_FUTLYARA",
			78 => "UPAKOVKA",
			79 => "TSVET",
			80 => "TSVET_1",
			81 => "TSVET_2",
			82 => "SHIFTERY",
			83 => "TIP",
			84 => "RISUNOK",
			85 => "TSVET_GRAVIROVKI",
			86 => "TIP_1",
			87 => "",
		),
		"SUCCESS_HEAD_MESS" => "Поздравляем!",
		"SUCCESS_ADD_MESS" => "Вы успешно оформили заказ №#ORDER_ID#!",
		"BUY_CURRENT_BASKET" => "N",
		"ADD_NOT_AUTH_TO_ONE_USER" => "N"
	),
	false
);?>
<?$ElementID = $APPLICATION->IncludeComponent(
	"bitrix:catalog.element",
	"",
	array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"META_KEYWORDS" => $arParams["DETAIL_META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["DETAIL_META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["DETAIL_BROWSER_TITLE"],
		"SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"CHECK_SECTION_ID_VARIABLE" => (isset($arParams["DETAIL_CHECK_SECTION_ID_VARIABLE"]) ? $arParams["DETAIL_CHECK_SECTION_ID_VARIABLE"] : ''),
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
		"PRICE_VAT_SHOW_VALUE" => $arParams["PRICE_VAT_SHOW_VALUE"],
		"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
		"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
		"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
		"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
		"LINK_IBLOCK_TYPE" => $arParams["LINK_IBLOCK_TYPE"],
		"LINK_IBLOCK_ID" => $arParams["LINK_IBLOCK_ID"],
		"LINK_PROPERTY_SID" => $arParams["LINK_PROPERTY_SID"],
		"LINK_ELEMENTS_URL" => $arParams["LINK_ELEMENTS_URL"],

		"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
		"OFFERS_FIELD_CODE" => $arParams["DETAIL_OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => $arParams["DETAIL_OFFERS_PROPERTY_CODE"],
		"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
		"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
		"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],

		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
		'CURRENCY_ID' => $arParams['CURRENCY_ID'],
		'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
		'USE_ELEMENT_COUNTER' => $arParams['USE_ELEMENT_COUNTER'],
		'SHOW_DEACTIVATED' => $arParams['SHOW_DEACTIVATED'],
		"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],

		'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
		'LABEL_PROP' => $arParams['LABEL_PROP'],
		'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
		'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
		'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
		'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
		'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
		'SHOW_MAX_QUANTITY' => $arParams['DETAIL_SHOW_MAX_QUANTITY'],
		'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
		'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
		'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
		'MESS_BTN_COMPARE' => $arParams['MESS_BTN_COMPARE'],
		'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],
		'USE_VOTE_RATING' => $arParams['DETAIL_USE_VOTE_RATING'],
		'VOTE_DISPLAY_AS_RATING' => (isset($arParams['DETAIL_VOTE_DISPLAY_AS_RATING']) ? $arParams['DETAIL_VOTE_DISPLAY_AS_RATING'] : ''),
		'USE_COMMENTS' => $arParams['DETAIL_USE_COMMENTS'],
		'BLOG_USE' => (isset($arParams['DETAIL_BLOG_USE']) ? $arParams['DETAIL_BLOG_USE'] : ''),
		'BLOG_URL' => (isset($arParams['DETAIL_BLOG_URL']) ? $arParams['DETAIL_BLOG_URL'] : ''),
		'BLOG_EMAIL_NOTIFY' => (isset($arParams['DETAIL_BLOG_EMAIL_NOTIFY']) ? $arParams['DETAIL_BLOG_EMAIL_NOTIFY'] : ''),
		'VK_USE' => (isset($arParams['DETAIL_VK_USE']) ? $arParams['DETAIL_VK_USE'] : ''),
		'VK_API_ID' => (isset($arParams['DETAIL_VK_API_ID']) ? $arParams['DETAIL_VK_API_ID'] : 'API_ID'),
		'FB_USE' => (isset($arParams['DETAIL_FB_USE']) ? $arParams['DETAIL_FB_USE'] : ''),
		'FB_APP_ID' => (isset($arParams['DETAIL_FB_APP_ID']) ? $arParams['DETAIL_FB_APP_ID'] : ''),
		'BRAND_USE' => (isset($arParams['DETAIL_BRAND_USE']) ? $arParams['DETAIL_BRAND_USE'] : 'N'),
		'BRAND_PROP_CODE' => (isset($arParams['DETAIL_BRAND_PROP_CODE']) ? $arParams['DETAIL_BRAND_PROP_CODE'] : ''),
		'DISPLAY_NAME' => (isset($arParams['DETAIL_DISPLAY_NAME']) ? $arParams['DETAIL_DISPLAY_NAME'] : ''),
		'ADD_DETAIL_TO_SLIDER' => "Y",//(isset($arParams['DETAIL_ADD_DETAIL_TO_SLIDER']) ? $arParams['DETAIL_ADD_DETAIL_TO_SLIDER'] : ''),
		'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
		"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : ''),
		"ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
		"DISPLAY_PREVIEW_TEXT_MODE" => (isset($arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE']) ? $arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE'] : ''),
		"DETAIL_PICTURE_MODE" => (isset($arParams['DETAIL_DETAIL_PICTURE_MODE']) ? $arParams['DETAIL_DETAIL_PICTURE_MODE'] : ''),
		'ADD_TO_BASKET_ACTION' => $basketAction,
		'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
		'DISPLAY_COMPARE' => (isset($arParams['USE_COMPARE']) ? $arParams['USE_COMPARE'] : ''),
		'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
		'SHOW_BASIS_PRICE' => (isset($arParams['DETAIL_SHOW_BASIS_PRICE']) ? $arParams['DETAIL_SHOW_BASIS_PRICE'] : 'Y')
	),
	$component
);?><?
$GLOBALS["CATALOG_CURRENT_ELEMENT_ID"] = $ElementID;
unset($basketAction);
if ($ElementID > 0)
{
	if($arParams["USE_STORE"] == "Y" && ModuleManager::isModuleInstalled("catalog"))
	{
		?><?$APPLICATION->IncludeComponent("bitrix:catalog.store.amount", ".default", array(
			"ELEMENT_ID" => $ElementID,
			"STORE_PATH" => $arParams['STORE_PATH'],
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000",
			"MAIN_TITLE" => $arParams['MAIN_TITLE'],
			"USE_MIN_AMOUNT" =>  $arParams['USE_MIN_AMOUNT'],
			"MIN_AMOUNT" => $arParams['MIN_AMOUNT'],
			"STORES" => $arParams['STORES'],
			"SHOW_EMPTY_STORE" => $arParams['SHOW_EMPTY_STORE'],
			"SHOW_GENERAL_STORE_INFORMATION" => $arParams['SHOW_GENERAL_STORE_INFORMATION'],
			"USER_FIELDS" => $arParams['USER_FIELDS'],
			"FIELDS" => $arParams['FIELDS']
		),
		$component,
		array("HIDE_ICONS" => "Y")
	);?><?
	}

	$arRecomData = array();
	$recomCacheID = array('IBLOCK_ID' => $arParams['IBLOCK_ID']);
	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($recomCacheID), "/catalog/recommended"))
	{
		$arRecomData = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		if (Loader::includeModule("catalog"))
		{
			$arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
			$arRecomData['OFFER_IBLOCK_ID'] = (!empty($arSKU) ? $arSKU['IBLOCK_ID'] : 0);
			$arRecomData['IBLOCK_LINK'] = '';
			$arRecomData['ALL_LINK'] = '';
			$rsProps = CIBlockProperty::GetList(
				array('SORT' => 'ASC', 'ID' => 'ASC'),
				array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'PROPERTY_TYPE' => 'E', 'ACTIVE' => 'Y')
			);
			$found = false;
			while ($arProp = $rsProps->Fetch())
			{
				if ($found)
				{
					break;
				}
				if ($arProp['CODE'] == '')
				{
					$arProp['CODE'] = $arProp['ID'];
				}
				$arProp['LINK_IBLOCK_ID'] = intval($arProp['LINK_IBLOCK_ID']);
				if ($arProp['LINK_IBLOCK_ID'] != 0 && $arProp['LINK_IBLOCK_ID'] != $arParams['IBLOCK_ID'])
				{
					continue;
				}
				if ($arProp['LINK_IBLOCK_ID'] > 0)
				{
					if ($arRecomData['IBLOCK_LINK'] == '')
					{
						$arRecomData['IBLOCK_LINK'] = $arProp['CODE'];
						$found = true;
					}
				}
				else
				{
					if ($arRecomData['ALL_LINK'] == '')
					{
						$arRecomData['ALL_LINK'] = $arProp['CODE'];
					}
				}
			}
			if ($found)
			{
				if(defined("BX_COMP_MANAGED_CACHE"))
				{
					global $CACHE_MANAGER;
					$CACHE_MANAGER->StartTagCache("/catalog/recommended");
					$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);
					$CACHE_MANAGER->EndTagCache();
				}
			}
		}
		$obCache->EndDataCache($arRecomData);
	}
	if (!empty($arRecomData))
	{
		if (ModuleManager::isModuleInstalled("sale") && (!isset($arParams['USE_BIG_DATA']) || $arParams['USE_BIG_DATA'] != 'N'))
		{
			?><?$APPLICATION->IncludeComponent("bitrix:catalog.bigdata.products", "", array(
				"LINE_ELEMENT_COUNT" => 5,
				"TEMPLATE_THEME" => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
				"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
				"BASKET_URL" => $arParams["BASKET_URL"],
				"ACTION_VARIABLE" => (!empty($arParams["ACTION_VARIABLE"]) ? $arParams["ACTION_VARIABLE"] : "action")."_cbdp",
				"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
				"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
				"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
				"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
				"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
				"SHOW_OLD_PRICE" => $arParams['SHOW_OLD_PRICE'],
				"SHOW_DISCOUNT_PERCENT" => $arParams['SHOW_DISCOUNT_PERCENT'],
				"PRICE_CODE" => $arParams["PRICE_CODE"],
				"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
				"PRODUCT_SUBSCRIPTION" => $arParams['PRODUCT_SUBSCRIPTION'],
				"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
				"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
				"SHOW_NAME" => "Y",
				"SHOW_IMAGE" => "Y",
				"MESS_BTN_BUY" => $arParams['MESS_BTN_BUY'],
				"MESS_BTN_DETAIL" => $arParams['MESS_BTN_DETAIL'],
				"MESS_BTN_SUBSCRIBE" => $arParams['MESS_BTN_SUBSCRIBE'],
				"MESS_NOT_AVAILABLE" => $arParams['MESS_NOT_AVAILABLE'],
				"PAGE_ELEMENT_COUNT" => 5,
				"SHOW_FROM_SECTION" => "N",
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"DEPTH" => "2",
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
				"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
				"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
				"CURRENCY_ID" => $arParams["CURRENCY_ID"],
				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"SECTION_ELEMENT_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_ELEMENT_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"ID" => $ElementID,
				"LABEL_PROP_".$arParams["IBLOCK_ID"] => $arParams['LABEL_PROP'],
				"PROPERTY_CODE_".$arParams["IBLOCK_ID"] => $arParams["LIST_PROPERTY_CODE"],
				"PROPERTY_CODE_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["LIST_OFFERS_PROPERTY_CODE"],
				"CART_PROPERTIES_".$arParams["IBLOCK_ID"] => $arParams["PRODUCT_PROPERTIES"],
				"CART_PROPERTIES_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFERS_CART_PROPERTIES"],
				"ADDITIONAL_PICT_PROP_".$arParams["IBLOCK_ID"] => $arParams['ADD_PICT_PROP'],
				"ADDITIONAL_PICT_PROP_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams['OFFER_ADD_PICT_PROP'],
				"OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
				"RCM_TYPE" => (isset($arParams['BIG_DATA_RCM_TYPE']) ? $arParams['BIG_DATA_RCM_TYPE'] : '')
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);
		}
		if (($arRecomData['IBLOCK_LINK'] != '' || $arRecomData['ALL_LINK'] != ''))
		{
			?><?
			$APPLICATION->IncludeComponent(
				"bitrix:catalog.recommended.products",
				"",
				array(
					"LINE_ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
					"TEMPLATE_THEME" => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
					"ID" => $ElementID,
					"PROPERTY_LINK" => ($arRecomData['IBLOCK_LINK'] != '' ? $arRecomData['IBLOCK_LINK'] : $arRecomData['ALL_LINK']),
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
					"PAGE_ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
					"SHOW_OLD_PRICE" => $arParams['SHOW_OLD_PRICE'],
					"SHOW_DISCOUNT_PERCENT" => $arParams['SHOW_DISCOUNT_PERCENT'],
					"PRICE_CODE" => $arParams["PRICE_CODE"],
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
					"PRODUCT_SUBSCRIPTION" => 'N',
					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
					"SHOW_NAME" => "Y",
					"SHOW_IMAGE" => "Y",
					"MESS_BTN_BUY" => $arParams['MESS_BTN_BUY'],
					"MESS_BTN_DETAIL" => $arParams["MESS_BTN_DETAIL"],
					"MESS_NOT_AVAILABLE" => $arParams['MESS_NOT_AVAILABLE'],
					"MESS_BTN_SUBSCRIBE" => $arParams['MESS_BTN_SUBSCRIBE'],
					"SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
					"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
					"OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
					"OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
					"ADDITIONAL_PICT_PROP_".$arParams['IBLOCK_ID'] => $arParams['ADD_PICT_PROP'],
					"ADDITIONAL_PICT_PROP_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams['OFFER_ADD_PICT_PROP'],
					"PROPERTY_CODE_".$arRecomData['OFFER_IBLOCK_ID'] => array(),
					"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
					"CURRENCY_ID" => $arParams["CURRENCY_ID"]
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?><?
		}
	}

	if($arParams["USE_ALSO_BUY"] == "Y" && ModuleManager::isModuleInstalled("sale") && !empty($arRecomData))
	{
		?><?$APPLICATION->IncludeComponent("bitrix:sale.recommended.products", ".default", array(
			"ID" => $ElementID,
			"TEMPLATE_THEME" => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
			"MIN_BUYES" => $arParams["ALSO_BUY_MIN_BUYES"],
			"ELEMENT_COUNT" => "7",//$arParams["ALSO_BUY_ELEMENT_COUNT"],
			"LINE_ELEMENT_COUNT" => "7",//$arParams["ALSO_BUY_ELEMENT_COUNT"],
			"DETAIL_URL" => $arParams["DETAIL_URL"],
			"BASKET_URL" => $arParams["BASKET_URL"],
			"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
			"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
			"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
			"PAGE_ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"PRICE_CODE" => $arParams["PRICE_CODE"],
			"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
			"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
			"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
			'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
			'CURRENCY_ID' => $arParams['CURRENCY_ID'],
			'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
			"SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
			"PROPERTY_CODE_".$arRecomData['OFFER_IBLOCK_ID'] => array(    ),
			"OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
			"OFFER_TREE_PROPS_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams["OFFER_TREE_PROPS"],
			"ADDITIONAL_PICT_PROP_".$arParams['IBLOCK_ID'] => $arParams['ADD_PICT_PROP'],
			"ADDITIONAL_PICT_PROP_".$arRecomData['OFFER_IBLOCK_ID'] => $arParams['OFFER_ADD_PICT_PROP']
		),
		$component,
		array("HIDE_ICONS" => "Y")
	);
		?><?
	}
}
?>
<?
// $APPLICATION->IncludeComponent(
// 	"h2o:buyoneclick", 
// 	"LXtemplate", 
// 	array(
// 		"ADD_NOT_AUTH_TO_ONE_USER" => "N",
// 		"ALLOW_ORDER_FOR_EXISTING_EMAIL" => "N",
// 		"BUY_CURRENT_BASKET" => "N",
// 		"CACHE_TIME" => "86400",
// 		"CACHE_TYPE" => "A",
// 		"DEFAULT_DELIVERY" => "1",
// 		"DEFAULT_PAY_SYSTEM" => "1",
// 		"GENERATE_EMAIL_FROM_PHONE" => "N",
// 		"IBLOCK_ID" => "9",
// 		"IBLOCK_TYPE" => "1c_catalog",
// 		"LIST_OFFERS_PROPERTY_CODE" => array(
// 			0 => "AMORTIZATR",
// 			1 => "BAGAZHNIK",
// 			2 => "BREND",
// 			3 => "VAYVAYVA",
// 			4 => "VES",
// 			5 => "VILKA_PEREDNYAYA",
// 			6 => "VTULKA_ZADNYAYA",
// 			7 => "CML2_ARTICLE",
// 			8 => "CML2_BASE_UNIT",
// 			9 => "VTULKA_PEREDNYAYA",
// 			10 => "MORE_PHOTO",
// 			11 => "CML2_MANUFACTURER",
// 			12 => "CML2_TRAITS",
// 			13 => "CML2_TAXES",
// 			14 => "FILES",
// 			15 => "CML2_BAR_CODE",
// 			16 => "VTORAYA",
// 			17 => "DLINA",
// 			18 => "VYSOTA",
// 			19 => "DETSKIY_RAZMER",
// 			20 => "ZADNIY_PEREKLYUCHATEL_SKOROSTEY",
// 			21 => "DIAMETR_VKLADYSHA",
// 			22 => "ZVYEZDOCHKA",
// 			23 => "DIAMETR",
// 			24 => "KARETKA",
// 			25 => "DLYA_TARELKI",
// 			26 => "KASSETA_TRESHCHOTKA",
// 			27 => "KOLICHESTVO_KAMER",
// 			28 => "KOLICHESTVO_SKOROSTEY",
// 			29 => "DLINA_1",
// 			30 => "ISPOLZOVANIE",
// 			31 => "KOLLICHESTVO_PROGRAMM",
// 			32 => "KOLICHESTVO",
// 			33 => "KRYLYA",
// 			34 => "DLINA_2",
// 			35 => "KARKAS",
// 			36 => "OBODA",
// 			37 => "MAKSIMALNYY_UROVEN_VODY",
// 			38 => "PEDALI",
// 			39 => "KUPOL",
// 			40 => "PEREDNIY_PEREKLYUCHATEL_SKOROSTEY",
// 			41 => "PLOSHCHAD_GRAVIROVANNOY_TABLICHKI",
// 			42 => "POKRYSHKI",
// 			43 => "POL",
// 			44 => "RAZMER",
// 			45 => "RAZMER_3",
// 			46 => "NAGRUZKA",
// 			47 => "PROIZVODITELNOST_NASOSA",
// 			48 => "RAZMER_RAMY",
// 			49 => "RULEVAYA_KOLONKA",
// 			50 => "RAZMER_PLAKETKI",
// 			51 => "SEDLO",
// 			52 => "SISTEMA",
// 			53 => "RAZMER_FORMY",
// 			54 => "TORMOZA",
// 			55 => "RAZMER_FUTBOLKI",
// 			56 => "ROST",
// 			57 => "UPRAVLENIE_SKOROSTYU_I_NAKLONOM_NA_PORUCHNYAKH",
// 			58 => "PROVERKA_PROVERKI",
// 			59 => "RAZMER_FUTLYARA",
// 			60 => "UPAKOVKA",
// 			61 => "TSVET",
// 			62 => "TSVET_1",
// 			63 => "TSVET_2",
// 			64 => "SHIFTERY",
// 			65 => "TIP",
// 			66 => "RISUNOK",
// 			67 => "TSVET_GRAVIROVKI",
// 			68 => "TIP_1",
// 			69 => "",
// 		),
// 		"MODE_EXTENDED" => "Y",
// 		"NEW_USER_GROUP_ID" => array(
// 			0 => "5",
// 		),
// 		"NOT_AUTHORIZE_USER" => "N",
// 		"PATH_TO_PAYMENT" => "/personal/order/payment/",
// 		"PAY_SYSTEMS" => "",
// 		"PERSON_TYPE_ID" => "1",
// 		"PRICE_CODE" => array(
// 			0 => "Для сайта (САЙТ цена)",
// 		),
// 		"SEND_MAIL" => "N",
// 		"SEND_MAIL_REQ" => "N",
// 		"SHOW_DELIVERY" => "N",
// 		"SHOW_OFFERS_FIRST_STEP" => "Y",
// 		"SHOW_PAY_SYSTEM" => "N",
// 		"SHOW_PROPERTIES" => array(
// 		),
// 		"SHOW_PROPERTIES_REQUIRED" => array(
// 		),
// 		"SHOW_QUANTITY" => "Y",
// 		"SHOW_USER_DESCRIPTION" => "Y",
// 		"SUCCESS_ADD_MESS" => "Вы успешно оформили заказ №#ORDER_ID#!",
// 		"SUCCESS_HEAD_MESS" => "Поздравляем!",
// 		"USER_DATA_FIELDS" => array(
// 			0 => "NAME",
// 			1 => "EMAIL",
// 			2 => "PERSONAL_PHONE",
// 		),
// 		"USER_DATA_FIELDS_REQUIRED" => array(
// 			0 => "NAME",
// 			1 => "EMAIL",
// 			2 => "PERSONAL_PHONE",
// 		),
// 		"USE_CAPTCHA" => "N",
// 		"USE_OLD_CLASS" => "N",
// 		"COMPONENT_TEMPLATE" => ".default"
// 	),
// 	false
// );
?>