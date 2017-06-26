<?php require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

$psID = 0;
$ptID = 0;
$ordID = 0;

if (isset($_REQUEST['LMI_PAYMENT_NO'])) {
	$ordID = $_REQUEST['LMI_PAYMENT_NO'];
} elseif (isset($_REQUEST['InvId'])) {
	$ordID = $_REQUEST['InvId'];
}

if ($ordID && CModule::IncludeModule('sale')) {
	$arOrder = CSaleOrder::GetByID($ordID);
	$psID = $arOrder['PAY_SYSTEM_ID'];
	$ptID = $arOrder['PERSON_TYPE_ID'];
}

$APPLICATION->IncludeComponent(
	'bitrix:sale.order.payment.receive',
	'',
	Array(
		'PAY_SYSTEM_ID' => $psID,
		'PERSON_TYPE_ID' => $ptID
	),
false
);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');