<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заказы");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.ajax", 
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
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?$APPLICATION->IncludeComponent(
	"quetzal:tracking.order",
	"",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"ORDER_PARAM_TRANSACTION" => $_REQUEST["ORDER_ID"]
	)
);?>