<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?//$APPLICATION->IncludeComponent(
//	"bitrix:main.include", 
//	".default", 
//	array(
//		"AREA_FILE_SHOW" => "file",
//		"AREA_FILE_SUFFIX" => "inc",
//		"AREA_FILE_RECURSIVE" => "Y",
//		"EDIT_TEMPLATE" => "standard.php",
//		"COMPONENT_TEMPLATE" => ".default",
//		"PATH" => "/include/catalog/section/text.php"
//	),
//	false
//);?><br>
<br><br>
<script type="text/javascript">
    rrApiOnReady.push(function() {
  try { rrApi.categoryView(
<?=$arResult["ID"]?>
); } catch(e) {}
 })
</script>
<?if($arParams["DISPLAY_BOTTOM_PAGER"] == "Y") echo $arResult["NAV_STRING"];?>