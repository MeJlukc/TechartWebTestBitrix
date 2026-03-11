<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

		<section class="news">
			<h1 class="news__title">Новости</h1>

			<div class="news__list">
				<?php
				foreach ($arResult["ITEMS"] as $arItem):
				?>
					<div class="news-card">
						<p class="news-card__date date"><?=$arItem['ACTIVE_FROM']?></p>
						<h2 class="news-card__title"><?=$arItem['NAME']?></h2>
						<span class="news-card__text"><?=$arItem['PREVIEW_TEXT']?></span>
						<a href="/news/detail.php?ID=<?=$arItem['ID']?>" class="button news-card__button">Подробнее</a>
					</div>
				<?php
				endforeach;
				?>
			</div>
		</section>

	</section>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
