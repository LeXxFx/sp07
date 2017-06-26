<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>		
        </div>
    </div>
	<?//echo $APPLICATION->GetCurDir();?>


    <?php
        if (CModule::IncludeModule("sale"))
        {
           $arBasketItems = array();
           $dbBasketItems = CSaleBasket::GetList(
                          array("NAME" => "ASC","ID" => "ASC"),
                          array("FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"),
                          false,
                          false,
                          array("ID","MODULE","PRODUCT_ID","QUANTITY","CAN_BUY","PRICE"));
           while ($arItems=$dbBasketItems->Fetch())
           {
              $arItems=CSaleBasket::GetByID($arItems["ID"]);
              $arBasketItems[]=$arItems;   
              $cart_num+=$arItems['QUANTITY'];
              $cart_sum+=$arItems['PRICE']*$arItems['QUANTITY'];
           }
           if (empty($cart_num))
              $cart_num="0";
           if (empty($cart_sum))
              $cart_sum="0";
        }
        ?>
	<?if ($APPLICATION->GetCurDir()=='/category/'){?>
	<?//$APPLICATION->IncludeFile(
		//SITE_DIR."include/footer/sp07restail_footer.php",
		//Array(),
	//	Array("MODE"=>"html")
	//);?>

	<section class="testimonials">
        <div class="container">
            <div class="heading">Покупатели о нас</div>
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
    </section> 
    <div class="container">
        <section id="advants">
            <div class="heading">Наши преимущества</div>
            <div class="advants__list clearfix">
                <div class="item">
                    <a href="#">
                        <div class="icons">
                            <i class="icon icon-advant1"></i>
                        </div>
                        <div class="name">Постоянным покупателям - вечные скидки</div>
                        <div class="short">Став постоянным клиентом нашего магазина Вы будете иметь возможность покупать со скидкой до 50%.</div>
                    </a>
                </div>
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
        </section>
    </div>
	<?}?>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="col-md-6">
                        <div class="head">Помощь покупателю</div>
                        <ul class="navi">
                            <li><a href="/delivery_pay/">Доставка и оплата</a></li>
                            <li><a href="/guarantee/">Гарантия и возврат</a></li>
                            <li><a href="#">Обратная связь</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="head">Интернет магазин</div>
                        <ul class="navi">
                            <li><a href="/about/">О нас</a></li>
                            <li><a href="/news/">Новости</a></li>
                            <li><a href="/contacts/">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="head">Контакты</div>
                    <div class="footer__contacts">
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
                        <p>E-mail для вопросов и предложений: <a href="mailto:info@sport07.ru">info@sport07.ru</a></p>
                        <a href="https://vk.com/sport07ru">Мы Вконтакте.</a>
                        <div class="schedule">
                            <div class="schedule__item">
                                <i class="icon icon-grafik"></i>
                                Пн-Пт 8:00-20:00 <br/>
                                Сб 10:00-14:00, Вс - выходной
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="col-md-6">
                        <div class="head">Способы оплаты</div>
                        <div class="payemts-list">
                            <a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/payment1.png" alt=""/></a>
                            <a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/payment2.png" alt=""/></a>
                            <a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/payment3.png" alt=""/></a>
                            <a href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/payment4.png" alt=""/></a>
                            <p>
                                <a href="/delivery_pay/" class="link-all">Посмотреть все способы</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="yandex-review">
                            <img src="<?=SITE_TEMPLATE_PATH?>/assets/images/yandex_market.png" alt=""/>
                            <p>
                                <a href="#" class="link-all">Оценить нас на Я.Маркете</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="copyright">
                        <p>© Интернет-магазин спортивных товаров и инвентаря, 2016 г.</p>
                        Сегодня наш сайт посмотрели <img src="<?=SITE_TEMPLATE_PATH?>/demo/stat.png" alt=""/> посетителей.
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="option_panel">
        <div class="container">
            <div class="option-panel">
                <div class="option-panel__viewed">
                    <a href="#" class="option-panel__viewed-link">
                        <i class="icon icon-eye"></i>
                        <span>Просмотренные товары</span>
                    </a>
                    <div class="viewed-list viewed-list--has-caorusel">
                        <?$APPLICATION->IncludeComponent(
                        "bitrix:sale.viewed.product",
                            "",
                            Array(
                                "VIEWED_COUNT" => "5",
                                "VIEWED_NAME" => "Y",
                                "VIEWED_IMAGE" => "Y",
                                "VIEWED_PRICE" => "Y",
                                "VIEWED_CURRENCY" => "default",
                                "VIEWED_CANBUY" => "Y",
                                "VIEWED_CANBASKET" => "Y",
                                "VIEWED_IMG_HEIGHT" => "150",
                                "VIEWED_IMG_WIDTH" => "150",
                                "BASKET_URL" => "/personal/basket.php",
                                "ACTION_VARIABLE" => "action",
                                "PRODUCT_ID_VARIABLE" => "id",
                                "SET_TITLE" => "N"
                            )
                        );?>
                    </div>
                </div>
                <div class="option-panel__search">
                    <div class="col-search">
                        <div class="search-input">
                        <form action="/store/index.php">
                            <input type="text" name="q" placeholder="Поиск среди 6000 спортивных товаров" class="form-control"/>
                            <button class="btn btn-green">
                                <i class="fa fa-search"></i>
                            </button>
                            </form>
                        </div>
                        <div class="search-menu clearfix">
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
                        </div>
                    </div>
                </div>
                <div class="option-panel__cart">
                    <i class="icon icon-cart-white shopping-cart"></i>
                    Товары в <a href="/personal/cart/">корзине</a>
                    <span class="num"><?=$cart_num?></span>
                    <span class="sum"><b><?=$cart_sum?></b> руб.</span>
                    <a href="/personal/order/make/" class="btn btn-primary">Оформить заказ</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-form" id="modal_add_review" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="panel-sport">
                        <div class="modal-header">
                            Насколько Вам понравился товар в целом?
                        </div>
                        <form action="" role="form" class="form-review form-horizontal">
                            <div class="form-rating clearfix">
                                <div class="stars">
                                    <input id="rating5" type="radio" name="rating" value="5" checked="checked">
                                    <label for="rating5"></label>
                                    <input id="rating4" type="radio" name="rating" value="4">
                                    <label for="rating4"></label>
                                    <input id="rating3" type="radio" name="rating" value="3">
                                    <label for="rating3"></label>
                                    <input id="rating2" type="radio" name="rating" value="2">
                                    <label for="rating2"></label>
                                    <input id="rating1" type="radio" name="rating" value="1">
                                    <label for="rating1"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <p class="help">Напишите, пожалуйста, несколько предложений, характеризующих товар, доставку или оплату.</p>
                                    <textarea cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" placeholder="Ваше имя" />
                                </div>
                                <div class="col-sm-7">

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" placeholder="Ваш e-mail" />
                                </div>
                                <div class="col-sm-7">
                                    <span class="info">Ваш e-mail не публикуется на сайте.</span>
                                </div>
                            </div>
                            <div class="form-bot clearfix">
                                <button class="btn btn-add-review" data-dismiss="modal" data-toggle="modal" data-target="#modal_alert">Оставить отзыв</button>
                            </div>
                        </form>
                        <button class="panel-sport__close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" title="Закрыть">
                            <span><i class="fa fa-angle-left"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-form" id="modal_alert" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="panel-sport">
                    <div class="modal-header">
                        Благодарим Вас за оставленный отзыв!
                    </div>
                    <div class="alert-success">
                        После проверки модератором, он вскоре появится на сайте.
                    </div>
                    <button class="panel-sport__close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" title="Закрыть">
                        <span><i class="fa fa-angle-left"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-form" id="modal_callback" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="panel-sport">
                    <div class="panel-sport__heading">
                        Хотите мы Вам перезвоним, подскажем есть ли у нас нужный Вам товар, а также расскажем о наших скидках и акциях?
                    </div>
                    <form action="" class="form-callback">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" placeholder="Укажите, какой товар Вы ищете?"/>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control masked-phone" placeholder="Ваш номер телефона"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn">Отправить</button>
                            </div>
                        </div>
                    </form>
                    <button class="panel-sport__close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" title="Закрыть">
                        <span><i class="fa fa-angle-left"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-form" id="modal_quickby" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="panel-sport">
                    <div class="panel-sport__heading">
                        Купить в 1 клик
                    </div>
                    <div class="product__item product-info">
                        <div class="row">
                            <div class="col-sm-4 col-name">
                                <div class="product-info__heading">Вы выбрали:</div>
                                <a href="product.html">Кимоно для карате Golden Scorpion "PKM-1200"</a>
                            </div>
                            <div class="col-sm-4 col-options">
                                <div class="item__product-options">
                                    <div class="prop prop-size clearfix">
                                        <div class="name">Размер: </div>
                                        <div class="values">
                                            <div class="value">
                                                <span>s 37</span>
                                            </div>
                                            <div class="value active">
                                                <span>xl 40</span>
                                            </div>
                                            <div class="value">
                                                <span>xxl 45</span>
                                            </div>
                                            <div class="value">
                                                <span>xxxl 47</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="prop prop-color clearfix">
                                        <div class="name">Цвет: </div>
                                        <div class="values">
                                            <div class="value">
                                                <img src="<?=SITE_TEMPLATE_PATH?>/assets/images/color_white.png" alt=""/>
                                            </div>
                                            <div class="value active">
                                                <img src="<?=SITE_TEMPLATE_PATH?>/assets/images/color_grey.png" alt=""/>
                                            </div>
                                            <div class="value">
                                                <img src="<?=SITE_TEMPLATE_PATH?>/assets/images/color_darkgrey.png" alt=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-price">
                                <div class="product-info__heading">Укажите количество:</div>
                                <div class="item__input-counter">
                                    <button type="button" class="btn btn-minus btn-number" data-type="minus" data-field="quant[2]">
                                        -
                                    </button>
                                    <div class="input-group-text">
                                        <input type="text" name="quant[2]" class="form-control input-number input-area" value="1" min="1" max="100000" data-step="1" data-unit="">
                                    </div>
                                    <button type="button" class="btn btn-plus btn-number" data-type="plus" data-field="quant[2]">
                                        +
                                    </button>
                                </div>
                                <div class="item__price">
                                    <span class="new">1480</span>
                                    <span class="currency">руб.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-sport__heading">
                        Ваши данные:
                    </div>
                    <form action="" class="form-info">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row form-group">
                                    <div class="col-sm-5">
                                        <label class="control-label">Имя:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control"/>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-5">
                                        <label class="control-label">Ваш номер телефона: <span class="req">*</span></label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="tel" class="form-control masked-phone"/>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-5">
                                        <label class="control-label">E-mail:</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="email" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modal_alert">Купить</button>
                            </div>
                        </div>
                    </form>
                    <div class="bot">
                        <span class="req">*</span> - Обязательно для заполнения. Купить в 1 клик - это не заполнять никакие формы, а просто оставить свой номер телефона, чтобы наш консультант решил все вопросы по оформлению заказа.
                    </div>
                    <button class="panel-sport__close" data-dismiss="modal" aria-hidden="true" data-toggle="tooltip" title="Закрыть">
                        <span><i class="fa fa-angle-left"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=SITE_TEMPLATE_PATH?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/plugins/slick/slick.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/plugins/soon-countdown/js/soon.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/jquery.sticky-kit.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/jquery.maskedinput.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/masonry.pkgd.min.js" type="text/javascript"></script>

    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/default.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/index.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/shop.js"></script>

    <script>
       $(document).ready(function ($) {
           Main.init();
           Index.init();
           Shop.init();
       });
   </script>

</body>
</html>