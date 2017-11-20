<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$frame=$this->createFrame()->begin();?>
<?global $APPLICATION;
	global $USER;
	if(!is_object($USER)) $USER=new CUser;?>
<div class="add-reviews">
<div class="success" style="display:none;"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_SUCCESS_TEXT")?></div>
<div class="bg">
	<div class="spoiler">
		<div class="spoiler-input">
			<?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_SPOILER_TITLE")?>
		</div>
	</div>
</div>
	<div class="spoiler-reviews-body">
		<?if ($USER->IsAuthorized() || COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_REGISTER_USERS_".SITE_ID, "")!='Y'):?>
			<?
			if($arResult['BAN']!="Y"):
			if((COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_IF_BUY_".SITE_ID, "")=='Y' && $arResult['REVIEWS_BUY']=='Y') || COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_IF_BUY_".SITE_ID, "")!='Y'):?>
				<?if($arResult['CAN_REPEAT']==1):?>
				<p class="review-add-title"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_ADD_TITLE")?></p>
				<div class="review-add-block">
				<p class="add-check-error" style="display:none;"></p>
				<p class="review-add-rating-title1"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_ADD_RATING_TITLE1")?></p>
				<p class="review-add-rating-title2"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_ADD_RATING_TITLE2")?></p>
				<form  class="review" id="add_review" action="javascript:void(null);" enctype="multipart/form-data">
							<div class='rating_selection'>
								<?for($i=1;$i<=$arParams['MAX_RATING'];++$i):?>
									<input id="star-<?=$i?>" type="radio" name="rating" value="<?=$i?>" <?=($i==$arParams['DEFAULT_RATING_ACTIVE'])?'checked':'';?>/>
									<label title="" for="star-<?=$i?>"></label>
								<?endfor;?>
							</div>
							<input type="hidden" name="ID_ELEMENT" value="<?=$arParams['ID_ELEMENT']?>" />
							<input type="hidden" name="MODERATION" value="<?=COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_MODERATION_".SITE_ID, "")?>" />
							<input type="hidden" name="NOTICE_EMAIL" value="<?=$arParams['NOTICE_EMAIL']?>" />
							<input type="hidden" name="SITE_DIR" value="<?=SITE_DIR?>" />
							<input type="hidden" name="SPAM_ERROR" value="<?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_SPAM_ERROR")?>" />
							<input type="hidden" name="VIDEO_ERROR" value="<?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_VIDEO_ERROR")?>" />
							<input type="hidden" name="PAGE_URL" value="<?=$APPLICATION->GetCurPage()?>" />
							<input type="hidden" name="SPAM_ERROR" value="<?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_SPAM_ERROR")?>" />
							<input type="hidden" name="PRIMARY_COLOR" value="<?=$arParams['PRIMARY_COLOR']?>" />
							<input type="hidden" name="MAX_RATING" value="<?=$arParams['MAX_RATING']?>" />
							<input type="hidden" name="BUTTON_BACKGROUND" value="<?=$arParams['BUTTON_BACKGROUND']?>" />
							<input type="hidden" name="ADD_REVIEW_PLACE" value="<?=$arParams['ADD_REVIEW_PLACE']?>" />
							<input type="hidden" name="TEMPLATE" value="<?=$templateName?>" />
							<?if(COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_TITLE_".SITE_ID, "")=='Y'):?>
							<p class="title"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_TITLE")?></p>
							<p class="title-example"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_TITLE_EXAMPLE")?></p>
							<input type="text" name="title" value="" maxlength="255" class="title" />
							<?endif;?>
							<p class="text"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_TEXT")?></p>
							<div class="textbox-group">
					
						<?if(COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_EDITOR_".SITE_ID, "")=="Y"): ?>
						<span id="review-editor">
						<?$APPLICATION->IncludeComponent( "bitrix:main.post.form", "", Array(
		'BUTTONS' => array(),
		'PARSER' => array(),
		'PIN_EDITOR_PANEL'=>'N',
		'TEXT' => array(
				'SHOW'=>'Y',
				'VALUE'=>"",
				'NAME'=>'text'
		)
) );?>
</span>
<?else: ?>
							<textarea name="text" id="contentbox" maxlength="<?=$arParams["TEXTBOX_MAXLENGTH"]?>" ></textarea>
							<p class="count"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_ADD_COUNT")?> <span class="count-now">0</span> / <?=$arParams["TEXTBOX_MAXLENGTH"]?></p>
							<?endif; ?>
							</div>
							<div class="textarea-right-text">
								<p><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_TEXTAREA_RIGHT_TEXT1")?></p>
								<ul>
									<li><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_TEXTAREA_RIGHT_TEXT2")?></li>
									<li><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_TEXTAREA_RIGHT_TEXT3")?></li>
								</ul>
							</div>

							<p class="recommendated"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_RECOMMENDATED")?></p>
							<div class="radio">
							<input type="radio" name="RECOMMENDATED" value="Y" checked><span class="radio-label"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_RECOMMENDATED_YES")?></span>
							</div>
							<div class="radio">
							<input type="radio" name="RECOMMENDATED" value="N"><span class="radio-label"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_RECOMMENDATED_NO")?></span>
							</div>
							<?if(isset($arResult['ADD_FIELDS']) && is_array($arResult['ADD_FIELDS'])):?>
								<?foreach($arResult['ADD_FIELDS'] as $key=>$value):?>
									<p class="add-field-title"><?=$value['NAME']?>:</p>
									<?if($value['TYPE']=='textbox'):?>
						<?if(COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_EDITOR_".SITE_ID, "")=="Y"): ?>
						<?$APPLICATION->IncludeComponent( "bitrix:main.post.form", "", Array(
		'BUTTONS' => array(),
		'PARSER' => array(),
		'PIN_EDITOR_PANEL'=>'N',
		'TEXT' => array(
				'SHOW'=>'Y',
				'VALUE'=>"",
				'NAME'=>'AddFields_'.$key
		)
) );?>
						<?else: ?>
										<textarea name="AddFields_<?=$key?>" id="<?=$key?>"></textarea>
										<?endif;?>
										<?endif;?>
									<?endforeach;?>
								<?endif;?>
							<?if(COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_UPLOAD_IMAGE_".SITE_ID, "")=='Y'):?>
								<div class="add-photo">
									<input type="file" multiple="" id="photo" accept="image/jpeg,image/png">
									<span id='add-photo-button'><i class="fa fa-plus"></i><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_ADD_IMAGES")?></span>
								</div>
								<ul id="preview-photo" data-max-size="<?=COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_MAX_IMAGE_SIZE_".SITE_ID, "2")?>" data-thumb-width="<?=COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_THUMB_WIDTH_".SITE_ID, "150")?>" data-thumb-height="<?=COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_THUMB_HEIGHT_".SITE_ID, "150")?>" data-max-count-images="<?=COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_MAX_COUNT_IMAGES_".SITE_ID, "5")?>" data-error-max-size="<?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_ERROR_IMAGE_MAX_SIZE")?>" data-error-type="<?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_ERROR_IMAGE_TYPE")?>" data-error-max-count="<?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_ERROR_MAX_COUNT_IMAGES")?>">
								</ul>
								<?endif;?>
								<div style="clear:both"></div>

														<?if($arResult['VIDEO_ALLOW']=="Y"): ?>
							<p class="title-video"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_VIDEO")?></p>
							<input type="text" name="video" value="" maxlength="255" class="video" />
						<?endif; ?>
						<?if($arResult['PRESENTATION_ALLOW']=="Y"): ?>
							<p class="title-presentation"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_PRESENTATION")?></p>
							<input type="text" name="presentation" value="" maxlength="255" class="presentation" />
						<?endif; ?>



							<?if(isset($arResult['RECAPTCHA2_SITE_KEY']) && !empty($arResult['RECAPTCHA2_SITE_KEY'])): ?>
								<div data-captcha-review="Y" id="recaptcha-review-<?=$arResult["REVIEWS_CNT"]?>" class="captcha-block"></div>
							<?endif; ?>

							<input type="submit" name="submit" id="review_submit" value="<?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_SUBMIT_VALUE")?>" />
							<input type="button" value="<?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_ADD_CANCEL")?>"  id="reset-form">
				</form>
