<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?><br>
 <?$APPLICATION->IncludeComponent(
	"api:search.title", 
	".default", 
	array(
		"BUTTON_TEXT" => "НАЙТИ",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"IBLOCK_ID" => array(
			0 => "9",
			1 => "",
		),
		"IBLOCK_TYPE" => array(
			0 => "1c_catalog",
		),
		"INCLUDE_CSS" => "Y",
		"INCLUDE_JQUERY" => "N",
		"INPUT_PLACEHOLDER" => "Поиск",
		"ITEMS_LIMIT" => "14",
		"JQUERY_BACKDROP_BACKGROUND" => "#3879D9",
		"JQUERY_BACKDROP_OPACITY" => "0.1",
		"JQUERY_BACKDROP_Z_INDEX" => "900",
		"JQUERY_SCROLL_THEME" => "_simple",
		"JQUERY_SEARCH_PARENT_ID" => ".api-search-title",
		"JQUERY_WAIT_TIME" => "500",
		"PICTURE" => array(
		),
		"PRICE_CODE" => array(
			0 => "Для сайта (САЙТ цена)",
		),
		"PRICE_EXT" => "Y",
		"PRICE_VAT_INCLUDE" => "Y",
		"RESIZE_PICTURE" => "48x48",
		"RESULT_NOT_FOUND" => "По вашему запросу ничего не найдено...",
		"RESULT_PAGE" => "/search/",
		"RESULT_URL_TEXT" => "Смотреть все результаты &rarr;",
		"SEARCH_MODE" => "EXACT",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SHOW_COUNTER",
		"SORT_BY3" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"SORT_ORDER3" => "ASC",
		"USE_CURRENCY_SYMBOL" => "N",
		"USE_SEARCH_QUERY" => "Y",
		"USE_TITLE_RANK" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_9_TITLE" => "Основной каталог товаров",
		"IBLOCK_9_FIELD" => array(
			0 => "NAME",
		),
		"IBLOCK_9_PROPERTY" => array(
			0 => "POISKOVAYA_FRAZA_3",
			1 => "POISKOVAYA_FRAZA_4",
			2 => "POISKOVYE_FRAZY",
			3 => "TIP_TOVARA",
			4 => "POISKOVYE_FRAZY_2",
		),
		"IBLOCK_9_SECTION" => array(
			0 => "",
			1 => "",
		),
		"IBLOCK_9_REGEX" => "",
		"IBLOCK_9_SHOW_FIELD" => array(
		),
		"IBLOCK_9_SHOW_PROPERTY" => array(
		)
	),
	false
);?><br>
<?$APPLICATION->IncludeComponent(
	"api:search.catalog", 
	".default", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CATALOG_TEMPLATE" => "sp07restail",
		"COMPONENT_TEMPLATE" => ".default",
		"CONVERT_CURRENCY" => "Y",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FILTER_NAME" => "apiSearchFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "1c_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "-",
		"LINE_ELEMENT_COUNT" => "3",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_CART_PROPERTIES" => array(
		),
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_LIMIT" => "0",
		"OFFERS_PROPERTY_CODE" => array(
			0 => "_KHARAKTERISTIKI_NOMENKLATURY",
			1 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "30",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "Для сайта (САЙТ цена)",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
			0 => "CML2_ATTRIBUTES",
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "N",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SECTION_CODE" => "",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"TEMPLATE_THEME" => "blue",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"USE_SEARCH" => "N",
		"CURRENCY_ID" => "RUB"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>