<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
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
							<?if($arItem["PROPERTIES"]["review_rating"]["VALUE"]):?><span class="stars star-<?=$arItem["PROPERTIES"]["review_rating"]["VALUE"]?>"><?=$arItem["PROPERTIES"]["review_rating"]["VALUE"]?></span><?endif;?>
							<?if($arItem["PROPERTIES"]["review_rating_text"]["VALUE"]):?><span class="txt"><?=$arItem["PROPERTIES"]["review_rating_text"]["VALUE"]?></span><?endif;?>
						</div>
						<div class="review-date">
							<?=$arItem["DISPLAY_ACTIVE_FROM"]?>
							<?if($arItem["PROPERTIES"]["review_city"]["VALUE"]):?>, <?=$arItem["PROPERTIES"]["review_city"]["VALUE"]?><?endif;?>
						</div>
					</div>
					<div class="name-review"><?=$arItem["NAME"]?></div>
					<div class="review-text">
						<?if($arItem["PROPERTIES"]["review_good"]["VALUE"]):?><div><b>Достоинства:</b> <?=$arItem["PROPERTIES"]["review_good"]["VALUE"]?></div><?endif;?>
						<?if($arItem["PROPERTIES"]["review_bad"]["VALUE"]):?><div><b>Недостатки:</b> <?=$arItem["PROPERTIES"]["review_bad"]["VALUE"]?></div><?endif;?>			
						<b>Комментарий:</b>
						<div><?=$arItem["PREVIEW_TEXT"]?></div>
					</div>
				</div>
			<?endforeach;?>
		</div>
	</div>
</div>