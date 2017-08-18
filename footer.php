<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>		
        </div>
    </div>
	<?//echo $APPLICATION->GetCurDir();?>

	<?if ($APPLICATION->GetCurDir()=='/category/'){?>
	<?//$APPLICATION->IncludeFile(
		//SITE_DIR."include/footer/sp07restail_footer.php",
		//Array(),
	//	Array("MODE"=>"html")
	//);?>

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
                            <li><a href="/return-exchange/">Гарантия и возврат</a></li>
                            <!--<li><a href="#">Обратная связь</a></li>-->
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
                                Пн-Пт 8:00-17:00 <br/>
                                Сб, Вс - выходной
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
                            <a href="/delivery_pay"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/payment1.png" alt=""/></a>
                            <a href="/delivery_pay"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/payment2.png" alt=""/></a>
                            <a href="/delivery_pay"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/payment3.png" alt=""/></a>
                            <a href="/delivery_pay"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/payment4.png" alt=""/></a>
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
                        <p>© Интернет-магазин спортивных товаров и инвентаря, 2017 г.</p>
                        Сегодня наш сайт посмотрели <!--<img src="<?//=SITE_TEMPLATE_PATH?>/demo/stat.png" alt=""/>-->
						<!-- Yandex.Metrika informer -->
						<a href="https://metrika.yandex.ru/stat/?id=19622830&amp;from=informer"
						target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/19622830/1_0_2020ECFF_0000CCFF_1_pageviews"
						style="width:80px; height:15px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры)" /></a>
						<!-- /Yandex.Metrika informer -->
						посетителей.
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
                            <?/*<div class="search-menu__body">
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
*/?>
                        </div>
                    </div>
                </div>
                <div class="option-panel__cart">
                    <?php
					$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small","sp07rest",Array(
					"PATH_TO_BASKET" => "/personal/basket.php",
					"PATH_TO_ORDER" => "/personal/order.php",
					"SHOW_DELAY" => "Y",
					"SHOW_NOTAVAIL" => "Y",
					"SHOW_SUBSCRIBE" => "Y"
						)
					);
					?>
                </div>
            </div>
        </div>
    </div>
	<!-- Yandex.Metrika counter -->
						<script type="text/javascript">
							(function (d, w, c) {
								(w[c] = w[c] || []).push(function() {
									try {
										w.yaCounter19622830 = new Ya.Metrika({
											id:19622830,
											clickmap:true,
											trackLinks:true,
											accurateTrackBounce:true,
											webvisor:true,
											ecommerce:"dataLayerSp07"
										});
									} catch(e) { }
								});

								var n = d.getElementsByTagName("script")[0],
									s = d.createElement("script"),
									f = function () { n.parentNode.insertBefore(s, n); };
								s.type = "text/javascript";
								s.async = true;
								s.src = "https://mc.yandex.ru/metrika/watch.js";

								if (w.opera == "[object Opera]") {
									d.addEventListener("DOMContentLoaded", f, false);
								} else { f(); }
							})(document, window, "yandex_metrika_callbacks");
						</script>
						<noscript><div><img src="https://mc.yandex.ru/watch/19622830" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
						<!-- /Yandex.Metrika counter -->


    <script src="<?=SITE_TEMPLATE_PATH?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/plugins/slick/slick.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/plugins/soon-countdown/js/soon.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/jquery.sticky-kit.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/jquery.maskedinput.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/masonry.pkgd.min.js" type="text/javascript"></script>

    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/default.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/index.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/shop.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/assets/plugins/magiczoomplus/magiczoomplus.js" type="text/javascript"></script>
    <script>
       $(document).ready(function ($) {
           Main.init();
           Index.init();
           Shop.init();
       });
   </script>

</body>
</html>