<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
if(!isset($arResult['ERRORS']) || empty($arResult['ERRORS']))
	echo "SUCCESS";
else
	foreach($arResult['ERRORS'] as $key=>$error)
		echo str_replace('#FIELD_NAME#',GetMessage('REGISTER_FIELD_'.$key),$error).'<br>';
?>