<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>

<div class="my-list">
    <?php
    foreach ($arResult['ITEMS'] as $arItem) { ?>
    <?php
        print_r($arItem['PROPERTIES']['NEWS_CATEGORIES']['VALUE']);
    ?>
        <div class="my-list__item">
            <h2 class="my-list__item__title"><?=$arItem["NAME"]?></h2>
            <p class="my-list__item__announce"><?=$arItem["PREVIEW_TEXT"]?></p>
            <p class="my-list__item__text"><?=$arItem["DETAIL_TEXT"]?></p>
            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="" class="my-list__item__img">
            <span class="my-list__item__date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
        </div>
    <?php
    } ?>
    <?php 
    if($arResult["NAV_STRING"]){
        echo $arResult["NAV_STRING"];
    } ?>
</div>
