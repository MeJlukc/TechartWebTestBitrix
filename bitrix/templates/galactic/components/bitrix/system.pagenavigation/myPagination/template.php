<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if($arResult["NavPageCount"] <= 1) return;

// Формируем базовый URL (путь + параметры, если есть)
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<ul class="pagination__list">
    
    <?/* Ссылка "Назад" */?>
    <?if ($arResult["NavPageNomer"] > 1):?>
		<li class="pagination__item">
			<a class="pagination__link pagination__link--before" 
			href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
				<span class="pagination__arrow pagination__arrow--before"></span>
			</a>
		</li>
    <?endif;?>

    <?/* Список номеров страниц */?>
    <?while($arResult["nStartPage"] <= min(3, $arResult["nEndPage"])):?>
        <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
            <span class="pagination__link pagination__link--active"><?=$arResult["nStartPage"]?></span>
        <?else:?>
			<li class="pagination__item">
				<a class="pagination__link"
				href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>">
					<?=$arResult["nStartPage"]?>
				</a>
			</li>
        <?endif;?>
        <?$arResult["nStartPage"]++?>
    <?endwhile;?>

    <?/* Ссылка "Вперед" */?>
    <?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<li class="pagination__item">
			<a class="pagination__link pagination__link--next"
			href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
				<span class="pagination__arrow pagination__arrow--next"></span>
			</a>
		</li>
    <?endif;?>

</ul>