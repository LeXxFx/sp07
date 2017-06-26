<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
// echo "<pre>";
// print_r($APPLICATION->GetCurPageParam(true));
// echo "</pre>";
?>
<?
//echo "<pre>";
//print_r($arResult["ITEMS"]);
//echo "</pre>";
?>
<div class="slider">
	<?foreach($arResult["ITEMS"] as $item):?>
	<div class="slider__slide">
		<img src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$item["NAME"]?>"/>
	</div>
	<?endforeach;?>
</div>