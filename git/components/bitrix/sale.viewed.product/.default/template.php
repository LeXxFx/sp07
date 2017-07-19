<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="panel-sport">
                            <div class="panel-sport__heading">
                                Вы смотрели:
                            </div>
                            <div class="viewed-list__body">
                                <?if (sizeof($arResult)>3):?>
                                <div class="viewed-list__button-next">
                                    <a href="#">
                                        Показать следующие 3 товара
                                    </a>
                                </div>
                                <?endif;?>
                                <div class="product-grid">

<?
foreach($arResult as $arItem):
$arItem['PREVIEW_PICTURE']=CFile::GetPath($arItem['PREVIEW_PICTURE']);
?>

<div class="product-grid__item product__item">
                                        <div class="item__wrap">
                                            <div class="item__stick item__stick-profit">
                                                <span class="num"><i class="fa fa-star-o"></i></span>
                                                Выгода <b>2017</b>
                                            </div>
                                            <div class="item__timer">
                                                <i class="fa fa-clock-o"></i>
                                                <div class="soon"
                                                     data-due="2017-03-31T22:05"
                                                     data-layout="line"
                                                     data-format="h,m,s"
                                                     data-labels-days=":"
                                                     data-labels-hours=":"
                                                     data-labels-minutes=":"
                                                     data-labels-seconds=" ">
                                                </div>
                                            </div>
                                            <a href="<?=$arItem['DETAIL_PAGE_URL']?>">
                                                <div class="item__image">
                                                    <img src="<?=$arItem['PREVIEW_PICTURE']?>" alt=""/>
                                                </div>
                                                <div class="item__name">
                                                    <?=$arItem['NAME']?>
                                                </div>
                                            </a>
                                            <div class="item__price">
                                                <span class="new"><?=$arItem['PRICE']?></span>
                                                <span class="currency">руб.</span>
                                            </div>
                                            <div class="item__rate">
                                                <span class="stars star-0"></span>
                                            </div>
                                            <div class="item__buttons">
                                                <button class="btn btn-quick-buy" title="Купить в один клик">
                                                    <i class="icon icon-hand"></i>
                                                </button>
                                                <button class="btn btn-add-to-cart" title="Положить в корзину">
                                                    <i class="icon icon-cart-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

<?endforeach;?>
                                </div>
                            </div>
                            <button class="panel-sport__close" data-toggle="tooltip" title="Закрыть">
                                <span><i class="fa fa-angle-left"></i></span>
                            </button>
                        </div>

