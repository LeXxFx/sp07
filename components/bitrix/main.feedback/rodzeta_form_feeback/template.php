<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="modal-dialog">
	<?if(!empty($arResult["ERROR_MESSAGE"]))
		{
			foreach($arResult["ERROR_MESSAGE"] as $v)
			ShowError($v);
		}
	if(strlen($arResult["OK_MESSAGE"]) > 0)
		{?>
		<div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div>
		<?}?>
	<div class="modal-content">
		<div class="panel-sport">
			<div class="panel-sport__heading">
				Хотите мы Вам перезвоним, подскажем есть ли у нас нужный Вам товар, а также расскажем о наших скидках и акциях?
			</div>
			<form action="<?=POST_FORM_ACTION_URI?>" class="form-callback" method="POST">
				<?=bitrix_sessid_post()?>
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						<div class="col-sm-7">
						<input type="text" class="form-control" placeholder="Укажите, какой товар Вы ищете?"/>
						</div>
						<div class="col-sm-5">
						<input type="text" class="form-control masked-phone" placeholder="Ваш номер телефона"/>
						</div>
					</div>
				</div>

			<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
			<div class="col-md-3">
				<button class="btn">Отправить</button>
			</div>
			</div>
			</form>
			<button class="panel-sport__close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" title="Закрыть">
				<span><i class="fa fa-angle-left"></i></span>
			</button>
		</div>
	</div>
</div>