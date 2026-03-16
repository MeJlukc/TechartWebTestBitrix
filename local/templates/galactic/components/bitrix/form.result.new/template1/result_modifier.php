<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule("iblock");

$arResult["CATEGORIES_LIST"] = [];

$res = CIBlockElement::GetList(
    Array("NAME" => "ASC"), 
    Array("IBLOCK_ID" => 5, "ACTIVE" => "Y"), 
    false, 
    false, 
    Array("NAME")
);

while ($arItem = $res->GetNext()) {
    array_push($arResult["CATEGORIES_LIST"], Array("NAME" => $arItem["NAME"]));
}
