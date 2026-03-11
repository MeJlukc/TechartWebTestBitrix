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

<section class="detail-news">
    <p class="detail-news__path">
        <a class="detail-news__path__link" href="/news/">Главная</a> / <span class="text-color--grey"><?=$arResult["NAME"]?></span>
    </p>
    <h1 class="detail-news__title"><?=$arResult["PREVIEW_TEXT"]?></h1>
    <div class="detail-news__container">
        <div class="detail-news__info">
            <p class="date"><?=$arResult["ACTIVE_FROM"]?></p>
            <h2 class="detail-news__announce"><?=$arResult["PREVIEW_TEXT"]?></h2>
            <span class="detail-news__content"><?=$arResult["DETAIL_TEXT"]?></span>
            <a class="button detail-news__button" href="<?=$arResult["LIST_PAGE_URL"]?>">Назад к новостям</a>
        </div>
        <div class="detail-news__media">
            <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="News image" class="detail-news__image">
        </div>
    </div>
</section>