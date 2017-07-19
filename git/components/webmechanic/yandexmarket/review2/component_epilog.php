<?
if (count($arResult['ITEMS']))
{
    if ($arParams['LINK_JQUERY'] == 'Y')
    {    
        $APPLICATION->AddHeadString('<script type="text/javascript" src="'.$templateFolder.'/jquery/jquery-1.11.2.min.js"></script>',true);
    };
    
    if ($arParams['LINK_JCAROUSEL'] == 'Y')
    {    
        $APPLICATION->AddHeadScript($templateFolder.'/jquery/jquery.jcarousel.min.js');  
    };
};
?>