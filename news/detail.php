<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Детальная новость");
$APPLICATION->SetTitle("detail");
?><?echo "Я детальная страница!"; die();
$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "detail.php?ID=#ELEMENT_ID#",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_CODE" => "",
		"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
		"FIELD_CODE" => array("",""),
		"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "news",
		"IBLOCK_URL" => "news.php",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Страница",
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"SET_BROWSER_TITLE" => "Y",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_SHARE" => "N"
	)
);

// $APPLICATION->IncludeComponent(
//     "bitrix:news.detail",
//     "template1", // или ".default"
//     Array(
//         "IBLOCK_ID" => $arParams["IBLOCK_ID"],
//         "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
//         "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
//         "CHECK_DATES" => $arParams["CHECK_DATES"],
//         "FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"], // ВАЖНО: берем из index.php
//         "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
//         "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
//         "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
//         "CACHE_TYPE" => $arParams["CACHE_TYPE"],
//         "CACHE_TIME" => $arParams["CACHE_TIME"],
//         "SET_TITLE" => $arParams["SET_TITLE"],
//         "SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
//         "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
//     ),
//     $component
// );
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>