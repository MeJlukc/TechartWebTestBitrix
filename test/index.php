<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Галактический вестник")
?>

<?php
global $arrFilter;
// $arrFilter = ['ID' => 58];

$APPLICATION->SetTitle("test");

$APPLICATION->IncludeComponent(
    "my:custom.list",
    "",
    Array(
        "IBLOCK_ID" => "1",
        "FIELD_CODE" => array(
            'ID', 
            'NAME', 
            'PREVIEW_TEXT', 
            'PREVIEW_PICTURE', 
            'ACTIVE_FROM',
            'DETAIL_TEXT',
        ),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "NEWS_CATEGORIES",
		),
        "ITEMS_COUNT" => 4,
    )
);
?>

<?php 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>