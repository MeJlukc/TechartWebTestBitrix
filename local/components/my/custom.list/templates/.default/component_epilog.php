<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

if ($arParams["SET_TITLE"] === "Y" && !empty($arResult["NAME"])) {
    $APPLICATION->SetTitle($arResult["NAME"]);
}
