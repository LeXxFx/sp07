<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");



CModule::IncludeModule('catalog');

if($_GET["prop1"] && $_GET["prop2"]) $arFilter = array("PROPERTY_".$_GET["prop1_id"] => $_GET["value1_id"], "PROPERTY_".$_GET["prop2_id"] => $_GET["value2_id"]);
if($_GET["prop1"] && !$_GET["prop2"]) $arFilter = array("PROPERTY_".$_GET["prop1_id"] => $_GET["value1_id"]);
if(!$_GET["prop1"] && $_GET["prop2"]) $arFilter = array("PROPERTY_".$_GET["prop2_id"] => $_GET["value2_id"]);

$arFilter = array();
foreach($_GET["props"] as $key => $value) {
	$arFilter["PROPERTY_".$key] = $value;
}

$res = CCatalogSKU::getOffersList(
	$_GET["element_id"],
	0,
	$arFilter
);

$arResult['debug_get']=$_GET;

foreach($res as $i) {
	foreach($i as $arElement) {
		$arResult["id"] = $arElement["ID"];
		$db_res = CPrice::GetList(array(), array("PRODUCT_ID" => $arElement["ID"], "CATALOG_GROUP_ID" => "2"));
		$arPrice = $db_res->Fetch();
		$arDiscounts = CCatalogDiscount::GetDiscountByPrice(
			$arPrice["ID"],
			$USER->GetUserGroupArray()
		);
		$discountPrice = CCatalogProduct::CountPriceWithDiscount(
			$arPrice["PRICE"],
			$arPrice["CURRENCY"],
			$arDiscounts
		);
		$arPrice["DISCOUNT_PRICE"] = $discountPrice;
		if($arPrice["DISCOUNT_PRICE"]) {
			// $arResult["price"] = CurrencyFormat($arPrice["DISCOUNT_PRICE"], $arPrice["CURRENCY"]);
			// $arResult["old_price"] = CurrencyFormat($arPrice["PRICE"], $arPrice["CURRENCY"]);
			$arResult["price"] = round($arPrice["DISCOUNT_PRICE"]);
			$arResult["old_price"] = round($arPrice["PRICE"]);
		} else {
			// $arResult["price"] = CurrencyFormat($arPrice["PRICE"], $arPrice["CURRENCY"]);
			$arResult["price"] = round($arPrice["PRICE"]);

		}

		$arResult['debug'][]=$discountPrice;
		$arResult["price_id"] = $arPrice["ID"];
		$arSelect = Array("*","PROPERTY_MORE_PHOTO");
		$arFilter = Array("IBLOCK_ID" => 10, "ID" => $arElement["ID"]);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement()) {
			$arFields = $ob->GetFields();
			$arProps = $ob->GetProperties();
			if($arFields["DETAIL_PICTURE"]) {
				$arResult["section_image"] = CFile::ResizeImageGet($arFields['DETAIL_PICTURE'], array('width' => 192, 'height' => 191), BX_RESIZE_IMAGE_PROPORTIONAL_ALT)["src"];
				$arResult["tmp_photo_detail_small"] = CFile::ResizeImageGet($arFields['DETAIL_PICTURE'], array('width' => 84, 'height' => 84), BX_RESIZE_IMAGE_PROPORTIONAL_ALT)["src"];
				$arResult["tmp_photo_detail_full"] = CFile::GetPath($arFields['DETAIL_PICTURE']);
			}
//			if($arFields["PROPERTY_MORE_PHOTO_VALUE"]) {
//				$arResult["tmp_photos_small"][] = CFile::ResizeImageGet($arFields['PROPERTY_MORE_PHOTO_VALUE'], array('width' => 84, 'height' => 84), BX_RESIZE_IMAGE_PROPORTIONAL_ALT)["src"];
//				$arResult["tmp_photos_full"][] = CFile::GetPath($arFields['PROPERTY_MORE_PHOTO_VALUE']);
//			}
                        $arResult['MORE_PHOTO'] = $arProps['MORE_PHOTO'];
                        foreach($arProps['MORE_PHOTO']['VALUE'] as $ph){
				$arResult["tmp_photos_small"][] = CFile::ResizeImageGet($ph, array('width' => 84, 'height' => 84), BX_RESIZE_IMAGE_PROPORTIONAL_ALT)["src"];
				$arResult["tmp_photos_full"][] = CFile::GetPath($ph);
                        }
			if($arResult["tmp_photo_detail_small"] || $arResult["tmp_photos_small"]) {
				$arResult["photos_small"] = array();
				$arResult["photos_full"] = array();
				if($arResult["tmp_photo_detail_small"]) {
					$arResult["photos_small"][] = $arResult["tmp_photo_detail_small"];
					$arResult["photos_full"][] = $arResult["tmp_photo_detail_full"];
					unset($arResult["tmp_photo_detail_small"]);
					unset($arResult["tmp_photo_detail_full"]);
				}
				if($arResult["tmp_photos_small"]) {
					foreach($arResult["tmp_photos_small"] as $photo) {
						$arResult["photos_small"][] = $photo;
					}
					foreach($arResult["tmp_photos_full"] as $photo) {
						$arResult["photos_full"][] = $photo;
					}
					unset($arResult["tmp_photos_small"]);
					unset($arResult["tmp_photos_full"]);
				}
			}
			 $arResult['debug'][]=$arFields;
			 $arResult['DETAIL_PICTURE']=CFile::GetPath($arFields['DETAIL_PICTURE']);
//			 $arResult['PROPERTIES']=CFile::GetPath($arFields['DETAIL_PICTURE']);
		}
	}
}

echo json_encode($arResult, JSON_UNESCAPED_UNICODE);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>