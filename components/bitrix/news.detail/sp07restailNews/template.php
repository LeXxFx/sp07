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
?>
<?
//echo "<pre>";
//print_r($arSelect);
//echo "</pre>";
?>
<div class="inner">
	<div id="content" role="main"><p style="float:right;"><a href="javascript:history.back()">Вернуться назад</a></p>
		<div class="page-heading"><?=$arResult["NAME"]?></div>
		<article class="post">
			<p>
			<?foreach($arResult["SLIDER"] as $pic):?>
			<img src="<?=$pic["SRC"]?>" alt="<?=$arResult["NAME"]?>"/>
			<?endforeach;?>
			</p>
			<?=$arResult["DETAIL_TEXT"];?>
		</article>
		<div class="post-meta"><span class="meta__date"><?=$arResult["ACTIVE_FROM"]?></span></div>
		<div class="panel-pager clearfix">
			<div class="pager-navigation">
			<?
			//Листаем новости
			$arSelect = Array("ID","NAME", "DETAIL_PAGE_URL");
			$arFilter = Array("IBLOCK_ID"=>$arResult["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "SECTION_ID"=>$arResult['IBLOCK_SECTION_ID']);
			$res = CIBlockElement::GetList(Array($arParams["ELEMENT_SORT_FIELD"]=>$arParams["ELEMENT_SORT_ORDER"]), $arFilter, false, Array("nPageSize"=>1,"nElementID"=>$arResult['ID']), $arSelect);
			while($ob = $res->GetNext())
			{
			$links[]=$ob;
			}
			if(count($links)>1)
			{
			?>
			<?if($links[1]["ID"]==$arResult['ID']){?>
			<a href="<?=$links[0]["DETAIL_PAGE_URL"]?>">← предыдущая</a>
			<?if(is_array($links[2])){?>
			<a href="<?=$links[2]["DETAIL_PAGE_URL"]?>">следующая →</a>
			<?}}elseif(is_array($links[1])){?>
			<a href="<?=$links[1]["DETAIL_PAGE_URL"]?>">следующая →</a>
			<?}?>
			<?}?>
			</div>
			<div class="col-sm-12 col-pagination">
				<a href="/news/" class="btn btn-primary">Все новости</a>
			</div>
		</div>
	</div>
	<div id="sidebar">
		<aside>
			<div class="widget widget-catalog">
				<ul>
					<li class="widget-catalog__title"><a href="#">Интернет магазин</a></li>
					<?$APPLICATION->IncludeComponent("bitrix:menu", "sp07restailUl", array(
								"ROOT_MENU_TYPE" => "top",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_TIME" => "36000000",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"MENU_THEME" => "site",
								"CACHE_SELECTED_ITEMS" => "N",
								"MENU_CACHE_GET_VARS" => array(
								),
								"MAX_LEVEL" => "1",
								"CHILD_MENU_TYPE" => "top",
								"USE_EXT" => "Y",
								"DELAY" => "N",
								"ALLOW_MULTI_SELECT" => "N",
							),
							false
						);?>
				</ul>
				<ul>
					<li class="widget-catalog__title"><a href="#">Помощь покупателю</a></li>
					<?$APPLICATION->IncludeComponent("bitrix:menu", "sp07restailUl", array(
								"ROOT_MENU_TYPE" => "info",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_TIME" => "36000000",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"MENU_THEME" => "site",
								"CACHE_SELECTED_ITEMS" => "N",
								"MENU_CACHE_GET_VARS" => array(
								),
								"MAX_LEVEL" => "1",
								"CHILD_MENU_TYPE" => "info",
								"USE_EXT" => "Y",
								"DELAY" => "N",
								"ALLOW_MULTI_SELECT" => "N",
							),
							false
						);?>
				</ul>
			</div>
			</div>
		</aside>
	</div>
</div>