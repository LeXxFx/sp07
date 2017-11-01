<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

$frame = $this->createFrame()->begin();
global $APPLICATION;
?>
<div class="list">
	<div class="list-rows">
	<?if(isset($arResult['QUESTIONS']) && is_array($arResult['QUESTIONS'])):?>
		<?foreach($arResult['QUESTIONS'] as $Question):?>
			<div class="item" data-site-dir="<?=SITE_DIR?>" data-id="<?=$Question['ID']?>" id="question-<?=$Question['ID']?>">
			<div class="table">
			<div class="user-info">
				<div class="avatar">
					<div class="avatar-inner">
						<?=(isset($Question['PERSONAL_PHOTO']) && !empty($Question['PERSONAL_PHOTO']))?$Question['PERSONAL_PHOTO']:'<img class="img-responsive" alt="'.$Question['NAME'].' '.$Question['LAST_NAME'].'" title="'.$Question['NAME'].' '.$Question['LAST_NAME'].'" src="'.COption::GetOptionString(CSotbitReviews::iModuleID, "QUESTIONS_NO_USER_IMAGE_".SITE_ID, "/bitrix/components/sotbit/reviews.questions.list/templates/.default/images/no-photo.jpg").'">';?>
					</div>
				</div>
				<div class="username">
						<?=(isset($Question['NAME']) && !empty($Question['NAME']))?$Question['NAME']:'';?><?=(isset($Question['LAST_NAME']) && !empty($Question['LAST_NAME']))?' '.$Question['LAST_NAME']:''; ?>
					</div>
															<?if($Question['ID_USER']>0): ?>
							<?if(isset($arResult['LINK_TO_USER'][$Question['ID_USER']]) && !empty($arResult['LINK_TO_USER'][$Question['ID_USER']])): ?>
								<div class="cnt_questions"><span><?=GetMessage(CSotbitReviews::iModuleID."_QUESTIONS_CNT_USER") ?></span><a href="<?=$arResult['LINK_TO_USER'][$Question['ID_USER']] ?>"> <?=$arResult['USER_QUESTIONS_CNT'][$Question['ID_USER']] ?></a></div>
							<?else: ?>
								<div class="cnt_questions"><span><?=GetMessage(CSotbitReviews::iModuleID."_QUESTIONS_CNT_USER") ?></span><?=$arResult['USER_QUESTIONS_CNT'][$Question['ID_USER']] ?></div>
							<?endif; ?>
						<?endif; ?>
					<?=(isset($Question['AGE']) && !empty($Question['AGE']))?'<div class="age"><span>'.GetMessage(CSotbitReviews::iModuleID."_QUESTIONS_AGE").'</span>'.$Question['AGE'].'</div>':''?>
					<?=(isset($Question['COUNTRY']) && !empty($Question['COUNTRY']))?'<div class="country"><span>'.GetMessage(CSotbitReviews::iModuleID."_QUESTIONS_COUNTRY").'</span>'.$Question['COUNTRY'].'</div>':''?>
				</div>
			<div class="questions">
					<?if($arResult['MODERATOR']=='Y')
					{?>
					<div class="menu">
					  	<div class="ban-message-success message message-success"><?=GetMessage(CSotbitReviews::iModuleID."_BAN_USER_SUCCESS") ?></div>
  						<div class="ban-message-error message message-error"><?=GetMessage(CSotbitReviews::iModuleID."_BAN_USER_ERROR") ?></div>
  						<div style="display:none" id="ban-confirm-text"><?=GetMessage(CSotbitReviews::iModuleID."_BAN_USER_CONFIRM") ?></div>
  						<i class="fa fa-cog actions"></i>
  						<ul>
    						<li data-action="ban"><?=GetMessage(CSotbitReviews::iModuleID."_BAN_USER") ?></li>
  						</ul>

					</div>
					<?} ?>



				<div class="time"><?=$Question['DATE_CREATION'];?>

									<?$APPLICATION->IncludeComponent(
                        "sotbit:reviews.share",
                        "",
                        array(
                            "TITLE" => '',
                            "URL" => $arResult['ELEMENT']['DETAIL_PAGE_URL'],
                            "PICTURE" => $Question['SHARE_IMAGE'],
                            "TEXT" => $Question['QUESTION'],
                        	"SERVICES"=>$arResult['SHARE_SERVICES'],
                        	"FACEBOOK_APP_ID"=>$arResult['FACEBOOK_APP_ID'],
                        	"SHARE_LINK"=>$arResult['ELEMENT']['DETAIL_PAGE_URL'].'#question-'.$Question['ID'],
                        	"LINK_TITLE"=>GetMessage(CSotbitReviews::iModuleID."_LINK_TITLE_QUESTIONS")
                        ),
                        false
                    );?>

				</div>
				<span class="text"><?=$Question['QUESTION']?></span>

				</div>
				</div>
				<?if(COption::GetOptionString(CSotbitReviews::iModuleID, "QUESTIONS_EDITOR_".SITE_ID, "")=="Y" && COption::GetOptionString(CSotbitReviews::iModuleID, "QUESTIONS_QUOTS_".SITE_ID, "")=="Y" && ($USER->IsAuthorized() || COption::GetOptionString(CSotbitReviews::iModuleID, "QUESTIONS_REGISTER_USERS_".SITE_ID, "")!='Y')): ?>
				<div class="wrap-quote"><div class="quote"><?=GetMessage( CSotbitReviews::iModuleID . '_QUESTIONS_QUOTE' )?></div></div>
				<?endif; ?>
					<?if(isset($Question['ANSWER']) && !empty($Question['ANSWER'])):?>
						<div class="shopanswer">
					<div class="avatar">
						<div class="avatar-inner">
							<img class="img-responsive" alt="<?=$arResult['SITE_NAME']?>"
								title="<?=$arResult['SITE_NAME']?>"
								src="<?=COption::GetOptionString(CSotbitReviews::iModuleID, "QUESTIONS_ANSWER_IMAGE_".SITE_ID, "")?>">
						</div>
					</div>
					<div class="reply-block">
						<p class="username"><?=$arResult['SITE_NAME']?></p>
						<span class="text"><?=$Question['ANSWER']?></span>
					</div>
					<div style="clear: both;"></div>
				</div>
						<?endif;?>
		</div>
			<?endforeach;?>
			<?else:?>
			<p><?=GetMessage(CSotbitReviews::iModuleID."_QUESTIONS_NO_RESULTS")?></p>
			<?endif;?>
	</div>
</div>
<?$frame->end();?>