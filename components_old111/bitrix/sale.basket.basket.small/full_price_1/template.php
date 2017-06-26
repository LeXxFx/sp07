<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!function_exists('plural_form')) {
    function plural_form($number, $after) {
		$cases = array (2, 0, 1, 1, 1, 2);
		return $number.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
	}
}

$total = 0;
foreach($arResult["ITEMS"] as $arItem) {
	$total += intval($arItem["QUANTITY"]) * floatval($arItem["PRICE"]);
}

$result["count"] = plural_form(count($arResult["ITEMS"]), array("товар", "товара", "товаров"));
$result["total"] = "Итого: " . CurrencyFormat($total, "RUB");

echo json_encode($result, JSON_UNESCAPED_UNICODE);

?>