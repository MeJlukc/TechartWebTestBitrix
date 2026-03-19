<?php

$lastNewsInfo = [];

$arItem = $arResult["ITEMS"][0];
$lastNewsInfo['TITLE'] = $arItem['NAME'];
$lastNewsInfo['TEXT'] = $arItem['PREVIEW_TEXT'];
$lastnewsInfo['BACKGROUND'] = $arItem['PREVIEW_PICTURE']["SRC"];

$arResult["BANNER_INFO"] = $lastNewsInfo;
