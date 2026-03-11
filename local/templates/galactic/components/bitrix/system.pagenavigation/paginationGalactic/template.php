<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if($arResult["NavPageCount"] <= 1) return;


$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<ul class="pagination__list">

    <?if ($arResult["NavPageNomer"] > 1):?>
		<li class="pagination__item">
			<a class="pagination__link pagination__link--before" 
			href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">
				<span class="pagination__arrow pagination__arrow--before"></span>
			</a>
		</li>
    <?endif;?>


	<?
	if ($arResult["NavPageCount"] < 3) {
		$startPageValue = 1;
		$endPageValue = $arResult["NavPageCount"];
	} elseif (($arResult["NavPageCount"] - $arResult["NavPageNomer"]) < 2) {
		$startPageValue = $arResult["NavPageCount"] - 2;
		$endPageValue = $arResult["NavPageCount"];
	} else {
		$startPageValue = $arResult["NavPageNomer"];
		$endPageValue = $startPageValue + 2;
	}
	?>

	<?
	for ($i = $startPageValue; $i <= $endPageValue; $i++):
	?> 

	<?if ($i == $arResult["NavPageNomer"]):?>
		<span class="pagination__link pagination__link--active"><?=$i?></span>
	<?else:?>
		<li class="pagination__item">
			<a class="pagination__link"
			href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$i?>">
				<?=$i?>
			</a>
		</li>
	<?endif;?>

	<?endfor;?>
		

    <?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<li class="pagination__item">
			<a class="pagination__link pagination__link--next"
			href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
				<span class="pagination__arrow pagination__arrow--next"></span>
			</a>
		</li>
    <?endif;?>

</ul>
