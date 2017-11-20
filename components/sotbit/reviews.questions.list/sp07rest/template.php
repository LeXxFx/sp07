<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

$frame = $this->createFrame()->begin();
global $APPLICATION;
?>
<?
//echo "<pre>";
//print_r($arResult);
//echo "</pre>";
?>
<div class="reviews-list">
<?$count = 1;?>
	<?foreach($arResult["QUESTIONS"] as $questions):?>
	<?if($count >= 6){break;}?>
	<article>
		<span><b>Вопрос</b></span>
		<div class="top">
			<span class="name"><?echo $questions["NAME"];?></span> <span class="date">(<?=$questions["DATE_CREATION"]?>)</span>
		</div>
		<p><i><?=$questions["QUESTION"]?></i></p>
		<blockquote>
		<div class="top">
			<span class="name" style="color: black">Ответ: <?=$arResult["SITE_NAME"]?></span>
		</div>
		<p><?=$questions["ANSWER"]?></p>
		</blockquote>
	</article>
	<?$count++;?>
	<?endforeach;?>
</div>
<?$frame->end();?>