<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
						<?if(sizeof($arResult) != 0):?>
						<div class="panel-sport">
							<div class="panel-sport__heading">
								Вы смотрели:
							</div>
							<?//echo "<pre>";print_r($arResult);echo "</pre>";?>
							<div class="viewed-list__body">
								<?if (sizeof($arResult)>3):?>
								<div class="viewed-list__button-next">
									<a href="#">
										Показать следующие 3 товара
									</a>
								</div>
								<?endif;?>
								<div class="product-grid clearfix">
								<?
								foreach($arResult as $arItem):
								$arItem['PREVIEW_PICTURE']=CFile::GetPath($arItem['PREVIEW_PICTURE']);
								?>
										<div class="product-grid__item product__item">
											<div class="item__wrap">
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
											</div>
										</div>
									<?endforeach;?>
									</div>
								</div>
							<button class="panel-sport__close" data-toggle="tooltip" title="Закрыть">
								<span><i class="fa fa-angle-left"></i></span>
							</button>
						</div>
						<?endif;?>

