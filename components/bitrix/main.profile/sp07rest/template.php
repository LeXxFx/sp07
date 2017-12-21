<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
$arResult["arUser"]["PERSONAL_PHONE"] = str_replace("+", "", $arResult["arUser"]["PERSONAL_PHONE"]);
?>
<?
//echo "<pre>";
//print_r($arResult);
//echo "</pre>";
?>
			<?ShowError($arResult["strProfileError"]);?>
			<?
			if ($arResult['DATA_SAVED'] == 'Y')
				ShowNote(GetMessage('PROFILE_DATA_SAVED'));
			?>
			<script type="text/javascript">
			<!--
			var opened_sections = [<?
			$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
			$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
			if (strlen($arResult["opened"]) > 0)
			{
				echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
			}
			else
			{
				$arResult["opened"] = "reg";
				echo "'reg'";
			}
			?>];
			//-->

			var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
			</script>

            <div class="inner">
                <div id="content" role="main">
					<div class="cabinet">
						<ul class="page-nav clearfix">
							<li class="active"><a href="/personal/profile/"><span>Персональная информация</span></a></li>
							<li><a href="/personal/order/"><span>История заказов</span></a></li>
						</ul>
						<div class="account account-registration">
							<form action="<?=$arResult["FORM_TARGET"]?>" class="form-horizontal" method="post" name="form1" enctype="multipart/form-data">
							<?=$arResult["BX_SESSION_CHECK"]?>
							<input type="hidden" name="lang" value="<?=LANG?>" />
							<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
								<div class="form-group">
									<div class="col-sm-3">
										<label class="control-label">Логин</label>
									</div>
									<div class="col-sm-9">
										<input type="text" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"]?>" class="form-control"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										<label class="control-label">Фамилия</label>
									</div>
									<div class="col-sm-9">
										<input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>"  class="form-control"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										<label class="control-label">Имя<span class="req">*</span></label>
									</div>
									<div class="col-sm-9">
										<input type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>"  class="form-control has-error"/>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										<label class="control-label">Отчество</label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										<label class="control-label">Номер телефона<span class="req">*</span></label>
									</div>
									<div class="col-sm-9">
										<input type="tel" class="form-control" autocomplete="tel" name="PERSONAL_PHONE" maxlength="50" value="<?=$arResult["arUser"]["PERSONAL_PHONE"]?>" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										<label class="control-label">Em@il<span class="req">*</span></label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" placeholder="ivanov@mail.ru" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"]?>" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										<label class="control-label">Адрес доставки</label>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="PERSONAL_STREET" maxlength="50" value="<? echo $arResult["arUser"]["PERSONAL_STREET"]?>" />
									</div>
								</div>
								<div class="change-password">
									<label for="rememberMe" class="form-checkbox">
										<input type="checkbox" id="rememberMe">
										<span>Сменить пароль</span>
									</label>
									<label class="control-label">Новый пароль</label>
									<input type="password" class="form-control" placeholder="***********" name="NEW_PASSWORD" maxlength="50">
									<label class="control-label">Повторите</label>
									<input type="password" class="form-control" placeholder="***********" name="NEW_PASSWORD_CONFIRM" maxlength="50">
								</div>
								<div class="form-group form-baton">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-9 col-btn">
										<input class="btn btn-success" type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">
									</div>
								</div>
							</form>
						</div>
					</div>
                </div>
            </div>