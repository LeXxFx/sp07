<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

//one css for all system.auth.* forms
$APPLICATION->SetAdditionalCSS("/bitrix/css/main/system.auth/flat/style.css");
?>
            <div class="inner">
                <div id="content" role="main">
					<div class="account account-registration">
					<?
					if(!empty($arParams["~AUTH_RESULT"])):
						$text = str_replace(array("<br>", "<br />"), "\n", $arParams["~AUTH_RESULT"]["MESSAGE"]);
					?>
						<div class="alert <?=($arParams["~AUTH_RESULT"]["TYPE"] == "OK"? "alert-success":"alert-danger")?>"><?=nl2br(htmlspecialcharsbx($text))?></div>
					<?endif?>

						<h3 class="bx-title"><?=GetMessage("AUTH_GET_CHECK_STRING")?></h3>

						<p class="bx-authform-content-container"><?=GetMessage("AUTH_FORGOT_PASSWORD_1")?></p>
						<form action="<?=$arResult["AUTH_URL"]?>" class="form-horizontal" name="bform" method="post" target="_top">
						<?if($arResult["BACKURL"] <> ''):?>
								<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
						<?endif?>
								<input type="hidden" name="AUTH_FORM" value="Y">
								<input type="hidden" name="TYPE" value="SEND_PWD">
							<div class="form-group">
								<div class="col-sm-3">
									<label class="control-label"><?echo GetMessage("AUTH_LOGIN_EMAIL")?><span class="req">*</span></label>
								</div>
								<div class="col-sm-9">
									<input type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" class="form-control" placeholder="ivanov@mail.ru" />
									<input type="hidden" name="USER_EMAIL" />
								</div>
							</div>
							<!--<div class="form-group form-captcha">
								<div class="col-sm-3">
									<label class="control-label">Введите символы, как на картинке<span class="req">*</span></label>
								</div>
								<div class="col-sm-3">
									<div class="form-captcha__image">
										<img src="demo/captcha.jpg" alt=""/>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-captcha__input">
										<input type="text" class="form-control">
									</div>
								</div>
							</div>-->
							<div class="form-group form-baton">
								<div class="col-sm-3">
									<a href="/personal/">Авторизация</a>
								</div>
								<div class="col-sm-9 col-btn">
									<input type="submit" class="btn btn-success" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
								</div>
							</div>
						</form>
					</div>
                </div>
            </div>