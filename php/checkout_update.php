<?
//echo "<pre>";
//print_r($_GET);
//echo "</pre>";
$sum=str_replace(' руб.', '', $_GET['sum']);
$sum=str_replace(' ', '', $sum);

$SumRes=$sum+$_GET['delivery'];

function RUBformat($val){

}
?>
<div class="checkout-result__top">Сводная информация</div>
<table class="checkout-result__suma">
    <tbody><tr>
        <td>Товаров на</td>
        <td class="suma-value suma-tovar"><?=number_format($sum, 0, ',', ' ');?> руб.</td>
    </tr>
<!--<tr>
        <td><span>Бонус 5%</span></td>
        <td class="suma-value label-alert">234 руб.</td>
    </tr>-->
	<?if(!empty($_GET["discount"])):?>
    <tr>
        <td><span>Скидка</span></td>
        <td class="suma-value label-alert discount"><?=$_GET["discount"]?></td>
    </tr>
	<?endif;?>
    <tr>
        <td>Доставка</td>
        <td class="suma-value sum-delivery"><?=number_format($_GET['delivery'], 0, ',', ' ');?> руб.</td>
    </tr>
    <tr><td colspan="2"><hr></td></tr>
    <tr>
        <td>Всего:</td>
        <td class="suma-value"><?=number_format($SumRes, 0, ',', ' ')?> руб.</td>
    </tr>
</tbody></table>
<?//var_dump($_GET)?>