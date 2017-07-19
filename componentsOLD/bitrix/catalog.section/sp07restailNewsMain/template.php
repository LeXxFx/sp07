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
	<div class="heading">Популярные новости</div>
	<div class="news-slider__list">
	<?foreach($arResult["ITEMS"] as $news):?>
		<article class="item">
			<div class="photo">
				<img src="<?=$news["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$news["NAME"]?>"/>
			</div>
			<div class="title"><a href="<?=$news["DETAIL_PAGE_URL"]?>"><?=$news["NAME"]?></a></div>
			<div class="meta">
				<span class="meta__date"><?=$news["DATE_ACTIVE_FROM"]?></span>
			</div>
			<div class="short">
			<?=$news["PREVIEW_TEXT"]?>
			</div>
			<div class="more">
				<a href="<?=$news["DETAIL_PAGE_URL"]?>" class="btn btn-primary">Читать далее</a>
			</div>
		</article>
	<?endforeach;?>
	</div>
	<div class="news-slider__bottom">
		<a href="/news/" class="btn btn-default">Почитать все новости</a>
	</div>
</div>