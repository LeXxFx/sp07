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
//echo "<pre>";
//print_r($arResult["ITEMS"]);
//echo "</pre>"
?>
<div class="inner">
	<div id="content" role="main">
		<div class="page-heading">Новости</div>
		<div class="post-list masonry-list">
			<?foreach($arResult["ITEMS"] as $news):?>
			<article class="post-list__item">
				<a href="<?=$news["DETAIL_PAGE_URL"]?>">
				<?if($news["PREVIEW_PICTURE"]["SRC"]):?>
					<div class="photo">
						<img src="<?=$news["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$news["PREVIEW_PICTURE"]["DESCRIPTION"]?>"/>
					</div>
				<?endif;?>
					<div class="title">
						<?=$news["NAME"]?>
					</div>
				</a>
				<div class="short">
					<?=$news["PREVIEW_TEXT"]?>
				</div>
				<div class="date"><?=$news["ACTIVE_FROM"]?></div>
				<div class="details">
					<a href="<?=$news["DETAIL_PAGE_URL"]?>">
					   Подробнее
					</a>
				</div>
			</article>
			<?endforeach;?>
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
		</aside>
	</div>
</div>