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

$arResult["QUERY_STRINGs"] = !empty($params) ? '?' . http_build_query($params) : "";
