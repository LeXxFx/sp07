<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $component
 */
//one css for all system.auth.* forms
//$APPLICATION->SetAdditionalCSS("/bitrix/css/main/system.auth/flat/style.css");
?>
<?
//echo "<pre>";
//print_r($arResult);
//echo "</pre>";
?>
            <div class="inner">
                <div id="content" role="main">
					<?
					if(!empty($arParams["~AUTH_RESULT"])):
						$text = str_replace(array("<br>", "<br />"), "\n", $arParams["~AUTH_RESULT"]["MESSAGE"]);
					?>
						<div class="alert alert-danger"><?=nl2br(htmlspecialcharsbx($text))?></div>
					<?endif?>

					<?
					if($arResult['ERROR_MESSAGE'] <> ''):
						$text = str_replace(array("<br>", "<br />"), "\n", $arResult['ERROR_MESSAGE']);
					?>
						<div class="alert alert-danger"><?=nl2br(htmlspecialcharsbx($text))?></div>
					<?endif?>
					<div class="account account-login">
						<form action="<?=$arResult["AUTH_URL"]?>" class="form-horizontal" name="form_auth" method="post" target="_top">
						<input type="hidden" name="AUTH_FORM" value="Y" />
						<input type="hidden" name="TYPE" value="AUTH" />
						<?if (strlen($arResult["BACKURL"]) > 0):?>
						<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
						<?endif?>
						<?foreach ($arResult["POST"] as $key => $value):?>
						<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
						<?endforeach?>
							<div class="form-group">
								<div class="col-sm-3">
									<label class="control-label">Логин<span class="req">*</span></label>
								</div>
								<div class="col-sm-9">
									<input name="USER_LOGIN" type="text" class="form-control" placeholder="Введите логин">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-3">
									<label class="control-label">Пароль<span class="req">*</span></label>
								</div>
								<div class="col-sm-9">
									<input name="USER_PASSWORD" type="password" class="form-control" placeholder="***********">
								</div>
							</div>
							<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
							<div class="form-group">
								<div class="col-sm-9 col-sm-offset-3">
									<label for="rememberMe" class="form-checkbox">
										<input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y">
										<span>Запомнить меня на этом компьютере</span>
									</label>
								</div>
							</div>
							<?endif?>
							<div class="form-group form-baton">
								<div class="col-sm-5 col-sm-offset-3">
									<a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow">Забыли пароль?</a>
								</div>
								<div class="col-sm-4 col-btn">
									<button class="btn btn-success">Войти</button>
								</div>
							</div>
							<div class="form-group form-bottom">
								<div class="col-sm-9 col-sm-offset-3">
									Еще не зарегистрированы на сайте? <a href="/personal/register/" rel="nofollow">Пройдите регистрацию</a>.
								</div>
							</div>
						</form>
					</div>
					<div class="bot-help">
						<h2>Что дает регистрация на сайте?</h2>
						<ol>
							<li>Пользоваться <b>дополнительными</b> скидками и специальными предложениями;</li>
							<li>Отслеживать состояния Ваших <b>заказов</b>;</li>
							<li><b>Значительно</b> ускоряет процесс оформления заказа;</li>
							<li><b>Заранее</b> узнавать о предстоящих акциях и распродажах.</li>
						</ol>
						<p>Регистрация <b>не является</b> обязательной для совершения покупок.</p>
					</div>
                </div>
            </div>
<script type="text/javascript">
<?if (strlen($arResult["LAST_LOGIN"])>0):?>
try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
<?else:?>
try{document.form_auth.USER_LOGIN.focus();}catch(e){}
<?endif?>
</script>

