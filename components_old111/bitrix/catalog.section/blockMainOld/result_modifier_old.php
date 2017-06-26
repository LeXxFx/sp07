<?
use Bitrix\Iblock;

if (!empty($arResult['ITEMS']))
{
	
	$arSKU = CCatalogSKU::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
	$arSKUPropsForAllItems = CIBlockPriceTools::getTreeProperties(
		$arSKU,
		$arParams['OFFERS_PROPERTY_CODE']
	);


	foreach($arResult["ITEMS"] as &$arItem) {
		$arResultSKUPropIDs = array();
		$arNeedValues = array();
		$arSKUProps = $arSKUPropsForAllItems;
		foreach($arItem["OFFERS"] as $arOffer) {
			foreach($arSKUProps as $arSKUPropCode => $arSKUProp) {
				if(isset($arOffer["DISPLAY_PROPERTIES"][$arSKUPropCode])) {
					
					$arResultSKUPropIDs[$arSKUPropCode] = true;
					
					if (!isset($arNeedValues[$arSKUProps[$arSKUPropCode]['ID']]))
						$arNeedValues[$arSKUProps[$arSKUPropCode]['ID']] = array();
					$valueId = (
						$arSKUProps[$arSKUPropCode]['PROPERTY_TYPE'] == Iblock\PropertyTable::TYPE_LIST
						? $arOffer['DISPLAY_PROPERTIES'][$arSKUPropCode]['VALUE_ENUM_ID']
						: $arOffer['DISPLAY_PROPERTIES'][$arSKUPropCode]['VALUE']
					);
					$arNeedValues[$arSKUProps[$arSKUPropCode]['ID']][$valueId] = $valueId;
					unset($valueId);
					
					
	
					
					if(!empty($arOffer["DISPLAY_PROPERTIES"][$arSKUPropCode]["DISPLAY_VALUE"])) {
						$arItem["SKU_PROPS"][$arSKUPropCode]["VALUES"][$arOffer["DISPLAY_PROPERTIES"][$arSKUPropCode]["VALUE"]] = array(
							"XML_ID" => $arOffer["DISPLAY_PROPERTIES"][$arSKUPropCode]["VALUE"],
							"NAME" => $arOffer["DISPLAY_PROPERTIES"][$arSKUPropCode]["DISPLAY_VALUE"],
						);
					}
				}
			}
		}
		
		CIBlockPriceTools::getTreePropertyValues($arSKUProps, $arNeedValues);
		
		foreach($arResultSKUPropIDs as $arSKUPropCode => $isTrue) {
			if($isTrue) {
				$arItem["SKU_PROPS"][$arSKUPropCode] = $arSKUProps[$arSKUPropCode];
				unset($arItem["SKU_PROPS"][$arSKUPropCode]["USER_TYPE_SETTINGS"]);
				unset($arItem["SKU_PROPS"][$arSKUPropCode]["VALUES"][0]);
			}
		}
	}

}
?>