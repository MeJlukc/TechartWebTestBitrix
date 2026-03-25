<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
// 

$item = &$arResult['ITEM']; 
$ids = $item['PROPERTIES']['AUTHORS']['VALUE'];

if (!empty($ids)) {
    $ids = (is_array($ids)) ? $ids : [$ids];
    $res = CIBlockElement::GetList([], ["ID" => $ids], false, false, ["NAME"]);
    $names = [];
    while($ob = $res->Fetch()) $names[] = $ob["NAME"];

    if (!empty($names)) {
        $item['LABEL'] = true;
        $item['LABEL_ARRAY_VALUE']['AUTHORS'] = implode(', ', $names);
    }
}