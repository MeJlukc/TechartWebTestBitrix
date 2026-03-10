<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult["ITEMS"])>0):?>
	<section class="all-news">

		<section class="news">
			<h1 class="news__title">Новости</h1>

			<div class="news__list">
				<?php
				foreach ($arResult["ITEMS"] as $arItem):
				?>
					<div class="news-card">
						<p class="news-card__date date"><?=$item['DATE']?></p>
						<h2 class="news-card__title"><?=$item['NAME']?></h2>
						<span class="news-card__text"><?=$item['announce']?></span>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="button news-card__button">Подробнее</a>
					</div>
				<?php
				endforeach;
				?>
			</div>
		</section>

	</section>
<?endif?>
