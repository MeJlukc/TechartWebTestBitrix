<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

if (!Loader::includeModule('iblock'))
{
	return;
}

$arTypesEx = CIBlockParameters::GetIBlockTypes();

$arIBlocks = [];
$dbIBlock = CIBlock::GetList(
    ["SORT" => "ASC"], 
    ["TYPE" => ($arCurrentValues["IBLOCK_TYPE"] ?: ""), "ACTIVE" => "Y"]
);

while ($arRes = $dbIBlock->Fetch()) {
    $arIBlocks[$arRes["ID"]] = "[" . $arRes["ID"] . "] " . $arRes["NAME"];
    if (in_array($arr["PROPERTY_TYPE"], ["L", "N", "S"]))
    {
        $arProperty_LNS[$arr["CODE"]] = "[" . $arr["CODE"] . "] " . $arr["NAME"];
    }
}

$arSorts = [
    "ASC" => "По возрастанию",
    "DESC" => "По убыванию",
];


$arSortFields = [
    "ID" => "ID",
    "NAME" => "Название",
    "ACTIVE_FROM" => "Дата начала активности",
    "SORT" => "Индекс сортировки",
    "TIMESTAMP_X" => "Дата изменения",
];

$arComponentParameters = [
    'GROUPS' => [], 
    'PARAMETERS' => [
        "IBLOCK_TYPE" => [
            "PARENT" => "BASE",
            "NAME" => "Тип информационного блока",
            "TYPE" => "LIST",
            "VALUES" => $arTypesEx,
            "DEFAULT" => "news",
            "REFRESH" => "Y",
        ],
        "IBLOCK_ID" => [
            "PARENT" => "BASE",
            "NAME" => "Код информационного блока",
            "TYPE" => "LIST",
            "VALUES" => $arIBlocks,
            "DEFAULT" => '={$_REQUEST["ID"]}',
            "ADDITIONAL_VALUES" => "Y",
            "REFRESH" => "Y",
        ],
        'ITEMS_COUNT' => [
            "PARENT" => "BASE",
            'NAME' => 'Количество элементов списка на одной странице',
            'TYPE' => 'NUMBER',
            'DEFAULT' => '4',
        ],
		"SORT_BY1" => [
			"PARENT" => "DATA_SOURCE",
			"NAME" => "Поле для сортировки",
			"TYPE" => "LIST",
			"DEFAULT" => "ACTIVE_FROM",
			"VALUES" => $arSortFields,
			"ADDITIONAL_VALUES" => "Y",
		],
		"SORT_ORDER1" => [
			"PARENT" => "DATA_SOURCE",
			"NAME" => "Направление для сортировки",
			"TYPE" => "LIST",
			"DEFAULT" => "DESC",
			"VALUES" => $arSorts,
			"ADDITIONAL_VALUES" => "Y",
		],
        "FIELD_CODE" => CIBlockParameters::GetFieldCode("Поля элементов", "DATA_SOURCE"),
		"PROPERTY_CODE" => [
			"PARENT" => "DATA_SOURCE",
			"NAME" => "Свойства элементов",
			"TYPE" => "LIST",
			"MULTIPLE" => "Y",
			"VALUES" => $arProperty_LNS,
			"ADDITIONAL_VALUES" => "Y",
		],
        "ACTIVE_DATE_FORMAT" => CIBlockParameters::GetDateFormat('Формат вывода даты', "ADDITIONAL_SETTINGS"),
        'SHOW_404' => [
            "PARENT" => "BASE",
            'NAME' => 'Показывать страницу 404',
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
        ],
        'FILE_404' => [
            "PARENT" => "BASE",
            'NAME' => 'Расположение страницы 404',
            'TYPE' => 'FILE',
            'DEFAULT' => '/404.php',
        ],
        'FILTER_NAME' => [
            "PARENT" => "BASE",
            'NAME' => 'Название переменной с фильтром',
            'TYPE' => 'STRING',
        ],
        'SET_TITLE' => [
            "PARENT" => "BASE",
            'NAME' => 'Устаналивать заголовок страницы',
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
        ],
        "CACHE_TIME"  =>  ["DEFAULT" => 36000000],
    ],
];
