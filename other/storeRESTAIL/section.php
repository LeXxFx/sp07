<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Подкатегория");
?>
<div class="inner">
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"sp07restail_main",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"COUNT_ELEMENTS" => "Y",
		"HIDE_SECTION_NAME" => "N",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "1c_catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array("",""),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "#SITE_DIR#/store/shop-grid.php?SECTION_ID=#SECTION_ID#",
		"SECTION_USER_FIELDS" => array("",""),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "TILE"
	)
);?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"sp07restail_left",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"COUNT_ELEMENTS" => "Y",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "1c_catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array("",""),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "#SITE_DIR#/store/shop-grid.php?SECTION_ID=#SECTION_ID#",
		"SECTION_USER_FIELDS" => array("",""),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LIST"
	),
$component
);?>
</div>
<div class="category__post">
<?
CModule::IncludeModule("iblock");
$res = CIBlockSection::GetByID($_REQUEST["SECTION_ID"]);
if($ar_res = $res->GetNext())
{
	echo $ar_res["DESCRIPTION"];
}
?>
				
                <div class="show_more">
                    <button class="btn collapsed" data-toggle="collapse" data-target="#text" data-title-init="Подробнее" data-title-collapsed="Закрыть"><span>Подробнее</span> <i class="icon icon-arrow-down"></i></button>
                </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>