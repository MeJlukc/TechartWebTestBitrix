<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
$APPLICATION->SetTitle("Галактический вестник")
?>

<?php
global $arrFilter;
// $arrFilter = ['ID' => 58];
?>

<?php
$APPLICATION->IncludeComponent(
	"my:custom.list",
	"",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"FIELD_CODE" => array("",""),
		"FILE_404" => "/404.php",
		"FILTER_NAME" => "",
		"IBLOCK_ID" => $_REQUEST["ID"],
		"IBLOCK_TYPE" => "news",
		"ITEMS_COUNT" => "4",
		"PROPERTY_CODE" => array("",""),
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC"
	)
);
?>

<?php 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>