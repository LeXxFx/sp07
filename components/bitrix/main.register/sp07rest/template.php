<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
//echo "<pre>";print_r($arResult);echo "</pre>";
?>
			<?if($USER->IsAuthorized()):?>
			<?LocalRedirect('/personal/profile/');?>
			<p>azzz<?echo GetMessage("MAIN_REGISTER_AUTH")?>azzz</p>

			<?else:?>
			<?
			if (count($arResult["ERRORS"]) > 0):
				foreach ($arResult["ERRORS"] as $key => $error)
					if (intval($key) == 0 && $key !== 0) 
						$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

				ShowError(implode("<br />", $arResult["ERRORS"]));

			elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
			?>
			<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
			<?endif?>
			<div class="inner">
                <div id="content" role="main">
					<div class="account account-registration">
						<form method="post" action="<?=POST_FORM_ACTION_URI?>" class="form-horizontal" name="regform" enctype="multipart/form-data">
						<?
						if($arResult["BACKURL"] <> ''):
						?>
							<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
						<?
						endif;
						?>
							<?foreach($arResult["SHOW_FIELDS"] as $field):?>
							<div class="form-group">
								<div class="col-sm-3">
									<label class="control-label"><?=GetMessage("REGISTER_FIELD_".$field)?><?if($arResult["REQUIRED_FIELDS_FLAGS"][$field] == "Y"):?><span class="req">*</span><?endif;?></label>
								</div>
								<div class="col-sm-9">
									<input <?if($field == "PASSWORD" || $field == "CONFIRM_PASSWORD"){echo "type=\"password\"";}elseif($field == "PERSONAL_PHONE"){echo "type=\"tel\"";}else{echo "type=\"text\"";};?> name="REGISTER[<?=$field?>]" class="form-control" <?if($field == "PERSONAL_PHONE"):?>autocomplete="tel"<?endif;?><?if($field == "EMAIL"):?>placeholder="ivanov@mail.ru"<?endif;?><?if($field == "PASSWORD" || $field == "CONFIRM_PASSWORD"):?>autocomplete="off" placeholder="***********"<?endif;?>>
								</div>
							</div>
							<?endforeach;?>
							<?
							/* CAPTCHA */
							if ($arResult["USE_CAPTCHA"] == "Y")
							{
								?>
							<div class="form-group form-captcha">
								<div class="col-sm-3">
									<label class="control-label">Введите символы, как на картинке<span class="req">*</span></label>
								</div>
								<div class="col-sm-3">
									<div class="form-captcha__image">
										<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
										<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="100px" height="40" alt="CAPTCHA"/>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-captcha__input">
										<input type="text" name="captcha_word" class="form-control">
									</div>
								</div>
							</div>
							<?
							}
							/* !CAPTCHA */
							?>
							<div class="form-group form-baton">
								<div class="col-sm-3">
									<a href="/personal/">Авторизация</a>
								</div>
								<div class="col-sm-9 col-btn">
									<input type="submit" class="btn btn-success" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>" />
								</div>
							</div>
						</form>
					</div>
                </div>
            </div>
			<?endif;?>