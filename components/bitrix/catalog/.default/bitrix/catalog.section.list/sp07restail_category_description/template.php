<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
                                $arFilter = Array('IBLOCK_ID'=> 9,'ID'=>$arResult['SECTION']["ID"], 'GLOBAL_ACTIVE'=>'Y');
                                $db_list = CIBlockSection::GetList(Array("timestamp_x"=>"DESC"), $arFilter, false, Array("UF_SEO_TEXT"));
                                if($uf_value = $db_list->GetNext()):
                                $seoText=$uf_value["UF_SEO_TEXT"];
                                endif; 
                            ?>
                            <div class="desc"></div>
<div class="category__post">
    <div class="post">
        <div class="top"><?=$arResult['SECTION']['NAME']?></div>
        <?=$seoText?>
    </div>
    <div id="text" class="clearfix collapse" aria-expanded="false" style="height: 0px;">
        <div class="post">
            <?=$arResult['SECTION']['DESCRIPTION']?>
        </div>
    </div>
    <div class="show_more">
        <button class="btn collapsed" data-toggle="collapse" data-target="#text" data-title-init="Подробнее" data-title-collapsed="Закрыть" aria-expanded="false"><span>Подробнее</span> <i class="icon icon-arrow-down"></i></button>
    </div>
</div>
<!-- Костыль -->
</div>
</div>

<div>
<div>
<!-- /Костыль -->
<!--<section class="testimonials">
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
    </section>-->


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