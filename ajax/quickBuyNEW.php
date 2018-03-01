<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('catalog');
CModule::IncludeModule("iblock");
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
global $USER;
//$_POST["PRODUCT_PRICE"] = (int)$_POST["PRODUCT_PRICE"];

//Чистим корзину
//$emptyBasket = CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());


//Добавляем товар в корзину
//$addBasket = Add2BasketByProductID($_POST['IDS'],$_POST["COUNT"],array(),array());

global $USER;
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
     echo $user->LAST_ERROR;
}
//Отправляем заказ
$products = array(
    array('PRODUCT_ID' => $_POST['IDS'], 'NAME' => $_POST["PRODUCT_NAME"], 'PRICE' => $_POST["PRODUCT_PRICE"], 'CURRENCY' => 'RUB', 'QUANTITY' => $_POST['COUNT'])
            );
$basket = Bitrix\Sale\Basket::create(SITE_ID);

foreach ($products as $product)
    {
        $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
        unset($product["PRODUCT_ID"]);
        $item->setFields($product);
    }
$order = Bitrix\Sale\Order::create(SITE_ID, $ID);
$order->setPersonTypeId(1);
$order->setBasket($basket);
$propertyCollection = $order->getPropertyCollection();
$phoneProp = $propertyCollection->getPhone();
$phoneProp->setValue($_POST["PHONE"]);
$shipmentCollection = $order->getShipmentCollection();
$shipment = $shipmentCollection->createItem(
        Bitrix\Sale\Delivery\Services\Manager::getObjectById(1)
    );
$shipmentItemCollection = $shipment->getShipmentItemCollection();

foreach ($basket as $basketItem)
    {
        $item = $shipmentItemCollection->createItem($basketItem);
        $item->setQuantity($basketItem->getQuantity());
    }
$paymentCollection = $order->getPaymentCollection();
$payment = $paymentCollection->createItem(
        Bitrix\Sale\PaySystem\Manager::getObjectById(1)
    );
$payment->setField("SUM", $order->getPrice());
$payment->setField("CURRENCY", $order->getCurrency());
$result = $order->save();
    if (!$result->isSuccess())
        {
            $result->getErrors();
        }else{
			$result = "1";
		}
$USER->Logout();
echo json_encode($result);
}else{
//Отправляем заказ
$userId = CUser::GetID();
$products = array(
    array('PRODUCT_ID' => $_POST['IDS'], 'NAME' => $_POST["PRODUCT_NAME"], 'PRICE' => $_POST["PRODUCT_PRICE"], 'CURRENCY' => 'RUB', 'QUANTITY' => $_POST['COUNT'])
            );
$basket = Bitrix\Sale\Basket::create(SITE_ID);

foreach ($products as $product)
    {
        $item = $basket->createItem("catalog", $product["PRODUCT_ID"]);
        unset($product["PRODUCT_ID"]);
        $item->setFields($product);
    }
$order = Bitrix\Sale\Order::create(SITE_ID, $userId);
$order->setPersonTypeId(1);
$order->setBasket($basket);
$shipmentCollection = $order->getShipmentCollection();
$propertyCollection = $order->getPropertyCollection();
$phoneProp = $propertyCollection->getPhone();
$phoneProp->setValue($_POST["PHONE"]);
$shipment = $shipmentCollection->createItem(
        Bitrix\Sale\Delivery\Services\Manager::getObjectById(1)
    );
$shipmentItemCollection = $shipment->getShipmentItemCollection();

foreach ($basket as $basketItem)
    {
        $item = $shipmentItemCollection->createItem($basketItem);
        $item->setQuantity($basketItem->getQuantity());
    }
$paymentCollection = $order->getPaymentCollection();
$payment = $paymentCollection->createItem(
        Bitrix\Sale\PaySystem\Manager::getObjectById(1)
    );
$payment->setField("SUM", $order->getPrice());
$payment->setField("CURRENCY", $order->getCurrency());
$result = $order->save();
    if (!$result->isSuccess())
        {
            $result->getErrors();
        }else{
			$result = "1";
		}
echo json_encode($result);
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>