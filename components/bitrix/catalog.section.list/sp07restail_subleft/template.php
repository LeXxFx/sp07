<?/*if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
*/?>

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

?>
<div id="sidebar">
    <aside class="">
        <div class="widget widget-catalog">

            <?
            if(preg_match("/\/store\/(?<section>[^\/]+)\//si",$_SERVER['REQUEST_URI'],$out))
            {?>
            <ul>
                <li class="widget-catalog__title"><a href="<?=$arResult['SECTION']['SECTION_PAGE_URL'];?>"><?=$arResult['SECTION']['NAME'];?></a></li>
            </ul>
            <ul>
                <?
                }
                ?>

                <?$lastproc=0;?>
                <?/*foreach($arResult['SECTIONS'] as $arItem):
                    // foreach($arItem2 as $arItem):?>
                    <?=($arItem['RELATIVE_DEPTH_LEVEL']+1==1 && $lastproc!=0)? '</ul>' : '';?>
                    <?=($arItem['RELATIVE_DEPTH_LEVEL']+1==1)? '<ul>' : '';?>
                    <li<?=($arItem['RELATIVE_DEPTH_LEVEL']+1==1)? ' class="widget-catalog__title"' : '';?>><a href="<?=$arItem['SECTION_PAGE_URL'];?>"><?=$arItem['NAME'];?></a></li>
                    <?$lastproc=$arItem['RELATIVE_DEPTH_LEVEL']+1;?>
                <?endforeach;  */?>
            </ul>
        </div>
        <?

        // if (true)
        // {
        // 	$arFilter = array(
        // 		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
        // 		"ACTIVE" => "Y",
        // 		"GLOBAL_ACTIVE" => "Y",
        // 	);
        // 	if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
        // 		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
        // 	elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
        // 		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

        // 	$obCache = new CPHPCache();
        // 	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
        // 	{
        // 		$arCurSection = $obCache->GetVars();
        // 	}
        // 	elseif ($obCache->StartDataCache())
        // 	{
        // 		$arCurSection = array();
        // 		if (Loader::includeModule("iblock"))
        // 		{
        // 			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

        // 			if(defined("BX_COMP_MANAGED_CACHE"))
        // 			{
        // 				global $CACHE_MANAGER;
        // 				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

        // 				if ($arCurSection = $dbRes->Fetch())
        // 					$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);

        // 				$CACHE_MANAGER->EndTagCache();
        // 			}
        // 			else
        // 			{
        // 				if(!$arCurSection = $dbRes->Fetch())
        // 					$arCurSection = array();
        // 			}
        // 		}
        // 		$obCache->EndDataCache($arCurSection);
        // 	}
        // 	if (!isset($arCurSection))
        // 		$arCurSection = array();
        // }



        ?>

        <?$APPLICATION->IncludeComponent(
            "bitrix:catalog.smart.filter",
            "",
            array(
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "SECTION_ID" => $arResult['SECTION']['ID'],
                "FILTER_NAME" => $arParams["FILTER_NAME"],
                "PRICE_CODE" => $arParams["PRICE_CODE"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "SAVE_IN_SESSION" => "N",
                "FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
                "XML_EXPORT" => "Y",
                "SECTION_TITLE" => "NAME",
                "SECTION_DESCRIPTION" => "DESCRIPTION",
                'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
                "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
                'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                "SEF_MODE" => $arParams["SEF_MODE"],
                "SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
                "SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
                "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                "INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
            ),
            $component,
            array('HIDE_ICONS' => 'Y')
        );?>
    </aside>
</div>