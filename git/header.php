<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><!DOCTYPE html>
<?
CJSCore::Init(array("jquery"));
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
                            <a href="tel:84952151207" data-toggle="tooltip" title="Позвонить в магазин"><span>8 (495)</span> 215-12-07</a>
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
                    
                        <!-- <ul class="clearfix">
                            <li><a href="shop-list.html">Фитнес</a></li>
                            <li class="has-child">
                                <a href="shop-list.html">Художественная гимнастика и танцы</a>
                                <div class="submenu">
                                    <div class="submenu__inner">
                                        <ul>
                                            <li class="submenu__title"><a href="#">Художественная гимнастика и танцы</a></li>
                                            <li><a href="#">Гимнастические купальники</a></li>
                                            <li><a href="#">Лосины, юбки, топы и шорты</a></li>
                                            <li><a href="#">Чешки, балетки</a></li>
                                            <li><a href="#">Обручи</a></li>
                                            <li><a href="#">Булавы, ленты, скакалки</a></li>
                                            <li><a href="#">Мячи для художественной гимнастики</a></li>
                                            <li><a href="#">Колльца, лестницы, трапеции</a></li>
                                        </ul>
                                        <ul class="submenu__propose">
                                            <li class="submenu__title">Возможно вы искали:</li>
                                            <li><a href="#">Коврики гимнастические</a></li>
                                            <li><a href="#">Утяжелители</a></li>
                                            <li><a href="#">Гантели</a></li>
                                            <li><a href="#">Обручи</a></li>
                                            <li><a href="#">Скакалки</a></li>
                                            <li><a href="#">Диск «Здоровье»</a></li>
                                            <li><a href="#">Ролики гимнастические</a></li>
                                            <li><a href="#">Упоры для отжиманий</a></li>
                                            <li><a href="#">Мячи для фитнеса</a></li>
                                        </ul>
                                        <button class="submenu__close" data-toggle="tooltip" title="Закрыть">
                                            <span><i class="fa fa-angle-left"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li class="has-child">
                                <a href="shop-list.html">Тренажеры и тяжелая атлетика</a>
                                <div class="submenu">
                                    <div class="submenu__inner">
                                        <ul>
                                            <li class="submenu__title"><a href="#">Домашние тренажеры</a></li>
                                            <li><a href="#">Беговые дорожки</a></li>
                                            <li><a href="#">Велотренажеры</a></li>
                                            <li><a href="#">Степперы, эллепсоиды</a></li>
                                        </ul>
                                        <ul>
                                            <li class="submenu__title"><a href="#">Тяжелая атлетика</a></li>
                                            <li><a href="#">Гантели разборные</a></li>
                                            <li><a href="#">Гири</a></li>
                                            <li><a href="#">Штанги в наборе</a></li>
                                            <li><a href="#">Диски для гантелей и штанг</a></li>
                                            <li><a href="#">Грифы для гантелей и штанг</a></li>
                                            <li><a href="#">Стойки под штангу со скамьей</a></li>
                                            <li><a href="#">Скамьи</a></li>
                                            <li><a href="#">Стойки для гантелей и штанг</a></li>
                                            <li><a href="#">Перчатки для тяжелой атлетики</a></li>
                                            <li><a href="#">Пояса для поднятия тяжестей</a></li>
                                        </ul>
                                        <ul>
                                            <li class="submenu__title"><a href="#">Турники и брусья</a></li>
                                            <li><a href="#">Турники в проем</a></li>
                                            <li><a href="#">Турники настенные</a></li>
                                            <li><a href="#">Турники настенные угловые</a></li>
                                            <li><a href="#">Турники потолочные</a></li>
                                        </ul>
                                        <ul>
                                            <li class="submenu__title"><a href="#">Брусья</a></li>
                                            <li><a href="#">Прямые</a></li>
                                            <li><a href="#">С широким хватом</a></li>
                                            <li><a href="#">С тремя хватами</a></li>
                                            <li><a href="#">Турник Брусья</a></li>
                                            <li><a href="#">Пресс (3 в 1)</a></li>
                                            <li><a href="#">Оборудование для шведских стенок</a></li>
                                            <li><a href="#">Аксессуары к турникам</a></li>
                                        </ul>
                                        <ul class="submenu__propose">
                                            <li class="submenu__title">Возможно вы искали:</li>
                                            <li><a href="#">Плечевые эспандеры</a></li>
                                            <li><a href="#">Кистевые эспандеры</a></li>
                                            <li><a href="#">Эспандеры лыжника/пловца</a></li>
                                            <li><a href="#">Эспандер боксёра</a></li>
                                            <li><a href="#">Эспандер восьмёрка</a></li>
                                            <li><a href="#">Жгуты, ленты, петли</a></li>
                                            <li><a href="#">Утяжелители</a></li>
                                            <li><a href="#">Гантели</a></li>
                                        </ul>
                                        <button class="submenu__close" data-toggle="tooltip" title="Закрыть">
                                            <span><i class="fa fa-angle-left"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li><a href="shop-list.html">Туризм и активный отдых</a></li>
                            <li><a href="shop-grid.html">Зимние виды спорта и активный отдых</a></li>
                            <li><a href="shop-list.html">Единоборства и бокс</a></li>
                            <li class="has-child">
                                <a href="shop-grid.html">Командные виды спорта</a>
                                <div class="submenu">
                                    <div class="submenu__inner">
                                        <ul>
                                            <li class="submenu__title"><a href="#">Баскетбол</a></li>
                                            <li><a href="#">Мячи</a></li>
                                            <li><a href="#">Кольца</a></li>
                                            <li><a href="#">Форма</a></li>
                                            <li class="submenu__title"><a href="#">Волейбол</a></li>
                                            <li><a href="#">Мячи</a></li>
                                            <li><a href="#">Налокотники и наколенники</a></li>
                                            <li><a href="#">Форма</a></li>
                                        </ul>
                                        <ul>
                                            <li class="submenu__title"><a href="#">Футбол</a></li>
                                            <li><a href="#">Бутсы</a></li>
                                            <li><a href="#">Гетры</a></li>
                                            <li><a href="#">Манишки</a></li>
                                            <li><a href="#">Мячи</a></li>
                                            <li><a href="#">Перчатки вратаря</a></li>
                                            <li><a href="#">Форма</a></li>
                                            <li><a href="#">Щитки</a></li>
                                        </ul>
                                        <ul>
                                            <li class="submenu__title"><a href="#">Хоккей</a></li>
                                            <li><a href="#">Коньки</a></li>
                                            <li><a href="#">Защита</a></li>
                                            <li><a href="#">Клюшки, шайбы</a></li>
                                            <li><a href="#">Хоккейный трикотаж</a></li>
                                        </ul>
                                        <ul>
                                            <li class="submenu__title"><a href="#">Настольные игры</a></li>
                                            <li><a href="#">Аэрохоккей</a></li>
                                            <li><a href="#">Бильярд</a></li>
                                            <li><a href="#">Дартс</a></li>
                                            <li><a href="#">Настольный футбол</a></li>
                                            <li><a href="#">Мини теннис</a></li>
                                            <li><a href="#">Шахматы</a></li>
                                            <li><a href="#">Нарды</a></li>
                                            <li><a href="#">Наборы и карточные игры</a></li>
                                            <li class="link-all"><a href="#">Посмотреть всё <i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                        <ul class="submenu__propose">
                                            <li class="submenu__title">Возможно вы искали:</li>
                                            <li><a href="#">Плавание</a></li>
                                            <li><a href="#">Фигурное катание</a></li>
                                            <li><a href="#">Бадбинтон</a></li>
                                            <li><a href="#">Художественная гимнастика и танцы</a></li>
                                            <li><a href="#">Роликовые коньки</a></li>
                                            <li><a href="#">Роликовые доски</a></li>
                                        </ul>
                                        <button class="submenu__close" data-toggle="tooltip" title="Закрыть">
                                            <span><i class="fa fa-angle-left"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </li>
                            <li><a href="shop-list.html">Летние виды спорта</a></li>
                            <li><a href="shop-grid.html">Водные виды спорта</a></li>
                            <li><a href="shop-list.html">Игры</a></li>
                        </ul> -->
                    </div>
                </div>
                <div class="col-search">
                    <div class="search-input">
                        <!-- <input type="text" placeholder="Поиск среди 6000 спортивных товаров" class="form-control"/> -->
                        <form action="/store/index.php">
                            <input type="text" name="q" placeholder="Поиск среди 6000 спортивных товаров" class="form-control"/>
                            <button class="btn btn-green">
                            Найти
                        </button>
                        </form>
                        
                    </div>
                    <!--<div class="search-menu clearfix">
                        <div class="search-menu__body">
                            <div class="head">Найдено в разделах каталога:</div>
                            <ul>
                                <li><a href="#">Кимоно для карате</a></li>
                                <li><a href="#">Кимоно для дзюдо</a></li>
                            </ul>
                            <div class="head">Найдены товары (всего 35):</div>
                            <div class="products-list clearfix">
                                <div class="item">
                                    <a class="img" href="product.html"><img src="<?=SITE_TEMPLATE_PATH?>/demo/product_img1.png" alt=""/></a>
                                    <div class="name">
                                        Кимоно для карате Golden Scorpion "PKM-885"
                                    </div>
                                    <div class="price">
                                        <span class="new">1502</span>
                                        <span class="currency">руб.</span>
                                    </div>
                                </div>
                                <div class="item">
                                    <a class="img" href="product.html"><img src="<?=SITE_TEMPLATE_PATH?>/demo/product_img2.png" alt=""/></a>
                                    <div class="name">
                                        Кимоно для карате Alpha Caprice GS-KK01
                                    </div>
                                    <div class="price">
                                        <span class="old">1805</span>
                                        <span class="new">1480</span>
                                        <span class="currency">руб.</span>
                                    </div>
                                </div>
                                <div class="item">
                                    <a class="img" href="product.html"><img src="<?=SITE_TEMPLATE_PATH?>/demo/product_img3.png" alt=""/></a>
                                    <div class="name">
                                        Кимоно для карате Golden Scorpion "PKM-1200" те Golden Scorpion "PKM-1200"
                                    </div>
                                    <div class="price">
                                        <span class="new">1479</span>
                                        <span class="currency">руб.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="search-menu__button">
                            <a href="#" class="btn">Посмотреть результаты поиска (35)</a>
                        </div>
                    </div>-->
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
            <?/*<div id="breadcumbs">
                <a href="#">Главная</a><span class="sep">/</span> <span class="current">404 (страница не найдена)</span>
            </div>*/?>
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "sp07restail", Array(
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "1",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	),
	false
);?>