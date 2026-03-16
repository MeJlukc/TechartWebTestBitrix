<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>

<div class="my-list">
    <?php
    foreach ($arResult['ITEMS'] as $arItem) { ?>
        <div class="my-list__item">
            <h2 class="my-list__item__title"><?=$arItem["NAME"]?></h2>
            <p class="my-list__item__announce"><?=$arItem["PREVIEW_TEXT"]?></p>
            <p class="my-list__item__text"><?=$arItem["DETAIL_TEXT"]?></p>
            <img src="<?=CFile::GetPath($arItem["PREVIEW_PICTURE"])?>" alt="" class="my-list__item__img">
            <span class="my-list__item__date"><?=$arItem["ACTIVE_FROM"]?></span>
        </div>
    <?php
    } ?>
</div>
