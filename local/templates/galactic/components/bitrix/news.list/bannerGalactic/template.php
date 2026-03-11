<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
?>
	<?$lastNews = $arResult["ITEMS"][0]?>
	<section class="last-news"
		style="background: url('<?=$lastNews['PREVIEW_PICTURE']["SRC"]?>') center/100% no-repeat">
		<h1 class="last-news__title"><?=$lastNews['NAME']?></h1>
		<span class="last-news__text"><?=$lastNews['PREVIEW_TEXT']?></span>
	</section>
