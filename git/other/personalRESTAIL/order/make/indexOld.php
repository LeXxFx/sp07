<?
$component = "bitrix:sale.order.ajax";

//if ($USER -> isAdmin()) {
//if ($_SERVER['REMOTE_ADDR'] == "31.28.243.138") {
    $component = "tezart:sale.order.ajax_16.5.0";
//}
//$_SESSION["g"] = $_SERVER;
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заказы");
?><?$APPLICATION->IncludeComponent(
    $component,
    //"bitrix:sale.order.ajax",
    ".default", 
    array(
        "PAY_FROM_ACCOUNT" => "Y",
        "COUNT_DELIVERY_TAX" => "N",
        "COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
        "ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
        "ALLOW_AUTO_REGISTER" => "Y",
        "SEND_NEW_USER_NOTIFY" => "Y",
        "DELIVERY_NO_AJAX" => "Y",
        "TEMPLATE_LOCATION" => "popup",
        "PROP_1" => array(
        ),
        "PATH_TO_BASKET" => "/personal/cart/",
        "PATH_TO_PERSONAL" => "/personal/order/",
        "PATH_TO_PAYMENT" => "/personal/order/payment/",
        "PATH_TO_ORDER" => "/personal/order/make/",
        "SET_TITLE" => "Y",
        "DELIVERY2PAY_SYSTEM" => "",
        "SHOW_ACCOUNT_NUMBER" => "Y",
        "DELIVERY_NO_SESSION" => "Y",
        "COMPONENT_TEMPLATE" => ".default",
        "DELIVERY_TO_PAYSYSTEM" => "d2p",
        "USE_PREPAYMENT" => "N",
        "PROP_2" => array(
        ),
        "PATH_TO_AUTH" => "/auth/",
        "DISABLE_BASKET_REDIRECT" => "N",
        "PRODUCT_COLUMNS" => array(
        )
    ),
    false
);?>
<?$APPLICATION->IncludeComponent(
    "tezart:tracking.order",
    "",
    Array(
        "COMPONENT_TEMPLATE" => ".default",
        "ORDER_PARAM_TRANSACTION" => htmlspecialchars($_REQUEST["ORDER_ID"])
    )
);?>
<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.section", 
    "block", 
    array(
        "IBLOCK_TYPE" => "1c_catalog",
        "IBLOCK_ID" => "9",
        "PRICE_CODE" => array(
            0 => "Для сайта (САЙТ цена)",
        ),
        "OFFERS_PROPERTY_CODE" => array(
            0 => "",
            1 => $arParams["DETAIL_OFFERS_PROPERTY_CODE"],
            2 => "",
        ),
        "SET_TITLE" => "N",
        "PAGE_ELEMENT_COUNT" => "5",
        "SHOW_ALL_WO_SECTION" => "Y",
        "PRODUCT_DISPLAY_MODE" => "Y",
        "FILTER_NAME" => "arRecommendFilter",
        "SECTION_TITLE" => "Рекомендуемые товары",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "COMPONENT_TEMPLATE" => "block",
        "SECTION_ID" => $_REQUEST["SECTION_ID"],
        "SECTION_CODE" => "",
        "SECTION_USER_FIELDS" => array(
            0 => "",
            1 => "",
        ),
        "ELEMENT_SORT_FIELD" => "sort",
        "ELEMENT_SORT_ORDER" => "asc",
        "ELEMENT_SORT_FIELD2" => "id",
        "ELEMENT_SORT_ORDER2" => "desc",
        "INCLUDE_SUBSECTIONS" => "Y",
        "HIDE_NOT_AVAILABLE" => "N",
        "LINE_ELEMENT_COUNT" => "3",
        "PROPERTY_CODE" => array(
            0 => "",
            1 => "",
        ),
        "OFFERS_FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "OFFERS_SORT_FIELD" => "sort",
        "OFFERS_SORT_ORDER" => "asc",
        "OFFERS_SORT_FIELD2" => "id",
        "OFFERS_SORT_ORDER2" => "desc",
        "OFFERS_LIMIT" => "5",
        "BACKGROUND_IMAGE" => "-",
        "SECTION_URL" => "",
        "DETAIL_URL" => "",
        "SECTION_ID_VARIABLE" => "SECTION_ID",
        "SEF_MODE" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_GROUPS" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "BROWSER_TITLE" => "-",
        "SET_META_KEYWORDS" => "Y",
        "META_KEYWORDS" => "-",
        "SET_META_DESCRIPTION" => "Y",
        "META_DESCRIPTION" => "-",
        "SET_LAST_MODIFIED" => "N",
        "USE_MAIN_ELEMENT_SECTION" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "ACTION_VARIABLE" => "action",
        "PRODUCT_ID_VARIABLE" => "id",
        "USE_PRICE_COUNT" => "N",
        "SHOW_PRICE_COUNT" => "1",
        "PRICE_VAT_INCLUDE" => "Y",
        "CONVERT_CURRENCY" => "N",
        "BASKET_URL" => "/personal/basket.php",
        "USE_PRODUCT_QUANTITY" => "N",
        "PRODUCT_QUANTITY_VARIABLE" => "",
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "PARTIAL_PRODUCT_PROPERTIES" => "N",
        "PRODUCT_PROPERTIES" => array(
        ),
        "OFFERS_CART_PROPERTIES" => array(
        ),
        "PAGER_TEMPLATE" => ".default",
        "DISPLAY_TOP_PAGER" => "N",
        "PAGER_TITLE" => "Товары",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "MESSAGE_404" => "",
        "DISABLE_INIT_JS_IN_COMPONENT" => "N"
    ),
    $component
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>