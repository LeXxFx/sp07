<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
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
if (method_exists($this, 'setFrameMode')) {
	$this->setFrameMode(true);
}
?>
<div class="webmechanic_yandexmarket">    
    <? if (count($arResult['ITEMS'])) {  ?>       
	<div>
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
		<div class="feedback_slider" id="webmechanic_yandexmarket_slider">                        
			<ul>
				<? foreach ($arResult['ITEMS'] as $arItem): ?>                                                
					<li>
						<div class="feedback_item">
							<div class="head">
								<div class="user__image"></div>
								<div class="user_name"><? if ($arItem['author']): ?><?= $arItem['author'] ?><? else : ?><?= GetMessage('WM_YANDEXMARKET_HIDDEN_USER'); ?><? endif; ?></div>
								<div class="count"><? if ($arItem['authorInfo']['grades']): ?><?= webmechanic_yandexmarket_get_correct_str($arItem['authorInfo']['grades'], GetMessage('WM_YANDEXMARKET_OTZYV_1'), GetMessage('WM_YANDEXMARKET_OTZYV_2'), GetMessage('WM_YANDEXMARKET_OTZYV_3')) ?><? endif; ?></div>
								<div class="from"><? if ($arItem['region_name']): ?><?= $arItem['region_name'] ?>,<? endif; ?> <?= $arItem['date'] ?></div>
							</div>                                                                
							<div class="review__rate">
								<span>
									<?= str_repeat('<i class="rating__item"></i>', $arItem['grade']); ?>                                        
								</span>
								<span class="rating__text grey_text"><?= $arItem['grade_text'] ?></span>
								<? if ($arResult['MODE'] == 'shopOpinions'): ?>
									<div class="review__delivery grey_text"><?= GetMessage('WM_YANDEXMARKET_SPOSOB_POKUPKI'); ?>: <?= $arItem['delivery'] ?></div>
								<? endif; ?>                                    
							</div>                                
							<div class="clear"></div>                                
							<div class="review__verdict">
								<?if ($arItem['pro']): ?>
								<div class="userverdict">
									<div class="userverdict__title"><?= GetMessage('WM_YANDEXMARKET_PRO'); ?>:</div> 
									<div class="userverdict__text" itemprop="pro"><?= $arItem['pro'] ?></div>
								</div>
								<? endif; ?>  
								<?if ($arItem['contra']): ?>
								<div class="userverdict">
									<div class="userverdict__title"><?= GetMessage('WM_YANDEXMARKET_CONTRA'); ?>:</div> 
									<div class="userverdict__text"><?= $arItem['contra'] ?></div>
								</div>                                                   
								<? endif; ?>
								<?if ($arItem['text']): ?>
								<div class="userverdict">
									<div class="userverdict__title"><?= GetMessage('WM_YANDEXMARKET_COMMENT'); ?>:</div> 
									<div class="userverdict__text" itemprop="description"><?= $arItem['text'] ?></div>
								</div>                 
								<? endif; ?>
							</div>                              
						</div>
					</li>
				<? endforeach; ?>                        
			</ul>            
		</div>
			<? if (count($arResult['ITEMS']) > 1): ?>
				<a href="#" class="arrow_left">&lsaquo;</a>
				<a href="#" class="arrow_right">&rsaquo;</a>
			<? endif; ?>
				
		<div class="clear"></div>                
		
		</div>
		</div>
		</div>
	</div>
<? }; ?>    
</div>