</div>


				<?else: ?>

					<?if($arResult['CAN_REPEAT']==0): ?>
						<p class="not-error"><?=GetMessage(CSotbitReviews::iModuleID."_REPEAT")?></p>
					<?else: ?>
						<p class="not-error"><?=GetMessage(CSotbitReviews::iModuleID."_REPEAT_TIME").' '.$arResult['CAN_REPEAT']?></p>
					<?endif; ?>

				<?endif; ?>
				<?else:?>
				<p class="not-buy-error"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_IF_BUY_NOT_TITLE")?></p>
				<?endif;?>


<?else:?>
	<p class="not-error not-ban-error"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_USER_BAN_TITLE")?></p>
	<?if(isset($arResult['REASON']) && !empty($arResult['REASON'])): ?>
		<p class="reason-title"><?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_USER_BAN_REASON_TITLE")?></p>
		<p class="reason-text"><?=$arResult['REASON']?></p>
	<?endif; ?>
<?endif;?>


			<?else:?>
			<div class="auth-error">
				<?=GetMessage(CSotbitReviews::iModuleID."_REVIEWS_NO_AUTH")?>
			</div>
			<div class="forms">
				<div class="form-auth">
					<p id="auth-title"><?=GetMessage(CSotbitReviews::iModuleID."_AUTH_TITLE").SITE_SERVER_NAME?></p>
					<p id="auth_review-check-error" style="display:none;"></p>
					<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "", array(
						"REGISTER_URL" => SITE_DIR."login/",
						"FORGOT_PASSWORD_URL" => SITE_DIR."login/?forgot_password=yes",
						"PROFILE_URL" => SITE_DIR."personal/",
						"SHOW_ERRORS" => "Y",
						),
						$component
					);?>
				</div>
				<div class="form-reg">
					<p id="register-title"><?=GetMessage(CSotbitReviews::iModuleID."_REGISTER_TITLE")?></p>
					<p id="registration_review-check-error" style="display:none;"></p>
					<?if( COption::GetOptionString(CSotbitReviews::iModuleID, "REVIEWS_ANONYM_REG_".SITE_ID, "")=='Y'): ?>
						<?$APPLICATION->IncludeComponent("sotbit:reviews.anonymregister","",Array(
							"USER_GROUP" => "",
						),
						$component
					);?>
					<?else: ?>
					<?$APPLICATION->IncludeComponent("bitrix:main.register","",Array(
						"USER_PROPERTY_NAME" => "",
						"SEF_MODE" => "Y",
						"SHOW_FIELDS" => array('NAME','LAST_NAME'),
						"REQUIRED_FIELDS" => array(),
						"AUTH" => "Y",
						"USE_BACKURL" => "N",
						"SUCCESS_PAGE" => "",
						"SET_TITLE" => "N",
						"USER_PROPERTY" => Array(),
						"SEF_FOLDER" => "/",
						"VARIABLE_ALIASES" => Array(),
						),
						$component
					);?>
					<?endif; ?>
				</div>
				<div class="clear"></div>
			</div>
			<?endif;?>
	</div>
</div>
<style>
	.add-reviews .spoiler-input{background:<?=$arParams['BUTTON_BACKGROUND']?>}
	.spoiler-reviews-body .review-add-title{color:<?=$arParams['PRIMARY_COLOR']?>}
	.spoiler-reviews-body .add-check-error{color:<?=$arParams['PRIMARY_COLOR']?>;}
	.spoiler-reviews-body .not-buy-error{color:<?=$arParams['PRIMARY_COLOR']?>}
</style>
<?$frame->end();?>