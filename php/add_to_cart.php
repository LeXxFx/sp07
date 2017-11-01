<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('catalog');

$output['product_id']=$_GET['product_id'];
$output['price_id']=$_GET['price_id'];
$output['amount']=$_GET['amount'];
$output['props']=$_GET['props'];
if (isset($_GET["price_id"]) && !empty($_GET["price_id"]) && $_GET["price_id"]>0)
	$output['method']='Add2Basket';
else
	$output['method']='Add2BasketByProductID';

if (isset($_GET["price_id"]) && !empty($_GET["price_id"]) && $_GET["price_id"]>0)
	$output['ID'] = Add2Basket($_GET["price_id"], intval($_GET["amount"]), array(), $_GET["props"]);
else
	$output['ID'] = Add2BasketByProductID( $_GET['product_id'], intval($_GET["amount"]) );

$arBasketItems = array();

$dbBasketItems = CSaleBasket::GetList(
        array(
                "NAME" => "ASC",
                "ID" => "ASC"
            ),
        array(
                "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                "LID" => SITE_ID,
                "ORDER_ID" => 'NULL',
                "ID" => $output['ID']
            ),
        false,
        false,
        array("ID", "CALLBACK_FUNC", "MODULE", 
              "PRODUCT_ID", "QUANTITY", "DELAY", 
              "CAN_BUY", "PRICE", "WEIGHT")
    );

if ($arItems = $dbBasketItems->Fetch())
{
	$output['basket']=$arItems;
	if ($arItems['QUANTITY']<$_GET['amount'])
		CSaleBasket::Update($output['ID'], array("QUANTITY" => $_GET['amount']));
}


echo json_encode($output);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>