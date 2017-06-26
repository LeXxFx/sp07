<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news-sidebar">
	<p class="title">Объявления</p>
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="col-news">
		<span class="date-new"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
		<p><?=$arItem["PREVIEW_TEXT"]?></p>
	</div>
	<?endforeach;?>
	<a href="/news/" class="more-news">Все новости</a>
</div>