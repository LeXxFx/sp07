<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<section id="catalog" class="catalog">
    <div class="catalog__list clearfix">
<?foreach ($arResult['SECTIONS'] as $arSection):?>
<?				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

				if (false === $arSection['PICTURE'])
					$arSection['PICTURE'] = array(
						'SRC' => $arCurView['EMPTY_IMG'],
						'ALT' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
							: $arSection["NAME"]
						),
						'TITLE' => (
							'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
							: $arSection["NAME"]
						)
					);
?>
	   <div class="catalog__item">
	        <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>">
	            <div class="photo" style="background: url('<? echo $arSection['PICTURE']['SRC']; ?>') no-repeat center 0 / cover">
	                <span>Открыть категорию</span>
	            </div>
	            <div class="name">
	                <div class="title"><?=$arSection['NAME'];?></div>
					<?
						$arFilter = Array('IBLOCK_ID'=> 9,'ID'=>$arSection["ID"], 'GLOBAL_ACTIVE'=>'Y');
						$db_list = CIBlockSection::GetList(Array("timestamp_x"=>"DESC"), $arFilter, false, Array("UF_SEO_TEXT"));
						if($uf_value = $db_list->GetNext()):
						$seoText=$uf_value["UF_SEO_TEXT"];
						endif; 
					?>
	                <div class="desc"><?=$seoText?></div>
	            </div>
	            <?/*<div class="stick stick-sale">
	                <span class="num">10%</span>
	                Sale
	            </div>*/?>
	        </a>
	    </div>
<?endforeach;?>
	</div>
</section>
