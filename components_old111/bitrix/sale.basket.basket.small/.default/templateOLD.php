<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->createFrame()->begin('Загрузка');
?>
<?
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");

if(!function_exists('plural_form')) {
    function plural_form($number, $after) {
		$cases = array (2, 0, 1, 1, 1, 2);
		echo $number.' '.$after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
	}
}

$total = 0;
?>
<script type="text/javascript">

  /* Inquiry ajax at change of quantity of the goods */
  $(".basket  .basket-count-update").live("change", function(){
         var countbasketid = $(this).attr('id');
         var countbasketcount = $(this).val();
         var ajaxcount = countbasketid + '&ajaxbasketcount=' + countbasketcount;
         ajaxpostshow("/include/ajax/basket.php", ajaxcount, ".basket" );      
         return false;
   });

</script>
<span class="basket">
	В корзине
	<b><?=plural_form(count($arResult["ITEMS"]), array("товар", "товара", "товаров"))?></b>
</span>
<div class="list-order">
	<?if(count($arResult["ITEMS"])):?>
	<div class="basket-scroll">
		<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
	//echo "<pre>";
	//print_r($arItem);
	//echo "</pre>";
?>
		<?$total += intval($arItem["QUANTITY"]) * floatval($arItem["PRICE"]);?>
		<?
if(!$arItem["DETAIL_PAGE_URL"]){
$mxResult = CCatalogSku::GetProductInfo($arItem["PRODUCT_ID"]);
}?>
		<div class="col-b">
			<a class="del-p" data-item-id="<?=$arItem["ID"]?>"></a>
			<div class="rb_img img-p">
				
				<?
					$arSelect = Array("DETAIL_PICTURE");
if($arItem["DETAIL_PAGE_URL"]){
	$arFilter = Array("ID" => intval($arItem["PRODUCT_ID"]), ["IBLOCK_ID"] => 9);
}else{
	$arFilter = Array("ID" => intval($mxResult["ID"]));
}
//print_r($arFilter);
					$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
					while($ob = $res->GetNextElement()) {
						$arFields = $ob->GetFields();
					}
				?>
				<?if($arFields['DETAIL_PICTURE']):?>
				<?$file = CFile::ResizeImageGet($arFields['DETAIL_PICTURE'], array('width' => 49, 'height' => 49), BX_RESIZE_IMAGE_EXACT);?>
<?
if($file["src"]):
?>
<img src="<?=$file["src"]?>" alt="<?=$arItem["NAME"]?>">
				<?else:?>
<img src="/bitrix/templates/sport07/components/bitrix/catalog.section/block/images/no_photo.png" alt="Фото отсутствет">
<?endif;?>
				<?endif;?>
			</div>
			<div class="text-p">

				<span class="name-product"><?=$arItem["NAME"]?></span>
				<?
					$db_res = CSaleBasket::GetPropsList(
						array(
							"SORT" => "ASC",
							"NAME" => "ASC"
						),
						array("BASKET_ID" => $arItem["ID"])
					);
					while($arProp = $db_res->Fetch()):
						if($arProp["CODE"] == "CATALOG.XML_ID" || $arProp["CODE"] == "PRODUCT.XML_ID") continue;
				?>
					<span class="size-basket"><?=$arProp["NAME"]?>: <span><?=$arProp["VALUE"]?></span></span>
				<?
					endwhile;
				?>
			</div>
			
			<html>
			<div class="amount-p small-b">
				<span class="new-price"><?=$arItem["PRICE"]?></span>
				<div class="amount" data-item-id="<?=$arItem["ID"]?>">
					<span class="minus"></span>
					<span class="num-amount" data-amount="<?=$arItem["QUANTITY"]?>"><b><?=$arItem["QUANTITY"]?></b> <b>Шт.</b></span>
					<span class="plus"></span>
				</div>
			</div>
		</div>
		<?endforeach;?>
	</div>
	<div class="bottom-order">
		<span class="order-price">Итого: <?=CurrencyFormat($total, "RUB");?></span>
		<a class="button-order" href="/personal/order/make/">Оформить заказ</a>
		<a href="/personal/cart/" class="go-basket">Перейти в корзину</a>
	</div>
	<?else:?>
	<div class="basket-scroll">
	</div>
	<div class="bottom-order">
		<span class="order-price">Ваша корзина пуста</span>
		<a class="button-order" href="/store/">Перейти в каталог</a>
	</div>
	<?endif;?>
</div>