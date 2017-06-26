<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

// example for adding field to bitrix:main.feedback

// move to
//	? /bitrix/components/bitrix/main.feedback/templates/.default
//	/bitrix/templates/.default/components/bitrix/main.feedback/.default

$arTemplateParameters = array(
	"CUSTOM_SORT_DATA" => \Rodzeta\Feedbackfields\SortableParameter(
		$arCurrentValues["CUSTOM_SORT_DATA"],
		"CUSTOM_SORT_DATA"
	)
);