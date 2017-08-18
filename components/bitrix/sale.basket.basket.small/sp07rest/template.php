<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
foreach($arResult["ITEMS"] as $resultMiniBasket){
	$priceString = str_replace(" ","",$resultMiniBasket["PRICE_FORMATED"]);
	$priceValue = (int)$priceString * $resultMiniBasket["QUANTITY"];
	$cart_sum+=$priceValue;
	$cart_num+=$resultMiniBasket["QUANTITY"];
}
?>
<i class="icon icon-cart-white shopping-cart"></i>
Товары в <a href="/personal/cart/">корзине</a>
<span class="num"><?=$cart_num?></span>
<span class="sum"><b><?=$cart_sum?></b> руб.</span>
<a href="/personal/order/make/" class="btn btn-primary">Оформить заказ</a>