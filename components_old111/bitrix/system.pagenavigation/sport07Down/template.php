<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<div class="catalog-top">
	<div class="page-nav">
		<?if ($arResult["NavPageNomer"] > 1):?>
			<?if($arResult["bSavePage"]):?>
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">Назад</a>
			<?else:?>
				<?if ($arResult["NavPageNomer"] > 2):?>
					<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">Назад</a>
				<?else:?>
					<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">Назад</a>
				<?endif?>
			<?endif?>
		<?endif?>
		<?while($arResult["nStartPage"] <= $arResult["nEndPage"]):?>
			<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
				<span class="active"><?=$arResult["nStartPage"]?></span>
			<?elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):?>
				<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
			<?else:?>
				<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
			<?endif?>
			<?$arResult["nStartPage"]++?>
		<?endwhile?>
		<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("nav_next")?></a>
		<?endif?>
	</div>
	<?
		
		if(!function_exists(add_params_to_url)) {
			function add_params_to_url($params) {
				$new_request = $_REQUEST;
				foreach($params as $key => $value) {
					$new_request[$key] = $value;
				}
				return "?" . http_build_query($new_request);
			}
		}
		if($_REQUEST["num"] == "32" || $_REQUEST["num"] == "92" || $_REQUEST["num"] == "all")
			$num = $_REQUEST["num"];
		else
			$num = "24";
	?>
	<div class="amount-on-page">
		<p class="title">Показывать по:Низ</p>
		<a href="<?=add_params_to_url(array("num" => "24"))?>"<?if($num == "24") echo 'class="active"';?>><span>24</span></a>
		<a href="<?=add_params_to_url(array("num" => "32"))?>"<?if($num == "32") echo 'class="active"';?>><span>32</span></a>
		<a href="<?=add_params_to_url(array("num" => "92"))?>"<?if($num == "92") echo 'class="active"';?>><span>92</span></a>
		<a href="<?=add_params_to_url(array("num" => "all"))?>"<?if($num == "all") echo 'class="active"';?>><span>Все</span></a>
	</div>
</div>