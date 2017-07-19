<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>
<?
//print_r($_POST);
$arFields = array(
   "QUANTITY" => $_REQUEST['count']
);
CSaleBasket::Update($_REQUEST['itemId'], $arFields);
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>