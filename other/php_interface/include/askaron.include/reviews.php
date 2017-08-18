<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->IncludeComponent(
	"sotbit:reviews.reviews.list",
	"sp07rest",
	Array(
		"AJAX" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DATE_FORMAT" => "d.m.Y",
		"ID_ELEMENT" => $arParams["ELEMENT_ID"],
		"MAX_RATING" => "5",
		"PRIMARY_COLOR" => "#a76e6e"
	)
);?><br>
<?$APPLICATION->IncludeComponent(
	"sotbit:reviews.reviews.add",
	"sp07rest",
	Array(
		"ADD_REVIEW_PLACE" => "1",
		"AJAX" => "N",
		"BUTTON_BACKGROUND" => "#dbbfb9",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DEFAULT_RATING_ACTIVE" => "3",
		"ID_ELEMENT" => $arParams["ELEMENT_ID"],
		"MAX_RATING" => "5",
		"NOTICE_EMAIL" => "",
		"PRIMARY_COLOR" => "#a76e6e",
		"TEXTBOX_MAXLENGTH" => "400"
	)
);?>