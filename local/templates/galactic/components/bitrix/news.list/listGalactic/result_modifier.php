<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["TITLE"] = "Новости";

global $arrFilter;
$categoryId = $arrFilter['PROPERTY_NEWS_CATEGORIES'];

if ($categoryId > 0) {
    $res = CIBlockElement::GetByID($categoryId)->getNext();
    $categoryName = $res["NAME"];
    $arResult["TITLE"] = "Новости в категории: " . $categoryName;
}