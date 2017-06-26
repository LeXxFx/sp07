<?php

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
        if (CModule::IncludeModule("sale"))
        {
           $arBasketItems = array();
           $dbBasketItems = CSaleBasket::GetList(
                          array("NAME" => "ASC","ID" => "ASC"),
                          array("FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"),
                          false,
                          false,
                          array("ID","MODULE","PRODUCT_ID","QUANTITY","CAN_BUY","PRICE"));
           while ($arItems=$dbBasketItems->Fetch())
           {
              $arItems=CSaleBasket::GetByID($arItems["ID"]);
              $arBasketItems[]=$arItems;   
              $cart_num+=$arItems['QUANTITY'];
              $cart_sum+=$arItems['PRICE']*$arItems['QUANTITY'];
           }
           if (empty($cart_num))
              $cart_num="0";
           if (empty($cart_sum))
              $cart_sum="0";
        }
?>
<i class="icon icon-cart-white shopping-cart"></i>
Товары в <a href="/personal/cart/">корзине</a>
<span class="num"><?=$cart_num?></span>
<span class="sum"><b><?=$cart_sum?></b> руб.</span>
<a href="/personal/order/make/" class="btn btn-primary">Оформить заказ</a>
<?php 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>