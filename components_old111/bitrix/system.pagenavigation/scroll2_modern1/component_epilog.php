<?
if(CModule::IncludeModule('orion.infinitescroll'))
	COrionInfiniteScroll::InitScroll($arResult, array(
		'PAGEN_NAME'=>'PAGEN_'.$arResult['NavNum'], 
		'SHOWALL_NAME'=>'SHOWALL_'.$arResult['NavNum'],
	));
?>