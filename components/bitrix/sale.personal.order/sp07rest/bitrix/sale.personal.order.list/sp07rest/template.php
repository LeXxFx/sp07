<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
			<?
			function sklonenie($n, $forms){
				return $n%10==1&&$n%100!=11?$forms[0]:($n%10>=2&&$n%10<=4&&($n%100<10||$n%100>=20)?$forms[1]:$forms[2]);
			}
			?>
            <div class="inner">
                <div id="content" role="main">
					<div class="cabinet">
						<ul class="page-nav clearfix">
							<li><a href="/personal/profile/"><span>Персональная информация</span></a></li>
							<li class="active"><a href="/personal/order/"><span>История заказов</span></a></li>
						</ul>
						<div class="history-nav">
							<a href="/personal/order/" class="history-nav__item <?if(empty($_REQUEST)){echo "active";}?>">
								<span class="nav-icon nav-icon-1"></span>
								<span class="nav-label">Принят</span>
							</a>
							<a href="?status=paid" class="history-nav__item <?if($_REQUEST["status"] == 'paid'){echo "active";}?>">
								<span class="nav-icon nav-icon-3"></span>
								<span class="nav-label">Оплачен</span>
							</a>
							<a href="?status=send" class="history-nav__item <?if($_REQUEST["status"] == 'send'){echo "active";}?>">
								<span class="nav-icon nav-icon-2"></span>
								<span class="nav-label">Отправлен</span>
							</a>
							<a href="?filter_history=Y" class="history-nav__item <?if($_REQUEST["filter_history"] == 'Y' && empty($_REQUEST["show_canceled"])){echo "active";}?>">
								<span class="nav-icon nav-icon-4"></span>
								<span class="nav-label">Выполнен</span>
							</a>
							<a href="?filter_history=Y&show_canceled=Y" class="history-nav__item <?if($_REQUEST["show_canceled"] == 'Y'){echo "active";}?>">
								<span class="nav-icon nav-icon-5"></span>
								<span class="nav-label">Отменен</span>
							</a>
						</div>
						<?//echo "<pre>";print_r($arResult["ORDERS"]);echo "</pre>";?>
						<?//echo "<pre>";print_r($_REQUEST);echo "</pre>";?>
						<div class="order-list">
							<?if(empty($_REQUEST)):?>
							<?foreach($arResult["ORDERS"] as $order):?>
							<?if($order["ORDER"]["STATUS_ID"] == "N"):?>
							<div class="order-list__item order-item">
								<div class="order-item__top">
									<?$count_items = count($order["BASKET_ITEMS"]);?>
									<?$total_products = $count_items ." ". sklonenie($count_items , array('товар', 'товара', 'товаров') ) ;?>
									<a data-toggle="collapse" data-parent="#history" href="#zakaz_<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>" class="collapsed">Заказ <?=$order["ORDER"]["ACCOUNT_NUMBER"]?> от <?=$order["ORDER"]["DATE_INSERT_FORMATED"]?>, <?=$total_products;?> на сумму <?=$order["ORDER"]["FORMATED_PRICE"]?></a>
								</div>
								<div id="zakaz_<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>" class="order-item__details collapse">
									<div class="order-top">
										<div class="order-top__info">
											<p><b>Сумма к оплате: <?=$order["ORDER"]["FORMATED_PRICE"]?></b></p>
											<p><b>Служба доставки:</b> <?=$order["SHIPMENT"]["0"]["DELIVERY_NAME"]?></p>
											<p><b>Способ оплаты:</b> <?=$order["PAYMENT"]["0"]["PAY_SYSTEM_NAME"]?></p>
										</div>
										<div class="order-top__btn">
											<?if($order["PAYMENT"]["0"]["PAY_SYSTEM_ID"] == 19 && $order["PAYMENT"]["0"]["PAID"] == "N"):?>
											<a href="<?=$order["PAYMENT"]["0"]["PSA_ACTION_FILE"]?>" class="btn btn-green">Оплатить</a>
											<?elseif($order["PAYMENT"]["0"]["PAY_SYSTEM_ID"] != 19 && $order["PAYMENT"]["0"]["PAID"] == "N"):?>
											<button class="btn btn-green">Не оплачен</button>
											<?else:?>
											<button class="btn btn-green">Оплачен</button>
											<?endif;?>
										</div>
									</div>
									<div class="order-products">
										<p>Состав заказа:</p>
										<?foreach($order["BASKET_ITEMS"] as $items):?>
										<a href="<?=$items["DETAIL_PAGE_URL"]?>"><?=$items["NAME"]?> (<?=$items["QUANTITY"]?> <?=$items["MEASURE_NAME"]?>)</a>
										<?endforeach;?>
									</div>
									<div class="order-bot">
										<a href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"]);?>" class="btn btn-link">Повторить заказ</a>	<a href="/personal/order/?cancel=Y&order=<?=$order["ORDER"]["ID"]?>" class="btn btn-link">Отменить заказ</a>
									</div>
								</div>
							</div>
							<?endif;?>
							<?endforeach;?>
							<?endif;?>
							<?if($_REQUEST["status"] == "paid"):?>
							<?foreach($arResult["ORDERS"] as $order):?>
							<?if($order["ORDER"]["STATUS_ID"] == "SP"):?>
							<div class="order-list__item order-item">
								<div class="order-item__top">
									<?$count_items = count($order["BASKET_ITEMS"]);?>
									<?$total_products = $count_items ." ". sklonenie($count_items , array('товар', 'товара', 'товаров') ) ;?>
									<a data-toggle="collapse" data-parent="#history" href="#zakaz_<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>" class="collapsed">Заказ <?=$order["ORDER"]["ACCOUNT_NUMBER"]?> от <?=$order["ORDER"]["DATE_INSERT_FORMATED"]?>, <?=$total_products;?> на сумму <?=$order["ORDER"]["FORMATED_PRICE"]?></a>
								</div>
								<div id="zakaz_<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>" class="order-item__details collapse">
									<div class="order-top">
										<div class="order-top__info">
											<p><b>Сумма к оплате: <?=$order["ORDER"]["FORMATED_PRICE"]?></b></p>
											<p><b>Служба доставки:</b> <?=$order["SHIPMENT"]["0"]["DELIVERY_NAME"]?></p>
											<p><b>Способ оплаты:</b> <?=$order["PAYMENT"]["0"]["PAY_SYSTEM_NAME"]?></p>
										</div>
										<div class="order-top__btn">
											<?if($order["PAYMENT"]["0"]["PAY_SYSTEM_ID"] == 19 && $order["PAYMENT"]["0"]["PAID"] == "N"):?>
											<a href="<?=$order["PAYMENT"]["0"]["PSA_ACTION_FILE"]?>" class="btn btn-green">Оплатить</a>
											<?elseif($order["PAYMENT"]["0"]["PAY_SYSTEM_ID"] != 19 && $order["PAYMENT"]["0"]["PAID"] == "N"):?>
											<button class="btn btn-green">Не оплачен</button>
											<?else:?>
											<button class="btn btn-green">Оплачен</button>
											<?endif;?>
										</div>
									</div>
									<div class="order-products">
										<p>Состав заказа:</p>
										<?foreach($order["BASKET_ITEMS"] as $items):?>
										<a href="<?=$items["DETAIL_PAGE_URL"]?>"><?=$items["NAME"]?> (<?=$items["QUANTITY"]?> <?=$items["MEASURE_NAME"]?>)</a>
										<?endforeach;?>
									</div>
									<div class="order-bot">
										<a href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"]);?>" class="btn btn-link">Повторить заказ</a>	<a href="/personal/order/?cancel=Y&order=<?=$order["ORDER"]["ID"]?>" class="btn btn-link">Отменить заказ</a>
									</div>
								</div>
							</div>
							<?endif;?>
							<?endforeach;?>
							<?endif;?>
							<?if($_REQUEST["status"] == "send"):?>
							<?foreach($arResult["ORDERS"] as $order):?>
							<?if($order["ORDER"]["STATUS_ID"] == "P"):?>
							<div class="order-list__item order-item">
								<div class="order-item__top">
									<?$count_items = count($order["BASKET_ITEMS"]);?>
									<?$total_products = $count_items ." ". sklonenie($count_items , array('товар', 'товара', 'товаров') ) ;?>
									<a data-toggle="collapse" data-parent="#history" href="#zakaz_<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>" class="collapsed">Заказ <?=$order["ORDER"]["ACCOUNT_NUMBER"]?> от <?=$order["ORDER"]["DATE_INSERT_FORMATED"]?>, <?=$total_products;?> на сумму <?=$order["ORDER"]["FORMATED_PRICE"]?></a>
								</div>
								<div id="zakaz_<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>" class="order-item__details collapse">
									<div class="order-top">
										<div class="order-top__info">
											<p><b>Сумма к оплате: <?=$order["ORDER"]["FORMATED_PRICE"]?></b></p>
											<p><b>Служба доставки:</b> <?=$order["SHIPMENT"]["0"]["DELIVERY_NAME"]?></p>
											<p><b>Способ оплаты:</b> <?=$order["PAYMENT"]["0"]["PAY_SYSTEM_NAME"]?></p>
										</div>
										<div class="order-top__btn">
											<?if($order["PAYMENT"]["0"]["PAY_SYSTEM_ID"] == 19 && $order["PAYMENT"]["0"]["PAID"] == "N"):?>
											<a href="<?=$order["PAYMENT"]["0"]["PSA_ACTION_FILE"]?>" class="btn btn-green">Оплатить</a>
											<?elseif($order["PAYMENT"]["0"]["PAY_SYSTEM_ID"] != 19 && $order["PAYMENT"]["0"]["PAID"] == "N"):?>
											<button class="btn btn-green">Не оплачен</button>
											<?else:?>
											<button class="btn btn-green">Оплачен</button>
											<?endif;?>
										</div>
									</div>
									<div class="order-products">
										<p>Состав заказа:</p>
										<?foreach($order["BASKET_ITEMS"] as $items):?>
										<a href="<?=$items["DETAIL_PAGE_URL"]?>"><?=$items["NAME"]?> (<?=$items["QUANTITY"]?> <?=$items["MEASURE_NAME"]?>)</a>
										<?endforeach;?>
									</div>
									<div class="order-bot">
										<a href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"]);?>" class="btn btn-link">Повторить заказ</a>	<a href="/personal/order/?cancel=Y&order=<?=$order["ORDER"]["ID"]?>" class="btn btn-link">Отменить заказ</a>
									</div>
								</div>
							</div>
							<?endif;?>
							<?endforeach;?>
							<?endif;?>
							<?if($_REQUEST["status"] == "done"):?>
							<?foreach($arResult["ORDERS"] as $order):?>
							<?if($order["ORDER"]["STATUS_ID"] == "F"):?>
							<div class="order-list__item order-item">
								<div class="order-item__top">
									<?$count_items = count($order["BASKET_ITEMS"]);?>
									<?$total_products = $count_items ." ". sklonenie($count_items , array('товар', 'товара', 'товаров') ) ;?>
									<a data-toggle="collapse" data-parent="#history" href="#zakaz_<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>" class="collapsed">Заказ <?=$order["ORDER"]["ACCOUNT_NUMBER"]?> от <?=$order["ORDER"]["DATE_INSERT_FORMATED"]?>, <?=$total_products;?> на сумму <?=$order["ORDER"]["FORMATED_PRICE"]?></a>
								</div>
								<div id="zakaz_<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>" class="order-item__details collapse">
									<div class="order-top">
										<div class="order-top__info">
											<p><b>Сумма к оплате: <?=$order["ORDER"]["FORMATED_PRICE"]?></b></p>
											<p><b>Служба доставки:</b> <?=$order["SHIPMENT"]["0"]["DELIVERY_NAME"]?></p>
											<p><b>Способ оплаты:</b> <?=$order["PAYMENT"]["0"]["PAY_SYSTEM_NAME"]?></p>
										</div>
										<div class="order-top__btn">
											<?if($order["PAYMENT"]["0"]["PAY_SYSTEM_ID"] == 19 && $order["PAYMENT"]["0"]["PAID"] == "N"):?>
											<a href="<?=$order["PAYMENT"]["0"]["PSA_ACTION_FILE"]?>" class="btn btn-green">Оплатить</a>
											<?elseif($order["PAYMENT"]["0"]["PAY_SYSTEM_ID"] != 19 && $order["PAYMENT"]["0"]["PAID"] == "N"):?>
											<button class="btn btn-green">Не оплачен</button>
											<?else:?>
											<button class="btn btn-green">Оплачен</button>
											<?endif;?>
										</div>
									</div>
									<div class="order-products">
										<p>Состав заказа:</p>
										<?foreach($order["BASKET_ITEMS"] as $items):?>
										<a href="<?=$items["DETAIL_PAGE_URL"]?>"><?=$items["NAME"]?> (<?=$items["QUANTITY"]?> <?=$items["MEASURE_NAME"]?>)</a>
										<?endforeach;?>
									</div>
									<div class="order-bot">
										<a href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"]);?>" class="btn btn-link">Повторить заказ</a>	<a href="/personal/order/?cancel=Y&order=<?=$order["ORDER"]["ID"]?>" class="btn btn-link">Отменить заказ</a>
									</div>
								</div>
							</div>
							<?endif;?>
							<?endforeach;?>
							<?endif;?>
							<?if($_REQUEST["show_canceled"] == "Y"):?>
							<?foreach($arResult["ORDERS"] as $order):?>
							<?if($order["ORDER"]["CANCELED"] == "Y"):?>
							<div class="order-list__item order-item">
								<div class="order-item__top">
									<?$count_items = count($order["BASKET_ITEMS"]);?>
									<?$total_products = $count_items ." ". sklonenie($count_items , array('товар', 'товара', 'товаров') ) ;?>
									<a data-toggle="collapse" data-parent="#history" href="#zakaz_<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>" class="collapsed">Заказ <?=$order["ORDER"]["ACCOUNT_NUMBER"]?> от <?=$order["ORDER"]["DATE_INSERT_FORMATED"]?>, <?=$total_products;?> на сумму <?=$order["ORDER"]["FORMATED_PRICE"]?></a>
								</div>
								<div id="zakaz_<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>" class="order-item__details collapse">
									<div class="order-top">
										<div class="order-top__info">
											<p><b>Сумма к оплате: <?=$order["ORDER"]["FORMATED_PRICE"]?></b></p>
											<p><b>Служба доставки:</b> <?=$order["SHIPMENT"]["0"]["DELIVERY_NAME"]?></p>
											<p><b>Способ оплаты:</b> <?=$order["PAYMENT"]["0"]["PAY_SYSTEM_NAME"]?></p>
										</div>
									</div>
									<div class="order-products">
										<p>Состав заказа:</p>
										<?foreach($order["BASKET_ITEMS"] as $items):?>
										<a href="<?=$items["DETAIL_PAGE_URL"]?>"><?=$items["NAME"]?> (<?=$items["QUANTITY"]?> <?=$items["MEASURE_NAME"]?>)</a>
										<?endforeach;?>
									</div>
									<div class="order-bot">
										<a href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"]);?>" class="btn btn-link">Повторить заказ</a>
									</div>
								</div>
							</div>
							<?endif;?>
							<?endforeach;?>
							<?endif;?>
							<?if($_REQUEST["filter_history"] == 'Y' && empty($_REQUEST["show_canceled"])):?>
							<?foreach($arResult["ORDERS"] as $order):?>
							<div class="order-list__item order-item">
								<div class="order-item__top">
									<?$count_items = count($order["BASKET_ITEMS"]);?>
									<?$total_products = $count_items ." ". sklonenie($count_items , array('товар', 'товара', 'товаров') ) ;?>
									<a data-toggle="collapse" data-parent="#history" href="#zakaz_<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>" class="collapsed">Заказ <?=$order["ORDER"]["ACCOUNT_NUMBER"]?> от <?=$order["ORDER"]["DATE_INSERT_FORMATED"]?>, <?=$total_products;?> на сумму <?=$order["ORDER"]["FORMATED_PRICE"]?></a>
								</div>
								<div id="zakaz_<?=$order["ORDER"]["ACCOUNT_NUMBER"]?>" class="order-item__details collapse">
									<div class="order-top">
										<div class="order-top__info">
											<p><b>Сумма к оплате: <?=$order["ORDER"]["FORMATED_PRICE"]?></b></p>
											<p><b>Служба доставки:</b> <?=$order["SHIPMENT"]["0"]["DELIVERY_NAME"]?></p>
											<p><b>Способ оплаты:</b> <?=$order["PAYMENT"]["0"]["PAY_SYSTEM_NAME"]?></p>
										</div>
										<div class="order-top__btn">
											<?if($order["PAYMENT"]["0"]["PAY_SYSTEM_ID"] == 19 && $order["PAYMENT"]["0"]["PAID"] == "N"):?>
											<a href="<?=$order["PAYMENT"]["0"]["PSA_ACTION_FILE"]?>" class="btn btn-green">Оплатить</a>
											<?elseif($order["PAYMENT"]["0"]["PAY_SYSTEM_ID"] != 19 && $order["PAYMENT"]["0"]["PAID"] == "N"):?>
											<button class="btn btn-green">Не оплачен</button>
											<?else:?>
											<button class="btn btn-green">Оплачен</button>
											<?endif;?>
										</div>
									</div>
									<div class="order-products">
										<p>Состав заказа:</p>
										<?foreach($order["BASKET_ITEMS"] as $items):?>
										<a href="<?=$items["DETAIL_PAGE_URL"]?>"><?=$items["NAME"]?> (<?=$items["QUANTITY"]?> <?=$items["MEASURE_NAME"]?>)</a>
										<?endforeach;?>
									</div>
									<div class="order-bot">
										<a href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"]);?>" class="btn btn-link">Повторить заказ</a>
									</div>
								</div>
							</div>
							<?endforeach;?>
							<?endif;?>
						</div>
					</div>
                </div>
            </div>