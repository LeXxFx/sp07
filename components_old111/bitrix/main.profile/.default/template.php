<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>

<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
	<?=$arResult["BX_SESSION_CHECK"]?>
	<input type="hidden" name="lang" value="<?=LANG?>">
	<input type="hidden" name="ID" value="<?=$arResult["ID"]?>">
	<input type="hidden" name="LOGIN" maxlength="50" value="<?=$arResult["arUser"]["LOGIN"]?>">

	<div class="label-block">
		<span class="title-input">Имя<b>*</b></span>
		<input type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>">
	</div>

	<div class="label-block">
		<span class="title-input">Фамилия<b>*</b></span>
		<input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>">
	</div>

	<div class="label-block label-float">
		<span class="title-input">E-Mail<b>*</b></span>
		<input type="text" name="EMAIL" maxlength="50" value="<?=$arResult["arUser"]["EMAIL"]?>">
	</div>

	<div class="label-block label-float">
		<span class="title-input">Телефон<b>*</b></span>
		<input type="tel" name="PERSONAL_PHONE" maxlength="255" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>">
	</div>

	<div class="password-change">
		<label class="checkbox-pass">
		<input type="checkbox" name="change">
			Сменить пароль
		</label>
		<div class="label-block label-float">
			<span class="title-input">Текущий пароль</span>
			<input type="password" name="NEW_PASSWORD">
		</div>
		<div class="label-block label-float">
			<span class="title-input">Новый пароль</span>
			<input type="password" name="NEW_PASSWORD_CONFIRM">
		</div>
	</div>

	<input type="submit" value="Сохранить настройки профиля" class="submit-lk" name="save">

</form>
<p>Вы можете связать свой профиль с профилями в социальных сетях и сервисах:</p>
<?
if($arResult["SOCSERV_ENABLED"])
{
	$APPLICATION->IncludeComponent("bitrix:socserv.auth.split", ".default", array(
			"SHOW_PROFILES" => "Y",
			"ALLOW_DELETE" => "Y"
		),
		false
	);
}
?>