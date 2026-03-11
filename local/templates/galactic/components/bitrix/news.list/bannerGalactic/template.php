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
	<?$lastNews = $arResult["ITEMS"][0]?>
	<section class="last-news"
		style="background: url('<?=$lastNews['PREVIEW_PICTURE']["SRC"]?>') center/100% no-repeat">
		<h1 class="last-news__title"><?=$lastNews['NAME']?></h1>
		<span class="last-news__text"><?=$lastNews['PREVIEW_TEXT']?></span>
	</section>
