<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// Смотрим, нужно ли добавлять в title категорию
$arResult["TITLE"] = "Новости";

global $arrFilter;
$categoryId = $arrFilter['PROPERTY_NEWS_CATEGORIES'];

if ($categoryId > 0) {
    $res = CIBlockElement::GetByID($categoryId)->getNext();
    $categoryName = $res["NAME"];
    $arResult["TITLE"] = "Новости в категории: " . $categoryName;
}

// Меняем arResult['ITEMS'] для параметров списка 
$customItems = [];

foreach ($arResult["ITEMS"] as $arItem) {
    $res = [];
    $res['DATE'] = $arItem['ACTIVE_FROM'];
    $res['TITLE'] = $arItem['NAME'];
    $res['TEXT'] = $arItem['PREVIEW_TEXT'];
    $res['DETAIL_PAGE_LINK'] = "news/" . $arItem['ID'] . "/";

    $customItems[] = $res;
}

$arResult["CUSTOM_ITEMS"] = $customItems;