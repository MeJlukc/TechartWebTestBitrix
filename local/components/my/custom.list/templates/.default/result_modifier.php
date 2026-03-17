<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// foreach ($arResult['ITEMS'] as $key => $arItem) {
//     // 1. Обработка картинки
//     if (!empty($arItem["PREVIEW_PICTURE"])) {
//         // Если это массив (как в стандартных компонентах), берем готовый SRC
//         if (is_array($arItem["PREVIEW_PICTURE"])) {
//             $arResult['ITEMS'][$key]["IMG_SRC"] = $arItem["PREVIEW_PICTURE"]["SRC"];
//         } 
//         // Если это просто ID (число), получаем путь
//         else {
//             $arResult['ITEMS'][$key]["IMG_SRC"] = CFile::GetPath($arItem["PREVIEW_PICTURE"]);
//         }
//     }

//     // 2. Обработка даты по формату из параметров
//     if (!empty($arItem["ACTIVE_FROM"]) && !empty($arParams["ACTIVE_DATE_FORMAT"])) {
//         $arResult['ITEMS'][$key]["DISPLAY_DATE"] = CIBlockFormatProperties::DateFormat(
//             $arParams["ACTIVE_DATE_FORMAT"], 
//             MakeTimeStamp($arItem["ACTIVE_FROM"])
//         );
//     } else {
//         // Если формат не задан, оставляем как есть
//         $arResult['ITEMS'][$key]["DISPLAY_DATE"] = $arItem["ACTIVE_FROM"];
//     }
// }