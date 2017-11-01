<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.small",
	"sp07rest",
	Array(
		"COMPONENT_TEMPLATE" => "sp07rest",
		"PATH_TO_BASKET" => "/personal/basket.php",
		"PATH_TO_ORDER" => "/personal/order.php",
		"SHOW_DELAY" => "N",
		"SHOW_NOTAVAIL" => "N",
		"SHOW_SUBSCRIBE" => "N"
	),
	$component,
	Array("HIDE_ICONS"=>"Y")
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>