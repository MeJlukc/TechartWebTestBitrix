<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$params = $_GET;
$sectionPart = "";

if (!empty($params["CATEGORY_CODE"])) {
    $sectionPart = "category-" . $params["CATEGORY_CODE"] . "/";
    unset($params["CATEGORY_CODE"]);
}

foreach($params as $key => $value) {
    if (preg_match("/PAGEN_", $key)) {
        unset($params[$key]);
    }
}

$arResult["BASE_PATH"] = "/news/" . $sectionPart;

$arResult["QUERY_STRING"] = !empty($params) ? '?' . http_build_query($params) : "";

// формирование начальной и конечной страницы пагинации

if ($arResult["NavPageCount"] < 3) {
    $startPageValue = 1;
    $endPageValue = $arResult["NavPageCount"];
} elseif (($arResult["NavPageCount"] - $arResult["NavPageNomer"]) < 2) {
    $startPageValue = $arResult["NavPageCount"] - 2;
    $endPageValue = $arResult["NavPageCount"];
} else {
    $startPageValue = $arResult["NavPageNomer"];
    $endPageValue = $startPageValue + 2;
}

$arResult["startPageValue"] = $startPageValue;
$arResult["endPageValue"] = $endPageValue;