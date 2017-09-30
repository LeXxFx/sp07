<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

/**
 * Bitrix vars
 *
 * @var CBitrixComponent         $component
 * @var CBitrixComponentTemplate $this
 * @var array                    $arParams
 * @var array                    $arResult
 * @var array                    $arLangMessages
 * @var array                    $templateData
 *
 * @var string                   $templateFile
 * @var string                   $templateFolder
 * @var string                   $parentTemplateFolder
 * @var string                   $templateName
 * @var string                   $componentPath
 *
 * @var CDatabase                $DB
 * @var CUser                    $USER
 * @var CMain                    $APPLICATION
 */
if(method_exists($this, 'setFrameMode'))
	$this->setFrameMode(true);

if($arParams['INCLUDE_CSS'] == 'Y')
	$this->addExternalCss($this->GetFolder() . '/styles.css');
?>
<div class="inner">
<div class="api-search-catalog tpl-default" id="<?=$arResult['COMPONENT_ID']?>">
	<? if($arParams['USE_SEARCH'] == 'Y'): ?>
		<form action="<?=POST_FORM_ACTION_URI?>" autocomplete="off">
			<div class="api-search-fields">
				<div class="api-query">
					<input class="api-search-input"
					       placeholder="<?=$arParams['INPUT_PLACEHOLDER']?>"
					       name="q"
					       maxlength="300"
					       value="<?=$arResult['q']?>"
					       type="text">
				</div>
				<div class="api-search-button">
					<button type="submit"><?=($arParams['BUTTON_TEXT'] ? $arParams['BUTTON_TEXT'] : '<i class="api-search-icon"></i>')?></button>
				</div>
			</div> 
		</form>
	<? endif ?>


</div>



    <?




	if($arParams['IBLOCK_ID'])
	{
		if(strlen($arResult['q']) >= API_SEARCH_CHAR_LENGTH)
		{


    $APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "sp07restail_subleft",
        Array(
            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_GROUPS" => "N",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "N",
            "COUNT_ELEMENTS" => "Y",
            "IBLOCK_ID" => "9",
            "IBLOCK_TYPE" => "1c_catalog",
            "SECTION_CODE" => '',
            "SECTION_FIELDS" => array("",""),
            "SECTION_ID" => "",
            "SECTION_URL" => "#SITE_DIR#/store/#SECTION_CODE#/",
            "SECTION_USER_FIELDS" => array("",""),
            "SHOW_PARENT_NAME" => "Y",
            "TOP_DEPTH" => "2",
            "VIEW_MODE" => "LIST",
            "USE_FILTER" => "Y",
            "FILTER_NAME" =>  $arParams["FILTER_NAME"],
            "FILTER_VIEW_MODE" => "VERTICAL",
            "FILTER_FIELD_CODE" => array(
                0 => "",
                1 => "",
            ),
            "FILTER_PROPERTY_CODE" => array(
                0 => "",
                1 => "",
            ),
            "FILTER_PRICE_CODE" => array(
                0 => "Для сайта (САЙТ цена)",
            ),
            "FILTER_OFFERS_FIELD_CODE" => array(
                0 => "",
                1 => "",
            ),
            "FILTER_OFFERS_PROPERTY_CODE" => array(
                0 => "VES",
                1 => "DLINA",
                2 => "DLINA_2",
                3 => "RAZMER",
                4 => "RAZMER_3",
                5 => "NAGRUZKA",
                6 => "ROST",
                7 => "TSVET",
                8 => "TSVET_1",
                9 => "TSVET_2", 
                10 => "",
            ),
        ),
        $component
    );

?>
    <div id="content" role="main">
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
                (($_SESSION['viewmode']=='list')?"sp07restail_list2":"sp07restail2"),
				$arParams,
				$arResult['THEME_COMPONENT'],
				array('HIDE_ICONS' => 'Y')
			);
		}
	}
	?>
    </div>
</div>
