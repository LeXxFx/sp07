<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Sport07 - интернет магазин спортивных товаров в Москве. Спорттовары как у всех, только дешевле!");
$APPLICATION->SetPageProperty("description", "Интернет магазин товаров для спорта и активного отдыха. В нашем каталоге более 6000 позиций! Доставляем по Москве в день заказа и по России! Звоните +7 (495) 215-12-07");
$APPLICATION->SetTitle("Sport07");
?>
		<section id="sl">
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"sp07restailSlider",
					Array(
					"ACTION_VARIABLE" => "action",
					"ADD_PICT_PROP" => "-",
					"ADD_PROPERTIES_TO_BASKET" => "Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"ADD_TO_BASKET_ACTION" => "ADD",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"BACKGROUND_IMAGE" => "-",
					"BASKET_URL" => "/personal/basket.php",
					"BROWSER_TITLE" => "-",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"COMPATIBLE_MODE" => "Y",
					"CONVERT_CURRENCY" => "N",
					"CUSTOM_FILTER" => "",
					"DETAIL_URL" => "",
					"DISABLE_INIT_JS_IN_COMPONENT" => "N",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"DISPLAY_TOP_PAGER" => "N",
					"ELEMENT_SORT_FIELD" => "sort",
					"ELEMENT_SORT_FIELD2" => "id",
					"ELEMENT_SORT_ORDER" => "asc",
					"ELEMENT_SORT_ORDER2" => "desc",
					"ENLARGE_PRODUCT" => "STRICT",
					"FILTER_NAME" => "arrFilter",
					"HIDE_NOT_AVAILABLE" => "N",
					"HIDE_NOT_AVAILABLE_OFFERS" => "N",
					"IBLOCK_ID" => "4",
					"IBLOCK_TYPE" => "services",
					"INCLUDE_SUBSECTIONS" => "Y",
					"LABEL_PROP" => array(),
					"LAZY_LOAD" => "N",
					"LINE_ELEMENT_COUNT" => "3",
					"LOAD_ON_SCROLL" => "N",
					"MESSAGE_404" => "",
					"MESS_BTN_ADD_TO_BASKET" => "В корзину",
					"MESS_BTN_BUY" => "Купить",
					"MESS_BTN_DETAIL" => "Подробнее",
					"MESS_BTN_SUBSCRIBE" => "Подписаться",
					"MESS_NOT_AVAILABLE" => "Нет в наличии",
					"META_DESCRIPTION" => "-",
					"META_KEYWORDS" => "-",
					"OFFERS_LIMIT" => "5",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => "sp07restailSlider",
					"PAGER_TITLE" => "Товары",
					"PAGE_ELEMENT_COUNT" => "18",
					"PARTIAL_PRODUCT_PROPERTIES" => "N",
					"PRICE_CODE" => array(),
					"PRICE_VAT_INCLUDE" => "Y",
					"PRODUCT_BLOCKS_ORDER" => "",
					"PRODUCT_ID_VARIABLE" => "id",
					"PRODUCT_PROPERTIES" => array(),
					"PRODUCT_PROPS_VARIABLE" => "prop",
					"PRODUCT_QUANTITY_VARIABLE" => "quantity",
					"PRODUCT_ROW_VARIANTS" => "",
					"PRODUCT_SUBSCRIPTION" => "Y",
					"PROPERTY_CODE" => array("",""),
					"PROPERTY_CODE_MOBILE" => array(),
					"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
					"RCM_TYPE" => "personal",
					"SECTION_CODE" => "",
					"SECTION_ID" => $_REQUEST["SECTION_ID"],
					"SECTION_ID_VARIABLE" => "SECTION_ID",
					"SECTION_URL" => "",
					"SECTION_USER_FIELDS" => array("",""),
					"SEF_MODE" => "N",
					"SET_BROWSER_TITLE" => "Y",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "Y",
					"SET_META_KEYWORDS" => "Y",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "Y",
					"SHOW_404" => "N",
					"SHOW_ALL_WO_SECTION" => "N",
					"SHOW_CLOSE_POPUP" => "N",
					"SHOW_DISCOUNT_PERCENT" => "N",
					"SHOW_FROM_SECTION" => "N",
					"SHOW_MAX_QUANTITY" => "N",
					"SHOW_OLD_PRICE" => "N",
					"SHOW_PRICE_COUNT" => "1",
					"SHOW_SLIDER" => "Y",
					"TEMPLATE_THEME" => "blue",
					"USE_ENHANCED_ECOMMERCE" => "N",
					"USE_MAIN_ELEMENT_SECTION" => "N",
					"USE_PRICE_COUNT" => "N",
					"USE_PRODUCT_QUANTITY" => "N"
				)
			);?>
		</section>
		<section id="catalog" class="catalog">
            <div class="catalog__list clearfix">
                <?$APPLICATION->IncludeComponent(
					"bitrix:catalog.section.list",
					"sp07restail_main",
					Array(
						"ADD_SECTIONS_CHAIN" => "N",
						"CACHE_GROUPS" => "N",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "N",
						"COUNT_ELEMENTS" => "Y",
						"HIDE_SECTION_NAME" => "N",
						"IBLOCK_ID" => "9",
						"IBLOCK_TYPE" => "1c_catalog",
						"SECTION_CODE" => "",
						"SECTION_FIELDS" => array("",""),
						"SECTION_ID" => $_REQUEST["SECTION_ID"],
						"SECTION_URL" => "#SITE_DIR#/store/#SECTION_CODE#/",
						"SECTION_USER_FIELDS" => array("",""),
						"SHOW_PARENT_NAME" => "Y",
						"TOP_DEPTH" => "2",
						"VIEW_MODE" => "TILE"
					)
				);?>
            </div>
        </section>
    </div>
    <section id="advants">
        <div class="container">
            <div class="heading">Наши преимущества</div>
            <div class="advants__list clearfix">
                <!--<div class="item">
                    <a href="#">
                        <div class="icons">
                            <i class="icon icon-advant1"></i>
                        </div>
                        <div class="name">Постоянным покупателям - вечные скидки</div>
                        <div class="short">Став постоянным клиентом нашего магазина Вы будете иметь возможность покупать со скидкой до 50%.</div>
                    </a>
                </div>-->
                <div class="item">
                    <a href="#">
                        <div class="icons">
                            <i class="icon icon-advant2"></i>
                        </div>
                        <div class="name">Бесплатная доставка</div>
                        <div class="info">По всей России при покупке на сумму от 5000 руб.</div>
                        <div class="short"> А также, курьерская доставка, Почтой России и транспортными компаниями.</div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="icons">
                            <i class="icon icon-advant3"></i>
                        </div>
                        <div class="name">Самовывоз</div>
                        <div class="info">Бесплатные и платные пункты вывоза заказов по всей России.</div>
                        <div class="short">В некоторых пунктах есть примерка.</div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="icons">
                            <i class="icon icon-advant4"></i>
                        </div>
                        <div class="name">Оплата</div>
                        <div class="info">Любые удобные способы оплаты.</div>
                        <div class="short">
                            - Наличными,
                            - Банковской картой,
                            - Онлайн платежи.
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a href="#">
                        <div class="icons">
                            <i class="icon icon-advant5"></i>
                            <i class="icon icon-advant6"></i>
                        </div>
                        <div class="name">Гарантия качества</div>
                        <div class="info">и возврат товаров</div>
                        <div class="short">Без проблем и лишней бюрократии вернём Вам деньги за товар, который не подошел или не понравился.</div>
                    </a>
                </div>
            </div>
            <div class="advants__post">
                <div class="post">
                    <div class="top">Более 20 лет мы сопровождаем спорт и активный отдых</div>
                    <p>Наш интернет-магазин спорттоваров создан на базе нескольких крупных оптовых компаний, обеспечивающих спортивными, туристическими товарами и товарами для активного отдыха более 1000 спортивных магазинов по всей России уже на протяжении более 20 лет. Это Компании «Альфа Каприз», «Нова Тур», «Трамп», «Арктика» и другие. На страницах нашего интернет магазина вы можете увидеть более 6000 наименований товаров для спорта и активного отдыха для самого широкого круга пользователей, начиная от детей и заканчивая продвинутыми любителями спорта.
                        <a href="#">Наш ассортимент</a> товаров отработан в течении многих лет успешной работы на российском рынке в условиях жесткой конкуренции. Он производится на крупных фабриках Китая, Пакистана, России и других стран в больших объемах под строгим контролем.</p>
                    <p>Главной задачей вышеперечисленных компаний, успешно развивающихся на рынке более 20 лет, является обеспечение покупателей хорошим, качественным товаром, полностью отвечающим его функциональному назначению, по реальным обоснованным ценам.</p>
                </div>
                <div id="text" class="collapse clearfix">
                    <div class="post">
                        <p>Наш интернет-магазин спорттоваров создан на базе нескольких крупных оптовых компаний, обеспечивающих спортивными, туристическими товарами и товарами для активного отдыха более 1000 спортивных магазинов по всей России уже на протяжении более 20 лет. Это Компании «Альфа Каприз», «Нова Тур», «Трамп», «Арктика» и другие. На страницах нашего интернет магазина вы можете увидеть более 6000 наименований товаров для спорта и активного отдыха для самого широкого круга пользователей, начиная от детей и заканчивая продвинутыми любителями спорта.
                            <a href="#">Наш ассортимент</a> товаров отработан в течении многих лет успешной работы на российском рынке в условиях жесткой конкуренции. Он производится на крупных фабриках Китая, Пакистана, России и других стран в больших объемах под строгим контролем.</p>
                        <p>Главной задачей вышеперечисленных компаний, успешно развивающихся на рынке более 20 лет, является обеспечение покупателей хорошим, качественным товаром, полностью отвечающим его функциональному назначению, по реальным обоснованным ценам.</p>
                    </div>
                </div>
                <div class="show_more">
                    <button class="btn collapsed" data-toggle="collapse" data-target="#text" data-title-init="Подробнее" data-title-collapsed="Закрыть"><span>Подробнее</span> <i class="icon icon-arrow-down"></i></button>
                </div>
            </div>
        </div>
    </section>
    <section id="brands">
		<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.section",
		"sp07restailBrands",
			array(
			"ACTION_VARIABLE" => "action",
			"ADD_PICT_PROP" => "-",
			"ADD_PROPERTIES_TO_BASKET" => "Y",
			"ADD_SECTIONS_CHAIN" => "N",
			"ADD_TO_BASKET_ACTION" => "ADD",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"BACKGROUND_IMAGE" => "-",
			"BASKET_URL" => "/personal/basket.php",
			"BROWSER_TITLE" => "-",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"COMPATIBLE_MODE" => "Y",
			"CONVERT_CURRENCY" => "N",
			"CUSTOM_FILTER" => "",
			"DETAIL_URL" => "",
			"DISABLE_INIT_JS_IN_COMPONENT" => "N",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"ELEMENT_SORT_FIELD" => "sort",
			"ELEMENT_SORT_FIELD2" => "id",
			"ELEMENT_SORT_ORDER" => "asc",
			"ELEMENT_SORT_ORDER2" => "desc",
			"ENLARGE_PRODUCT" => "STRICT",
			"FILTER_NAME" => "arrFilter",
			"HIDE_NOT_AVAILABLE" => "N",
			"HIDE_NOT_AVAILABLE_OFFERS" => "N",
			"IBLOCK_ID" => "24",
			"IBLOCK_TYPE" => "references",
			"INCLUDE_SUBSECTIONS" => "Y",
			"LABEL_PROP" => "-",
			"LAZY_LOAD" => "N",
			"LINE_ELEMENT_COUNT" => "3",
			"LOAD_ON_SCROLL" => "N",
			"MESSAGE_404" => "",
			"MESS_BTN_ADD_TO_BASKET" => "В корзину",
			"MESS_BTN_BUY" => "Купить",
			"MESS_BTN_DETAIL" => "Подробнее",
			"MESS_BTN_SUBSCRIBE" => "Подписаться",
			"MESS_NOT_AVAILABLE" => "Нет в наличии",
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"OFFERS_LIMIT" => "5",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "sp07restailBrands",
			"PAGER_TITLE" => "Товары",
			"PAGE_ELEMENT_COUNT" => "18",
			"PARTIAL_PRODUCT_PROPERTIES" => "N",
			"PRICE_CODE" => array(
			),
			"PRICE_VAT_INCLUDE" => "Y",
			"PRODUCT_BLOCKS_ORDER" => "",
			"PRODUCT_ID_VARIABLE" => "id",
			"PRODUCT_PROPERTIES" => array(
			),
			"PRODUCT_PROPS_VARIABLE" => "prop",
			"PRODUCT_QUANTITY_VARIABLE" => "quantity",
			"PRODUCT_ROW_VARIANTS" => "",
			"PRODUCT_SUBSCRIPTION" => "Y",
			"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
			),
			"PROPERTY_CODE_MOBILE" => "",
			"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
			"RCM_TYPE" => "personal",
			"SECTION_CODE" => "",
			"SECTION_ID" => $_REQUEST["SECTION_ID"],
			"SECTION_ID_VARIABLE" => "SECTION_ID",
			"SECTION_URL" => "",
			"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
			),
			"SEF_MODE" => "N",
			"SET_BROWSER_TITLE" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"SET_META_DESCRIPTION" => "Y",
			"SET_META_KEYWORDS" => "Y",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "Y",
			"SHOW_404" => "N",
			"SHOW_ALL_WO_SECTION" => "N",
			"SHOW_CLOSE_POPUP" => "N",
			"SHOW_DISCOUNT_PERCENT" => "N",
			"SHOW_FROM_SECTION" => "N",
			"SHOW_MAX_QUANTITY" => "N",
			"SHOW_OLD_PRICE" => "N",
			"SHOW_PRICE_COUNT" => "1",
			"SHOW_SLIDER" => "Y",
			"TEMPLATE_THEME" => "blue",
			"USE_ENHANCED_ECOMMERCE" => "N",
			"USE_MAIN_ELEMENT_SECTION" => "N",
			"USE_PRICE_COUNT" => "N",
			"USE_PRODUCT_QUANTITY" => "N",
			"COMPONENT_TEMPLATE" => "sp07restailBrands"
			),
			false
		);?>
	</section>
    <section class="news-slider">
        <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"sp07restailNewsMain", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "arrFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "-",
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "5",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "sp07restailNewsMain",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "18",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE_MOBILE" => "",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "sp07restailNewsMain"
	),
	false
);?>
    </section>
    <!--<section class="testimonials nomargin">
        <div class="container">
            <div class="testimonials__list">
                <div class="item">
                    <div class="title">
                        <span><i class="fa fa-thumbs-o-up"></i></span>
                        Обалденный, самый лучший интернет-магазин
                    </div>
                    <div class="short">
                        Обалденный, самый лучший интернет-магазин, интересный сайт! Уже больше года покупаю одежду только там – не нужно тратить время на походы по магазинам
                    </div>
                    <div class="meta">
                        <a class="meta__comments">1 Комментарий</a>
                        <span class="meta__date">13.01.2017г.</span>
                    </div>
                </div>
                <div class="item">
                    <div class="title">
                        <span><i class="fa fa-thumbs-o-up"></i></span>
                        Обалденный, самый лучший интернет-магазин
                    </div>
                    <div class="short">
                        Обалденный, самый лучший интернет-магазин, интересный сайт! Уже больше года покупаю одежду только там – не нужно тратить время на походы по магазинам
                    </div>
                    <div class="meta">
                        <a class="meta__comments">1 Комментарий</a>
                        <span class="meta__date">13.01.2017г.</span>
                    </div>
                </div>
            </div>
            <div class="testimonials__bottom">
                <a class="testimonials__button-next"><span>Показать следующий отзыв</span>
                    <i class="fa fa-angle-right"></i></a>
                <a href="#" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modal_add_review">Оставить свой отзыв о магазине</a>
            </div>
        </div>
    </section>-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>