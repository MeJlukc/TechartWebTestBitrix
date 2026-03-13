<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$params = $_GET;
foreach($params as $key => $value) {
    if (preg_match("/PAGEN_/", $key)) {
        unset($params[$key]);
    }
}

$queryString = !empty($params) ? '?' . http_build_query($params) : "";

$arResult["QUERY_STRING"] = $queryString;