<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?
	$current_depth = 1;
	foreach($arResult["SECTIONS"] as $arSection) {
		
		if($current_depth < $arSection["DEPTH_LEVEL"]) echo "<ul>";
		if($current_depth > $arSection["DEPTH_LEVEL"]) echo "</ul>";
		if($arSection["DEPTH_LEVEL"] == "1") echo '<h3><a href="'.$arSection["SECTION_PAGE_URL"].'">'.$arSection["NAME"]."</a></h3>";
		else echo '<li><a href="'.$arSection["SECTION_PAGE_URL"].'">'.$arSection["NAME"].'</a></li>';
		
		$current_depth = $arSection["DEPTH_LEVEL"];
	}
	if($current_depth > 1) echo "</ul>";
?>