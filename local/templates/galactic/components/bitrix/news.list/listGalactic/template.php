<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

	<section class="news">
		<h1 class="news__title"><?=$arResult["TITLE"]?></h1>

		<div class="news__list">
			<?php
			foreach ($arResult["ITEMS"] as $arItem) {
			?>
				<div class="news-card">
					<p class="news-card__date date"><?=$arItem['ACTIVE_FROM']?></p>
					<h2 class="news-card__title"><?=$arItem['NAME']?></h2>
					<span class="news-card__text"><?=$arItem['PREVIEW_TEXT']?></span>
					<a href="/news/detail.php?ID=<?=$arItem['ID']?>" class="button news-card__button">Подробнее</a>
				</div>
			<?php
			}
			?>
		</div>
		<?php if (empty($arResult["ITEMS"])) { ?>
		<div class="no-news-found">
			<h3 class="no-news-found__title">По вашему запросу ничего не найдено</h3>
			<a class="button no-news-found__button" href="/news/">Сбросить фильтр</a>
		</div>
		<?php } ?>
	</section>

<?php if($arParams["DISPLAY_BOTTOM_PAGER"]) {
	echo $arResult["NAV_STRING"];
	  } ?>

</div>
