<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");

//if($USER->IsAdmin()):
//	$templ = ".default";
//else:
//	$templ = ".default";
//endif;
	if($_REQUEST["order"] == "rating" || $_REQUEST["order"] == "new" || $_REQUEST["order"] == "price")
		$order = $_REQUEST["order"];
	else
		$order = "sort";

	if($_REQUEST["sort"] == "asc")
		$sort = $_REQUEST["sort"];
	else
		$sort = "desc";

		$num = $arParams["PAGE_ELEMENT_COUNT"];

	if($order == "price")
		$arParams["ELEMENT_SORT_FIELD"] = "property_MINIMUM_PRICE_2";
	if($order == "rating")
		$arParams["ELEMENT_SORT_FIELD"] = "property_rating";
	if($order == "new")
		$arParams["ELEMENT_SORT_FIELD"] = "property_M_NEW";
	if($order == "sort")
		$arParams["ELEMENT_SORT_FIELD"] = "sort";

	$arParams["ELEMENT_SORT_ORDER"] = $sort;

	if (isset($_GET['viewmode'])) $_SESSION['viewmode']=$_GET['viewmode'];
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	".default", 
	array(
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => "9",
		"TEMPLATE_THEME" => "site",
		"HIDE_NOT_AVAILABLE" => "N",
		"BASKET_URL" => "/personal/cart/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"PRODUCT_QUANTITY_VARIABLE" => "QUANTITY",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/store/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "Y",
		"ADD_SECTION_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"SET_STATUS_404" => "N",
		"DETAIL_DISPLAY_NAME" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "",
		"FILTER_VIEW_MODE" => "VERTICAL",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "Для сайта (САЙТ цена)",
		),
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "VES",
			1 => "DLINA",
			2 => "DLINA_2",
			3 => "RAZMER",
			4 => "RAZMER_3",
			5 => "NAGRUZKA",
			6 => "ROST",
			7 => "TSVET",
			8 => "TSVET_1",
			9 => "TSVET_2",
			10 => "",
		),
		"USE_REVIEW" => "Y",
		"MESSAGES_PER_PAGE" => "10",
		"USE_CAPTCHA" => "Y",
		"REVIEW_AJAX_POST" => "Y",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"FORUM_ID" => "1",
		"URL_TEMPLATES_READ" => "",
		"SHOW_LINK_TO_FORUM" => "Y",
		"USE_COMPARE" => "N",
		"PRICE_CODE" => array(
			0 => "Для сайта (САЙТ цена)",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_PROPERTIES" => array(
			0 => "CML2_ATTRIBUTES",
		),
		"USE_PRODUCT_QUANTITY" => "N",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"QUANTITY_FLOAT" => "N",
		"OFFERS_CART_PROPERTIES" => array(
			0 => "AMORTIZATR",
			1 => "BAGAZHNIK",
			2 => "BREND",
			3 => "VAYVAYVA",
			4 => "VES",
			5 => "VILKA_PEREDNYAYA",
			6 => "VTULKA_ZADNYAYA",
			7 => "CML2_ARTICLE",
			8 => "CML2_BASE_UNIT",
			9 => "VTULKA_PEREDNYAYA",
			10 => "CML2_MANUFACTURER",
			11 => "CML2_TRAITS",
			12 => "CML2_TAXES",
			13 => "CML2_ATTRIBUTES",
			14 => "CML2_BAR_CODE",
			15 => "VTORAYA",
			16 => "DLINA",
			17 => "VYSOTA",
			18 => "DETSKIY_RAZMER",
			19 => "ZADNIY_PEREKLYUCHATEL_SKOROSTEY",
			20 => "DIAMETR_VKLADYSHA",
			21 => "ZVYEZDOCHKA",
			22 => "DIAMETR",
			23 => "KARETKA",
			24 => "DLYA_TARELKI",
			25 => "KASSETA_TRESHCHOTKA",
			26 => "KOLICHESTVO_KAMER",
			27 => "KOLICHESTVO_SKOROSTEY",
			28 => "DLINA_1",
			29 => "ISPOLZOVANIE",
			30 => "KOLLICHESTVO_PROGRAMM",
			31 => "KOLICHESTVO",
			32 => "KRYLYA",
			33 => "DLINA_2",
			34 => "KARKAS",
			35 => "OBODA",
			36 => "MAKSIMALNYY_UROVEN_VODY",
			37 => "PEDALI",
			38 => "KUPOL",
			39 => "PEREDNIY_PEREKLYUCHATEL_SKOROSTEY",
			40 => "PLOSHCHAD_GRAVIROVANNOY_TABLICHKI",
			41 => "POKRYSHKI",
			42 => "POL",
			43 => "RAZMER",
			44 => "RAZMER_3",
			45 => "NAGRUZKA",
			46 => "PROIZVODITELNOST_NASOSA",
			47 => "RAZMER_RAMY",
			48 => "RULEVAYA_KOLONKA",
			49 => "RAZMER_PLAKETKI",
			50 => "SEDLO",
			51 => "SISTEMA",
			52 => "RAZMER_FORMY",
			53 => "TORMOZA",
			54 => "RAZMER_FUTBOLKI",
			55 => "ROST",
			56 => "UPRAVLENIE_SKOROSTYU_I_NAKLONOM_NA_PORUCHNYAKH",
			57 => "PROVERKA_PROVERKI",
			58 => "RAZMER_FUTLYARA",
			59 => "UPAKOVKA",
			60 => "TSVET",
			61 => "TSVET_1",
			62 => "TSVET_2",
			63 => "SHIFTERY",
			64 => "TIP",
			65 => "RISUNOK",
			66 => "TSVET_GRAVIROVKI",
		),
		"SHOW_TOP_ELEMENTS" => "N",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_TOP_DEPTH" => "1",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTIONS_SHOW_PARENT_NAME" => "N",
		"PAGE_ELEMENT_COUNT" => "16",
		"LINE_ELEMENT_COUNT" => "4",
		"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
		"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
		"ELEMENT_SORT_FIELD2" => "shows",
		"ELEMENT_SORT_ORDER2" => "asc",
		"LIST_PROPERTY_CODE" => array(
			0 => "VES",
			1 => "CML2_BASE_UNIT",
			2 => "DLINA",
			3 => "DLINA_1",
			4 => "POL",
			5 => "RAZMER",
			6 => "RAZMER_3",
			7 => "NAGRUZKA",
			8 => "ROST",
			9 => "TSVET_2",
			10 => "NEWPRODUCT",
			11 => "SALELEADER",
			12 => "SPECIALOFFER",
			13 => "",
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "AMORTIZATR",
			1 => "BAGAZHNIK",
			2 => "BREND",
			3 => "VAYVAYVA",
			4 => "VES",
			5 => "VILKA_PEREDNYAYA",
			6 => "VTULKA_ZADNYAYA",
			7 => "CML2_ARTICLE",
			8 => "CML2_BASE_UNIT",
			9 => "VTULKA_PEREDNYAYA",
			10 => "MORE_PHOTO",
			11 => "CML2_MANUFACTURER",
			12 => "CML2_TRAITS",
			13 => "CML2_TAXES",
			14 => "FILES",
			15 => "CML2_ATTRIBUTES",
			16 => "CML2_BAR_CODE",
			17 => "VTORAYA",
			18 => "DLINA",
			19 => "VYSOTA",
			20 => "DETSKIY_RAZMER",
			21 => "ZADNIY_PEREKLYUCHATEL_SKOROSTEY",
			22 => "DIAMETR_VKLADYSHA",
			23 => "ZVYEZDOCHKA",
			24 => "DIAMETR",
			25 => "KARETKA",
			26 => "DLYA_TARELKI",
			27 => "KASSETA_TRESHCHOTKA",
			28 => "KOLICHESTVO_KAMER",
			29 => "KOLICHESTVO_SKOROSTEY",
			30 => "DLINA_1",
			31 => "ISPOLZOVANIE",
			32 => "KOLLICHESTVO_PROGRAMM",
			33 => "KOLICHESTVO",
			34 => "KRYLYA",
			35 => "DLINA_2",
			36 => "KARKAS",
			37 => "OBODA",
			38 => "MAKSIMALNYY_UROVEN_VODY",
			39 => "PEDALI",
			40 => "KUPOL",
			41 => "PEREDNIY_PEREKLYUCHATEL_SKOROSTEY",
			42 => "PLOSHCHAD_GRAVIROVANNOY_TABLICHKI",
			43 => "POKRYSHKI",
			44 => "POL",
			45 => "RAZMER",
			46 => "RAZMER_3",
			47 => "NAGRUZKA",
			48 => "PROIZVODITELNOST_NASOSA",
			49 => "RAZMER_RAMY",
			50 => "RULEVAYA_KOLONKA",
			51 => "RAZMER_PLAKETKI",
			52 => "SEDLO",
			53 => "SISTEMA",
			54 => "RAZMER_FORMY",
			55 => "TORMOZA",
			56 => "RAZMER_FUTBOLKI",
			57 => "ROST",
			58 => "UPRAVLENIE_SKOROSTYU_I_NAKLONOM_NA_PORUCHNYAKH",
			59 => "PROVERKA_PROVERKI",
			60 => "RAZMER_FUTLYARA",
			61 => "UPAKOVKA",
			62 => "TSVET",
			63 => "TSVET_1",
			64 => "TSVET_2",
			65 => "SHIFTERY",
			66 => "TIP",
			67 => "RISUNOK",
			68 => "TSVET_GRAVIROVKI",
			69 => "",
		),
		"LIST_OFFERS_LIMIT" => "все",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "VES",
			1 => "CML2_ARTICLE",
			2 => "CML2_BASE_UNIT",
			3 => "POL",
			4 => "RAZMER",
			5 => "RAZMER_3",
			6 => "NAGRUZKA",
			7 => "ROST",
			8 => "TSVET",
			9 => "TSVET_2",
			10 => "TSVET_1",
			11 => "CML2_MANUFACTURER",
			12 => "",
		),
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "AMORTIZATR",
			1 => "BAGAZHNIK",
			2 => "BREND",
			3 => "VAYVAYVA",
			4 => "VES",
			5 => "VILKA_PEREDNYAYA",
			6 => "VTULKA_ZADNYAYA",
			7 => "CML2_ARTICLE",
			8 => "CML2_BASE_UNIT",
			9 => "VTULKA_PEREDNYAYA",
			10 => "MORE_PHOTO",
			11 => "CML2_MANUFACTURER",
			12 => "CML2_TRAITS",
			13 => "CML2_TAXES",
			14 => "FILES",
			15 => "CML2_ATTRIBUTES",
			16 => "CML2_BAR_CODE",
			17 => "VTORAYA",
			18 => "DLINA",
			19 => "VYSOTA",
			20 => "DETSKIY_RAZMER",
			21 => "ZADNIY_PEREKLYUCHATEL_SKOROSTEY",
			22 => "DIAMETR_VKLADYSHA",
			23 => "ZVYEZDOCHKA",
			24 => "DIAMETR",
			25 => "KARETKA",
			26 => "DLYA_TARELKI",
			27 => "KASSETA_TRESHCHOTKA",
			28 => "KOLICHESTVO_KAMER",
			29 => "KOLICHESTVO_SKOROSTEY",
			30 => "DLINA_1",
			31 => "ISPOLZOVANIE",
			32 => "KOLLICHESTVO_PROGRAMM",
			33 => "KOLICHESTVO",
			34 => "KRYLYA",
			35 => "DLINA_2",
			36 => "KARKAS",
			37 => "OBODA",
			38 => "MAKSIMALNYY_UROVEN_VODY",
			39 => "PEDALI",
			40 => "KUPOL",
			41 => "PEREDNIY_PEREKLYUCHATEL_SKOROSTEY",
			42 => "PLOSHCHAD_GRAVIROVANNOY_TABLICHKI",
			43 => "POKRYSHKI",
			44 => "POL",
			45 => "RAZMER",
			46 => "RAZMER_3",
			47 => "NAGRUZKA",
			48 => "PROIZVODITELNOST_NASOSA",
			49 => "RAZMER_RAMY",
			50 => "RULEVAYA_KOLONKA",
			51 => "RAZMER_PLAKETKI",
			52 => "SEDLO",
			53 => "SISTEMA",
			54 => "RAZMER_FORMY",
			55 => "TORMOZA",
			56 => "RAZMER_FUTBOLKI",
			57 => "ROST",
			58 => "UPRAVLENIE_SKOROSTYU_I_NAKLONOM_NA_PORUCHNYAKH",
			59 => "PROVERKA_PROVERKI",
			60 => "RAZMER_FUTLYARA",
			61 => "UPAKOVKA",
			62 => "TSVET",
			63 => "TSVET_1",
			64 => "TSVET_2",
			65 => "SHIFTERY",
			66 => "TIP",
			67 => "RISUNOK",
			68 => "TSVET_GRAVIROVKI",
			69 => "",
		),
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"LINK_IBLOCK_TYPE" => "1c_catalog",
		"LINK_IBLOCK_ID" => "10",
		"LINK_PROPERTY_SID" => "CML2_LINK",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_ALSO_BUY" => "N",
		"ALSO_BUY_ELEMENT_COUNT" => "4",
		"ALSO_BUY_MIN_BUYES" => "1",
		"OFFERS_SORT_FIELD" => "shows",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "shows",
		"OFFERS_SORT_ORDER2" => "asc",
		"PAGER_TEMPLATE" => "sp07restail",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"LABEL_PROP" => "-",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_TREE_PROPS" => array(
			0 => "VES",
			1 => "DLINA",
			2 => "DLINA_2",
			3 => "RAZMER",
			4 => "RAZMER_3",
			5 => "NAGRUZKA",
			6 => "ROST",
			7 => "TSVET",
			8 => "TSVET_1",
			9 => "TSVET_2",
		),
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"DETAIL_USE_VOTE_RATING" => "Y",
		"DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
		"DETAIL_USE_COMMENTS" => "Y",
		"DETAIL_BLOG_USE" => "Y",
		"DETAIL_VK_USE" => "N",
		"DETAIL_FB_USE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"USE_STORE" => "N",
		"USE_STORE_PHONE" => "Y",
		"USE_STORE_SCHEDULE" => "Y",
		"USE_MIN_AMOUNT" => "N",
		"STORE_PATH" => "/store/#store_id#/",
		"MAIN_TITLE" => "Наличие на складах",
		"MIN_AMOUNT" => "10",
		"DETAIL_BRAND_USE" => "Y",
		"DETAIL_BRAND_PROP_CODE" => array(
			0 => "",
			1 => "BRAND_REF",
			2 => "",
		),
		"SIDEBAR_SECTION_SHOW" => "Y",
		"SIDEBAR_DETAIL_SHOW" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"COMMON_SHOW_CLOSE_POPUP" => "Y",
		"DETAIL_SHOW_MAX_QUANTITY" => "N",
		"DETAIL_BLOG_URL" => "catalog_comments",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"DETAIL_FB_APP_ID" => "",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"USE_SALE_BESTSELLERS" => "Y",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"COMMON_ADD_TO_BASKET_ACTION" => "",
		"TOP_ADD_TO_BASKET_ACTION" => "BUY",
		"SECTION_ADD_TO_BASKET_ACTION" => "BUY",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
			0 => "ADD",
		),
		"DETAIL_SHOW_BASIS_PRICE" => "Y",
		"SECTIONS_HIDE_SECTION_NAME" => "N",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"SHOW_DEACTIVATED" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => "IMG",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "H",
		"STORES" => "",
		"USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"USE_BIG_DATA" => "N",
		"BIG_DATA_RCM_TYPE" => "bestsell",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"COMPOSITE_FRAME_MODE" => "Y",
		"COMPOSITE_FRAME_TYPE" => "STATIC",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_SECTION" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE#/",
			"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
			"compare" => "compare/",
			"smart_filter" => "#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/",
		)
	),
	false
);?>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>