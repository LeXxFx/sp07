<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<?if($arResult['ERROR_MESSAGE']) ShowMessage($arResult['ERROR_MESSAGE']);?>
<?$arServices = $arResult["AUTH_SERVICES_ICONS"];?>
<?if(!empty($arResult["AUTH_SERVICES"])):?>
	<div class="soc-serv-main">
		<?$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
			array(
				"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
				"CURRENT_SERVICE"=>$arResult["CURRENT_SERVICE"],
				"AUTH_URL"=>$arResult['CURRENTURL'],
				"POST"=>$arResult["POST"],
				"SHOW_TITLES"=>'N',
				"FOR_SPLIT"=>'Y',
				"AUTH_LINE"=>'N',
			),
			$component,
			array("HIDE_ICONS"=>"Y")
		);
		?>
	</div>
<?endif;?>