<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

// example for adding field to bitrix:main.feedback

$arResult["FIELDS"] = \Rodzeta\Feedbackfields\ForTemplate(
	$arParams["CUSTOM_SORT_DATA"],
	$arResult
);
