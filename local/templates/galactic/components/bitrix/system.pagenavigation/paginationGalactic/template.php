<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

if($arResult["NavPageCount"] <= 1) return;
?>

<?=
\TAO::frontend()->renderBlock(
'common/pagination',
[
'navPageNum' => $arResult["NavPageNomer"],
'navPageCount' => $arResult["NavPageCount"],
'startPageValue' => $arResult["startPageValue"],
'endPageValue' => $arResult["endPageValue"],
'basePath' => $arResult["BASE_PATH"],
'queryString' => $arResult["QUERY_STRING"],
]
)
?>