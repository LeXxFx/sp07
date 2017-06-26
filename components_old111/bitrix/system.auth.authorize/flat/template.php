<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->createFrame()->begin('Загрузка');
?>

<?
if(!empty($arParams["~AUTH_RESULT"])):
	$text = str_replace(array("<br>", "<br>"), "\n", $arParams["~AUTH_RESULT"]["MESSAGE"]);
?>
	<div class="alert alert-danger"><?=nl2br(htmlspecialcharsbx($text))?></div>
<?endif?>

<?
if($arResult['ERROR_MESSAGE'] <> ''):
	$text = str_replace(array("<br>", "<br>"), "\n", $arResult['ERROR_MESSAGE']);
?>
	<div class="alert alert-danger"><?=nl2br(htmlspecialcharsbx($text))?></div>
<?endif?>

<div class="reg-page">

	<?if($arResult["AUTH_SERVICES"]):?>
		<?
		$APPLICATION->IncludeComponent("bitrix:socserv.auth.form",
			"flat",
			array(
				"AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
				"AUTH_URL" => $arResult["AUTH_URL"],
				"POST" => $arResult["POST"],
			),
			$component,
			array("HIDE_ICONS"=>"Y")
		);
		?>
	<?endif?>

	<form name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="AUTH">
		<?if (strlen($arResult["BACKURL"]) > 0):?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>">
		<?endif?>
		<?foreach ($arResult["POST"] as $key => $value):?>
			<input type="hidden" name="<?=$key?>" value="<?=$value?>">
		<?endforeach?>

		<div class="label-block">
			<span class="title-input"><?=GetMessage("AUTH_LOGIN")?>:</span>
			<input type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>">
		</div>
		
		<div class="label-block">
			<span class="title-input"><?=GetMessage("AUTH_PASSWORD")?>:</span>
			<input type="password" name="USER_PASSWORD" maxlength="255" autocomplete="off">
		</div>
		
		<?if($arResult["CAPTCHA_CODE"]):?>
			<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>">
			<p class="capcha-p">Защита от автоматической регистрации</p>
			<div class="capcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" alt="CAPTCHA"></div>
			<div class="label-block">
				<span class="title-input">Введите слово на картинке:</span>
				<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off">
			</div>
		<?endif;?>

		<input type="submit" value="<?=GetMessage("AUTH_AUTHORIZE")?>" name="Login">
	</form>

	<div class="links">
		<a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a>
		<a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a>
	</div>

</div>