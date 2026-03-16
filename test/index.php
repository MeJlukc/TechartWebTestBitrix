<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Галактический вестник")
?>

<?php
$APPLICATION->SetTitle("test");

$APPLICATION->IncludeComponent(
    "my:something.list",
    "",
    Array(
        "IBLOCK_ID" => "1",
        "FIELD_CODE" => Array(
            'ID', 
            'NAME', 
            'PREVIEW_TEXT', 
            'PREVIEW_PICTURE', 
            'ACTIVE_FROM',
            'DETAIL_TEXT',
        ),
        "ITEMS_COUNT" => 4,
    )
);?>

<?php 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>