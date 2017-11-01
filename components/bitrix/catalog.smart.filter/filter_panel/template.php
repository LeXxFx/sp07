<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
                    <div class="filter-selected">
                        Выбранные фильтры:
                        <?foreach($arResult["ITEMS"] as $arItem):?>
                            <?if(empty($arItem["VALUES"])) continue;?>
                                <?foreach($arItem["VALUES"] as $arValue):?>
                                    <?if($arValue["CHECKED"]):?>
                                        <?
                                            $filt_search[]=$arValue['CONTROL_NAME'].'=Y';
                                        ?>
                                        <div class="filter-selected__item">
                                                <a class="filter-cancel" href="<?=str_replace($arValue['CONTROL_NAME'].'=Y', '', $_SERVER['REQUEST_URI'])?>" title="Отменить выбор"><i class="fa fa-times"></i></a>
                                                <span><?=$arItem["NAME"]?>: <?=$arValue["VALUE"]?></span>
                                        </div>     
                                    <?endif;?>                           
                                <?endforeach;?>
                        <?endforeach;?>                        
                        <a href="<?=str_replace($filt_search, '', $_SERVER['REQUEST_URI'])?>" class="filter-cancel-all">Очистить все фильтры</a>
                    </div>