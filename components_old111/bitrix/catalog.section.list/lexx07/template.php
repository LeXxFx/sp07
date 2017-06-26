<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?
foreach($arResult['SECTIONS'] as $arResults){
echo "<pre>";
echo "<b>имя: </b>".$arResults['NAME']."    <b>ссылка:</b> ".$arResults['SECTION_PAGE_URL'];
echo "</pre>";
}
?>