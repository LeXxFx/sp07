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
?>
<?
echo "<pre>";
print_r($arResult["SECTIONS"]);
echo "</pre>";
?>
	<div id="Layer4_Container">
		<div id="wb_Line4">
				<img src="<?=SITE_TEMPLATE_PATH?>/landing/images/img0042.png" id="Line4" alt="">
			</div>
			<div id="wb_Text95">
				<span id="wb_uid77">Каталог товаров</span>
			</div>
		<?foreach($arResult["SECTIONS"] as $section):?>
		<div id="Layer6" onclick="window.location.href='http://www.alcap.ru/store/2006/';return false;" class="hover-kat" style="background-image:url(<?=$section["PICTURE"]["SRC"];?>);";>
			<div id="Layer6_Container">
				<div id="wb_Text96">
					<span id="wb_uid78"><strong><?=$sections["NAME"]?></strong></span>
				</div>
			</div>
		</div>
		<?endforeach;?>
		<div id="wb_Line5">
			<img src="<?=SITE_TEMPLATE_PATH?>/landing/images/img0043.png" id="Line5" alt="">
		</div>
	</div>