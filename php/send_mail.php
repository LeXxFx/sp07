<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$to      = 'info@sport07.ru';
$subject = 'Запрос товара с сайта';
$message = $_POST['message'];
$phone = $_POST['phone'];
$message_full = "Сообщение: ".$message.".   "."Контактный телефон: ".$phone;
$headers = 'From: SPORT07' . "\r\n" .
    'Reply-To: sale@sport07.ru' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message_full, $headers)){
	echo json_encode("DONE");
}else{
	echo json_encode("ERROR");
};
	
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>