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
/** @var CBitrixComponent $component */?>
<?$this->setFrameMode(true);?>
<div class="dreview_block">
	<div class="review_h1">
    	<h1><?=GetMessage("DISPROVE_REVIEWSMARKET_OTZYVY")?></h1> 
    	<a href="http://market.yandex.ru/shop/<?=$arResult["SHOP_ID"];?>/reviews"><span><?=GetMessage("DISPROVE_REVIEWSMARKET_NAPISATQ_I_POSMOTRET")?><br /> <?=GetMessage("DISPROVE_REVIEWSMARKET_NA_ANDEKS_MARKET")?></span></a>
    </div>
<div class="review">
	<div class="review-heading">
		Нас рекомендуют друзьям!
		<span>99% отзывов о нас на Яндекс.Маркете с оценкой 4 и 5.</span>
	</div>
	<div class="review-list clearfix">
		<div class="col-yandex">
			<img src="/bitrix/templates/sport07/images/rating.png"/>
			<a href="https://market.yandex.ru/shop/238585/reviews" class="all-review">Показать ещё</a>
		</div>
		<div class="col-review clearfix">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<div class="review-item">
					<div class="review-top clearfix">
						<div class="review-rating">
							<?if($arItem["rating"]):?><span class="stars star-<?=$arItem["rating"]?>"><?=$arItem["rating"]?></span><?endif;?>
							<?if($arItem["rating"]):?><span class="txt"><?=$arItem["rating"]?></span><?endif;?>
						</div>
						<div class="review-date">
							<?=$arItem["date"]?>
							<?if($arItem["region"]):?>, <?=$arItem["region"]?><?endif;?>
						</div>
					</div>
					<div class="name-review"><?=$arItem["author"]?></div>
					<div class="review-text">
						<?if($arItem["pro"]):?><div><b>Достоинства:</b> <?=$arItem["pro"]?></div><?endif;?>
						<?if($arItem["contra"]):?><div><b>Недостатки:</b> <?=$arItem["contra"]?></div><?endif;?>			
						<?if($arItem["text"]):?>
						<b>Комментарий:</b>
						<div><?=$arItem["text"]?></div>
					<?endif;?>
					</div>
				</div>
			<?endforeach;?>
		</div>
	</div>
</div>