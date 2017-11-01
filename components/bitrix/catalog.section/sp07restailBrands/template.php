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
	<div class="container">
	<div class="heading">Собственные бренды</div>
		<div class="brands__list">
			<?foreach($arResult["ITEMS"] as $brandItem):?>
			<div class="item">
				<img src="<?=$brandItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$brandItem["NAME"]?>"/>
			</div>
			<?endforeach;?>
		</div>
	</div>