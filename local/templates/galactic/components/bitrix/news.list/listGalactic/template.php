<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

	<section class="news">
		<?=
		\TAO::frontend()->renderBlock(
		'common/title',
		[
		'title' => $arResult['TITLE'],
		]
		)
		?>

		<div class="news__list">
			<?php
			foreach ($arResult["ITEMS"] as $arItem) {
			?>
				<?=
				\TAO::frontend()->renderBlock(
					'common/card',
					[
						'date' => $arItem['ACTIVE_FROM'],
					 	'title' => $arItem['NAME'],
						'text' => $arItem['PREVIEW_TEXT'],
						'link' => $arItem['ID']
					]
				)
				?>
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

<?php
if($arParams["DISPLAY_BOTTOM_PAGER"]) {
	echo $arResult["NAV_STRING"];
}
?>

</div>
