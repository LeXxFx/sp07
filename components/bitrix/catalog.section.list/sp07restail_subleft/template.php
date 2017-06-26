<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div id="sidebar">
<aside class="">
	<div class="widget widget-catalog">
	<?$lastproc=0;?>
	<?foreach($arResult['SECTIONS'] as $arItem):?>
		<?=($arItem['DEPTH_LEVEL']==1 && $lastproc!=0)? '</ul>' : '';?>
		<?=($arItem['DEPTH_LEVEL']==1)? '<ul>' : '';?>
		<li<?=($arItem['DEPTH_LEVEL']==1)? ' class="widget-catalog__title"' : '';?>><a href="<?=$arItem['SECTION_PAGE_URL'];?>"><?=$arItem['NAME'];?></a></li>
		<?$lastproc=$arItem['DEPTH_LEVEL'];?>
	<?endforeach;?>
	</ul>
	</div>
</aside>
</div>