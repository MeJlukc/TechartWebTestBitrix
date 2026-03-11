<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

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
            <div class="detail-news__categories">
                <span class="detail-news__tags__title">Категории: </span>
                <?php $tag = join(', ', $arResult["DISPLAY_PROPERTIES"]["NEWS_TAGS"]["DISPLAY_VALUE"]) ?>
                <span class="detail-news__tags__content"><?=$tag?></span>
            </div>
            <a class="button detail-news__button" href="<?=$arResult["LIST_PAGE_URL"]?>">Назад к новостям</a>
        </div>
        <div class="detail-news__media">
            <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="News image" class="detail-news__image">
        </div>
    </div>
</section>