<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$PRODUCT_ID=$_GET['product_id'];
$action = (isset($_GET['action']) && !empty($_GET['action']))? $_GET['action'] : 'ADD2BASKET';
$count = (isset($_GET['count']) && !empty($_GET['count']) && $_GET['count']>1)? $_GET['count'] : 1;
$request = array('PRODUCT_ID' => $PRODUCT_ID, 'ACTION'=>$action, 'COUNT'=>$count);
if (CModule::IncludeModule("catalog"))
{
    if (($action == "ADD2BASKET" || $action == "BUY") && IntVal($PRODUCT_ID)>0)
    {
        $request['NEW_ID']=Add2BasketByProductID( $PRODUCT_ID, $count );
    }
}
echo json_encode($request);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>