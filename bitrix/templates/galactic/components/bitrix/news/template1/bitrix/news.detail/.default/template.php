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

<section class="work-news">
    <p class="work-news__path">
        <a class="work-news__path__link" href="<?=$arResult["LIST_PAGE_URL"]?>">Главная</a> / <span class="text-color--grey"><?=$arResult["NAME"]?></span>
    </p>
    <h1 class="work-news__title"><?=$arResult["PREVIEW_TEXT"]?></h1>
    <div class="work-news__container">
        <div class="work-news__info">
            <p class="date"><?=$arResult["ACTIVE_FROM"]?></p>
            <h2 class="work-news__announce"><?=$arResult["PREVIEW_TEXT"]?></h2>
            <span class="work-news__content"><?=$arResult["DETAIL_TEXT"]?></span>
            <a class="button work-news__button" href="<?=$arResult["LIST_PAGE_URL"]?>">Назад к новостям</a>
        </div>
        <div class="work-news__media">
            <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="News image" class="work-news__image">
        </div>
    </div>
</section>