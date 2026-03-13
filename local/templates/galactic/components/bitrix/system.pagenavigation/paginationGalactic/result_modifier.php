<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$params = $_GET;
$sectionPart = "";

if (!empty($params["SECTION_CODE"])) {
    $sectionPart = "category-" . $params["SECTION_CODE"] . "/";
    unset($params["SECTION_CODE"]);
}

foreach($params as $key => $value) {
    if (strpos($key, "PAGEN_") !== false) {
        unset($params[$key]);
    }
}

$arResult["BASE_PATH_CUSTOM"] = "/news/" . $sectionPart;

$arResult["QUERY_STRING_CUSTOM"] = !empty($params) ? '?' . http_build_query($params) : "";
