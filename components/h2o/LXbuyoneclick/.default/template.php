<?php if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;
if(method_exists($this, 'setFrameMode')){
	$this->setFrameMode(true);
}
Bitrix\Main\Loader::includeModule('highloadblock');
global $USER;
?>

<?
if($arParams['BUY_CURRENT_BASKET']):
	?>
	<button class="bx_big bx_bt_button buy_one_click_popup_order"
	        data-ajax_id="<?=$arResult["AJAX_ID"]?>" ><?=GetMessage("H2O_BUYONECLICK_ORDER_BUTTON")?></button><?
endif;
?>
<div class="tab-container" style="display: none;">
	<div id="buy_one_click_ajaxwrap" class="buy_one_click_ajaxwrap">
		<div class="h2o_component buy_one_click_container">
			<div class="modal-body">
				<?
				/** Выводим фатальные ошибки */
				if(isset($arResult['FATAL_ERROR'])):?>
					<div class="modal-header">
						<span class="modal_title"><?=GetMessage("H2O_BUYONECLICK_FATAL_ERROR_TITLE")?></span>
					</div>
					<div class="modal-container">
						<p><?=GetMessage("H2O_BUYONECLICK_FATAL_ERROR_TEXT")?></p>
					</div>
					<?
					/**
					 * Если успешно добавили заказ
					 */
					?>
				<? elseif($arResult['SUCCESS']): ?>
					<?
					$success_head = ($arParams['SUCCESS_HEAD_MESS'] != "" ? $arParams['SUCCESS_HEAD_MESS'] : GetMessage('CONGRATULATION'));
					$success_mess = ($arParams['SUCCESS_ADD_MESS'] != "" ? $arParams['SUCCESS_ADD_MESS'] : GetMessage('SUCCESS_ADD_NEW'));
					?>
					<input type="hidden" class="SUCCESS" value="Y"/>
					<div class="modal-header">
						<span class="modal_title"><?=$success_head?></span>
					</div>
					<div class="modal-container">
						
						<p><?=str_replace('#ORDER_ID#',$arResult['SUCCESS'], $success_mess)?></p>
						<?
						if(!empty($arResult["PAY_SYSTEM"])){
							?>
							<br/><br/>

							<table class="sale_order_full_table">
								<tr>
									<td class="ps_logo">
										<div class="pay_name"><?=GetMessage("SOA_TEMPL_PAY")?></div>
										<?=CFile::ShowImage($arResult["PAY_SYSTEM"]["LOGOTIP"], 100, 100, "border=0", "", false);?>
										<div class="paysystem_name"><?=$arResult["PAY_SYSTEM"]["NAME"]?></div>
										<br>
									</td>
								</tr>
								<?
								if(strlen($arResult["PAY_SYSTEM"]["ACTION_FILE"]) > 0){
									?>
									<tr>
										<td>
											<?
											if($arResult["PAY_SYSTEM"]["NEW_WINDOW"] == "Y"){
												?>
												<script language="JavaScript">
													window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=urlencode(urlencode($arResult["SUCCESS"]))?>');
												</script>
											<?=GetMessage("SOA_TEMPL_PAY_LINK", Array("#LINK#" => $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . urlencode(urlencode($arResult["SUCCESS"]))))?>
												<?
												if(CSalePdf::isPdfAvailable() && CSalePaySystemsHelper::isPSActionAffordPdf($arResult['PAY_SYSTEM']['ACTION_FILE'])){
													?><br/>
													<?=GetMessage("SOA_TEMPL_PAY_PDF", Array("#LINK#" => $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . urlencode(urlencode($arResult["SUCCESS"])) . "&pdf=1&DOWNLOAD=Y"))?>
													<?
												}
											}
											else{
												if(strlen($arResult["PAY_SYSTEM"]["PATH_TO_ACTION"]) > 0){
													try{
														include($arResult["PAY_SYSTEM"]["PATH_TO_ACTION"]);
													}catch(\Bitrix\Main\SystemException $e){
														if($e->getCode() == CSalePaySystemAction::GET_PARAM_VALUE)
															$message = GetMessage("SOA_TEMPL_ORDER_PS_ERROR");
														else
															$message = $e->getMessage();

														echo '<span style="color:red;">' . $message . '</span>';
													}
												}
											}
											?>
										</td>
									</tr>
									<?
								}
								?>
							</table>
							<?
						} ?>
					</div>
				<? else: ?>
					<form action="<?=POST_FORM_ACTION_URI?>" class="buy_one_click_form" method="post" id="buy_one_click_form"
					      enctype="multipart/form-data" onsubmit="yaCounter19622830.reachGoal('1_click', function () {alert('Данные успешно отправлены');},<текст>); return true;">
						<input type="hidden" class="input_ajax_id" name="AJAX_CALL_BUY_ONE_CLICK"
						       value="<?=$arResult["AJAX_ID"]?>"/>
						<input type="hidden" name="buy_one_click" value="Y"/>
						<input type="hidden" name="H2O_B1C_ELEMENT_ID" value="<?=$arResult['ELEMENT_ID']?>"/>


						<?
						/**
						 * Если у товара есть торговые предложения
						 */
						?>
						<? if(is_array($arResult['OFFERS']) && !empty($arResult['OFFERS']) && $arParams["SHOW_OFFERS_FIRST_STEP"] != 'Y'): ?>
							<div class="modal-header">
								<div  class="item_price">
									<div class="modal_title"><?=$arResult['CURRENT_PRODUCT']['FIELDS']?></div>
									<?
									$current_offer = false;
									if(isset($arResult['CURRENT_OFFER_ID']) && intval($arResult['CURRENT_OFFER_ID'])){
										$current_offer = intval($arResult['CURRENT_OFFER_ID']);
									}else{
										$current_offer = $arResult['OFFERS'][0]['ID'];
									}
									?>
									<div class="item_current_price"
									     data-start-price="<?=$arResult['CURRENT_PRODUCT']['OFFERS'][$current_offer]['PRICE']?>"
									     data-currency="<?=$arResult['CURRENT_PRODUCT']['OFFERS'][$current_offer]['CURRENCY']?>">
										<?=FormatCurrency($arResult['CURRENT_PRODUCT']['OFFERS'][$current_offer]['PRICE'],
												$arResult['CURRENT_PRODUCT']['OFFERS'][$current_offer]["CURRENCY"])?>
									</div>

								</div>

								<span class="modal_title"><?=GetMessage("OFFERS")?></span>
							</div>
							<div class="modal-container">
								<input type="hidden" name="offers" value="Y"/>
								<input type="hidden" value="<?=$arResult['QUANTITY']?>" name="quantity_b1c"/>
								<? /*if($arParams["USE_CAPTCHA"] == "Y"){?>
			                        <input type="hidden" name="captcha_sid" value="<?=$arResult['POST']['captcha_sid']?>" />
			                        <input type="hidden" name="captcha_word" value="<?=$arResult['POST']['captcha_word']?>" />
			                    <?}*/
								?>
								<?
								if(is_array($arResult['POST']['ONECLICK']) && !empty($arResult['POST']['ONECLICK'])){
									foreach($arResult['POST']['ONECLICK'] as $name => $post){
										?>
										<input type="hidden" name="ONECLICK[<?=$name?>]" value="<?=$post?>"/>
										<?
									}
								}
								if(isset($arResult['POST']['ONECLICK_COMMENT'])){
									?>
									<input type="hidden" name="ONECLICK_COMMENT" value="<?=$arResult['POST']['ONECLICK_COMMENT']?>"/><?
								}
								?>
								<?
								if(is_array($arResult['POST']['ONECLICK_PROP']) && !empty($arResult['POST']['ONECLICK_PROP'])){
									foreach($arResult['POST']['ONECLICK_PROP'] as $nameP => $postP){
										?>
										<input type="hidden" name="ONECLICK_PROP[<?=$nameP?>]" value="<?=$postP?>"/>
										<?
									}
								} ?>
								<ul class="offers_list">
									<?if(isset($arResult['CURRENT_OFFER_ID'])){
										$checked = $arResult['CURRENT_OFFER_ID'];
									}else{
										$checked = $arResult['OFFERS'][0]['ID'];
									}?>

									<? foreach($arResult['OFFERS'] as $offer){
										?>
										<li>
											<div class="form-cell-9">

												<input type="radio" id="OFFER_<?=$offer['ID']?>" name="H2O_B1C_OFFER_ID"
												       value="<?=$offer['ID']?>"
														<? if($offer['ID'] == $checked){
															//$first = false;
															print 'checked';
														} ?>
													   data-start-price="<?=$arResult['CURRENT_PRODUCT']['OFFERS'][$offer['ID']]['PRICE']?>"
													   data-currency="<?=$arResult['CURRENT_PRODUCT']['OFFERS'][$offer['ID']]['CURRENCY']?>"

												/>
												<label for="OFFER_<?=$offer['ID']?>">

													<?
													if(is_array($offer['PROPERTIES']) && !empty($offer['PROPERTIES'])){
														foreach($offer['PROPERTIES'] as $prop){
															?>
															<? if($prop['VALUE'] != '' && in_array($prop['CODE'], $arParams['LIST_OFFERS_PROPERTY_CODE'])){
																/**
																 * Далее идет проверка, является ли свойство типа Справочник.
																 * Получаем массив со значениями элемента highload блока.
																 * По умолчанию выводим поле UF_NAME.
																 * Если указать параметр у компонента HIGHLOAD_SHOW_FIELD,
																 * то будет выводится указанное поле.
																 * Если в указанном поле хранится число, то предполагаем,
																 * что это файл, и пробуем получить его
																 */
																if($prop['PROPERTY_TYPE'] == 'S' &&
																		$prop['USER_TYPE'] == 'directory' &&
																		$prop['USER_TYPE_SETTINGS']['TABLE_NAME'] != "" &&
																		!is_array($prop['VALUE'])){ //highload block
																	$hlblock = HL\HighloadBlockTable::getList(
																			array('filter' =>
																					      array('TABLE_NAME' => $prop['USER_TYPE_SETTINGS']['TABLE_NAME'])
																			)
																	)->fetch();
																	// get entity
																	$entity = HL\HighloadBlockTable::compileEntity($hlblock);
																	$entity_data_class = $entity->getDataClass();
																	$main_query = new Entity\Query($entity);
																	$main_query->setSelect(array('*'));
																	$main_query->setFilter(array(
																			'UF_XML_ID' => $prop['VALUE']
																	));
																	$result = $main_query->exec();
																	$result = new CDBResult($result);
																	if($row = $result->Fetch())
																	{
																		if($arParams['HIGHLOAD_SHOW_FIELD'] != "" && isset($row[$arParams['HIGHLOAD_SHOW_FIELD']])){
																			if(is_numeric($row[$arParams['HIGHLOAD_SHOW_FIELD']])){ //проверяем, файл ли это
																				if($file = CFile::ResizeImageGet($row[$arParams['HIGHLOAD_SHOW_FIELD']], array('width'=>16, 'height'=>16), BX_RESIZE_IMAGE_EXACT, true)){
																					$prop['VALUE'] = '<img src="'.$file['src'].'"/>';
																				}else{
																					$prop['VALUE'] = $row[$arParams['HIGHLOAD_SHOW_FIELD']];
																				}
																			}else{
																				$prop['VALUE'] = $row[$arParams['HIGHLOAD_SHOW_FIELD']];
																			}
																		}else{
																			$prop['VALUE'] = $row['UF_NAME'];
																		}
																	}
																}
																?>
																<b><?=$prop['NAME']?></b>: <?=(is_array($prop['VALUE']) ? implode('; ', $prop['VALUE']) : $prop['VALUE'])?>
																<?
															}
														}
													} ?>
												</label>
											</div>
										</li>
									<? } ?>
								</ul>

											<!--	Добавим поле количество на втором шаге	-->

								<? if($arParams['SHOW_QUANTITY'] && !$arParams['BUY_CURRENT_BASKET']): ?>
									<div class="form-row">
										<div class="form-cell-3">
											<label
												for="quantity_b1c"><?=GetMessage('QUANTITY_LABEL');?><? if($arResult['SHOW_PROPERTIES_REQUIRED'][$order_props['ID']] == 'Y'){
													?>*<? } ?>:</label>
										</div>
										<div class="form-cell-9">
                                            <span class="item_buttons_counter_block">
												<a href="#" class="button_set_quantity minus bx_bt_button_type_2 bx_small bx_fwb">-</a>
												<input id="quantity_b1c" type="text" class="tac transparent_input" value="1"
													   name="quantity_b1c"/>
												<a href="#" class="button_set_quantity plus bx_bt_button_type_2 bx_small bx_fwb">+</a>
											</span>
										</div>
									</div>
								<? endif; ?>


								<div class="clr"></div>
								<? if($arResult['POST']['PAY_SYSTEM'] > 0){
									?>
									<input type="hidden" name="PAY_SYSTEM" value="<?=$arResult['POST']['PAY_SYSTEM']?>"/>
								<? } ?>
								<? if($arResult['POST']['DELIVERY'] > 0){
									?>
									<input type="hidden" name="DELIVERY" value="<?=$arResult['POST']['DELIVERY']?>"/>
								<? } ?>
								<div class="clr"></div>
								<div class="form-row">
									<button class="button" id="h2o_preorder_button_submit"><?=GetMessage("MAKE")?></button>
								</div>
							</div>

							<?
							/**
							 * Выводим стартовую форму
							 */
							?>
						<? else: ?>
							<div class="modal-header">
														<!--	Выводим название товара и цены товара или ТП	-->
								<div class="item_price">
									<? if(is_array($arResult['CURRENT_PRODUCT']['OFFERS']) && !empty($arResult['CURRENT_PRODUCT']['OFFERS'])): ?>
										<? if($arParams["SHOW_OFFERS_FIRST_STEP"] == 'Y'): ?>
											<? if(isset($arResult['CURRENT_OFFER_ID']) && intval($arResult['CURRENT_OFFER_ID']) > 0): ?>
												<div class="modal_title"><?=$arResult['CURRENT_PRODUCT']['FIELDS']?></div>
												<div class="item_current_price"
												     data-start-price="<?=$arResult['CURRENT_PRODUCT']['OFFERS'][intval($arResult['CURRENT_OFFER_ID'])]['PRICE']?>"
												     data-currency="<?=$arResult['CURRENT_PRODUCT']['OFFERS'][intval($arResult['CURRENT_OFFER_ID'])]['CURRENCY']?>">
													<?=FormatCurrency($arResult['CURRENT_PRODUCT']['OFFERS'][intval($arResult['CURRENT_OFFER_ID'])]['PRICE'],
															$arResult['CURRENT_PRODUCT']['OFFERS'][intval($arResult['CURRENT_OFFER_ID'])]["CURRENCY"])?>
												</div>
											<? else: ?>
												<?if(isset($arResult['CURRENT_PRODUCT']['PRICE'])):?>
													<div class="modal_title"><?=$arResult['CURRENT_PRODUCT']['FIELDS']?></div>
													<div class="item_current_price"
													     data-start-price="<?=$arResult['CURRENT_PRODUCT']['PRICE']['PRICE']?>"
													     data-currency="<?=$arResult['CURRENT_PRODUCT']['PRICE']['CURRENCY']?>">
														<?=FormatCurrency($arResult['CURRENT_PRODUCT']['PRICE']['PRICE'],
																$arResult['CURRENT_PRODUCT']['PRICE']["CURRENCY"])?>
													</div>
												<?else:?>
													<?  reset($arResult['CURRENT_PRODUCT']['OFFERS']);
													$ar_offers = current($arResult['CURRENT_PRODUCT']['OFFERS'])  ?>
													<div class="modal_title"><?=$arResult['CURRENT_PRODUCT']['FIELDS']?></div>
													<div class="item_current_price" data-start-price="<?=$ar_offers['PRICE']?>"
													     data-currency="<?=$ar_offers['CURRENCY']?>"><?=FormatCurrency($ar_offers['PRICE'],
																$ar_offers["CURRENCY"])?></div>
												<?endif?>
											<? endif; ?>
										<? else: ?>
											<? reset($arResult['CURRENT_PRODUCT']['OFFERS']);
											$ar_offers = current($arResult['CURRENT_PRODUCT']['OFFERS']) ?>
											<div class="modal_title"><?=$arResult['CURRENT_PRODUCT']['FIELDS']?></div>
											<div class="item_current_price" data-start-price="<?=$ar_offers['PRICE']?>"
											     data-currency="<?=$ar_offers['CURRENCY']?>"><?=FormatCurrency($ar_offers['PRICE'],
														$ar_offers["CURRENCY"])?></div>
										<? endif; ?>
									<? else: ?>
										<div class="modal_title"><?=$arResult['CURRENT_PRODUCT']['FIELDS']?></div>
										<div class="item_current_price"
										     data-start-price="<?=$arResult['CURRENT_PRODUCT']['PRICE']['PRICE']?>"
										     data-currency="<?=$arResult['CURRENT_PRODUCT']['PRICE']['CURRENCY']?>">
											<?=FormatCurrency($arResult['CURRENT_PRODUCT']['PRICE']['PRICE'],
													$arResult['CURRENT_PRODUCT']['PRICE']["CURRENCY"])?>
										</div>
									<? endif; ?>
								</div>
								<br/>
								<span class="modal_title"><?=GetMessage("PERSONAL")?></span>
							</div>
							<div class="modal-container">
								<? if(is_array($arResult['USER_FIELDS']) && !empty($arResult['USER_FIELDS'])):
									foreach($arResult['USER_FIELDS'] as $user_fields):?>
										<div class="form-row">
											<div class="form-cell-3">
												<label
													for="individual<?=$user_fields?>"><?=GetMessage("$user_fields");?><? if($arResult['USER_FIELDS_REQUIRED'][$user_fields] == 'Y'){
														?>*<? } ?>:</label>
											</div>
											<div class="form-cell-9">
												<input type="text" name="ONECLICK[<?=$user_fields?>]"
												       value="<?=$arResult['CURRENT_USER_FIELDS'][$user_fields]?>"
												       id="individual<?=$user_fields?>"/>
												<? if($arResult['ERRORS'][$user_fields] == 'Y'):
													?>
													<small class="error"><?=GetMessage("ERROR")?></small>
												<? elseif($arResult['ERRORS'][$user_fields] == 'EMAIL'): ?>
													<small class="error"><?=GetMessage("ERROR_EMAIL")?></small>
												<? endif; ?>
											</div>
										</div>
									<? endforeach ?>
								<? endif; ?>
								<? if(is_array($arResult['SHOW_PROPERTIES']) && !empty($arResult['SHOW_PROPERTIES'])): ?>
									<? foreach($arResult['SHOW_PROPERTIES'] as $order_props): ?>
										<? if($order_props['TYPE'] == "TEXT"): ?>
											<div class="form-row">
												<div class="form-cell-3">
													<label
														for="individual<?=$order_props['ID']?>"><?=$order_props['NAME'];?><? if($arResult['SHOW_PROPERTIES_REQUIRED'][$order_props['ID']] == 'Y'){
															?>*<? } ?>:</label>
												</div>
												<div class="form-cell-9">
													<input type="text" name="ONECLICK_PROP[<?=$order_props['ID']?>]"
													       value="<?=$arResult['CURRENT_USER_PROPS'][$order_props['CODE']]?>"
													       id="individual<?=$order_props['ID']?>"/>
													<? if($arResult['ERRORS'][$order_props['ID']] == 'Y'):?>
														<small class="error"><?=GetMessage("ERROR")?></small>
													<? elseif($arResult['ERRORS'][$order_props['ID']] == 'EMAIL'): ?>
														<small class="error"><?=GetMessage("ERROR_EMAIL")?></small>
													<? endif; ?>
												</div>
											</div>
										<? elseif($order_props['TYPE'] == "CHECKBOX"): ?>
											<div class="form-row">
												<div class="form-cell-3">
													<label
														for="individual<?=$order_props['ID']?>"><?=$order_props['NAME'];?><? if($arResult['SHOW_PROPERTIES_REQUIRED'][$order_props['ID']] == 'Y'){
															?>*<? } ?>:</label>
												</div>
												<div class="form-cell-9">
													<input type="checkbox" name="ONECLICK_PROP[<?=$order_props['ID']?>]"
													       value="Y<?/*=$arResult['CURRENT_USER_PROPS'][$order_props['CODE']]*/?>"
													       id="individual<?=$order_props['ID']?>"/>
													<? if($arResult['ERRORS'][$order_props['ID']] == 'Y'){
														?>
														<small class="error"><?=GetMessage("ERROR")?></small>
													<? } ?>
												</div>
											</div>
										<? elseif($order_props['TYPE'] == "TEXTAREA"): ?>
											<div class="form-row">
												<div class="form-cell-3">
													<label
														for="individual<?=$order_props['ID']?>"><?=$order_props['NAME'];?><? if($arResult['SHOW_PROPERTIES_REQUIRED'][$order_props['ID']] == 'Y'){
															?>*<? } ?>:</label>
												</div>
												<div class="form-cell-9">
													<textarea name="ONECLICK_PROP[<?=$order_props['ID']?>]"
													          id="individual<?=$order_props['ID']?>"><?=$arResult['CURRENT_USER_PROPS'][$order_props['CODE']]?></textarea>
													<? if($arResult['ERRORS'][$order_props['ID']] == 'Y'){
														?>
														<small class="error"><?=GetMessage("ERROR")?></small>
													<? } ?>
												</div>
											</div>
										<? elseif($order_props["TYPE"] == "LOCATION"): ?>
											<? $locationTemplate = ".default" ?>
											<div class="form-row reg-individual show">
												<div class="form-cell-3">
													<label
														for="individual<?=$order_props['ID']?>"><?=$order_props["NAME"]?><? if($arResult['SHOW_PROPERTIES_REQUIRED'][$order_props['ID']] == 'Y'){
															?>*<? } ?>:</label>
												</div>
												<? $value = $order_props['DEFAULT_VALUE']; ?>
												<? if($_REQUEST['ONECLICK_PROP'][$order_props['ID']] > 0){
													$value = $arResult['CURRENT_USER_PROPS'][$order_props['CODE']];
												} ?>
												<div class="form-cell-9">
													<? $APPLICATION->IncludeComponent("bitrix:sale.ajax.locations", "", array("COMPONENT_TEMPLATE" => "popup", "CITY_OUT_LOCATION" => "Y", "ALLOW_EMPTY_CITY" => "Y", "COUNTRY_INPUT_NAME" => "COUNTRY", "REGION_INPUT_NAME" => "REGION", "CITY_INPUT_NAME" => "ONECLICK_PROP[" . $order_props['ID'] . "]", "COUNTRY" => "1", "LOCATION_VALUE" => $value, "ONCITYCHANGE" => "", "NAME" => "q"), false); ?>
													<? if($arResult['ERRORS'][$order_props['ID']] == 'Y'){
														?>
														<small class="error"><?=GetMessage("ERROR")?></small>
													<? } ?>
												</div>
											</div>
										<? endif; ?>
									<? endforeach ?>
								<? endif; ?>
								<? if($arParams['SHOW_USER_DESCRIPTION']): ?>
									<div class="form-row">
										<div class="form-cell-3">
											<label for="oneclickcomment"><?=GetMessage("H2O_BUYONECLICK_USER_DESCRIPTION")?>:</label>
										</div>
										<div class="form-cell-9">
											<textarea name="ONECLICK_COMMENT" id="oneclickcomment" cols="30" rows="10"><?=$arResult['POST']['ONECLICK_COMMENT']?></textarea>
										</div>
									</div>

								<? endif; ?>
								<? if(is_array($arResult['OFFERS']) && !empty($arResult['OFFERS'])): ?>
									<div class="modal-header">
										<span class="modal_title"><?=GetMessage("H2O_BUY_ONECLICK_OFFERS_TITLE")?></span>
									</div>
									<ul class="offers_list">

										<?if(intval($arResult['CURRENT_OFFER_ID']) > 0){
											$checked = intval($arResult['CURRENT_OFFER_ID']);
										}else{
											$checked = $arResult['OFFERS'][0]['ID'];
										}?>
										<select name="H2O_B1C_OFFER_ID" id="">
											<? foreach($arResult['OFFERS'] as $offer):?>
												<option value="<?=$offer['ID']?>"
												        data-start-price="<?=$arResult['CURRENT_PRODUCT']['OFFERS'][$offer['ID']]['PRICE']?>"
												        data-currency="<?=$arResult['CURRENT_PRODUCT']['OFFERS'][$offer['ID']]['CURRENCY']?>"
															<? if($offer['ID'] == $checked ){
																print 'selected';
															} ?>>
													<?
													if(is_array($offer['PROPERTIES']) && !empty($offer['PROPERTIES'])){
														foreach($offer['PROPERTIES'] as $prop){
															?>
															<?
															if($prop['VALUE'] != '' && in_array($prop['CODE'], $arParams['LIST_OFFERS_PROPERTY_CODE'])){
																/**
																 * Далее идет проверка, является ли свойство типа Справочник.
																 * Получаем массив со значениями элемента highload блока.
																 * По умолчанию выводим поле UF_NAME.
																 * Если указать параметр у компонента HIGHLOAD_SHOW_FIELD,
																 * то будет выводится указанное поле.
																 * Если в указанном поле хранится число, то предполагаем,
																 * что это файл, и пробуем получить его
																 */
																if($prop['PROPERTY_TYPE'] == 'S' &&
																		$prop['USER_TYPE'] == 'directory' &&
																		$prop['USER_TYPE_SETTINGS']['TABLE_NAME'] != "" &&
																		!is_array($prop['VALUE'])){ //highload block
																	$hlblock = HL\HighloadBlockTable::getList(
																			array('filter' =>
																					      array('TABLE_NAME' => $prop['USER_TYPE_SETTINGS']['TABLE_NAME'])
																			)
																	)->fetch();
																	// get entity
																	$entity = HL\HighloadBlockTable::compileEntity($hlblock);
																	$entity_data_class = $entity->getDataClass();
																	$main_query = new Entity\Query($entity);
																	$main_query->setSelect(array('*'));
																	$main_query->setFilter(array(
																			'UF_XML_ID' => $prop['VALUE']
																	));
																	$result = $main_query->exec();
																	$result = new CDBResult($result);
																	if($row = $result->Fetch())
																	{
																		if($arParams['HIGHLOAD_SHOW_FIELD'] != "" && isset($row[$arParams['HIGHLOAD_SHOW_FIELD']])){
																			if(is_numeric($row[$arParams['HIGHLOAD_SHOW_FIELD']])){ //проверяем, файл ли это
																				if($file = CFile::ResizeImageGet($row[$arParams['HIGHLOAD_SHOW_FIELD']], array('width'=>16, 'height'=>16), BX_RESIZE_IMAGE_EXACT, true)){
																					$prop['VALUE'] = '<img src="'.$file['src'].'"/>';
																				}else{
																					$prop['VALUE'] = $row[$arParams['HIGHLOAD_SHOW_FIELD']];
																				}
																			}else{
																				$prop['VALUE'] = $row[$arParams['HIGHLOAD_SHOW_FIELD']];
																			}
																		}else{
																			$prop['VALUE'] = $row['UF_NAME'];
																		}
																	}
																}
																?>
																<?//=$prop['NAME']?><?=(is_array($prop['VALUE']) ? implode('; ', $prop['VALUE']) : $prop['VALUE'])?>
																<?
												//echo "<pre>";
												//print_r($prop);
												//echo "</pre>";
												?>
																<?
															}
														}
													} ?>
												</option>
											<?endforeach;?>
										</select>
										
									</ul>
								<? endif; ?>
								<? if($arParams['SHOW_QUANTITY'] && !$arParams['BUY_CURRENT_BASKET']): ?>
									<div class="form-row h2o-quantity-block">
										<div class="form-cell-3">
											<label
												for="quantity_b1c"><?=GetMessage('QUANTITY_LABEL');?><? if($arResult['SHOW_PROPERTIES_REQUIRED'][$order_props['ID']] == 'Y'){
													?>*<? } ?>:</label>
										</div>
										<div class="form-cell-9">
                                            <span class="item_buttons_counter_block">
												<a href="#" class="button_set_quantity minus bx_bt_button_type_2 bx_small bx_fwb">-</a>
												<input id="quantity_b1c" type="text" class="tac transparent_input" value="<?=$arResult['QUANTITY']?>"
												       name="quantity_b1c"/>
												<a href="#" class="button_set_quantity plus bx_bt_button_type_2 bx_small bx_fwb">+</a>
											</span>
										</div>
									</div>
								<? endif; ?>

								<? if($arResult["SHOW_CAPTCHA"] == "Y"): ?>
									<div class="form-row">
										<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>"/>
										<div class="form-cell-3">
											<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="170" height="34"
											     alt="CAPTCHA"/>
											<span class="mf-req">*</span>
										</div>
										<div class="form-cell-9">
											<input type="text" id="individual_captha" name="captcha_word" size="30" maxlength="50" value=""/>
											<? if(strlen($arResult['ERRORS']["CAPTCHA"]) > 0){
												?>
												<small class="error"><?=$arResult['ERRORS']["CAPTCHA"]?></small>
											<? } ?>
										</div>
									</div>
								<? endif; ?>
								<? if(count($arResult['PAY_SYSTEM']) > 1 && $arParams['MODE_EXTENDED'] == 'Y' && $arParams['SHOW_PAY_SYSTEM']){
									?>
									<div class="modal-header">
										<span class="modal_title"><?=GetMessage("PAY_SYSTEM")?></span>
									</div>
									<div class="form-row">
										<? if(is_array($arResult['PAY_SYSTEM']) && !empty($arResult['PAY_SYSTEM'])): ?>
											<? $first = true; ?>
											<? foreach($arResult['PAY_SYSTEM'] as $pay_system): ?>
												<div class="form-cell-6">
													<input type="radio"
													       id="PAY_SYSTEM_<?=$pay_system['ID']?>" <?=($arResult['POST']['PAY_SYSTEM'] == $pay_system['ID']?'checked':'')?>
													       name="PAY_SYSTEM" value="<?=$pay_system['ID']?>" required="required" <? if($first){
														$first = false;
														print"checked";
													} ?> hidden="hidden"/>
													<label for="PAY_SYSTEM_<?=$pay_system['ID']?>"><?=$pay_system['NAME']?></label>
												</div>
											<? endforeach ?>
										<? endif; ?>
									</div>
								<? }
								elseif($arParams['MODE_EXTENDED'] == 'Y' && $arParams['SHOW_PAY_SYSTEM']){
									?>
									<input type="hidden" name="PAY_SYSTEM" value="<?=$arResult['PAY_SYSTEM'][0]['ID']?>"/>
								<? } ?>
								<? if(count($arResult['DELIVERY']) > 1 && $arParams['MODE_EXTENDED'] == 'Y' && $arParams['SHOW_DELIVERY']){
									?>
									<div class="modal-header">
										<span class="modal_title"><?=GetMessage("DELIVERY")?></span>
									</div>
									<div class="form-row">
										<? if(is_array($arResult['DELIVERY']) && !empty($arResult['DELIVERY'])): ?>
											<? $first = true; ?>
											<? foreach($arResult['DELIVERY'] as $delivery): ?>
												<div class="form-cell-6">
													<input id="DELIVERY_<?=$delivery['ID']?>"
													       type="radio" <?=($arResult['POST']['DELIVERY'] == $delivery['ID']?'checked':'')?>
													       name="DELIVERY" value="<?=$delivery['ID']?>" required="required" <? if($first){
														$first = false;
														print 'checked';
													} ?> hidden="hidden"/>
													<label
														for="DELIVERY_<?=$delivery['ID']?>"><?=$delivery['NAME']?> <?=FormatCurrency($delivery['PRICE'], $delivery['CURRENCY'])?></label>
												</div>
											<? endforeach ?>
										<? endif; ?>
									</div>
								<? }
								elseif($arParams['MODE_EXTENDED'] == 'Y' && $arParams['SHOW_DELIVERY']){
									?>
									<input type="hidden" name="DELIVERY" value="<?=$arResult['DELIVERY'][0]['ID']?>"/>
								<? } ?>
								<? if(is_array($arResult['ERROR_STRING']) && !empty($arResult['ERROR_STRING'])): ?>
									<? foreach($arResult['ERROR_STRING'] as $error){
										?>
										<small class="error"><?=$error?></small>
									<? } ?>
								<? endif; ?>
								<div class="clr"></div>
								<div class="form-row">
									<span class="form-helper"><sup>*</sup><?=GetMessage('REQUIRE');?></span>
									<button class="button" id="h2o_preorder_button_submit"><?=GetMessage("MAKE")?></button>
								</div>
							</div>
						<? endif; ?>

					</form>
				<? endif; ?>
			</div>
		</div>
	</div>
	<? /*<button class="bx_big bx_bt_button css_popup" data-id=""><?=GetMessage('BUY_ONE_CLICK'); ?></button>*/ ?>
</div>