<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><script type="text/javascript" src="//vk.com/js/api/openapi.js?125"></script>

<!-- VK Widget -->
<div id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {redesign: 1, mode: 3, width: "220", height: "400", color1: 'FFFFFF', color2: '000000', color3: '5E81A8'}, 67475642);
</script><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>