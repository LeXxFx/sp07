<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$inv_id = $_REQUEST["InvId"];
echo "Платеж совершен успешно. Заказ# $inv_id";
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>