<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
foreach($arResult["ITEMS"] as $arItem) {
	if($arItem["ID"] == $arParams["PROPERTY_ID"]) {
		foreach($arItem["VALUES"] as $arValue) {
			if(!$arValue["DISABLED"]) {
				?><option value="<?=$arValue["CONTROL_ID"]?>"><?=$arValue["VALUE"]?></option><?
			}
		}
	}
}