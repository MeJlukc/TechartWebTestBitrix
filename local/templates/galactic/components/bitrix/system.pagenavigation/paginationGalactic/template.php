<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

if($arResult["NavPageCount"] <= 1) return;
?>

<ul class="pagination__list">
	
    <?php if ($arResult["NavPageNomer"] > 1) { ?>
		<li class="pagination__item">
			<a class="pagination__link pagination__link--before" 
			href="/news/page-<?=($arResult["NavPageNomer"]) - 1?>/<?=$arResult["QUERY_STRING"]?>">
				<span class="pagination__arrow pagination__arrow--before"></span>
			</a>
		</li>
    <?php }?>


	<?php
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

	<?php
	for ($i = $startPageValue; $i <= $endPageValue; $i++) {
		if ($i == $arResult["NavPageNomer"]) { ?>
			<span class="pagination__link pagination__link--active"><?=$i?></span>
	<?php } else { ?>
			<a class="pagination__link"
				href="/news/page-<?=$i?>/<?=$arResult["QUERY_STRING"]?>">
				<?=$i?>
			</a>
	<?php };
	} ?>

    <?php if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) {?>
		<li class="pagination__item">
			<a class="pagination__link pagination__link--next"
			href="/news/page-<?=($arResult["NavPageNomer"]) + 1?>/<?=$arResult["QUERY_STRING"]?>">
				<span class="pagination__arrow pagination__arrow--next"></span>
			</a>
		</li>
    <?php } ?>

</ul>
