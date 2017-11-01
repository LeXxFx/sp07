<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$frame = $this->createFrame()->begin();
global $APPLICATION;
global $USER;
?>
<div class="reviews-list">
<?$count = 1;?>
	<?foreach($arResult["REVIEWS"] as $reviews):?>
	<?if($count >= 6){break;}?>
	<article>
		<div class="top">
			<span class="name"><?=$reviews["NAME"]?></span> <span class="date">(<?=$reviews["DATE_CREATION"]?>)</span>
			<div class="rate">
				<span class="stars star-<?=$reviews["RATING"]?>"></span>
			</div>
		</div>
		<p><?=$reviews["TEXT"]?></p>
	</article>
	<?$count++;?>
	<?endforeach;?>
</div>
<?$frame->end();?>