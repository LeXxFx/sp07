<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->IncludeComponent(
	"sotbit:reviews.questions.list",
	"sp07rest",
	Array(
		"AJAX" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DATE_FORMAT" => "d.m.Y",
		"ID_ELEMENT" => $arParams["ELEMENT_ID"]
	)
);?><br>
 <?$APPLICATION->IncludeComponent(
	"sotbit:reviews.questions.add",
	"sp07rest",
	Array(
		"AJAX" => "N",
		"BUTTON_BACKGROUND" => "#dbbfb9",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"ID_ELEMENT" => $arParams["ELEMENT_ID"],
		"NOTICE_EMAIL" => "",
		"PRIMARY_COLOR" => "#a76e6e",
		"TEXTBOX_MAXLENGTH" => "200"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>