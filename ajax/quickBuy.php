<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('catalog');
CModule::IncludeModule("iblock");
//CModule::IncludeModule("sale");
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
global $USER;
$_POST["PRODUCT_PRICE"] = (int)$_POST["PRODUCT_PRICE"];
$_POST["IDS"] = (int)$_POST["IDS"];
global $USER;

//Чистим корзину
$emptyBasket = CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());

//Далее проверяем авторизацию пользователя, добавляем товары в корзину и оформляем корзину.

if (!$USER->IsAuthorized()){
//Создаем пользователя
	if($_POST["NAME"] != ""){
		$user_name = $_POST["NAME"];
	}else{
		$user_name = "1 клик";
	};
	if($_POST["EMAIL"] != ""){
		$user_email = $_POST["EMAIL"];
	}else{
		$user_email = time()."@sport07.ru";
	};
	$user_login = "client".time();
	$password = GetRandomCode();
	$user = new CUser;
	$arFields = Array(
	  "NAME"              => "1клик",
	  "LAST_NAME"         => "1клик",
	  "EMAIL"             => $user_email,
	  "LOGIN"             => $user_login,
	  "LID"               => "ru",
	  "PERSONAL_PHONE"	  => $_POST["PHONE"],
	  "ACTIVE"            => "Y",
	  "GROUP_ID"          => array(3,5),
	  "PASSWORD"          => $password,
	  "CONFIRM_PASSWORD"  => $password
	);

	$ID = $user->Add($arFields);
	if (intval($ID) > 0){
		$USER->Authorize($ID);
	}else{
		 echo "сюда попали";
	};
	
	//Добавляем товар в корзину
	$addBasket = Add2BasketByProductID($_POST["IDS"], $_POST["COUNT"], array(), array());

	//echo json_encode($result);
	//Создаем профиль покупателя
	$arFieldsUser = array(
		"NAME" => "Быстрый заказ777",
		"USER_ID" => $USER->GetID(),
		"PERSON_TYPE_ID" => 1,
		"PHONE" => $_POST["PHONE"]
	);
	$USER_PROPS_ID = CSaleOrderUserProps::Add($arFieldsUser);
	//echo "код пользователя ".$USER_PROPS_ID;
	
	//Создаем заказ
	$arFields = array( 
	"LID" => "s1", 
	"PERSON_TYPE_ID" => 1, 
	"PAYED" => "N", 
	"CANCELED" => "N", 
	"STATUS_ID" => "N",
	"PRICE" => $_POST["PRODUCT_PRICE"], 
	"CURRENCY" => "RUB", 
	"USER_ID" => IntVal($USER->GetID()), 
	"PAY_SYSTEM_ID" => 1,  
	"DISCOUNT_VALUE" => 0, 
	"TAX_VALUE" => 0.0, 
	"USER_DESCRIPTION" => ""
	);
	$ORDER_ID = CSaleOrder::Add($arFields);
	
	//Оформляем заказ
	CSaleBasket::OrderBasket($ORDER_ID);
	
	//Добавляем номер телефона в свойство заказа
	$arFields3 = array(
	"ORDER_ID" => $ORDER_ID,
	"ORDER_PROPS_ID" => 3,
	"NAME" => "Телефон",
	"CODE" => "PHONE",
	"VALUE" => $_POST["PHONE"]
	);
	$ERRORS = CSaleOrderPropsValue::Add($arFields3);
	echo $ERRORS;
	
	//Деавторизуем ползователя
	$USER->Logout();
}else{
	//Добавляем товар в корзину
	$addBasket = Add2BasketByProductID(
						$_POST["IDS"],
						$_POST["COUNT"],
						array(),
						array()
						);

	//echo json_encode($result);
	$arFields = array( 
	"LID" => "s1", 
	"PERSON_TYPE_ID" => 1, 
	"PAYED" => "N", 
	"CANCELED" => "N", 
	"STATUS_ID" => "N", 
	"PRICE" => $_POST["PRODUCT_PRICE"], 
	"CURRENCY" => "RUB", 
	"USER_ID" => IntVal($USER->GetID()), 
	"PAY_SYSTEM_ID" => 1,  
	"DISCOUNT_VALUE" => 0, 
	"TAX_VALUE" => 0.0, 
	"USER_DESCRIPTION" => ""
	); 


	$ORDER_ID = CSaleOrder::Add($arFields); 
	   
	CSaleBasket::OrderBasket($ORDER_ID);
}
//print_r($_POST);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>