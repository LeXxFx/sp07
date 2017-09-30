<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$this->setFrameMode(true);
$this->addExternalCss("/bitrix/css/main/bootstrap.css");

if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isVerticalFilter = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");
$isSidebar = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isFilter = ($arParams['USE_FILTER'] == 'Y');

if ($isFilter)
{
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
	elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
	{
		$arCurSection = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		$arCurSection = array();
		if (Loader::includeModule("iblock"))
		{
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

			if(defined("BX_COMP_MANAGED_CACHE"))
			{
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				if ($arCurSection = $dbRes->Fetch())
					$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);

				$CACHE_MANAGER->EndTagCache();
			}
			else
			{
				if(!$arCurSection = $dbRes->Fetch())
					$arCurSection = array();
			}
		}
		$obCache->EndDataCache($arCurSection);
	}
	if (!isset($arCurSection))
		$arCurSection = array();
}

?>
<?$APPLICATION->IncludeComponent(
	"h2o:buyoneclick", 
	"LXtemplate", 
	array(
		"ALLOW_ORDER_FOR_EXISTING_EMAIL" => "N",
		"CACHE_TIME" => "86400",
		"CACHE_TYPE" => "A",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DEFAULT_DELIVERY" => "1",
		"DEFAULT_PAY_SYSTEM" => "1",
		"GENERATE_EMAIL_FROM_PHONE" => "N",
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "1c_catalog",
		"MODE_EXTENDED" => "Y",
		"NEW_USER_GROUP_ID" => array(
			0 => "5",
		),
		"NOT_AUTHORIZE_USER" => "Y",
		"SEND_MAIL" => "N",
		"SEND_MAIL_REQ" => "N",
		"SHOW_OFFERS_FIRST_STEP" => "Y",
		"SHOW_PROPERTIES" => array(
		),
		"SHOW_PROPERTIES_REQUIRED" => array(
		),
		"SHOW_USER_DESCRIPTION" => "Y",
		"USER_DATA_FIELDS" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "PERSONAL_PHONE",
		),
		"USER_DATA_FIELDS_REQUIRED" => array(
			0 => "NAME",
			1 => "EMAIL",
			2 => "PERSONAL_PHONE",
		),
		"USE_CAPTCHA" => "N",
		"USE_OLD_CLASS" => "N",
		"COMPONENT_TEMPLATE" => "LXtemplate",
		"SHOW_QUANTITY" => "Y",
		"PERSON_TYPE_ID" => "1",
		"PATH_TO_PAYMENT" => "/personal/order/payment/",
		"SHOW_PAY_SYSTEM" => "N",
		"SHOW_DELIVERY" => "N",
		"PRICE_CODE" => array(
			0 => "Для сайта (САЙТ цена)",
		),
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "_KHARAKTERISTIKI_NOMENKLATURY",
			1 => "AMORTIZATR",
			2 => "AMORTIZATR_1",
			3 => "BAGAZHNIK",
			4 => "MATERIAL",
			5 => "BREND",
			6 => "VAYVAYVA",
			7 => "VES",
			8 => "VILKA_PEREDNYAYA",
			9 => "DIAMETR_KOLES",
			10 => "RAZMER_GOLOVNOGO_UBORA",
			11 => "VTULKA_ZADNYAYA",
			12 => "RAZMER_OBUVI",
			13 => "CML2_ARTICLE",
			14 => "CML2_BASE_UNIT",
			15 => "VTULKA_PEREDNYAYA",
			16 => "MORE_PHOTO",
			17 => "CML2_MANUFACTURER",
			18 => "RAZMER_PERCHATOK",
			19 => "CML2_TRAITS",
			20 => "CML2_TAXES",
			21 => "FILES",
			22 => "CML2_ATTRIBUTES",
			23 => "CML2_BAR_CODE",
			24 => "VTORAYA",
			25 => "DLINA",
			26 => "SEZON",
			27 => "VYSOTA",
			28 => "GEOMETRIYA",
			29 => "DETSKIY_RAZMER",
			30 => "ZADNIY_PEREKLYUCHATEL_SKOROSTEY",
			31 => "SOOTVETSTVUET_RAZMERU",
			32 => "DIAMETR_VKLADYSHA",
			33 => "ZVYEZDOCHKA",
			34 => "DIAMETR",
			35 => "DLINA_PALOK",
			36 => "KARETKA",
			37 => "DLYA_TARELKI",
			38 => "KASSETA_TRESHCHOTKA",
			39 => "LEVAYA_PRAVAYA",
			40 => "KOLICHESTVO_KAMER",
			41 => "KOLICHESTVO_SKOROSTEY",
			42 => "MOSHCHNOST",
			43 => "DLINA_1",
			44 => "ISPOLZOVANIE",
			45 => "KOLLICHESTVO_PROGRAMM",
			46 => "KOLICHESTVO",
			47 => "KRYLYA",
			48 => "DLINA_2",
			49 => "KARKAS",
			50 => "OBODA",
			51 => "MAKSIMALNYY_UROVEN_VODY",
			52 => "PEDALI",
			53 => "RAZMER_GETR",
			54 => "KUPOL",
			55 => "PEREDNIY_PEREKLYUCHATEL_SKOROSTEY",
			56 => "RAZMER_GIMN_MYACHEY",
			57 => "PLOSHCHAD_GRAVIROVANNOY_TABLICHKI",
			58 => "POKRYSHKI",
			59 => "POL",
			60 => "RAZMER_OLD",
			61 => "RAZMER",
			62 => "RAZMER_3",
			63 => "FORMA",
			64 => "NAGRUZKA",
			65 => "PROIZVODITELNOST_NASOSA",
			66 => "RAZMER_RAMY",
			67 => "RULEVAYA_KOLONKA",
			68 => "RAZMER_PLAKETKI",
			69 => "SEDLO",
			70 => "SISTEMA",
			71 => "RAZMER_FORMY",
			72 => "TORMOZA",
			73 => "RAZMER_FUTBOLKI",
			74 => "ROST",
			75 => "UPRAVLENIE_SKOROSTYU_I_NAKLONOM_NA_PORUCHNYAKH",
			76 => "PROVERKA_PROVERKI",
			77 => "RAZMER_FUTLYARA",
			78 => "UPAKOVKA",
			79 => "TSVET",
			80 => "TSVET_1",
			81 => "TSVET_2",
			82 => "SHIFTERY",
			83 => "TIP",
			84 => "RISUNOK",
			85 => "TSVET_GRAVIROVKI",
			86 => "TIP_1",
			87 => "",
		),
		"SUCCESS_HEAD_MESS" => "Поздравляем!",
		"SUCCESS_ADD_MESS" => "Вы успешно оформили заказ №#ORDER_ID#!",
		"BUY_CURRENT_BASKET" => "N",
		"ADD_NOT_AUTH_TO_ONE_USER" => "N"
	),
	false
);?>

<?

if ($isVerticalFilter)
	include($_SERVER["DOCUMENT_ROOT"]."/".$this->GetFolder()."/section_vertical.php");
else
	include($_SERVER["DOCUMENT_ROOT"]."/".$this->GetFolder()."/section_horizontal.php");
?>
