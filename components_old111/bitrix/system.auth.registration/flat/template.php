<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->createFrame()->begin('Загрузка');
?>

<?
if(!empty($arParams["~AUTH_RESULT"])):
	$text = str_replace(array("<br>", "<br>"), "\n", $arParams["~AUTH_RESULT"]["MESSAGE"]);
?>
	<div class="alert <?=($arParams["~AUTH_RESULT"]["TYPE"] == "OK"? "alert-success":"alert-danger")?>"><?=nl2br(htmlspecialcharsbx($text))?></div>
<?endif?>

<?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y" && is_array($arParams["AUTH_RESULT"]) &&  $arParams["AUTH_RESULT"]["TYPE"] === "OK"):?>
	<div class="alert alert-success"><?echo GetMessage("AUTH_EMAIL_SENT")?></div>
<?else:?>

<?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
	<div class="alert alert-warning"><?echo GetMessage("AUTH_EMAIL_WILL_BE_SENT")?></div>
<?endif?>

<div class="reg-page">
	<noindex>
		<form method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform">
			<?if($arResult["BACKURL"] <> ''):?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>">
			<?endif?>

			<input type="hidden" name="AUTH_FORM" value="Y">
			<input type="hidden" name="TYPE" value="REGISTRATION">

			<div class="label-block label-float">
				<span class="title-input">Имя:<b>*</b></span>
				<input type="text" name="USER_NAME" maxlength="255" value="<?=$arResult["USER_NAME"]?>">
			</div>
			
			<div class="label-block label-float">
				<span class="title-input">Фамилия:<b>*</b></span>
				<input type="text" name="USER_LAST_NAME" maxlength="255" value="<?=$arResult["USER_LAST_NAME"]?>">
			</div>
			
			<div class="label-block">
				<span class="title-input">Логин<b>*</b> (мин. 3 символа):</span>
				<input type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["USER_LOGIN"]?>">
			</div>
			
			<div class="label-block">
				<span class="title-input">Пароль<b>*</b>:</span>
				<input type="password" name="USER_PASSWORD" maxlength="255" value="<?=$arResult["USER_PASSWORD"]?>" autocomplete="off">
			</div>
			
			<div class="label-block">
				<span class="title-input">Подтверждение пароля<b>*</b>:</span>
				<input type="password" name="USER_CONFIRM_PASSWORD" maxlength="255" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" autocomplete="off">
			</div>
			
			<div class="label-block">
				<span class="title-input">E-Mail:<b>*</b>:</span>
				<input type="text" name="USER_EMAIL" maxlength="255" value="<?=$arResult["USER_EMAIL"]?>">
			</div>
			
			<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>">
			<p class="capcha-p">Защита от автоматической регистрации</p>
			<div class="capcha"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" alt="CAPTCHA"></div>
			<div class="label-block">
				<span class="title-input">Введите слово на картинке:</span>
				<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off">
			</div>
			
			<input type="submit" value="Регистрация" name="Register">
			<p class="pass-p">Пароль должен быть не менее 6 символов длиной.<br>
			<b>*</b>Обязательные поля</p>

		</form>
	</noindex>
</div>

<?endif;?>