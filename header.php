<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><!DOCTYPE html>
<?
CJSCore::Init(array("jquery2"));
?>
<html>
<head>
    <meta charset="utf-8">
	<meta name="yandex-verification" content="e14842e9b9d0e3fb" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?$APPLICATION->ShowTitle()?></title>
<!--<script src="<?=SITE_TEMPLATE_PATH?>/js/magiczoomplus.js"></script>-->
    <?$APPLICATION->ShowHead();?>

    <link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/assets/images/favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i&amp;subset=cyrillic" rel="stylesheet">

    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/assets/plugins/font-awesome/css/font-awesome.min.css">
	
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link href="<?=SITE_TEMPLATE_PATH?>/assets/plugins/magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->

    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/assets/css/style.css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/styles.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/assets/plugins/slick/slick.css" />
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/assets/plugins/soon-countdown/css/soon.min.css"/>

	</head>
<body>
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
    <div class="container">
        <header id="header" class="header">
            <div class="header__top">
                <div class="col-logo">
                    <a href="/" class="logo">
                        <img src="<?=SITE_TEMPLATE_PATH?>/assets/images/logo.png" alt=""/>
                        <span>Интернет магазин спортивных товаров</span>
                    </a>
                </div>
                <div class="col-navi">
                    <nav>
                        <ul class="navi">
                            <li><a href="/delivery_pay/">Доставка и оплата</a></li>
                            <li><a href="/return-exchange/">Гарантия и возврат</a></li>
                            <li><a href="/contacts/">Контакты</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-contacts">
                    <div class="tel">
                        <div class="tel__item">
                            <a class="mgo-number-10262" href="tel:84952151207" data-toggle="tooltip" title="Позвонить в магазин"><span>8 (495)</span> 215-12-07</a>
							<script>
							(function(w, d, u, i, o, s, p) {
								if (d.getElementById(i)) { return; } w['MangoObject'] = o;
								w[o] = w[o] || function() { (w[o].q = w[o].q || []).push(arguments) }; w[o].u = u; w[o].t = 1 * new Date();
								s = d.createElement('script'); s.async = 1; s.id = i; s.src = u;
								p = d.getElementsByTagName('script')[0]; p.parentNode.insertBefore(s, p);
							}(window, document, '//widgets.mango-office.ru/widgets/mango.js', 'mango-js', 'mgo'));
							mgo({
								calltracking: {
									id: 10262,
									elements: [],
									onReady: function(event) {
										var number = event.number;
										$('.mgo-number-10262')
											.html('<span>8 (' + number.substr(1, 3) + ')</span> ' + number.substr(4, 3) + '-' + number.substr(7, 2) + '-' + number.substr(9, 2));
									}
								}
							});  
						</script>
                            <span>для абонентов из Москвы</span>
                        </div>
                        <div class="tel__item">
                            <a href="tel:88005552082" data-toggle="tooltip" title="Позвонить в магазин"><span>8 (800)</span> 555-20-82</a>
                            <span>для абонентов из регионов</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__bot">
                <div class="col-catalog">
                    <button class="btn btn-green">
                        <b><i class="fa fa-angle-down"></i></b>
                        Каталог <span class="hidden-xs">товаров</span>
                    </button>
                    <div class="catalog-menu">
                    <?$APPLICATION->IncludeComponent(
                                    "bitrix:catalog.section.list",
                                    "ul",
                                    array(
                                        "ADD_SECTIONS_CHAIN" => "N",
                                        "CACHE_GROUPS" => "Y",
                                        "CACHE_TIME" => "36000000",
                                        "CACHE_TYPE" => "A",
                                        "COMPONENT_TEMPLATE" => "ul",
                                        "COUNT_ELEMENTS" => "N",
                                        "IBLOCK_ID" => "9",
                                        "IBLOCK_TYPE" => "1c_catalog",
                                        "SECTION_CODE" => "",
                                        "SECTION_FIELDS" => array(
                                            0 => "",
                                            1 => "",
                                        ),
                                        "SECTION_ID" => '0',
                                        "SECTION_URL" => "",
                                        "SECTION_USER_FIELDS" => array(
                                            0 => "",
                                            1 => "",
                                        ),
                                        "SHOW_PARENT_NAME" => "Y",
                                        "TOP_DEPTH" => "3",
                                        "VIEW_MODE" => "LINE"
                                    ),
                                    false
                    );?>
                    </div>
                </div>
                <div class="col-search">
                    <div class="search-input">
                        <!-- <input type="text" placeholder="Поиск среди 6000 спортивных товаров" class="form-control"/> -->
                        <form action="/search/">
                            <input type="text" name="q" placeholder="Поиск среди 6000 спортивных товаров" class="form-control"/>
                            <button class="btn btn-green">
                            Найти
                        </button>
                        </form>
                        
                    </div>
                   <div class="search-menu clearfix">
                    </div>
                </div>
                <div class="col-panel">
                    <div class="panel">
                        <div class="panel__account">
                            <div class="dropdown">
                                <a href="/personal/">
                                    <i class="icon icon-user"></i>
                                    <span>Личный кабинет</span>
                                </a>
                            </div>
                        </div>
                        <div class="panel__cart">
                            <div class="dropdown">
                                <a href="/personal/cart/">
                                    <i class="icon icon-cart-orange shopping-cart"></i>
                                    <span>Корзина</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="wrapper" role="main">
			<?if($APPLICATION->GetCurPage() != "/"):?>
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "sp07restail", Array(
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	),
	false
);?><?endif;?>